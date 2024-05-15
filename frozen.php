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
    <title>Frozen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="frozen.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <h1>Frozen</h1>
    <!-- <a href="https://www.flaticon.com/free-icons/minimum" title="minimum icons">Minimum icons created by Freepik - Flaticon</a>
    <img src="speedometer.png" alt="Speedometer" class="speedometer">)-->
    <!-- search bar (to the main container)-->
    <div class="search-wrapper">
        <label for="search" >Frozen Search:</label>
        <input type="search" id="search" data-search  placeholder="enter a frozen item" oninput="searchItems()">
    </div>

    <div id="savedInfo">
        <!-- Content to be cleared -->
    </div>

    <!-- pop up window -->
    <button onclick="openPopup()" class="open-button" id= "open-window-btn">Open List of Frozen Items</button>

    <button id= "main-menu-btn">Back to the main menu</button>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h3>Frozen List:</h3>
                   
            <div class="search-wrapper-window">
                <label for="search">Frozen Search:</label>
                <input type="search" id="search-window" data-search  placeholder="enter a frozen item" oninput="searchItemsWindow()">
            </div>
            
      
            <ul class="items-container-window">
               
                <li class="selectable-window" id="basil-window" onclick="selectItem('basil-window')">
                <img src="frozen/basil.png" alt="basil">
                <p>basil</p>
                </li>

                <li class="selectable-window" id="beans-window" onclick="selectItem('beans-window')">
                <img src="frozen/beans.jpg" alt="beans">
                <p>beans</p>
                </li>

                <li class="selectable-window" id="berries-window" onclick="selectItem('berries-window')">
                <img src="frozen/berries.png" alt="berries">
                <p>berries</p>
                </li>

                <li class="selectable-window" id="blueberry-window" onclick="selectItem('blueberry-window')">
                <img src="frozen/blueberry.png" alt="blueberry">
                <p>blueberry</p>
                </li>

                <li class="selectable-window" id="borek-window" onclick="selectItem('borek-window')">
                <img src="frozen/borek.png" alt="borek">
                <p>borek</p>
                </li>

                <li class="selectable-window" id="broccoli-window" onclick="selectItem('broccoli-window')">
                <img src="frozen/broccoli.jpg" alt="broccoli">
                <p>broccoli</p>
                </li>

                <li class="selectable-window" id="cherry-window" onclick="selectItem('cherry-window')">
                <img src="frozen/cherry.jpg" alt="cherry">
                <p>cherry</p>
                </li>

                <li class="selectable-window" id="chips-window" onclick="selectItem('chips-window')">
                <img src="frozen/chips.jpg" alt="chips">
                <p>chips</p>
                </li>

                <li class="selectable-window" id="dill-window" onclick="selectItem('dill-window')">
                <img src="frozen/dill.png" alt="dill">
                <p>dill</p>
                </li>

                <li class="selectable-window" id="falafel-window" onclick="selectItem('falafel-window')">
                <img src="frozen/falafel.jpg" alt="falafel">
                <p>falafel</p>
                </li>

                <li class="selectable-window" id="lentil-window" onclick="selectItem('lentil-window')">
                <img src="frozen/lentil.png" alt="lentil">
                <p>lentil</p>
                </li>

                <li class="selectable-window" id="mango-window" onclick="selectItem('mango-window')">
                <img src="frozen/mango.png" alt="mango">
                <p>mango</p>
                </li>

                <li class="selectable-window" id="parsley-window" onclick="selectItem('parsley-window')">
                <img src="frozen/parsley.png" alt="parsley">
                <p>parsley</p>
                </li>

                <li class="selectable-window" id="pea-window" onclick="selectItem('pea-window')">
                <img src="frozen/pea.jpg" alt="pea">
                <p>pea</p>
                </li>

                <li class="selectable-window" id="pineapple-window" onclick="selectItem('pineapple-window')">
                <img src="frozen/pineapple.png" alt="pineapple">
                <p>pineapple</p>
                </li>


                <li class="selectable-window" id="pizza-window" onclick="selectItem('pizza-window')">
                <img src="frozen/pizza.jpg" alt="pizza">
                <p>pizza</p>
                </li>

                <li class="selectable-window" id="potato balls-window" onclick="selectItem('potato balls-window')">
                <img src="frozen/potato balls.jpg" alt="potato_balls">
                <p>potato balls</p>
                </li>

                <li class="selectable-window" id="schnitzel-window" onclick="selectItem('schnitzel-window')">
                <img src="frozen/schnitzel.jpg" alt="schnitzel">
                <p>schnitzel</p>
                </li>

                <li class="selectable-window" id="strawberry-window" onclick="selectItem('strawberry-window')">
                <img src="frozen/strawberry.png" alt="strawberry">
                <p>strawberry</p>
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

    // Assuming you have a list of frozen IDs
    var frozenIds = ['basil', 'beans', 'berries', 'blueberry', 'borek', 'broccoli', 'cherry', 'chips', 'dill', 'falafel', 'lentil', 'mango' ,'parsley','pea','pineapple','pizza','potato balls', 'schnitzel', 'strawberry'];

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

