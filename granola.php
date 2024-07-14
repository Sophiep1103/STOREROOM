<?php
    $user = $_GET['username'];
    $account_id = $_GET['account_id'];
    // Establish a connection to MySQL
    $conn  = new mysqli("localhost", "root", "", "database_app");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Granola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="granola.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <h1>Granola</h1>
    <!-- <a href="https://www.flaticon.com/free-icons/minimum" title="minimum icons">Minimum icons created by Freepik - Flaticon</a>
    <img src="speedometer.png" alt="Speedometer" class="speedometer">)-->
    <!-- search bar (to the main container)-->
    <div class="search-wrapper">
        <label for="search" >Granola Search:</label>
        <input type="search" id="search" data-search  placeholder="enter a granola item" oninput="searchItems()">
    </div>

    <div id="savedInfo">
        <!-- Content to be cleared -->
    </div>

    <!-- pop up window -->
    <button onclick="openPopup()" class="open-button" id= "open-window-btn">Open List of Granola Items</button>

    <button id= "main-menu-btn">Back to the main menu</button>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h3>Granola List:</h3>
                   
            <div class="search-wrapper-window">
                <label for="search">Granola Search:</label>
                <input type="search" id="search-window" data-search  placeholder="enter a granola item" oninput="searchItemsWindow()">
            </div>
            
      
            <ul class="items-container-window">
               
                <li class="selectable-window" id="bernflakes-window" onclick="selectItem('bernflakes-window')">
                <img src="granola/bernflakes.jpg" alt="bernflakes">
                <p>bernflakes</p>
                </li>

                <li class="selectable-window" id="cheerios-window" onclick="selectItem('cheerios-window')">
                <img src="granola/cheerios.jpg" alt="cheerios">
                <p>cheerios</p>
                </li>

                <li class="selectable-window" id="chocolate Slimedelis-window" onclick="selectItem('chocolate Slimedelis-window')">
                <img src="granola/chocolate Slimedelis.png" alt="chocolate Slimedelis">
                <p>chocolate Slimedelis</p>
                </li>

                <li class="selectable-window" id="cini Minis-window" onclick="selectItem('cini Minis-window')">
                <img src="granola/cini Minis.jpg" alt="cini_Minis">
                <p>cini Minis</p>
                </li>

                <li class="selectable-window" id="cornflakes-window" onclick="selectItem('cornflakes-window')">
                <img src="granola/cornflakes.jpg" alt="cornflakes">
                <p>cornflakes</p>
                </li>

                <li class="selectable-window" id="corny chocolate-window" onclick="selectItem('corny chocolate-window')">
                <img src="granola/corny chocolate.jpg" alt="corny chocolate">
                <p>corny chocolate</p>
                </li>

                <li class="selectable-window" id="corny peanut butter-window" onclick="selectItem('corny peanut butter-window')">
                <img src="granola/corny peanut butter.jpg" alt="corny peanut butter">
                <p>corny peanut butter</p>
                </li>

                <li class="selectable-window" id="crunch-window" onclick="selectItem('crunch-window')">
                <img src="granola/crunch.jpg" alt="crunch">
                <p>crunch</p>
                </li>

                <li class="selectable-window" id="dark chocolate Slimedelis-window" onclick="selectItem('dark chocolate Slimedelis-window')">
                <img src="granola/dark chocolate Slimedelis.png" alt="dark chocolate Slimedelis">
                <p>dark chocolate Slimedelis</p>
                </li>

                <li class="selectable-window" id="energy_bar-window" onclick="selectItem('energy_bar-window')">
                <img src="granola/energy bar.jpg" alt="energy bar">
                <p>energy bar</p>
                </li>

                <li class="selectable-window" id="fiber-window" onclick="selectItem('fiber-window')">
                <img src="granola/fiber.jpg" alt="fiber">
                <p>fiber</p>
                </li>

                <li class="selectable-window" id="fitness-window" onclick="selectItem('fitness-window')">
                <img src="granola/fitness.jpg" alt="fitness">
                <p>fitness</p>
                </li>
                
                <li class="selectable-window" id="fruit Slimdelis-window" onclick="selectItem('fruit Slimdelis-window')">
                <img src="granola/fruit Slimdelis.png" alt="fruit Slimdelis">
                <p>fruit Slimdelis</p>
                </li>

                <li class="selectable-window" id="nature_valley-window" onclick="selectItem('nature_valley-window')">
                <img src="granola/nature valley.jpg" alt="nature valley">
                <p>nature valley</p>
                </li>

                <li class="selectable-window" id="oatmeal-window" onclick="selectItem('oatmeal-window')">
                <img src="granola/oatmeal.png" alt="oatmeal">
                <p>oatmeal</p>
                </li>

                <li class="selectable-window" id="white chocolate Slimedelis-window" onclick="selectItem('white chocolate Slimedelis-window')">
                <img src="granola/white chocolate Slimedelis.png" alt="white chocolate Slimedelis">
                <p>white chocolate Slimedelis</p>
                </li>



            </ul>

            <button onclick="addItemToMainContainer()">Add to Main Container</button>
        </div>
    </div>
    <!-- end pop up window -->

    <!-- main container -->
    <ul class="items-container" id="main-container">
   
    </ul>

        <button id="saveButton">Save</button>

    <script>

