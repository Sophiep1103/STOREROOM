
<?php 
    include("connection.php");
    include("login_process.php");
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
                <p id="usernameError" class="error-message"></p><!-- Error message for username -->
            </div>
            <div>
                <label for="password"><i class="fas fa-lock"></i> </label>
                <input type="password" id="password" name="password" placeholder="password" required>
                <p id="passwordError" class="error-message"></p><!-- Error message for password -->
            </div>
            <div>
                <a href="registration_form.php"><button type="button" id="RegistationForm" name= "registration_btn">Registration</button></a>
                <a href="forgot_password.php"><button type="button" id="forgotPassword" name= "forgot_password_btn">Forgot Password?</button></a>
                <span class="tooltip">?</span>
            </div>
            <div>
                <button type="submit" id="loginButton">Log In</button>
            </div>
        </form>
    </div>
    <script>
        const usernameInput = document.getElementById("username");
        const passwordInput = document.getElementById("password");
        const loginButton = document.getElementById("loginButton");
        const usernameError = document.getElementById("usernameError");
        const passwordError = document.getElementById("passwordError");

        // Function to validate if a string contains only alphanumeric characters
        function isAlphanumeric(str) {
            return /^[a-zA-Z0-9]+$/.test(str);
        }

        // Function to validate the form and show error messages for Log In
        function validateForm() {
            if (usernameInput.value.trim() === "") {
                usernameError.textContent = "Username is missing";
            } else {
                usernameError.textContent = "";
            }

            if (passwordInput.value.trim() === "") {
                passwordError.textContent = "Password is missing";
            } else {
                passwordError.textContent = "";
            }
        }

        // Event listener for the login button click
        loginButton.addEventListener("click", function (event) {
            validateForm();

            // Check if either the username or password is missing
            if (usernameInput.value.trim() === "" || passwordInput.value.trim() === "") {
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
</html>

