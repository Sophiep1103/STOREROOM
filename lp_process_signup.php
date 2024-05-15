<?php
//print_r($_POST);
// Initialize the error message variable
$error_message = "";

if (empty($_POST["username"])) {
    $error_message = "Name is required";
  //  die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $error_message = "Valid email is required";
   // die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    $error_message = "Password must be at least 8 characters";
   // die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    $error_message = "Password must contain at least one letter";
   // die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    $error_message = "Password must contain at least one number";
 //   die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["cpassword"]) {
    $error_message = "Passwords must match";
   // die("Passwords must match");
}


// Check if there's any error message
if (!empty($error_message)) {
    // Set the error message in the session to display it on the registration form
    session_start();
    $_SESSION['error_message'] = $error_message;
    // Redirect back to the registration form
    header("Location: registration_form.php");
    exit;
}


$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/rp_database.php";

$sql = "INSERT INTO users (name, email, password_hash)
        VALUES (?, ?, ?)";
     //   "INSERT INTO users(username, email, password) VALUES('$username', '$email','$hash')"
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["username"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location: signup_success.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}