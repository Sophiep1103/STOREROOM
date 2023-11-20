<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (is_array($data)) {
        // Check if the session variable for the shopping cart exists and initialize it if not
        $_SESSION['shopping_cart'] = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : [];

        // Add the selected item names to the shopping cart session variable
        $_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'], $data);

        // Respond with a success message or any other response if needed
        echo json_encode(["message" => "Items added to the shopping cart successfully"]);
    } else {
        // Respond with an error message if the data is not in the expected format
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Invalid data format"]);
    }
} else {

    // Handle other HTTP methods or requests as needed
    http_response_code(405); // Method Not Allowed
}




// Retrieve and display the selected items
if (isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
    echo "<h2>Selected Items in Your Shopping Cart:</h2>";
    echo "<ul>";
    foreach ($_SESSION['shopping_cart'] as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Your shopping cart is empty.</p>";
}
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

</body>
<script>
  
</script>
</html>