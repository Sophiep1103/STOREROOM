<?php
session_start();
$user = $_GET['username'];
$account_id = $_GET['account_id'];

// Establish a connection to MySQL
$conn = new mysqli("localhost", "root", "", "database_app");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fruitItems = "SELECT unit_minQuantity, minQuantity, fruit_id
                FROM fruits
                WHERE account_id = {$account_id}
                AND is_selected = 1";

$result = mysqli_query($conn, $fruitItems);

// Check if the query was successful
if ($result) {
    // Fetch each row and store the fruit_id in an array
    $fruitIds = array();
    while ($row = $result->fetch_assoc()) {
        $fruitIds[] = $row;
    }

    // Output the JSON string
    echo json_encode($fruitIds);

    // Free the result set
    $result->free();
}
// Your PHP logic to fetch or generate the array
$phpArray = array("key1" => "value1", "key2" => "value2");

// Output the JSON string
echo json_encode($phpArray);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="shopping_cart.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
</head>
<body>
    <h1>Shopping cart</h1>

    <!-- Move the script here after the PHP script has defined fruitIds -->
    <script>

    </script>
</body>
</html>
