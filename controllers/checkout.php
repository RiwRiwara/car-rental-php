<?php
require_once 'config/db.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Parse JSON data from local storage
$cart_json = $_POST['cart'];
$cart = json_decode($cart_json, true);


// Insert order into Orders table
$delivery_address = $_POST['delivery_address'];
$recipient_name = $_POST['recipient_name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$total_price = $_POST['total_price'];

$sql_order = "INSERT INTO Orders (DeliveryAddress, RecipientName, Mobile, Email, TotalPrice) VALUES ('$delivery_address', '$recipient_name', '$mobile', '$email', '$total_price')";
if ($conn->query($sql_order) === FALSE) {
    echo "Error: " . $sql_order . "<br>" . $conn->error;
} else {
    $order_id = $conn->insert_id;

    foreach ($cart as $product_id => $item) {
        $quantity = $item['quantity'];
        $price = $item['price'] ?? 0.0;

        $sql_order_item = "INSERT INTO OrderDetails (OrderID, ProductID, Quantity, UnitPrice) VALUES ('$order_id', '$product_id', '$quantity', '$price')";
        if ($conn->query($sql_order_item) === FALSE) {
            echo "Error: " . $sql_order_item . "<br>" . $conn->error;
        } else {
            $total_price += $price * $quantity;

            // Update product amount
            $sql_product = "SELECT * FROM Products WHERE ProductID = '$product_id'";
            $result = $conn->query($sql_product);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $amount = $row['Amount'];
                    $amount -= $quantity;

                    $sql_update_product = "UPDATE Products SET Amount = '$amount' WHERE ProductID = '$product_id'";
                    if ($conn->query($sql_update_product) === FALSE) {
                        echo "Error: " . $sql_update_product . "<br>" . $conn->error;
                    }

                    header("Location: /order-success");
                }
            }
        }
    };
}



$conn->close();
