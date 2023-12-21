<?php
// Establish a MySQL connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "database_app");
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve parameters from the POST request
$fruitName = $_POST['fruitName'];
$account_id = $_POST['account_id'];
$response = array();

// Check if the item already exists for this account.
$checkQuery = "SELECT * FROM fruits WHERE fruit_id = '$fruitName' AND account_id = $account_id";
$checkResult = $conn->query($checkQuery);

// checks if item with the specified fruit_id and account_id already exists in the database for the given account.
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
        'existingUnitAddToCart' => $existingItem['unit_addToCart']
    );

    if(count($_POST)>2){

        $note = $_POST['note'];
        $unit = $_POST['unit'];
        $quantity= $_POST['quantity'];
        $isStarred = $_POST['isStarred'];
        $is_selected = $_POST['is_selected'];
        $item_date = $_POST['date'];
        $fruit_unit_select_addToCart = $_POST['fruit_unit_select_addToCart'];
        $fruit_quantity_addToCart = $_POST['fruit_quantity_addToCart'];

        $isStarred = ($isStarred === "true") ? 1 : 0;
        $is_selected = ($is_selected === "true") ? 1 : 0;

        $fruit_quantity = $_POST['fruit_quantity'];
        $fruit_unit_select = $_POST['fruit_unit_select'];

        echo "Item already exists for this account.";

        if ($item_date !== ""){
            
            $updateQuery = "UPDATE fruits
            SET quantity = '$quantity', note = '$note', item_date = STR_TO_DATE('$item_date', '%Y-%m-%d'), unit = '$unit', 
                is_starred = '$isStarred', is_selected = '$is_selected' 
                , minQuantity = '$fruit_quantity', unit_minQuantity = '$fruit_unit_select'
                , unit_addToCart = '$fruit_unit_select_addToCart', addToCart = '$fruit_quantity_addToCart'
            WHERE fruit_id = '$fruitName' AND account_id = $account_id";

        }
        if ($item_date === ""){

            $updateQuery = "UPDATE fruits
                            SET quantity = '$quantity', note = '$note', unit = '$unit', 
                                is_starred = '$isStarred', is_selected = '$is_selected',
                                minQuantity= '$fruit_quantity', unit_minQuantity = '$fruit_unit_select'
                                , unit_addToCart = '$fruit_unit_select_addToCart', addToCart = '$fruit_quantity_addToCart'
                            WHERE fruit_id = '$fruitName' AND account_id = $account_id";
                            
        }
    }
    else{
/*
        $response = array(
            'existingQuantity' => $existingItem['quantity'],
            'existingNote' => $existingItem['note'],
            'existingUnit' => $existingItem['unit'],
            'existingIsStarred' => $existingItem['is_starred'],
            'existingIsSelected' => $existingItem['is_selected'],
            'existingMinQuantity' => $existingItem['minQuantity'],
            'existingUnitMinQuantity' => $existingItem['unit_minQuantity'],
            'existingAddToCart' => $existingItem['addToCart'],
            'existingUnitAddToCart' => $existingItem['unit_addToCart']
        );
*/
        // Output the values
echo "Existing Quantity: $existingQuantity<br>";
echo "Existing Note: $existingNote<br>";
echo "Existing Unit: $existingUnit<br>";
echo "Is Starred: $existingIsStarred<br>";
echo "Is Selected: $existingIsSelected<br>";
echo "Minimum Quantity: $existingMinQuantity<br>";
echo "Unit for Minimum Quantity: $existingUnitMinQuantity<br>";
echo "Add To Cart Quantity: $existingAddToCart<br>";
echo "Unit for Add To Cart: $existingUnitAddToCart<br>";

    }

} else {
    // Item doesn't exist, insert a new record with default values
    $insertQuery = "INSERT INTO fruits (fruit_id, quantity, note, unit, is_starred, is_selected, account_id, minQuantity, unit_minQuantity)
                    VALUES ('$fruitName', 0, '', 'kg', 0, 0, '$account_id',0, 'kg')";

}

// Close the database connection
$conn->close();


// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);


?>