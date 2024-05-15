<?php
include("connection.php");
// Assuming you have a database connection established already

// Get account_id from the POST data
$account_id = $_POST['account_id'];

// Fetch starred items (quantity and unit) from the database
$sql = "SELECT meat_id, quantity, unit, note FROM meat WHERE account_id = ? AND is_starred = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $account_id);
$stmt->execute();
$result = $stmt->get_result();

$starredItems = array();

while ($row = $result->fetch_assoc()) {
    // Add relevant information to the starredItems array
    $starredItems[] = array(
        'meat_id' => $row['meat_id'],
        'quantity' => $row['quantity'],
        'unit' => $row['unit'],
        'note' => $row['note'],
    );
}

// Close the database connection
$stmt->close();
$conn->close();

// Wrap the array in an object before encoding it to JSON
$response = array('starredItems' => $starredItems);

// Return the JSON response
echo json_encode($response);
?>