<?php
// Include your database connection code here
// Replace 'your_db_connection.php' with your actual database connection file

include('connection.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];

    // You should perform validation and sanitation of user input here

    // Check if the username and email exist in the database
    $query = "SELECT * FROM users WHERE username = :username AND email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $user = $stmt->fetch();

    if ($user) {
        // Update the user's password in the database
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE users SET password = :newPasswordHash WHERE username = :username";
        $updateStmt = $pdo->prepare($updateQuery);
        $updateStmt->bindParam(':newPasswordHash', $newPasswordHash);
        $updateStmt->bindParam(':username', $username);
        
        if ($updateStmt->execute()) {
            echo "Password reset successfully!";
        } else {
            echo "Password reset failed.";
        }
    } else {
        echo "Invalid username or email.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form method="POST" action="reset_password.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_cpassword" required><br>

        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
