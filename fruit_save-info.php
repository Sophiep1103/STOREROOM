<?php
header('Content-Type: application/json');
echo json_encode($data);
try {
echo "hello";
$conn = new mysqli("localhost", "root", "", "database_app");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have additional validation and sanitization for user inputs
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : null;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
$note = isset($_POST['note']) ? $_POST['note'] : null;
$item_date = isset($_POST['item_date']) ? $_POST['item_date'] : null;

$stmt = $conn->prepare("INSERT INTO user_items (user_id, item_id, quantity, note, item_date) VALUES (?, ?, ?, ?, ?)");

// Assuming user_id is an integer, item_id is a string, quantity is a decimal, note is a string, and item_date is a date
$stmt->bind_param("isds", $user_id, $item_id, $quantity, $note, $item_date);
$stmt->execute();
echo "Data saved successfully!";
$stmt->close();
$conn->close();
}
catch (Exception $e) {
    // Log and handle the exception
    error_log('Caught exception: ' . $e->getMessage());
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => 'Internal Server Error']);
}
?>