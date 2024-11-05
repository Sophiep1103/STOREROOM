<?php
// Establish a MySQL connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "database_app");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve parameters from the POST request
$VegName = $_POST['VegName'];
$account_id = $_POST['account_id'];
$newItem = false;
$redFrame = false;
$response = array();

// Check if the item already exists for this account.
$checkQuery = "SELECT * FROM vegs WHERE veg_id = '$VegName' AND account_id = $account_id";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    $existingItem = $checkResult->fetch_assoc();
    $response = array(
        'existingQuantity' => $existingItem['quantity'],
        'existingNote' => $existingItem['note'],
        'existingUnit' => $existingItem['unit'],
        'existingIsStarred' => $existingItem['is_starred'],
        'existingIsSelected' => $existingItem['is_selected'],
        'existingMinQuantity' => $existingItem['minQuantity'],
        'existingUnitMinQuantity' => $existingItem['unit_minQuantity'],
        'existingAddToCart' => $existingItem['addToCart'],
        'existingUnitAddToCart' => $existingItem['unit_addToCart'],
        'existingDate' => $existingItem['item_date'],
        'existingVeg' => $VegName,
        'is_starred' => $existingItem['is_starred'],
        'is_selected' => $existingItem['is_selected'],
    );

    if (count($_POST) > 2) {
        $note = $_POST['note'];
        $unit = $_POST['unit'];
        $quantity = $_POST['quantity'];
        $isStarred = $_POST['isStarred'];
        $is_selected = $_POST['is_selected'];
        $item_date = $_POST['date'];

        $veg_unit_select_addToCart = $_POST['veg_unit_select_addToCart'];
        $veg_quantity_addToCart = $_POST['veg_quantity_addToCart'];

        $isStarred = ($isStarred === "true") ? 1 : 0;
        $is_selected = ($is_selected === "true") ? 1 : 0;

        $veg_quantity = $_POST['veg_quantity'];
        $veg_unit_select = $_POST['veg_unit_select'];

        if ($item_date !== "") {
            $updateQuery = "UPDATE vegs
                SET quantity = '$quantity', note = '$note', item_date = STR_TO_DATE('$item_date', '%Y-%m-%d'), unit = '$unit', 
                    is_starred = '$isStarred', is_selected = '$is_selected',
                    minQuantity = '$veg_quantity', unit_minQuantity = '$veg_unit_select',
                    unit_addToCart = '$veg_unit_select_addToCart', addToCart = '$veg_quantity_addToCart'
                WHERE veg_id = '$VegName' AND account_id = $account_id";
        } else {
            $updateQuery = "UPDATE vegs
                SET quantity = '$quantity', note = '$note', unit = '$unit', 
                    is_starred = '$isStarred', is_selected = '$is_selected',
                    minQuantity = '$veg_quantity', unit_minQuantity = '$veg_unit_select',
                    unit_addToCart = '$veg_unit_select_addToCart', addToCart = '$veg_quantity_addToCart'
                WHERE veg_id = '$VegName' AND account_id = $account_id";
        }

        $updateResult = $conn->query($updateQuery);
        if (!$updateResult) {
            die("Update failed: " . $conn->error);
        }

        if ($quantity < $existingItem['minQuantity']) {
            $redFrame = true;
        }
    }
} else {
    // Item doesn't exist, insert a new record with default values
    $insertQuery = "INSERT INTO vegs (veg_id, quantity, note, unit, is_starred, is_selected, account_id, minQuantity, unit_minQuantity)
                    VALUES ('$VegName', 0, '', 'kg', 0, 0, '$account_id', 0, 'kg')";
    $insertResult = $conn->query($insertQuery);
    if (!$insertResult) {
        die("Insert failed: " . $conn->error);
    }
    $newItem = true;
}

$response['isNew'] = $newItem;
$response['redFrame'] = $redFrame;

// Close the database connection
$conn->close();

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
