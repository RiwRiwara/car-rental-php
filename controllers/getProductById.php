<?php

require_once 'config/db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM Products WHERE ProductID = $ProductID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $productData = $result->fetch_assoc();

    $jsonResponse = json_encode($productData);

    header('Content-Type: application/json');
    echo $jsonResponse;
} else {
    echo json_encode(array('error' => 'Product not found'));
}

$conn->close();
?>
