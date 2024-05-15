<?php 
    session_start(); // Start the session
    include("connection.php");
    // include("login_process.php"); // No need to include login_process.php here

    // Check if error message is set
    $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
    // Clear the error message to prevent it from being displayed multiple times
    unset($_SESSION['error_message']);

  //  // Debugging output
 //   if (!empty($error_message)) {
 //       echo "Error message: " . $error_message;
 //   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="home_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
</head>
<body>
    <div class="background-container">
        <h1>STOREROOM</h1>
        <form action="login_process.php" method="POST">
            <div>
                <label for="username"><i class="fas fa-user"></i> </label>
                <input type="text" id="username" name="username" placeholder="username" required>
               
            </div>
            <div>
                <label for="password"><i class="fas fa-lock"></i> </label>
                <input type="password" id="password" name="password" placeholder="password" required>
               
            </div>
            <div>
                <a href="registration_form.php"><button type="button" id="RegistationForm" name= "registration_btn">Registration</button></a>
                <a href="forgot_password.php"><button type="button" id="forgotPassword" name= "forgot_password_btn">Forgot Password?</button></a>
                <span class="tooltip">?</span>
            </div>
            <div>
                <button type="submit" id="loginButton">Log In</button>
            </div>
            <div>
                <p id="passwordError" class="error-message"></p><!-- Error message for password -->
            </div>
                     <!-- Display error message if it exists -->
            <?php if (!empty($error_message)): ?>
                <p id="errorMessage" class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </form>
    </div>
    <script>
        const usernameInput = document.getElementById("username");
        const passwordInput = document.getElementById("password");
        const loginButton = document.getElementById("loginButton");

        
        const errorMessage = document.getElementById("errorMessage");
        // Event listener to clear error message when typing in username or password inputs
        usernameInput.addEventListener("input", clearErrorMessage);
        passwordInput.addEventListener("input", clearErrorMessage);

        function clearErrorMessage() {
            if (errorMessage.textContent.trim() !== "") {
                errorMessage.textContent = ""; // Clear error message
            }
        }
       // const usernameError = document.getElementById("usernameError");
       // const passwordError = document.getElementById("passwordError");
/*
        // Function to validate if a string contains only alphanumeric characters
        function isAlphanumeric(str) {
            return /^[a-zA-Z0-9]+$/.test(str);
        }

        */

        // Event listener for the login form submission
            document.querySelector("form").addEventListener("submit", function(event) {

                // Check if either the username or password is missing
                if (usernameInput.value.trim() === "" || passwordInput.value.trim() === "") {
                    event.preventDefault(); // Prevent form submission
                }
            });

    </script>
</body>
</html>