const mainMenuBtn = document.getElementById('main-menu-btn');

let lastScrollTop = 0;

window.addEventListener('scroll', () => {
    const st = window.pageYOffset || document.documentElement.scrollTop;

    if (st > lastScrollTop) {
        // Scrolling down, hide the button
        mainMenuBtn.style.opacity = '0';
    } else {
        // Scrolling up, show the button
        mainMenuBtn.style.opacity = '1';
    }

    lastScrollTop = st <= 0 ? 0 : st; // For mobile or negative scrolling
});




    starredItems = []; // Array to store the names of starred items
    selectedItemsArray = []; // Array to store selected items

    // Assuming you have a list of granola IDs
    var granolaIds = ['bernflakes', 'cheerios', 'chocolate Slimedelis', 'cini Minis', 'cornflakes', 'corny chocolate', 'corny peanut butter', 'crunch', 'dark chocolate Slimedelis', 'energy bar','fiber','fruit Slimdelis','nature valley','oatmeal','white chocolate Slimedelis'];

    // Call fetchStarredItems when the page loads
    document.addEventListener("DOMContentLoaded", function () {
        fetchStarredItems();
    });

    document.getElementById("main-menu-btn").addEventListener("click", function() {
            window.location.href = "index.php";
            
    });


    // Get references to the input fields, unit selects, and buttons for all items
    const items = document.querySelectorAll(".item");

// Function to handle parsing the quantity based on the selected unit
function parseQuantity(input, unit) {
    if (unit === "units") {
        return parseInt(input);
    } else {
        return parseFloat(input);
    }
}

    // Save the quantities when the "Save" button is clicked
    document.getElementById("saveButton").addEventListener("click", function () {
        items.forEach(item => {
            const itemName = item.querySelector("h2").textContent.trim();
                const quantityInput = item.querySelector(".quantity-input");
                const unitSelect = item.querySelector(".unit-select");
                savedQuantities[itemName] = {
                    value: parseQuantity(quantityInput.value, unitSelect.value),
                    unit: unitSelect.value
                };
            });

            // Save updated quantities to local storage
            localStorage.setItem("quantities", JSON.stringify(savedQuantities));
        });
        

// Function to handle increment and decrement buttons for all items
items.forEach(item => {
    const decrementButton = item.querySelector(".decrement");
    const incrementButton = item.querySelector(".increment");
    const quantityInput = item.querySelector(".quantity-input");
    const unitSelect = item.querySelector(".unit-select");

    decrementButton.addEventListener("click", function () {
        const currentValue = parseFloat(quantityInput.value);
        if (currentValue > 0) {
            const decrementValue = unitSelect.value === "kg" ? 0.5 : 1;
            const newValue = currentValue - decrementValue;
            quantityInput.value = unitSelect.value === "units" ? Math.round(newValue) : newValue.toFixed(1);
        }
    });

    incrementButton.addEventListener("click", function () {
        const currentValue = parseFloat(quantityInput.value);
        const incrementValue = unitSelect.value === "kg" ? 0.5 : 1;
        const newValue = currentValue + incrementValue;
        quantityInput.value = unitSelect.value === "units" ? Math.round(newValue) : newValue.toFixed(1);
    });
});

// Get references to the date inputs for all items
const itemDateInputs = document.querySelectorAll(".item-date");

// Add an event listener to each date input
itemDateInputs.forEach(dateInput => {
    dateInput.addEventListener("click", function () {
        dateInput.removeAttribute("readonly"); // Make the date field editable
    });
});

// Get references to the favorite star icons
const favoriteIcons = document.querySelectorAll(".favorite i");

// Get references to all selectable items
const selectableItems = document.querySelectorAll(".selectable");


// Function to check if at least one item is selected
function isAtLeastOneItemSelected() {
    const selectedItems = document.querySelectorAll(".selected");
    return selectedItems.length > 0;
}

// Function to handle item search
function searchItems() {
    const searchInput = document.getElementById("search").value.toLowerCase();
    const items = document.querySelectorAll(".item");

    items.forEach(item => {
        const itemName = item.querySelector("h2");
        const itemText = itemName.textContent.trim().toLowerCase();
        const itemWords = itemText.split(' ');

        // Check if at least one word in the item name starts with the search input
        const isMatch = itemWords.some(word => word.startsWith(searchInput));

        // Hide or show items based on the search input
        if (isMatch) {
            // Highlight the matched portion
            highlightMatch(itemName, searchInput);
            item.style.display = "block";
        } else {
            // Remove highlighting and hide the item
            removeHighlight(itemName);
            item.style.display = "none";
        }
    });
}

