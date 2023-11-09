<?php 
    include("connection.php");
    include("register.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="registration_form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/validation.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Registration Form</h1>
        <form action="lp_process_signup.php" method="POST" id="signup" novalidate>
            <div id="errorDiv" style="color: red;"></div>
            <div class="form-group">
                <label for="username"><i class="fas fa-user"></i> Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter username" required>
            </div>

            <div class="form-group"> 
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required oninput="validateEmailFormat()">
                <div id="emailError" style="color: red;"></div>
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                <input type="password" id="password" name ="password" placeholder="Create password" required>
                <div id="passwordError" style="color: red;"></div>
            </div>

            <div class="form-group">
                <label for="cpassword"><i class="fas fa-lock"></i> Confirm Password:</label>
                <input type="password" id="cpassword" name ="cpassword" placeholder="Retype password" required>
            </div>

            <div class="form-group">
                <button type="submit" name= "submit" id="btn">Register</button>
            </div>
        </form>
    </div>

    <script>
        /*
         /// action=was register.php
        alert("hi");
       function validateEmailFormat() {
            alert ("hi2");
            var emailInput = document.getElementById("email");
            var emailError = document.getElementById("emailError");
            var emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (emailFormat.test(emailInput.value)) {
                emailError.textContent = ""; // Clear any previous email error messages
            } else {
                emailError.textContent = "Invalid email format. Please enter a valid email address.";
            }
        }




    function validateForm() {
        alert("hi3");
        var emailInput = document.getElementById("email");
        var passwordInput = document.getElementById("password");
        var passwordError = document.getElementById("passwordError");
        var errorDiv = document.getElementById("errorDiv");

        if (emailInput.value === "") {
            errorDiv.textContent = "Email is required.";
            return false; // Prevent form submission
        } else {
            errorDiv.textContent = ""; // Clear any previous error messages
        }

        if (passwordInput.value.length < 8) {
            passwordError.textContent = "Password must be at least 8 characters long.";
            return false; // Prevent form submission
        }

        var specialCharacterRegex = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-=]/;
        if (!specialCharacterRegex.test(passwordInput.value)) {
            passwordError.textContent = "Password must contain at least one special character.";
            return false; // Prevent form submission
        }

        passwordError.textContent = ""; // Clear any previous password error messages

        // Perform the email check using JavaScript and AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "register.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "success") {
                    // Registration is successful; you can redirect to a success page or take other actions
                } else if (xhr.responseText === "failed") {
                    errorDiv.textContent = "Registration failed. Please try again.";
                }
            }
        };

        xhr.send("email=" + emailInput.value);

        return true; // Allow the form to submit if all validations pass
    }
    */
    </script>
</body>
</html>


