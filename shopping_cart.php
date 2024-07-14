<?php
session_start();
$user = $_GET['username'];
$account_id = $_GET['account_id'];

// Establish a connection to MySQL
$conn = new mysqli("localhost", "root", "", "database_app");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define an array with table and corresponding item_id
$itemTypes = [
    'fruits' => ['item_id' => 'fruit_id', 'item_type' => 'fruits_pics'],
    'vegs' => ['item_id' => 'veg_id', 'item_type' => 'vegtables_pics'],
    'beverages' => ['item_id' => 'beverage_id', 'item_type' => 'Beverages, wine, alcohol'],
    'candies' => ['item_id' => 'candy_id', 'item_type' => 'snacks'],
    'diarys' => ['item_id' => 'diary_id', 'item_type' => 'diary'],
    'frozens' => ['item_id' => 'frozen_id', 'item_type' => 'frozen'],
    'granolas' => ['item_id' => 'granola_id', 'item_type' => 'granola'],
    'meat' => ['item_id' => 'meat_id', 'item_type' => 'meat_fish']
];

$selectedItems = [];

foreach ($itemTypes as $table => $details) {
    $query = "SELECT unit_minQuantity, minQuantity, {$details['item_id']} AS item_id, \"{$details['item_type']}\" AS item_type
              FROM $table
              WHERE account_id = ? AND is_selected = 1";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $account_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $selectedItems[] = $row;
    }
    
    $stmt->close();
}
// Output the JSON string
if (empty($selectedItems)) {
    echo json_encode(["message" => "No items selected"]);
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="shopping_cart.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
</head>
<body>
    <h1>Shopping Cart</h1>
    <button id= "main-menu-btn">Back to the main menu</button>
    <ul id="main-container" class="items-container">
    <!-- Items will be appended here by JavaScript -->
    </ul>

    <script>
    const selectedItems = <?php echo json_encode($selectedItems); ?>;
    const account_id = <?php echo json_encode($account_id); ?>;

    document.addEventListener("DOMContentLoaded", function() {
        selectedItems.forEach(item => addItemToMainContainerStar(item));
    });

    function addItemToMainContainerStar(item) {
        const itemId = item.item_id;
        const itemType = item.item_type;

        var existingItem = document.getElementById("main-" + itemId);

        if (!existingItem) {
            var newItem = document.createElement('li');
            newItem.className = "item selectable";
            console.log(`ItemType: ${itemType}, ItemID: ${itemId}`);
            newItem.innerHTML = `
                <div>
                    <img id="img${itemId}" src="${itemType}/${itemId}.jpg" alt="${itemId}" onerror="handleImageError('${itemType}', '${itemId}')">
                    <h2>${itemId}</h2>
                    <div class="item-details">
                        <p>Unit:
                            <select id="unit${itemId}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>
                        </p>
                        <div class="item-controls" id="quantityContainer${itemId}">
                            <button class="decrement" onclick="handleDecrement('${itemId}')">
                                &#8722;
                            </button>
                            <input type="number" id="quantity${itemId}" class="quantity-input small-space" min="0" step="1" value="0" style="padding: 5px;">
                            <button class="increment" onclick="handleIncrement('${itemId}')">
                                &#43;
                            </button>
                        </div>
                        <div id="stickyNote${itemId}" class="sticky-note">
                            <textarea id="noteText${itemId}" class="note-text" placeholder="Write your note here..."></textarea>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i id="starIcon${itemId}" class="fas fa-star"></i> 
                    </div>
                </div>
            `;

            newItem.id = "main-" + itemId;
            document.getElementById('main-container').appendChild(newItem);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "addItemCart.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        console.log("Raw response from addItemCart.php:", xhr.responseText);
        try {
            var jsonResponse = JSON.parse(xhr.responseText);
            console.log("Parsed JSON response:", jsonResponse);
            
            var curItem = jsonResponse.existingItem;
            console.log("curItem:", curItem);

            // Rest of your code...

        } catch (e) {
            console.error("Failed to parse JSON response:", e);
            console.error("Raw response causing the error:", xhr.responseText);
        }
    }
};
            console.log(itemId)
            console.log(itemType)
            xhr.send(`itemName=${itemId}&account_id=${account_id}&itemType=${itemType}`);
        }
    }





    function updateCart(itemId) {
    var quantity = document.getElementById('quantity' + itemId).value;
    var unit = document.getElementById('unit' + itemId).value;
    var note = document.getElementById('noteText' + itemId).value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_cart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            console.log("Raw response:", xhr.responseText);  // Log raw response
            if (xhr.status == 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log("Parsed server response:", response);
                    if (response.success) {
                        console.log("Cart updated successfully");
                    } else {
                        console.error("Failed to update cart:", response.error);
                    }
                    if (response.unexpected_output) {
                        console.warn("Unexpected output:", response.unexpected_output);
                    }
                    console.log("Debug info:", response.debug_info);
                } catch (e) {
                    console.error("Failed to parse JSON response:", e);
                    console.error("Raw response causing the error:", xhr.responseText);
                }
            } else {
                console.error("Request failed. Status:", xhr.status);
            }
        }
    };
    xhr.send(`item_id=${itemId}&account_id=${account_id}&note=${encodeURIComponent(note)}&unit=${unit}&quantity=${quantity}`);
}

function addEventListeners(itemId) {
    document.getElementById('quantity' + itemId).addEventListener('change', function() {
        updateCart(itemId);
    });

    document.getElementById('unit' + itemId).addEventListener('change', function() {
        updateCart(itemId);
    });

    document.getElementById('noteText' + itemId).addEventListener('change', function() {
        updateCart(itemId);
    });
}





    function handleImageError(itemType, itemId) {
        const imgElement = document.getElementById('img' + itemId);
        imgElement.onerror = null;
        imgElement.src = `${itemType}/${itemId}.jpeg`;
    }

    function handleIncrement(itemId) {
        var input = document.getElementById('quantity' + itemId);
        var unitSelect = document.getElementById('unit' + itemId);
        var step = unitSelect.value === 'kg' ? 0.1 : 1;
        input.value = (parseFloat(input.value) + step).toFixed(1);
    }

    document.getElementById("main-menu-btn").addEventListener("click", function() {
            window.location.href = "index.php";
            
    });

    function handleDecrement(itemId) {
        var input = document.getElementById('quantity' + itemId);
        var unitSelect = document.getElementById('unit' + itemId);
        var step = unitSelect.value === 'kg' ? 0.1 : 1;
        if (parseFloat(input.value) >= step) {
            input.value = (parseFloat(input.value) - step).toFixed(1);
        }
    }
</script>
</body>
</html>