// Function to highlight the matched portion
function highlightMatch(element, searchInput) {
    const itemText = element.textContent.trim().toLowerCase();
    const index = itemText.indexOf(searchInput);

    // Wrap the matched portion with a span with the 'highlight' class
    const highlightedText = itemText.substring(0, index) +
        '<span class="highlight">' + itemText.substring(index, index + searchInput.length) + '</span>' +
        itemText.substring(index + searchInput.length);

    // Update the element's HTML with the highlighted text
    element.innerHTML = highlightedText;
}

// Function to remove highlighting
function removeHighlight(element) {
    element.innerHTML = element.textContent;
}

// Add event listener for the search input
document.getElementById("search").addEventListener("input", searchItems);


function openPopup() {
    document.getElementById("popup").style.display = "block";
    document.getElementById('open-window-btn').style.display = 'none';
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
    document.getElementById('open-window-btn').style.display = 'block';
}

function openPopupMinQuantity(granolaName) {
    var popupElement = document.getElementById("granola-popup" + granolaName);
    var buttonElement = document.getElementById('topLeftButton' + granolaName);

    if (popupElement && buttonElement) {
        popupElement.classList.add('granola-popup');

        popupElement.style.display = "block";
        buttonElement.style.display = 'none';
    } else {
        console.error("Popup or button element not found for", granolaName);
    }
}

function openPopupAddToCart(granolaName) {
    var popupElement = document.getElementById("granola-popup-addToCart" + granolaName);
    var buttonElement = document.getElementById('topLeftButton-AddToCart' + granolaName);

    if (popupElement && buttonElement) {
        popupElement.classList.add('granola-popup-addToCart');

        popupElement.style.display = "block";
        buttonElement.style.display = 'none';
    } else {
        console.error("Popup or button element not found for", granolaName);
    }
}

function closePopupMinQuantity(granolaName) {
    var popupElement = document.getElementById("granola-popup" + granolaName);
    var buttonElement = document.getElementById('topLeftButton' + granolaName);

    if (popupElement && buttonElement) {
        // Remove the specific class when closing the popup
        popupElement.classList.remove('granola-popup');

        popupElement.style.display = "none";
        buttonElement.style.display = 'block';
    } else {
        console.error("Popup or button element not found for", granolaName);
    }
}

function closePopupAddToCart(granolaName) {
    var popupElement = document.getElementById("granola-popup-addToCart" + granolaName);
    var buttonElement = document.getElementById('topLeftButton-AddToCart' + granolaName);

    if (popupElement && buttonElement) {
        popupElement.classList.remove('granola-popup-addToCart');

        popupElement.style.display = "none";
        buttonElement.style.display = 'block';
    } else {
        console.error("Popup or button element not found for", granolaName);
    }
}

// Function to handle item selection
function selectItem(itemId) {

    // Find the clicked item
    const selectedItem = document.getElementById(itemId);

    // Toggle the 'selected-frame' class on the clicked item
    selectedItem.classList.toggle('selected-frame');
}

function searchItemsWindow() {
    const searchInput = document.getElementById("search-window").value.toLowerCase();
    const items = document.querySelectorAll(".selectable-window");

    items.forEach(item => {
        const itemName = item.querySelector("p");
        const originalText = itemName.textContent;
        const lowerCaseText = originalText.toLowerCase();

        // Check if the search input is present in the item name
        const index = lowerCaseText.indexOf(searchInput);

        // Show or hide items based on the search input
        if (index !== -1) {
            item.style.display = "block";

            // Highlight the matching letters
            const highlightedText = originalText.substring(0, index) +
                    '<span class="highlight">' + originalText.substring(index, index + searchInput.length) + '</span>' +
                    originalText.substring(index + searchInput.length);

            itemName.innerHTML = highlightedText;
        } else {
            item.style.display = "none";
        }
    });
}


// Counter for generating unique IDs
var uniqueIdCounter = 1;

