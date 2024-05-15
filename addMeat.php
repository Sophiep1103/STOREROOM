<?php
// Establish a MySQL connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "database_app");
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve parameters from the POST request
$meatName = $_POST['meatName'];
$account_id = $_POST['account_id'];
$newItem = false;
$redFrame = false;
$response = array();

// Check if the item already exists for this account.
$checkQuery = "SELECT * FROM meat WHERE meat_id = '$meatName' AND account_id = $account_id";
$checkResult = $conn->query($checkQuery);

// checks if item with the specified meat_id and account_id already exists in the database for the given account.
// the item exists in meats table:
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
        'existingFruit' => $meatName
    );

    if (count($_POST) > 2) {
        // Update existing item
        $note = $_POST['note'];
        $unit = $_POST['unit'];
        $quantity = $_POST['quantity'];
        $isStarred = $_POST['isStarred'];
        $is_selected = $_POST['is_selected'];
        $item_date = $_POST['date'];
        $meat_unit_select_addToCart = $_POST['meat_unit_select_addToCart'];
        $meat_quantity_addToCart = $_POST['meat_quantity_addToCart'];

        $isStarred = ($isStarred === "true") ? 1 : 0;
        $is_selected = ($is_selected === "true") ? 1 : 0;

        $meat_quantity = $_POST['meat_quantity'];
        $meat_unit_select = $_POST['meat_unit_select'];

        if ($item_date !== "") {
            // Update item with provided date
            $updateQuery = "UPDATE meat
                            SET quantity = '$quantity', note = '$note', item_date = STR_TO_DATE('$item_date', '%Y-%m-%d'), unit = '$unit', 
                                is_starred = '$isStarred', is_selected = '$is_selected' 
                                , minQuantity = '$meat_quantity', unit_minQuantity = '$meat_unit_select'
                                , unit_addToCart = '$meat_unit_select_addToCart', addToCart = '$meat_quantity_addToCart'
                            WHERE meat_id = '$meatName' AND account_id = $account_id";
            $updateResult = $conn->query($updateQuery);
            if (!$updateResult) {
                die("Update failed: " . $conn->error);
            }
        } else {
            // Update item without date
            $updateQuery = "UPDATE meat
                            SET quantity = '$quantity', note = '$note', unit = '$unit', 
                                is_starred = '$isStarred', is_selected = '$is_selected',
                                minQuantity= '$meat_quantity', unit_minQuantity = '$meat_unit_select'
                                , unit_addToCart = '$meat_unit_select_addToCart', addToCart = '$meat_quantity_addToCart'
                            WHERE meat_id = '$meatName' AND account_id = $account_id";
            $updateResult = $conn->query($updateQuery);
            if (!$updateResult) {
                die("Update failed: " . $conn->error);
            }
        }

        if ($quantity < $existingItem['minQuantity']) {
            $redFrame = true;
        }
    }
} else {
    // Item doesn't exist, insert a new record with default values
    $insertQuery = "INSERT INTO meat (meat_id, quantity, note, unit, is_starred, is_selected, account_id, minQuantity, unit_minQuantity)
                    VALUES ('$meatName', 0, '', 'kg', 0, 0, '$account_id', 0, 'kg')";
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
