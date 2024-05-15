<?php
session_start(); // Start a session
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Fetch the user's hashed password and account_id from the database
    $sql = "SELECT * FROM users WHERE name='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password_hash'];
        $account_id = $row['account_id'];

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
            exit(); // Ensure no further script execution
        }
    } else {
        // Authentication failed (user not found)
        $_SESSION['error_message'] = "Invalid username or password.";
        header("Location: home_page.php");
        exit(); // Ensure no further script execution
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