function addItemToMainContainer() {

    const account_id = <?php echo json_encode($account_id); ?>;
    // Get all selected items in the popup
    var selectedItems = document.querySelectorAll('.selectable-window.selected-frame');

    if (selectedItems.length > 0) {
        // Iterate through each selected item
        selectedItems.forEach(function(selectedItem) {
            // Get the granola name (assuming it's in the alt attribute of the image)
            var granolaName = selectedItem.querySelector('img').alt;

            // Check if the item with the same name already exists in the main container
            var existingItem = document.getElementById("main-" + granolaName);

            if (!existingItem) {

                // Create a new list item for the main container
                var newItem = document.createElement('li');
                newItem.className = "item selectable";

                // Set innerHTML based on the selected item in the popup
                newItem.innerHTML = `
                <div class="button-container">
                <button onclick="openPopupMinQuantity('${granolaName}')" class="top-left-button with-icon" id="topLeftButton${granolaName}">define minimum quantity </button>
                    <div id="granola-popup${granolaName}" class="popup"> 
                        <div class="popup-content-granolas">
                            <span class="close" onclick="closePopupMinQuantity('${granolaName}')">&times;</span>
                            <h6> Minimum Quantity: </h6>
                            <p class="input-row">
                                <input type="number" id="granola-quantity${granolaName}" class="granola-quantity" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="granola-unit${granolaName}" class="granola-unit-select" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupMinQuantity('${granolaName}')" id="set${granolaName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>

                    </br>
                    <button onclick="openPopupAddToCart('${granolaName}')" class="top-left-button" id="topLeftButton-AddToCart${granolaName}" >Add To Cart</button>
                    <div id="granola-popup-addToCart${granolaName}" class="popup"> 
                        <div class="popup-content-granolas">
                            <span class="close" onclick="closePopupAddToCart('${granolaName}')">&times;</span>
                            <h6>Add To Cart: </h6>
                            <p class="input-row">
                                <input type="number" id="granola-quantity-addToCart${granolaName}" class="granola-quantity-addToCart" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="granola-unit-addToCart${granolaName}" class="granola-unit-select-addToCart" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupAddToCart('${granolaName}')" id="set-addToCart${granolaName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>
                <div>
                    <img src="${selectedItem.querySelector('img').src}" alt="${selectedItem.querySelector('img').alt}">
                    <h2>${selectedItem.querySelector('p').innerText}</h2>
                    <div class="item-details">
                        <p>Unit:
                            <select id="unit${granolaName}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>

                        </p>

                        <div class="quantity-container" id="quantityContainer${granolaName}">
                        <button class="decrement">
                            <i class="fas fa-minus"></i> 
                        </button>
                        <input type="number" id="quantity${granolaName}" class="quantity-input small-space" min="0" step="1" value="0" style="padding: 5px;">
                        <button class="increment">
                            <i class="fas fa-plus"></i> 
                        </button>
                        </div>

                        <div id="stickyNote${granolaName}" class="sticky-note">
                            <textarea id="noteText${granolaName}" class="note-text" placeholder="Write your note here..."></textarea>
                            <input id="Date${granolaName}" class="item-date" type="date">
                            <button id="saveNoteButton${granolaName}" class="save-button">Save</button>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i id="starIcon${granolaName}" class="far fa-star"></i> 
                    </div>
                `;

                // Update the ID to make it unique
                var newItemId = "main-" + granolaName;
                newItem.id = newItemId;

                // Increment the counter for the next iteration
                uniqueIdCounter++;

                // Reset the quantity input value
                newItem.querySelector('.quantity-input').value = "0";

                // Remove the 'selected-frame' class from the cloned item
                selectedItem.classList.remove('selected-frame');

                // Add the cloned item to the main container
                document.getElementById('main-container').appendChild(newItem);


                // Make an AJAX request to addGranola.php to add default information to the item in the database
                var xhr = new XMLHttpRequest();
                console.log ( "from addItemToMainContainer");
                xhr.open("POST", "addGranola.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText); // Log the response from the server
                        var jsonResponse = JSON.parse(xhr.responseText);
                        console.log( jsonResponse.isNew)   
                        if (jsonResponse.isNew === false) {
                        console.log( jsonResponse.isNew)   
                        var curQuantity = jsonResponse.existingQuantity;
                        var quantityInput = document.getElementById('quantity' + granolaName);
                        quantityInput.value = curQuantity;

                        var curNote = jsonResponse.existingNote;
                        var NoteInput = document.getElementById('noteText' + granolaName);
                        NoteInput.value = curNote;

                        var curUnit  = jsonResponse.existingUnit;
                        var UnitInput = document.getElementById('unit' + granolaName);
                        UnitInput.value = curUnit;

                        var curMinQuantity= jsonResponse.existingMinQuantity;
                        var MinQuantityInput = document.getElementById('granola-quantity' + granolaName);
                        MinQuantityInput.value = curMinQuantity;

                        var curUnitMinQuantity = jsonResponse.existingUnitMinQuantity;
                        var UnitMinQuantityInput = document.getElementById('granola-unit' + granolaName);
                        UnitMinQuantityInput.value = curUnitMinQuantity;

                        var curAddToCart = jsonResponse.existingAddToCart;
                        var AddToCartInput = document.getElementById('granola-quantity-addToCart' + granolaName);
                        AddToCartInput.value = curAddToCart;

                        var curUnitAddToCart = jsonResponse.existingUnitAddToCart;
                        var UnitAddToCartInput = document.getElementById('granola-unit-addToCart' + granolaName);
                        UnitAddToCartInput.value = curUnitAddToCart;
                        
                        var curDate = jsonResponse.existingDate;
                        var DateInput = document.getElementById('Date' + granolaName);
                        DateInput.value = curDate;

                        var curRedFrame = jsonResponse.redFrame;
                        console.log(curRedFrame);
                        }



                    }
                };

                xhr.send(`granolaName=${granolaName}&account_id=${account_id}`);

                // Attach event listeners to the increment and decrement buttons
                newItem.querySelector('.increment').addEventListener('click', handleIncrement);
                newItem.querySelector('.decrement').addEventListener('click', handleDecrement);
                console.log(granolaName)  
               // Set up listener for the "Save" button
               var saveNoteButton = newItem.querySelector('#saveNoteButton' + granolaName);
                saveNoteButton.addEventListener('click', function () {
                    var quantity = newItem.querySelector('#quantity' + granolaName).value;
                    var note = newItem.querySelector('#noteText' + granolaName).value;
                    var item_date = newItem.querySelector('#Date' + granolaName).value;
                    var unit = newItem.querySelector('#unit' + granolaName).value;

                });

                } else {
                    // Alert or notify the user that the item already exists in the main container
                    alert("Item '" + granolaName + "' is already in the main container.");
                }
            });

            // Close the popup
            closePopup();
    }
}


