<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 0);  // Turn off HTML error display

// Start output buffering
ob_start();

header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "database_app");

if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "Connection failed: " . $conn->connect_error]));
}
print_r($_POST);
echo ("hi");
$item_id = $_POST['item_id'] ?? '';
$account_id = $_POST['account_id'] ?? '';
$note = $_POST['note'] ?? '';
$unit = $_POST['unit'] ?? '';
$quantity = $_POST['quantity'] ?? 0;

$debug_info = [
    "POST_data" => $_POST,
    "parsed_data" => [
        "item_id" => $item_id,
        "account_id" => $account_id,
        "note" => $note,
        "unit" => $unit,
        "quantity" => $quantity
    ]
];

$stmt = $conn->prepare("INSERT INTO shopping_cart (item_id, account_id, note, unit, quantity) 
                        VALUES (?, ?, ?, ?, ?) 
                        ON DUPLICATE KEY UPDATE 
                        note = VALUES(note), 
                        unit = VALUES(unit), 
                        quantity = VALUES(quantity)");

$stmt->bind_param("sissd", $item_id, $account_id, $note, $unit, $quantity);

$response = [];
if ($stmt->execute()) {
    $response = [
        "success" => true,
        "debug_info" => $debug_info
    ];
} else {
    $response = [
        "success" => false,
        "error" => $stmt->error,
        "debug_info" => $debug_info
    ];
}

$stmt->close();
$conn->close();

// Capture any output that occurred before this point
$output = ob_get_clean();

if (!empty($output)) {
    $response['unexpected_output'] = $output;
}

echo json_encode($response);
?>

