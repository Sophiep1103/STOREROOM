<?php
session_start(); // Start a session
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; // Note: Don't escape the password

    // Fetch the user's hashed password from the database
    $sql = "SELECT * FROM users WHERE name='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
  
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password_hash'];
        $account_id = $row['account_id']; // Add this line to fetch the account_id
        
        // Verify the password
        if (password_verify($password, $hashedPassword)) {
         
            // Authentication successful
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username; // Store the user's name in the session
            $_SESSION['account_id'] = $account_id; 
            header("Location: index.php");
        } else {
   
            // Authentication failed
            $_SESSION['error_message'] = "Invalid username or password.";
            header("Location: home_page.php");

        }
    } 
    else {

        // Authentication failed (user not found)
        $_SESSION['error_message'] = "Invalid username or password.";
        header("Location: home_page.php");

    }

    // Close the database connection
    mysqli_close($conn);
}
?>