document.getElementById('main-container').addEventListener('click', function(event) {
    // Check if the clicked element or any of its ancestors is an item
    const clickedItem = event.target.closest('.item');
  //  console.log('Clicked item:', clickedItem);

    if (clickedItem) {
        // Check if the clicked element is the image within the item
        const clickedImage = event.target.closest('img');
        //console.log('Clicked image:', clickedImage);

        // Check if the clicked element is the star icon within the item
        const clickedStar = event.target.closest('.favorite i ');


        if (clickedImage) {
            // Toggle the 'selected' class when the image is clicked
            clickedItem.classList.toggle('selected');

            // Update the list of selected items
            updateSelectedItemsArray();

            // Stop the event propagation to prevent other click event listeners from being triggered
            event.stopPropagation();
            
            
        } else if (clickedStar) {
            // Toggle the 'fas' and 'far' classes on the clicked star

            clickedStar.classList.toggle('fas');
            clickedStar.classList.toggle('far');

            // Toggle the color of the star
            if (clickedStar.classList.contains('fas')) {
                clickedStar.style.color = '#0ff1da'; // Set the color to yellow for a full star
            } else {
                clickedStar.style.color = '#999'; // Set the color to the default for an empty star
            }
        }
    }
});

// Function to handle changes in item information
function handleItemChange(event) {
    const targetElement = event.target;

    // Identify the parent item
    const item = targetElement.closest('.item');
    console.log(item);

    if (item) {
        // Extract relevant information from the item
        const granolaId = item.id.replace('main-', '');
        const quantity = item.querySelector('.quantity-input').value;
        const note = item.querySelector('.note-text').value;
        // Log the date element to check if it's correctly identified
        const dateElement = item.querySelector('.item-date');

        // Extract the date value
        const date = dateElement ? dateElement.value : '';
        const unit = item.querySelector('.unit-select').value;

        //const isStarClicked = targetElement.classList.contains('favorite') || targetElement.closest('.favorite');
        //const isStarred = isStarClicked !== null && item.querySelector('.favorite i').classList.contains('fas');
        const starIcon = document.querySelector('[id^="starIcon' + granolaId + '"]');
        console.log(starIcon);
        const isStarred = starIcon.classList.contains('fas');
        console.log(isStarred);

        const isSelected = item.classList.contains('selected');
        const account_id = <?php echo json_encode($account_id); ?>;

        const granola_quantity = item.querySelector('.granola-quantity').value;
        const granola_unit_select = item.querySelector('.granola-unit-select').value;

        const granola_quantity_addToCart = item.querySelector('.granola-quantity-addToCart').value;
        const granola_unit_select_addToCart = item.querySelector('.granola-unit-select-addToCart').value;

        // Use AJAX or another method to send the data to addGranola.php
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'addGranola.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
            }
        };

        // Encode data and send the request
        const data = `granolaName=${granolaId}&granola_quantity=${granola_quantity}&granola_unit_select=${granola_unit_select}&account_id=${account_id}&quantity=${quantity}&note=${note}&unit=${unit}&isStarred=${isStarred}&is_selected=${isSelected}&date=${date}&granola_quantity_addToCart=${granola_quantity_addToCart}&granola_unit_select_addToCart=${granola_unit_select_addToCart}`;
        xhr.send(data);

        // Log the changes to the console
        console.log(`Item changed: ${granolaId}, Quantity: ${quantity}, Starred: ${isStarred}, Selected: ${isSelected}, Date: ${date}`);

        const quantityContainer = document.getElementById(`quantityContainer${granolaId}`);
        /*
        console.log(granolaId);
        if (granola_quantity > quantity ){
            console.log("error");
            document.getElementById(`quantityContainer${granolaId}`).classList.add('warning');
        } else {
            document.getElementById(`quantityContainer${granolaId}`).classList.remove('warning');
        }
        */


        // Get the unit of the minimum quantity from the database
        const minQuantityUnit = item.querySelector('.granola-unit-select').value;


       
        if (parseFloat(granola_quantity) > parseFloat(quantity) && minQuantityUnit===unit) {
            quantityContainer.classList.add('warning');
        } else {
            quantityContainer.classList.remove('warning');
        }
        
    }
}


