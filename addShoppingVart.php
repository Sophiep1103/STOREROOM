<?php
// Establish a MySQL connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "database_app");
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $item_id = $_POST['item_id'];
    $account_id = $_POST['account_id'];
    $note = $_POST['note'];
    $unit = $_POST['unit'];
    $quantity = $_POST['quantity'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO shopping_cart (item_id, account_id, note, unit, quantity) 
                            VALUES (?, ?, ?, ?, ?) 
                            ON DUPLICATE KEY UPDATE 
                            account_id = VALUES(account_id), 
                            note = VALUES(note), 
                            unit = VALUES(unit), 
                            quantity = VALUES(quantity)");
    
    $stmt->bind_param("sissd", $item_id, $account_id, $note, $unit, $quantity);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Item added to cart successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>