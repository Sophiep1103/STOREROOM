<?php
session_start();

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    // User is authenticated, retrieve the username
    $username = $_SESSION['username'];
    $account_id = $_SESSION['account_id'];
    
} else {
    // User is not authenticated, handle accordingly (e.g., redirect to a login page)
    header("Location: home_page.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
</head>
<body>
    <div class="background-container">
    <div class="username-container">
    <i class="fas fa-user" style="color: black;"></i> <?php echo '<span style="color: black;">Hello, ' . $username . '</span>'; ?><br>
    <i class="fas fa-door-open door-icon" style="color: black;"></i> <a href="home_page.php" id="logOut">Log Out</a>
    </div>


    <h1 >STOREROOM</h1>
    <h3>Welcome to my app! update your stock here:</h3>
    <div class="button-container ">
        <ul>
            <li><button class="btn-custom" id="buttonToFruits"> <i class="fas fa-lemon" style="color: rgb(10, 10, 83);"></i>  Fruits</button></li>
            <li><button class="btn-custom" id="buttonToVegetables"> <i class="fas fa-carrot" style="color: rgb(10, 10, 83);"></i>  Vegetables</button></li>
            <li><button class="btn-custom"><i class="fas fa-cheese" style="color: rgb(10, 10, 83);"></i> Dairy products and eggs</button></li>
            <li><button class="btn-custom"><i class="fas fa-drumstick-bite" style="color: rgb(10, 10, 83);"></i>  Meat, chicken and fish</button></li>
            <li><button class="btn-custom"> <i class="fas fa-bread-slice" style="color: rgb(10, 10, 83);"></i>  Bread and buns</button></li>
            <li><button class="btn-custom"><i class="fas fa-wine-bottle"  style="color: rgb(10, 10, 83);"></i>  Beverages, wine, alcohol</button></li>
            <li><button class="btn-custom"> <i class="fas fa-ice-cream" style="color: rgb(10, 10, 83);"></i>  Freezer products</button></li>
            <li><button class="btn-custom"><i class="fas fa-cookie" style="color: rgb(10, 10, 83);"></i>  Cooking and baking</button></li>
            <li><button class="btn-custom"><i class="fas fa-candy-cane" style="color: rgb(10, 10, 83);"></i>  Snacks, sweets and cereals</button></li>
            <li><button class="btn-custom"><i class="fas fa-pump-soap" style="color: rgb(10, 10, 83);"></i>  Cleaning materials</button></li><br>

            <li><button class="btn-custom pink-button" id="buttonToShoppingCart"> <i class="fas fa-shopping-cart" style="color: rgb(10, 10, 83);"></i>   Shopping Cart</button></li>
        </ul>
    </div>
    </div>
    <script>
        document.getElementById("buttonToFruits").addEventListener("click", function() {
            // Navigate to the fruits_and_vegetables.php page
            window.location.href = "fruits.php?username=<?php echo $username; ?>&account_id=<?php echo $account_id; ?>";
            
        });

        document.getElementById("buttonToVegetables").addEventListener("click", function() {
            // Navigate to the fruits_and_vegetables.php page
            window.location.href = "vegetables.php?username=<?php echo $username; ?>&account_id=<?php echo $account_id; ?>";
            
        });

        document.getElementById("buttonToShoppingCart").addEventListener("click", function() {
            window.location.href = "shopping_cart.php?username=<?php echo $username; ?>&account_id=<?php echo $account_id; ?>";
            
        });




    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>