// Add event listeners to relevant elements within each item
document.getElementById('main-container').addEventListener('input', handleItemChange);
document.getElementById('main-container').addEventListener('click', handleItemChange);

// Function to add an item
function addItem() {
    // Gather information from the form
    const granolaName = document.getElementById('granolaName').value;
    const quantity = item.querySelector('.quantity-input').value;
    const note = item.querySelector('.note-text').value;
    const unit = item.querySelector('.unit-select').value;

    const isStarred = item.querySelector('.favorite i').classList.contains('far');
    const isSelected = item.classList.contains('selected');

    const dateElement = item.querySelector('.item-date');
    const date = dateElement ? dateElement.value : '';
    //const account_id = document.getElementById('account_id').value;
    const account_id = <?php echo json_encode($account_id); ?>; 

    
    const granola_quantity = item.querySelector('.granola-quantity').value;
    const granola_unit_select = item.querySelector('.granola-unit-select').value;

    // Use AJAX or another method to send the data to addGranola.php
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'addGranola.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server if needed
            console.log(xhr.responseText);
        }
    };

    // Encode data and send the request
    const data = `&granolaName=${granolaName}&granola_quantity=${granola_quantity}&granola_unit_select=${granola_unit_select}&account_id=${account_id}&date=${date}&quantity=${quantity}&note=${note}&unit=${unit}&isStarred=${isStarred}&is_selected=${isSelected}`;
    xhr.send(data);
}

function updateSelectedItemsArray() {
    // Clear the array and re-populate it with the currently selected items
    selectedItemsArray = [];

    // Get all selected items in the main container
    var selectedItems = document.querySelectorAll('.item.selectable.selected');

    // Iterate through each selected item and add it to the array
    selectedItems.forEach(function(selectedItem) {
        var granolaName = selectedItem.querySelector('img').alt;
        var newItemId = "main-" + granolaName;

        selectedItemsArray.push({
            granolaName: granolaName,
            itemId: newItemId,
            // Add other relevant information as needed
        });
    });

    // Print the updated list to the console for verification
    console.log("Selected Items:", selectedItemsArray);
}

// Function to handle the increment button click
function handleIncrement() {
    var button = this;
    var quantityContainer = button.parentNode;
    var itemDetails = quantityContainer.parentNode;
    var greatGrandparent = itemDetails.parentNode;

    var quantityInput = quantityContainer.querySelector('.quantity-input');
    var selectedUnit = greatGrandparent.querySelector('.unit-select').value;

    if (selectedUnit === 'kg') {
        quantityInput.value = (parseFloat(quantityInput.value) + 0.1).toFixed(1);
    } else if (selectedUnit === 'gram') {
        quantityInput.value = (parseFloat(quantityInput.value) + 0.100).toFixed(3);
    } else {
        quantityInput.value = parseInt(quantityInput.value, 10) + 1;
    }
}

// Function to handle the decrement button click
function handleDecrement() {
    var button = this;
    var quantityContainer = button.parentNode;
    var itemDetails = quantityContainer.parentNode;
    var greatGrandparent = itemDetails.parentNode;
    
    var quantityInput = quantityContainer.querySelector('.quantity-input');
    var selectedUnit = greatGrandparent.querySelector('.unit-select').value;

    if (selectedUnit === 'kg' && parseFloat(quantityInput.value) >= 0.1) {
        quantityInput.value = (parseFloat(quantityInput.value) - 0.1).toFixed(1);
    } else if (selectedUnit === 'gram' && parseFloat(quantityInput.value) >= 0.100) {
        quantityInput.value = (parseFloat(quantityInput.value) - 0.100).toFixed(3);
    } else if (parseInt(quantityInput.value, 10) > 0) {
        quantityInput.value = parseInt(quantityInput.value, 10) - 1;
    }
}