function openPopupMinQuantity(frozenName) {
    var popupElement = document.getElementById("frozen-popup" + frozenName);
    var buttonElement = document.getElementById('topLeftButton' + frozenName);

    if (popupElement && buttonElement) {
        popupElement.classList.add('frozen-popup');

        popupElement.style.display = "block";
        buttonElement.style.display = 'none';
    } else {
        console.error("Popup or button element not found for", frozenName);
    }
}

function openPopupAddToCart(frozenName) {
    var popupElement = document.getElementById("frozen-popup-addToCart" + frozenName);
    var buttonElement = document.getElementById('topLeftButton-AddToCart' + frozenName);

    if (popupElement && buttonElement) {
        popupElement.classList.add('frozen-popup-addToCart');

        popupElement.style.display = "block";
        buttonElement.style.display = 'none';
    } else {
        console.error("Popup or button element not found for", frozenName);
    }
}

function closePopupMinQuantity(frozenName) {
    var popupElement = document.getElementById("frozen-popup" + frozenName);
    var buttonElement = document.getElementById('topLeftButton' + frozenName);

    if (popupElement && buttonElement) {
        // Remove the specific class when closing the popup
        popupElement.classList.remove('frozen-popup');

        popupElement.style.display = "none";
        buttonElement.style.display = 'block';
    } else {
        console.error("Popup or button element not found for", frozenName);
    }
}

