<?php
session_start(); // Start a session
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have a database connection in connection.php
    include('connection.php');

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; // Note: Don't escape the password

    // Fetch the user's hashed password from the database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
  
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {

            // Authentication successful
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username; // Store the user's name in the session
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
