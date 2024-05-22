<?php

require_once 'config/db.php';
class Rent
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function saveOrder($car_id, $user_email, $start_date, $end_date, $price)
    {
        $status = 'confirmed';  // Default status as pending
        $stmt = $this->conn->prepare("INSERT INTO orders (car_id, user_email, rent_start_date, rent_end_date, price, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssds", $car_id, $user_email, $start_date, $end_date, $price, $status);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function updateCarAvailability($car_id, $decrement)
    {
        $cars = json_decode(file_get_contents('cars.json'), true);
        foreach ($cars as $key => $car) {
            if ($car['id'] == $car_id) {
                $cars[$key]['quantity'] -= $decrement;
                break;
            }
        }
        file_put_contents('cars.json', json_encode($cars, JSON_PRETTY_PRINT));
    }
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $car_id = $_POST['car_id'];
    $user_email = $_POST['email'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $total_price = $_POST['total_price'];
    $quantity = $_POST['quantity'];
    $rent = new Rent($conn);

    $days = (strtotime($end_date) - strtotime($start_date)) / 86400 + 1;
    $orderID = $rent->saveOrder($car_id, $user_email, $start_date, $end_date, $total_price);
    $rent->updateCarAvailability($car_id, $quantity);

    echo json_encode(['success' => true, 'orderID' => $orderID]);

}
