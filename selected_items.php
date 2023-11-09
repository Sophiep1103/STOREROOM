<?php
include("connection.php");


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data sent in the request body
    $json_data = file_get_contents('php://input');

    // Decode the JSON data into an array
    $selected_items = json_decode($json_data);

    // Process the selected items
    if (!empty($selected_items)) {
        // Now, $selected_items contains an array of selected item names
        // You can perform actions like adding them to a shopping cart or storing them in a database

        // For demonstration, let's simply print the list of selected items
        echo "Selected Items:\n";
        foreach ($selected_items as $item) {
            echo "- $item\n";
        }
    } else {
        echo "No selected items in the request.";
    }
} else {
    echo "Invalid request method. Please use POST.";
}
?>