function fetchStarredItems() {
    const account_id = <?php echo json_encode($account_id); ?>;

    // Make an AJAX request to fetch starred items
    var xhrFetchStarredItems = new XMLHttpRequest();
    xhrFetchStarredItems.open("POST", "fetchStarredItemsGranola.php", true);
    xhrFetchStarredItems.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrFetchStarredItems.onreadystatechange = function () {
        if (xhrFetchStarredItems.readyState == 4) {
            if (xhrFetchStarredItems.status == 200) {
                try {
                    // Parse the response from the server
                    var response = JSON.parse(xhrFetchStarredItems.responseText);
                    console.log(response);

                    // Check if starredItems is an array
                    if (Array.isArray(response.starredItems)) {
                        // Iterate through each starred item and add it to the main container
                        
                        response.starredItems.forEach(function (starredItem) {
                            addItemToMainContainerStar(starredItem);
                           
                        });
                        

                    } else {
                        console.error("starredItems is not an array:", response.starredItems);
                    }
                } catch (error) {
                    console.error("Error parsing JSON:", error);
                }
            } else {
                console.error("HTTP Error:", xhrFetchStarredItems.status, xhrFetchStarredItems.statusText);
            }
        }
    };

    
    xhrFetchStarredItems.send(`account_id=${account_id}`);
}



// Initialize input fields with saved values
function updateInputs() {
    items.forEach(item => {
        const itemName = item.querySelector("h2").textContent.trim();
        const savedValue = savedQuantities[itemName];
        if (savedValue) {
            const quantityInput = item.querySelector(".quantity-input");
            const unitSelect = item.querySelector(".unit-select");
            quantityInput.value = savedValue.value;
            unitSelect.value = savedValue.unit;
        }
    });
}
// Call the function to set initial input values
updateInputs();

// Set "kg" as the default unit for all items
items.forEach(item => {
    const unitSelect = item.querySelector(".unit-select");
    setDefaultUnit(unitSelect);
});

// Set "kg" as the default unit
function setDefaultUnit(unitSelect) {
        unitSelect.value = "kg";
}