function closePopupAddToCart(frozenName) {
    var popupElement = document.getElementById("frozen-popup-addToCart" + frozenName);
    var buttonElement = document.getElementById('topLeftButton-AddToCart' + frozenName);

    if (popupElement && buttonElement) {
        popupElement.classList.remove('frozen-popup-addToCart');

        popupElement.style.display = "none";
        buttonElement.style.display = 'block';
    } else {
        console.error("Popup or button element not found for", frozenName);
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
            // Get the frozen name (assuming it's in the alt attribute of the image)
            var frozenName = selectedItem.querySelector('img').alt;

            // Check if the item with the same name already exists in the main container
            var existingItem = document.getElementById("main-" + frozenName);

            if (!existingItem) {

                // Create a new list item for the main container
                var newItem = document.createElement('li');
                newItem.className = "item selectable";

                // Set innerHTML based on the selected item in the popup
                newItem.innerHTML = `
                <div class="button-container">
                <button onclick="openPopupMinQuantity('${frozenName}')" class="top-left-button with-icon" id="topLeftButton${frozenName}">define minimum quantity </button>
                    <div id="frozen-popup${frozenName}" class="popup"> 
                        <div class="popup-content-frozens">
                            <span class="close" onclick="closePopupMinQuantity('${frozenName}')">&times;</span>
                            <h6> Minimum Quantity: </h6>
                            <p class="input-row">
                                <input type="number" id="frozen-quantity${frozenName}" class="frozen-quantity" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="frozen-unit${frozenName}" class="frozen-unit-select" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupMinQuantity('${frozenName}')" id="set${frozenName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>

                    </br>
                    <button onclick="openPopupAddToCart('${frozenName}')" class="top-left-button" id="topLeftButton-AddToCart${frozenName}" >Add To Cart</button>
                    <div id="frozen-popup-addToCart${frozenName}" class="popup"> 
                        <div class="popup-content-frozens">
                            <span class="close" onclick="closePopupAddToCart('${frozenName}')">&times;</span>
                            <h6>Add To Cart: </h6>
                            <p class="input-row">
                                <input type="number" id="frozen-quantity-addToCart${frozenName}" class="frozen-quantity-addToCart" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="frozen-unit-addToCart${frozenName}" class="frozen-unit-select-addToCart" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupAddToCart('${frozenName}')" id="set-addToCart${frozenName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>
                <div>
                    <img src="${selectedItem.querySelector('img').src}" alt="${selectedItem.querySelector('img').alt}">
                    <h2>${selectedItem.querySelector('p').innerText}</h2>
                    <div class="item-details">
                        <p>Unit:
                            <select id="unit${frozenName}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>

                        </p>

                        <div class="quantity-container" id="quantityContainer${frozenName}">
                        <button class="decrement">
                            <i class="fas fa-minus"></i> 
                        </button>
                        <input type="number" id="quantity${frozenName}" class="quantity-input small-space" min="0" step="1" value="0" style="padding: 5px;">
                        <button class="increment">
                            <i class="fas fa-plus"></i> 
                        </button>
                        </div>

                        <div id="stickyNote${frozenName}" class="sticky-note">
                            <textarea id="noteText${frozenName}" class="note-text" placeholder="Write your note here..."></textarea>
                            <input id="Date${frozenName}" class="item-date" type="date">
                            <button id="saveNoteButton${frozenName}" class="save-button">Save</button>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i id="starIcon${frozenName}" class="far fa-star"></i> 
                    </div>
                `;

                // Update the ID to make it unique
                var newItemId = "main-" + frozenName;
                newItem.id = newItemId;

                // Increment the counter for the next iteration
                uniqueIdCounter++;

                // Reset the quantity input value
                newItem.querySelector('.quantity-input').value = "0";

                // Remove the 'selected-frame' class from the cloned item
                selectedItem.classList.remove('selected-frame');

                // Add the cloned item to the main container
                document.getElementById('main-container').appendChild(newItem);


                // Make an AJAX request to addFrozen.php to add default information to the item in the database
                var xhr = new XMLHttpRequest();
                console.log ( "from addItemToMainContainer");
                xhr.open("POST", "addFrozen.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText); // Log the response from the server
                        var jsonResponse = JSON.parse(xhr.responseText);
                        console.log( jsonResponse.isNew)   
                        if (jsonResponse.isNew === false) {
                        console.log( jsonResponse.isNew)   
                        var curQuantity = jsonResponse.existingQuantity;
                        var quantityInput = document.getElementById('quantity' + frozenName);
                        quantityInput.value = curQuantity;

                        var curNote = jsonResponse.existingNote;
                        var NoteInput = document.getElementById('noteText' + frozenName);
                        NoteInput.value = curNote;

                        var curUnit  = jsonResponse.existingUnit;
                        var UnitInput = document.getElementById('unit' + frozenName);
                        UnitInput.value = curUnit;

                        var curMinQuantity= jsonResponse.existingMinQuantity;
                        var MinQuantityInput = document.getElementById('frozen-quantity' + frozenName);
                        MinQuantityInput.value = curMinQuantity;

                        var curUnitMinQuantity = jsonResponse.existingUnitMinQuantity;
                        var UnitMinQuantityInput = document.getElementById('frozen-unit' + frozenName);
                        UnitMinQuantityInput.value = curUnitMinQuantity;

                        var curAddToCart = jsonResponse.existingAddToCart;
                        var AddToCartInput = document.getElementById('frozen-quantity-addToCart' + frozenName);
                        AddToCartInput.value = curAddToCart;

                        var curUnitAddToCart = jsonResponse.existingUnitAddToCart;
                        var UnitAddToCartInput = document.getElementById('frozen-unit-addToCart' + frozenName);
                        UnitAddToCartInput.value = curUnitAddToCart;
                        
                        var curDate = jsonResponse.existingDate;
                        var DateInput = document.getElementById('Date' + frozenName);
                        DateInput.value = curDate;

                        var curRedFrame = jsonResponse.redFrame;
                        console.log(curRedFrame);
                        }



                    }
                };

                xhr.send(`frozenName=${frozenName}&account_id=${account_id}`);

                // Attach event listeners to the increment and decrement buttons
                newItem.querySelector('.increment').addEventListener('click', handleIncrement);
                newItem.querySelector('.decrement').addEventListener('click', handleDecrement);
                  
               // Set up listener for the "Save" button
               var saveNoteButton = newItem.querySelector('#saveNoteButton' + frozenName);
                saveNoteButton.addEventListener('click', function () {
                    var quantity = newItem.querySelector('#quantity' + frozenName).value;
                    var note = newItem.querySelector('#noteText' + frozenName).value;
                    var item_date = newItem.querySelector('#Date' + frozenName).value;
                    var unit = newItem.querySelector('#unit' + frozenName).value;

                });

                } else {
                    // Alert or notify the user that the item already exists in the main container
                    alert("Item '" + frozenName + "' is already in the main container.");
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
        const frozenId = item.id.replace('main-', '');
        const quantity = item.querySelector('.quantity-input').value;
        const note = item.querySelector('.note-text').value;
        // Log the date element to check if it's correctly identified
        const dateElement = item.querySelector('.item-date');

        // Extract the date value
        const date = dateElement ? dateElement.value : '';
        const unit = item.querySelector('.unit-select').value;

        //const isStarClicked = targetElement.classList.contains('favorite') || targetElement.closest('.favorite');
        //const isStarred = isStarClicked !== null && item.querySelector('.favorite i').classList.contains('fas');
        const starIcon = document.querySelector('[id^="starIcon' + frozenId + '"]');
        console.log(starIcon);
        const isStarred = starIcon.classList.contains('fas');
        console.log(isStarred);

        const isSelected = item.classList.contains('selected');
        const account_id = <?php echo json_encode($account_id); ?>;

        const frozen_quantity = item.querySelector('.frozen-quantity').value;
        const frozen_unit_select = item.querySelector('.frozen-unit-select').value;

        const frozen_quantity_addToCart = item.querySelector('.frozen-quantity-addToCart').value;
        const frozen_unit_select_addToCart = item.querySelector('.frozen-unit-select-addToCart').value;

        // Use AJAX or another method to send the data to addFrozen.php
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'addFrozen.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
            }
        };

        // Encode data and send the request
        const data = `frozenName=${frozenId}&frozen_quantity=${frozen_quantity}&frozen_unit_select=${frozen_unit_select}&account_id=${account_id}&quantity=${quantity}&note=${note}&unit=${unit}&isStarred=${isStarred}&is_selected=${isSelected}&date=${date}&frozen_quantity_addToCart=${frozen_quantity_addToCart}&frozen_unit_select_addToCart=${frozen_unit_select_addToCart}`;
        xhr.send(data);

        // Log the changes to the console
        console.log(`Item changed: ${frozenId}, Quantity: ${quantity}, Starred: ${isStarred}, Selected: ${isSelected}, Date: ${date}`);

        const quantityContainer = document.getElementById(`quantityContainer${frozenId}`);
        /*
        console.log(frozenId);
        if (frozen_quantity > quantity ){
            console.log("error");
            document.getElementById(`quantityContainer${frozenId}`).classList.add('warning');
        } else {
            document.getElementById(`quantityContainer${frozenId}`).classList.remove('warning');
        }
        */


        // Get the unit of the minimum quantity from the database
        const minQuantityUnit = item.querySelector('.frozen-unit-select').value;


       
        if (parseFloat(frozen_quantity) > parseFloat(quantity) && minQuantityUnit===unit) {
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
    const frozenName = document.getElementById('frozenName').value;
    const quantity = item.querySelector('.quantity-input').value;
    const note = item.querySelector('.note-text').value;
    const unit = item.querySelector('.unit-select').value;

    const isStarred = item.querySelector('.favorite i').classList.contains('far');
    const isSelected = item.classList.contains('selected');

    const dateElement = item.querySelector('.item-date');
    const date = dateElement ? dateElement.value : '';
    //const account_id = document.getElementById('account_id').value;
    const account_id = <?php echo json_encode($account_id); ?>; 

    
    const frozen_quantity = item.querySelector('.frozen-quantity').value;
    const frozen_unit_select = item.querySelector('.frozen-unit-select').value;

    // Use AJAX or another method to send the data to addFrozen.php
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'addFrozen.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server if needed
            console.log(xhr.responseText);
        }
    };

    // Encode data and send the request
    const data = `&frozenName=${frozenName}&frozen_quantity=${frozen_quantity}&frozen_unit_select=${frozen_unit_select}&account_id=${account_id}&date=${date}&quantity=${quantity}&note=${note}&unit=${unit}&isStarred=${isStarred}&is_selected=${isSelected}`;
    xhr.send(data);
}

