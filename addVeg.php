<?php
// Establish a MySQL connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "database_app");
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve parameters from the POST request
$vegetableName = $_POST['vegetableName'];
$account_id = $_POST['account_id'];
$newItem = false;
$redFrame = false;
$response = array();

// Check if the item already exists for this account.
$checkQuery = "SELECT * FROM vegs WHERE veg_id = '$vegetableName' AND account_id = $account_id";
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
           'existingFruit' => $fruitName
       );
       if(count($_POST)>2){
          
   
           $note = $_POST['note'];
           $unit = $_POST['unit'];
           $quantity= $_POST['quantity'];
           $isStarred = $_POST['isStarred'];
           $is_selected = $_POST['is_selected'];
           $item_date = $_POST['date'];
      
   