function addItemToMainContainerStar(granolaId) {
    console.log(granolaId);
    granolaName = granolaId.granola_id;
    const account_id = <?php echo json_encode($account_id); ?>;

    // Check if the item with the same name already exists in the main container
    var existingItem = document.getElementById("main-" + granolaName);

    if (!existingItem) {

        // Create a new list item for the main container
        var newItem = document.createElement('li');
        newItem.className = "item selectable";

        // Set innerHTML based on the selected item in the popup
        newItem.innerHTML = `
                <div class="button-container">
                <button onclick="openPopupMinQuantity('${granolaName}')" class="top-left-button with-icon" id="topLeftButton${granolaName}">define minimum quantity </button>
                    <div id="granola-popup${granolaName}" class="popup"> 
                        <div class="popup-content-granolas">
                            <span class="close" onclick="closePopupMinQuantity('${granolaName}')">&times;</span>
                            <h6> Minimum Quantity: </h6>
                            <p class="input-row">
                                <input type="number" id="granola-quantity${granolaName}" class="granola-quantity" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="granola-unit${granolaName}" class="granola-unit-select" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupMinQuantity('${granolaName}')" id="set${granolaName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>

                    </br>
                    <button onclick="openPopupAddToCart('${granolaName}')" class="top-left-button" id="topLeftButton-AddToCart${granolaName}" >Add To Cart</button>
                    <div id="granola-popup-addToCart${granolaName}" class="popup"> 
                        <div class="popup-content-granolas">
                            <span class="close" onclick="closePopupAddToCart('${granolaName}')">&times;</span>
                            <h6>Add To Cart: </h6>
                            <p class="input-row">
                                <input type="number" id="granola-quantity-addToCart${granolaName}" class="granola-quantity-addToCart" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="granola-unit-addToCart${granolaName}" class="granola-unit-select-addToCart" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupAddToCart('${granolaName}')" id="set-addToCart${granolaName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>
                <div>
                <img src="granola/${granolaName}.jpg" onerror="this.src='granola/${granolaName}.png'" alt="${granolaName}">
                    <h2>${granolaName}</h2>
                    <div class="item-details">
                   
                        <p>Unit:
                            <select id="unit${granolaName}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>

                        </p>

                        <div class="quantity-container" id="quantityContainer${granolaName}">
                        <button class="decrement">
                            <i class="fas fa-minus"></i> 
                        </button>
                        <input type="number" id="quantity${granolaName}" class="quantity-input small-space" min="0" step="1" value="0" style="padding: 5px;">
                        <button class="increment">
                            <i class="fas fa-plus"></i> 
                        </button>
                        </div>

                        <div id="stickyNote${granolaName}" class="sticky-note">
                            <textarea id="noteText${granolaName}" class="note-text" placeholder="Write your note here..."></textarea>
                            <input id="Date${granolaName}" class="item-date" type="date">
                            <button id="saveNoteButton${granolaName}" class="save-button">Save</button>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i id="starIcon${granolaName}" class="fas fa-star"></i> 
                    </div>
                `;

                
        // Update the ID to make it unique
        var newItemId = "main-" + granolaName;
        newItem.id = newItemId;

        // Increment the counter for the next iteration
        uniqueIdCounter++;

        // Reset the quantity input value
        newItem.querySelector('.quantity-input').value = "0";

        // Add the cloned item to the main container
        document.getElementById('main-container').appendChild(newItem);

                
        // Make an AJAX request to addGranola.php to add default information to the item in the database
        //account_id = ...
        var xhr = new XMLHttpRequest();
        console.log("from addItemToMainContainerStar");
        xhr.open("POST", "addGranola.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log the response from the server
                var jsonResponse = JSON.parse(xhr.responseText);
                // here I get the previous data from the granolas database !!! 
                var jsonResponse = JSON.parse(xhr.responseText);

                var curgranola = jsonResponse.existinggranola;

                var curQuantity = jsonResponse.existingQuantity;
                var quantityInput = document.getElementById('quantity' + curgranola);
                quantityInput.value = curQuantity;

                var curNote = jsonResponse.existingNote;
                var NoteInput = document.getElementById('noteText' + curgranola);
                NoteInput.value = curNote;

                var curUnit  = jsonResponse.existingUnit;
                var UnitInput = document.getElementById('unit' + curgranola);
                UnitInput.value = curUnit;

                var curMinQuantity= jsonResponse.existingMinQuantity;
                var MinQuantityInput = document.getElementById('granola-quantity' + curgranola);
                MinQuantityInput.value = curMinQuantity;

                var curUnitMinQuantity = jsonResponse.existingUnitMinQuantity;
                var UnitMinQuantityInput = document.getElementById('granola-unit' + curgranola);
                UnitMinQuantityInput.value = curUnitMinQuantity;

                var curAddToCart = jsonResponse.existingAddToCart;
                var AddToCartInput = document.getElementById('granola-quantity-addToCart' + curgranola);
                AddToCartInput.value = curAddToCart;

                var curUnitAddToCart = jsonResponse.existingUnitAddToCart;
                var UnitAddToCartInput = document.getElementById('granola-unit-addToCart' + curgranola);
                UnitAddToCartInput.value = curUnitAddToCart;
                        
                var curDate = jsonResponse.existingDate;
                var DateInput = document.getElementById('Date' + curgranola);
                DateInput.value = curDate;

                // Apply warning border if quantity is smaller than the minimum quantity
                if (curQuantity < curMinQuantity) {
                    var quantityContainer = document.getElementById('quantityContainer' + curgranola);
                    quantityContainer.classList.add('warning');
                }
            }
        };
        xhr.send(`granolaName=${granolaName}&account_id=${account_id}`);

        // Attach event listeners to the increment and decrement buttons
        // Get references to the increment and decrement buttons
        var incrementButton = newItem.querySelector('.increment');
        var decrementButton = newItem.querySelector('.decrement');

        // Add event listeners only if the buttons exist
        if (incrementButton) {
            incrementButton.addEventListener('click', handleIncrement);
        }

        if (decrementButton) {
            decrementButton.addEventListener('click', handleDecrement);
        }

        // Make an AJAX request to addGranola.php to add default information to the item in the database
        var xhr = new XMLHttpRequest();
        // Set up listener for the "Save" button
        var saveNoteButton = newItem.querySelector('#saveNoteButton' + granolaName);
        saveNoteButton.addEventListener('click', function () {
            var quantity = newItem.querySelector('#quantity' + granolaName).value;
            var note = newItem.querySelector('#noteText' + granolaName).value;
            var item_date = newItem.querySelector('#Date' + granolaName).value;
            var unit = newItem.querySelector('#unit' + granolaName).value;
        });

///////////new 3.5
// Apply warning border if quantity is smaller than the minimum quantity
var minQuantityInput = document.getElementById('granola-quantity' + granolaName);
var quantityContainer = document.getElementById('quantityContainer' + granolaName);

quantityContainer.addEventListener('input', function() {
    if (parseFloat(newItem.querySelector('.quantity-input').value) < parseFloat(minQuantityInput.value)) {
        quantityContainer.classList.add('warning');
    } else {
        quantityContainer.classList.remove('warning');
    }
});

// Apply warning border when the screen is up
window.addEventListener('load', function() {
    if (parseFloat(newItem.querySelector('.quantity-input').value) < parseFloat(minQuantityInput.value)) {
        quantityContainer.classList.add('warning');
    } else {
        quantityContainer.classList.remove('warning');
    }
});



    }
}

    </script>

</body>
</html>


