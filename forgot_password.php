<?php 
    include("connection.php");
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        // Check if the email exists in the users table
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            // The email exists in the database
            // You can proceed to send a password reset email or redirect to the reset password page
           // header("Location: send_email_password.php?email=$email");
        } else {
            // The email does not exist in the database
            // You can display an error message to inform the user
            $error_message = "Email not found in our records.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="forgot_password.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
</head>
<body>
    <div class="container">
        <p>Enter your email address to reset your password</p>
        <?php
        if (isset($error_message)) {
            echo '<p class="error-message">' . $error_message . '</p>';
        }
        ?>
 
        <form action="rp_send_password_reset.php" method="POST"> 
            <div class="form-group">
                <label for="email" id="email_id">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <button type="submit">Send email verification</button>
            </div>
        </form>
    </div>

    <script>
               ///// was action="mailer.php"
    document.querySelector("form").addEventListener("submit", function(event) {
        const emailInput = document.getElementById("email");
        const errorMessage = document.querySelector(".error-message");
        if (!emailInput.checkValidity()) {
            errorMessage.style.display = "block";
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
</body>
</html>