function updateSelectedItemsArray() {
    // Clear the array and re-populate it with the currently selected items
    selectedItemsArray = [];

    // Get all selected items in the main container
    var selectedItems = document.querySelectorAll('.item.selectable.selected');

    // Iterate through each selected item and add it to the array
    selectedItems.forEach(function(selectedItem) {
        var frozenName = selectedItem.querySelector('img').alt;
        var newItemId = "main-" + frozenName;

        selectedItemsArray.push({
            frozenName: frozenName,
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
    xhrFetchStarredItems.open("POST", "fetchStarredItemsFrozen.php", true);
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

function addItemToMainContainerStar(frozenId) {
    console.log(frozenId);
    frozenName = frozenId.frozen_id;
    const account_id = <?php echo json_encode($account_id); ?>;

    // Check if the item with the same name already exists in the main container
    var existingItem = document.getElementById("main-" + frozenName);

    if (!existingItem) {

        // Create a new list item for the main container
        var newItem = document.createElement('li');
        newItem.className = "item selectable";

        // Set innerHTML based on the selected item in the popup
        newItem.innerHTML = `
                <div class="button-container">
                <button onclick="openPopupMinQuantity('${frozenName}')" class="top-left-button with-icon" id="topLeftButton${frozenName}">define minimum quantity </button>
                    <div id="frozen-popup${frozenName}" class="popup"> 
                        <div class="popup-content-frozens">
                            <span class="close" onclick="closePopupMinQuantity('${frozenName}')">&times;</span>
                            <h6> Minimum Quantity: </h6>
                            <p class="input-row">
                                <input type="number" id="frozen-quantity${frozenName}" class="frozen-quantity" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="frozen-unit${frozenName}" class="frozen-unit-select" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupMinQuantity('${frozenName}')" id="set${frozenName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>

                    </br>
                    <button onclick="openPopupAddToCart('${frozenName}')" class="top-left-button" id="topLeftButton-AddToCart${frozenName}" >Add To Cart</button>
                    <div id="frozen-popup-addToCart${frozenName}" class="popup"> 
                        <div class="popup-content-frozens">
                            <span class="close" onclick="closePopupAddToCart('${frozenName}')">&times;</span>
                            <h6>Add To Cart: </h6>
                            <p class="input-row">
                                <input type="number" id="frozen-quantity-addToCart${frozenName}" class="frozen-quantity-addToCart" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="frozen-unit-addToCart${frozenName}" class="frozen-unit-select-addToCart" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupAddToCart('${frozenName}')" id="set-addToCart${frozenName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>
                <div>
                    <img src="frozen/${frozenName}.jpg" alt="${frozenName}">
                    <h2>${frozenName}</h2>
                    <div class="item-details">
                   
                        <p>Unit:
                            <select id="unit${frozenName}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>

                        </p>

                        <div class="quantity-container" id="quantityContainer${frozenName}">
                        <button class="decrement">
                            <i class="fas fa-minus"></i> 
                        </button>
                        <input type="number" id="quantity${frozenName}" class="quantity-input small-space" min="0" step="1" value="0" style="padding: 5px;">
                        <button class="increment">
                            <i class="fas fa-plus"></i> 
                        </button>
                        </div>

                        <div id="stickyNote${frozenName}" class="sticky-note">
                            <textarea id="noteText${frozenName}" class="note-text" placeholder="Write your note here..."></textarea>
                            <input id="Date${frozenName}" class="item-date" type="date">
                            <button id="saveNoteButton${frozenName}" class="save-button">Save</button>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i id="starIcon${frozenName}" class="fas fa-star"></i> 
                    </div>
                `;

                
        // Update the ID to make it unique
        var newItemId = "main-" + frozenName;
        newItem.id = newItemId;

        // Increment the counter for the next iteration
        uniqueIdCounter++;

        // Reset the quantity input value
        newItem.querySelector('.quantity-input').value = "0";

        // Add the cloned item to the main container
        document.getElementById('main-container').appendChild(newItem);

                
        // Make an AJAX request to addFrozen.php to add default information to the item in the database
        //account_id = ...
        var xhr = new XMLHttpRequest();
        console.log("from addItemToMainContainerStar");
        xhr.open("POST", "addFrozen.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log the response from the server
                var jsonResponse = JSON.parse(xhr.responseText);
                // here I get the previous data from the frozens database !!! 
                var jsonResponse = JSON.parse(xhr.responseText);

                var curFruit = jsonResponse.existingFruit;

                var curQuantity = jsonResponse.existingQuantity;
                var quantityInput = document.getElementById('quantity' + curFruit);
                quantityInput.value = curQuantity;

                var curNote = jsonResponse.existingNote;
                var NoteInput = document.getElementById('noteText' + curFruit);
                NoteInput.value = curNote;

                var curUnit  = jsonResponse.existingUnit;
                var UnitInput = document.getElementById('unit' + curFruit);
                UnitInput.value = curUnit;

                var curMinQuantity= jsonResponse.existingMinQuantity;
                var MinQuantityInput = document.getElementById('frozen-quantity' + curFruit);
                MinQuantityInput.value = curMinQuantity;

                var curUnitMinQuantity = jsonResponse.existingUnitMinQuantity;
                var UnitMinQuantityInput = document.getElementById('frozen-unit' + curFruit);
                UnitMinQuantityInput.value = curUnitMinQuantity;

                var curAddToCart = jsonResponse.existingAddToCart;
                var AddToCartInput = document.getElementById('frozen-quantity-addToCart' + curFruit);
                AddToCartInput.value = curAddToCart;

                var curUnitAddToCart = jsonResponse.existingUnitAddToCart;
                var UnitAddToCartInput = document.getElementById('frozen-unit-addToCart' + curFruit);
                UnitAddToCartInput.value = curUnitAddToCart;
                        
                var curDate = jsonResponse.existingDate;
                var DateInput = document.getElementById('Date' + curFruit);
                DateInput.value = curDate;

                // Apply warning border if quantity is smaller than the minimum quantity
                if (curQuantity < curMinQuantity) {
                    var quantityContainer = document.getElementById('quantityContainer' + curFruit);
                    quantityContainer.classList.add('warning');
                }
            }
        };
        xhr.send(`frozenName=${frozenName}&account_id=${account_id}`);

        // Attach event listeners to the increment and decrement buttons
        newItem.querySelector('.increment').addEventListener('click', handleIncrement);
        newItem.querySelector('.decrement').addEventListener('click', handleDecrement);

        // Set up listener for the "Save" button
        var saveNoteButton = newItem.querySelector('#saveNoteButton' + frozenName);
        console.log(frozenName);
        saveNoteButton.addEventListener('click', function () {
            var quantity = newItem.querySelector('#quantity' + frozenName).value;
            var note = newItem.querySelector('#noteText' + frozenName).value;
            var item_date = newItem.querySelector('#Date' + frozenName).value;
            var unit = newItem.querySelector('#unit' + frozenName).value;
        });

///////////new 3.5
// Apply warning border if quantity is smaller than the minimum quantity
var minQuantityInput = document.getElementById('frozen-quantity' + frozenName);
var quantityContainer = document.getElementById('quantityContainer' + frozenName);

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
//////////////////



    }
}

    </script>

</body>
</html>


