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
    <title>Fruits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="diary.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <h1>Diary</h1>
    <!-- <a href="https://www.flaticon.com/free-icons/minimum" title="minimum icons">Minimum icons created by Freepik - Flaticon</a>
    <img src="speedometer.png" alt="Speedometer" class="speedometer">)-->
    <!-- search bar (to the main container)-->
    <div class="search-wrapper">
        <label for="search" >Diary Search:</label>
        <input type="search" id="search" data-search  placeholder="enter a diary item" oninput="searchItems()">
    </div>

    <div id="savedInfo">
        <!-- Content to be cleared -->
    </div>

    <!-- pop up window -->
    <button onclick="openPopup()" class="open-button" id= "open-window-btn">Open List of Diary Items</button>

    <button id= "main-menu-btn">Back to the main menu</button>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h3>Dairy List:</h3>
                   
            <div class="search-wrapper-window">
                <label for="search">Dairy Search:</label>
                <input type="search" id="search-window" data-search  placeholder="enter a dairy item" oninput="searchItemsWindow()">
            </div>
            
      
            <ul class="items-container-window">
               
                <li class="selectable-window" id="butter-window" onclick="selectItem('butter-window')">
                <img src="diary/butter.jpg" alt="butter">
                <p>Butter</p>
                </li>

                <li class="selectable-window" id="cheese-window" onclick="selectItem('cheese-window')">
                <img src="diary/cheese.jpg" alt="cheese">
                <p>cheese</p>
                </li>

                <li class="selectable-window" id="chocolate_milk-window" onclick="selectItem('chocolate_milk-window')">
                <img src="diary/chocolate_milk.jpg" alt="chocolate_milk">
                <p>chocolate_milk</p>
                </li>

                <li class="selectable-window" id="cottage_cheese-window" onclick="selectItem('cottage_cheese-window')">
                <img src="diary/cottage_cheese.jpg" alt="cottage_cheese">
                <p>cottage_cheese</p>
                </li>

                <li class="selectable-window" id="cream_chees-window" onclick="selectItem('cream_chees-window')">
                <img src="diary/cream_chees.jpg" alt="cream_chees">
                <p>cream_chees</p>
                </li>

                <li class="selectable-window" id="cream-window" onclick="selectItem('cream-window')">
                <img src="diary/cream.png" alt="cream">
                <p>cream</p>
                </li>

                <li class="selectable-window" id="eggs-window" onclick="selectItem('eggs-window')">
                <img src="diary/eggs.png" alt="eggs">
                <p>eggs</p>
                </li>

                <li class="selectable-window" id="emmental_cheese-window" onclick="selectItem('emmental_cheese-window')">
                <img src="diary/emmental_cheese.jpg" alt="emmental_cheese">
                <p>emmental_cheese</p>
                </li>

                <li class="selectable-window" id="farmer_cheese-window" onclick="selectItem('farmer_cheese-window')">
                <img src="diary/farmer_cheese.jpg" alt="farmer_cheese">
                <p>farmer_cheese</p>
                </li>

                <li class="selectable-window" id="milk_1-window" onclick="selectItem('milk_1-window')">
                <img src="diary/milk_1.jpg" alt="milk_1">
                <p>milk 1%</p>
                </li>

                <li class="selectable-window" id="milk_3-window" onclick="selectItem('milk_3-window')">
                <img src="diary/milk_3.jpg" alt="milk_3">
                <p>milk 3%</p>
                </li>

                <li class="selectable-window" id="peach yogurt-window" onclick="selectItem('peach yogurt-window')">
                <img src="diary/peach yogurt.jpg" alt="peach yogurt">
                <p>peach yogurt</p>
                </li>

                <li class="selectable-window" id="roquefort-window" onclick="selectItem('roquefort-window')">
                <img src="diary/roquefort.png" alt="roquefort">
                <p>roquefort</p>
                </li>

                <li class="selectable-window" id="Sirene-window" onclick="selectItem('Sirene-window')">
                <img src="diary/Sirene.jpg" alt="Sirene">
                <p>Sirene</p>
                </li>

                <li class="selectable-window" id="sour_cream-window" onclick="selectItem('sour_cream-window')">
                <img src="diary/sour_cream.jpg" alt="sour_cream">
                <p>sour_cream</p>
                </li>

                <li class="selectable-window" id="strawberry yogurt-window" onclick="selectItem('strawberry yogurt-window')">
                <img src="diary/strawberry yogurt.jpg" alt="strawberry yogurt">
                <p>strawberry yogurt</p>
                </li>

                <li class="selectable-window" id="yogurt-window" onclick="selectItem('yogurt-window')">
                <img src="diary/yogurt.jpg" alt="yogurt">
                <p>yogurt</p>
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
    selectedItems = []; // Array to store the names of starred items
    selectedItemsArray = []; // Array to store selected items

    // Assuming you have a list of diary IDs
    var diaryIds = ['butter', 'cheese', 'chocolate_milk', 'cottage_cheese', 'cream_chees', 'cream', 'eggs', 'emmental_cheese', 'farmer_cheese', 'milk_1%', 'milk_3%', "peach yogurt", 'roquefort', 'Sirene', 'sour_cream', 'strawberry yogurt', 'yogurt'];

    // Call fetchStarredItems when the page loads
    document.addEventListener("DOMContentLoaded", function () {
        fetchStarredItems();
        fetchSelectedItems();
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

function getFileType(fruitName) {
    const imageExtensions = ['jpg', 'jpeg', 'png'];
    const lowerCaseName = fruitName.toLowerCase();
    for (const ext of imageExtensions) {
        console.log(ext);
        if (lowerCaseName.endsWith('.' + ext)) {
            return ext;
        }
    }
    return 'jpg'; // Default to jpg if no extension matched
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

function openPopupMinQuantity(diaryName) {
    var popupElement = document.getElementById("diary-popup" + diaryName);
    var buttonElement = document.getElementById('topLeftButton' + diaryName);

    if (popupElement && buttonElement) {
        popupElement.classList.add('diary-popup');

        popupElement.style.display = "block";
        buttonElement.style.display = 'none';
    } else {
        console.error("Popup or button element not found for", diaryName);
    }
}

function openPopupAddToCart(diaryName) {
    var popupElement = document.getElementById("diary-popup-addToCart" + diaryName);
    var buttonElement = document.getElementById('topLeftButton-AddToCart' + diaryName);

    if (popupElement && buttonElement) {
        popupElement.classList.add('diary-popup-addToCart');

        popupElement.style.display = "block";
        buttonElement.style.display = 'none';
    } else {
        console.error("Popup or button element not found for", diaryName);
    }
}

function closePopupMinQuantity(diaryName) {
    var popupElement = document.getElementById("diary-popup" + diaryName);
    var buttonElement = document.getElementById('topLeftButton' + diaryName);

    if (popupElement && buttonElement) {
        // Remove the specific class when closing the popup
        popupElement.classList.remove('diary-popup');

        popupElement.style.display = "none";
        buttonElement.style.display = 'block';
    } else {
        console.error("Popup or button element not found for", diaryName);
    }
}

function closePopupAddToCart(diaryName) {
    var popupElement = document.getElementById("diary-popup-addToCart" + diaryName);
    var buttonElement = document.getElementById('topLeftButton-AddToCart' + diaryName);

    if (popupElement && buttonElement) {
        popupElement.classList.remove('diary-popup-addToCart');

        popupElement.style.display = "none";
        buttonElement.style.display = 'block';
    } else {
        console.error("Popup or button element not found for", diaryName);
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
            // Get the diary name (assuming it's in the alt attribute of the image)
            var diaryName = selectedItem.querySelector('img').alt;

            // Check if the item with the same name already exists in the main container
            var existingItem = document.getElementById("main-" + diaryName);

            if (!existingItem) {

                // Create a new list item for the main container
                var newItem = document.createElement('li');
                newItem.className = "item selectable";

                // Set innerHTML based on the selected item in the popup
                newItem.innerHTML = `
                <div class="button-container">
                <button onclick="openPopupMinQuantity('${diaryName}')" class="top-left-button with-icon" id="topLeftButton${diaryName}">define minimum quantity </button>
                    <div id="diary-popup${diaryName}" class="popup"> 
                        <div class="popup-content-diarys">
                            <span class="close" onclick="closePopupMinQuantity('${diaryName}')">&times;</span>
                            <h6> Minimum Quantity: </h6>
                            <p class="input-row">
                                <input type="number" id="diary-quantity${diaryName}" class="diary-quantity" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="diary-unit${diaryName}" class="diary-unit-select" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupMinQuantity('${diaryName}')" id="set${diaryName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>

                    </br>
                    <button onclick="openPopupAddToCart('${diaryName}')" class="top-left-button" id="topLeftButton-AddToCart${diaryName}" >Add To Cart</button>
                    <div id="diary-popup-addToCart${diaryName}" class="popup"> 
                        <div class="popup-content-diarys">
                            <span class="close" onclick="closePopupAddToCart('${diaryName}')">&times;</span>
                            <h6>Add To Cart: </h6>
                            <p class="input-row">
                                <input type="number" id="diary-quantity-addToCart${diaryName}" class="diary-quantity-addToCart" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="diary-unit-addToCart${diaryName}" class="diary-unit-select-addToCart" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupAddToCart('${diaryName}')" id="set-addToCart${diaryName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>
                <div>
                    <img src="${selectedItem.querySelector('img').src}" alt="${selectedItem.querySelector('img').alt}">
                    <h2>${selectedItem.querySelector('p').innerText}</h2>
                    <div class="item-details">
                        <p>Unit:
                            <select id="unit${diaryName}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>

                        </p>

                        <div class="quantity-container" id="quantityContainer${diaryName}">
                        <button class="decrement">
                            <i class="fas fa-minus"></i> 
                        </button>
                        <input type="number" id="quantity${diaryName}" class="quantity-input small-space" min="0" step="1" value="0" style="padding: 5px;">
                        <button class="increment">
                            <i class="fas fa-plus"></i> 
                        </button>
                        </div>

                        <div id="stickyNote${diaryName}" class="sticky-note">
                            <textarea id="noteText${diaryName}" class="note-text" placeholder="Write your note here..."></textarea>
                            <input id="Date${diaryName}" class="item-date" type="date">
                            <button id="saveNoteButton${diaryName}" class="save-button">Save</button>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i id="starIcon${diaryName}" class="far fa-star"></i> 
                    </div>
                `;

                // Update the ID to make it unique
                var newItemId = "main-" + diaryName;
                newItem.id = newItemId;

                // Increment the counter for the next iteration
                uniqueIdCounter++;

                // Reset the quantity input value
                newItem.querySelector('.quantity-input').value = "0";

                // Remove the 'selected-frame' class from the cloned item
                selectedItem.classList.remove('selected-frame');

                // Add the cloned item to the main container
                document.getElementById('main-container').appendChild(newItem);


                // Make an AJAX request to addDiary.php to add default information to the item in the database
                var xhr = new XMLHttpRequest();
                console.log ( "from addItemToMainContainer");
                xhr.open("POST", "addDiary.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText); // Log the response from the server
                        var jsonResponse = JSON.parse(xhr.responseText);
                        console.log( jsonResponse.isNew)   
                        if (jsonResponse.isNew === false) {
                        console.log( jsonResponse.isNew)   
                        var curQuantity = jsonResponse.existingQuantity;
                        var quantityInput = document.getElementById('quantity' + diaryName);
                        quantityInput.value = curQuantity;

                        var curNote = jsonResponse.existingNote;
                        var NoteInput = document.getElementById('noteText' + diaryName);
                        NoteInput.value = curNote;

                        var curUnit  = jsonResponse.existingUnit;
                        var UnitInput = document.getElementById('unit' + diaryName);
                        UnitInput.value = curUnit;

                        var curMinQuantity= jsonResponse.existingMinQuantity;
                        var MinQuantityInput = document.getElementById('diary-quantity' + diaryName);
                        MinQuantityInput.value = curMinQuantity;

                        var curUnitMinQuantity = jsonResponse.existingUnitMinQuantity;
                        var UnitMinQuantityInput = document.getElementById('diary-unit' + diaryName);
                        UnitMinQuantityInput.value = curUnitMinQuantity;

                        var curAddToCart = jsonResponse.existingAddToCart;
                        var AddToCartInput = document.getElementById('diary-quantity-addToCart' + diaryName);
                        AddToCartInput.value = curAddToCart;

                        var curUnitAddToCart = jsonResponse.existingUnitAddToCart;
                        var UnitAddToCartInput = document.getElementById('diary-unit-addToCart' + diaryName);
                        UnitAddToCartInput.value = curUnitAddToCart;
                        
                        var curDate = jsonResponse.existingDate;
                        var DateInput = document.getElementById('Date' + diaryName);
                        DateInput.value = curDate;

                        var curRedFrame = jsonResponse.redFrame;
                        console.log(curRedFrame);
                        }



                    }
                };

                xhr.send(`diaryName=${diaryName}&account_id=${account_id}`);

                // Attach event listeners to the increment and decrement buttons
                newItem.querySelector('.increment').addEventListener('click', handleIncrement);
                newItem.querySelector('.decrement').addEventListener('click', handleDecrement);
                  
               // Set up listener for the "Save" button
               var saveNoteButton = newItem.querySelector('#saveNoteButton' + diaryName);
                saveNoteButton.addEventListener('click', function () {
                    var quantity = newItem.querySelector('#quantity' + diaryName).value;
                    var note = newItem.querySelector('#noteText' + diaryName).value;
                    var item_date = newItem.querySelector('#Date' + diaryName).value;
                    var unit = newItem.querySelector('#unit' + diaryName).value;

                });

                } else {
                    // Alert or notify the user that the item already exists in the main container
                    alert("Item '" + diaryName + "' is already in the main container.");
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
        const diaryId = item.id.replace('main-', '');
        const quantity = item.querySelector('.quantity-input').value;
        const note = item.querySelector('.note-text').value;
        // Log the date element to check if it's correctly identified
        const dateElement = item.querySelector('.item-date');

        // Extract the date value
        const date = dateElement ? dateElement.value : '';
        const unit = item.querySelector('.unit-select').value;

        //const isStarClicked = targetElement.classList.contains('favorite') || targetElement.closest('.favorite');
        //const isStarred = isStarClicked !== null && item.querySelector('.favorite i').classList.contains('fas');
        const starIcon = document.querySelector('[id^="starIcon' + diaryId + '"]');
        console.log(starIcon);
        const isStarred = starIcon.classList.contains('fas');
        console.log(isStarred);

        const isSelected = item.classList.contains('selected');
        const account_id = <?php echo json_encode($account_id); ?>;

        const diary_quantity = item.querySelector('.diary-quantity').value;
        const diary_unit_select = item.querySelector('.diary-unit-select').value;

        const diary_quantity_addToCart = item.querySelector('.diary-quantity-addToCart').value;
        const diary_unit_select_addToCart = item.querySelector('.diary-unit-select-addToCart').value;

        // Use AJAX or another method to send the data to addDiary.php
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'addDiary.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
            }
        };

        // Encode data and send the request
        const data = `diaryName=${diaryId}&diary_quantity=${diary_quantity}&diary_unit_select=${diary_unit_select}&account_id=${account_id}&quantity=${quantity}&note=${note}&unit=${unit}&isStarred=${isStarred}&is_selected=${isSelected}&date=${date}&diary_quantity_addToCart=${diary_quantity_addToCart}&diary_unit_select_addToCart=${diary_unit_select_addToCart}`;
        xhr.send(data);

        // Log the changes to the console
        console.log(`Item changed: ${diaryId}, Quantity: ${quantity}, Starred: ${isStarred}, Selected: ${isSelected}, Date: ${date}`);

        const quantityContainer = document.getElementById(`quantityContainer${diaryId}`);
        /*
        console.log(diaryId);
        if (diary_quantity > quantity ){
            console.log("error");
            document.getElementById(`quantityContainer${diaryId}`).classList.add('warning');
        } else {
            document.getElementById(`quantityContainer${diaryId}`).classList.remove('warning');
        }
        */


        // Get the unit of the minimum quantity from the database
        const minQuantityUnit = item.querySelector('.diary-unit-select').value;


       
        if (parseFloat(diary_quantity) > parseFloat(quantity) && minQuantityUnit===unit) {
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
    const diaryName = document.getElementById('diaryName').value;
    const quantity = item.querySelector('.quantity-input').value;
    const note = item.querySelector('.note-text').value;
    const unit = item.querySelector('.unit-select').value;

    const isStarred = item.querySelector('.favorite i').classList.contains('far');
    const isSelected = item.classList.contains('selected');

    const dateElement = item.querySelector('.item-date');
    const date = dateElement ? dateElement.value : '';
    //const account_id = document.getElementById('account_id').value;
    const account_id = <?php echo json_encode($account_id); ?>; 

    
    const diary_quantity = item.querySelector('.diary-quantity').value;
    const diary_unit_select = item.querySelector('.diary-unit-select').value;

    // Use AJAX or another method to send the data to addDiary.php
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'addDiary.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server if needed
            console.log(xhr.responseText);
        }
    };

    // Encode data and send the request
    const data = `&diaryName=${diaryName}&diary_quantity=${diary_quantity}&diary_unit_select=${diary_unit_select}&account_id=${account_id}&date=${date}&quantity=${quantity}&note=${note}&unit=${unit}&isStarred=${isStarred}&is_selected=${isSelected}`;
    xhr.send(data);
}

function updateSelectedItemsArray() {
    // Clear the array and re-populate it with the currently selected items
    selectedItemsArray = [];

    // Get all selected items in the main container
    var selectedItems = document.querySelectorAll('.item.selectable.selected');

    // Iterate through each selected item and add it to the array
    selectedItems.forEach(function(selectedItem) {
        var diaryName = selectedItem.querySelector('img').alt;
        var newItemId = "main-" + diaryName;

        selectedItemsArray.push({
            diaryName: diaryName,
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
    xhrFetchStarredItems.open("POST", "fetchStarredItemsDiary.php", true);
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

    // Send data to fetchStarredItems.php (replace with your actual endpoint and parameters)
    xhrFetchStarredItems.send(`account_id=${account_id}`);
}



function fetchSelectedItems() {
    const account_id = <?php echo json_encode($account_id); ?>;

    var xhrFetchSelectedItems = new XMLHttpRequest();
    xhrFetchSelectedItems.open("POST", "fetchSelectedItemsDiary.php", true);
    xhrFetchSelectedItems.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrFetchSelectedItems.onreadystatechange = function () {
  
        if (xhrFetchSelectedItems.readyState == 4) {
            if (xhrFetchSelectedItems.status == 200) {
              
                try {
                 
                    // Parse the response from the server
                    var response = JSON.parse(xhrFetchSelectedItems.responseText);
                   
                    if (Array.isArray(response.selectedItems)) {
                       
                      
                        response.selectedItems.forEach(function (selectedItem) {
                            addItemToMainContainerSelected(selectedItem);
                           
                        });
                        

                    } else {
                        console.error("selectedItems is not an array:", response.selectedItems);
                    }
                } catch (error) {
                    
                    console.error("Error parsing JSON:", error);
                }
            } else {
                console.error("HTTP Error:", xhrFetchSelectedItems.status, xhrFetchSelectedItems.statusText);
            }
        }
    };

    // Send data to xhrFetchSelectedItems.php (replace with your actual endpoint and parameters)
    xhrFetchSelectedItems.send(`account_id=${account_id}`);
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

function addItemToMainContainerStar(diaryId) {
    console.log(diaryId);
    diaryName = diaryId.diary_id;
    const account_id = <?php echo json_encode($account_id); ?>;

    // Check if the item with the same name already exists in the main container
    var existingItem = document.getElementById("main-" + diaryName);

    if (!existingItem) {

        // Create a new list item for the main container
        var newItem = document.createElement('li');
        newItem.className = "item selectable";

        // Set innerHTML based on the selected item in the popup
        newItem.innerHTML = `
                <div class="button-container">
                <button onclick="openPopupMinQuantity('${diaryName}')" class="top-left-button with-icon" id="topLeftButton${diaryName}">define minimum quantity </button>
                    <div id="diary-popup${diaryName}" class="popup"> 
                        <div class="popup-content-diarys">
                            <span class="close" onclick="closePopupMinQuantity('${diaryName}')">&times;</span>
                            <h6> Minimum Quantity: </h6>
                            <p class="input-row">
                                <input type="number" id="diary-quantity${diaryName}" class="diary-quantity" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="diary-unit${diaryName}" class="diary-unit-select" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupMinQuantity('${diaryName}')" id="set${diaryName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>

                    </br>
                    <button onclick="openPopupAddToCart('${diaryName}')" class="top-left-button" id="topLeftButton-AddToCart${diaryName}" >Add To Cart</button>
                    <div id="diary-popup-addToCart${diaryName}" class="popup"> 
                        <div class="popup-content-diarys">
                            <span class="close" onclick="closePopupAddToCart('${diaryName}')">&times;</span>
                            <h6>Add To Cart: </h6>
                            <p class="input-row">
                                <input type="number" id="diary-quantity-addToCart${diaryName}" class="diary-quantity-addToCart" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="diary-unit-addToCart${diaryName}" class="diary-unit-select-addToCart" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupAddToCart('${diaryName}')" id="set-addToCart${diaryName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>
                <div>
                    <img src="diary/${diaryName}.jpg" alt="${diaryName}">
                    <h2>${diaryName}</h2>
                    <div class="item-details">
                   
                        <p>Unit:
                            <select id="unit${diaryName}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>

                        </p>

                        <div class="quantity-container" id="quantityContainer${diaryName}">
                        <button class="decrement">
                            <i class="fas fa-minus"></i> 
                        </button>
                        <input type="number" id="quantity${diaryName}" class="quantity-input small-space" min="0" step="1" value="0" style="padding: 5px;">
                        <button class="increment">
                            <i class="fas fa-plus"></i> 
                        </button>
                        </div>

                        <div id="stickyNote${diaryName}" class="sticky-note">
                            <textarea id="noteText${diaryName}" class="note-text" placeholder="Write your note here..."></textarea>
                            <input id="Date${diaryName}" class="item-date" type="date">
                            <button id="saveNoteButton${diaryName}" class="save-button">Save</button>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i id="starIcon${diaryName}" class="fas fa-star"></i> 
                    </div>
                `;

                
        // Update the ID to make it unique
        var newItemId = "main-" + diaryName;
        newItem.id = newItemId;

        // Increment the counter for the next iteration
        uniqueIdCounter++;

        // Reset the quantity input value
        newItem.querySelector('.quantity-input').value = "0";

        // Add the cloned item to the main container
        document.getElementById('main-container').appendChild(newItem);

                
        // Make an AJAX request to addDiary.php to add default information to the item in the database
        //account_id = ...
        var xhr = new XMLHttpRequest();
        console.log("from addItemToMainContainerStar");
        xhr.open("POST", "addDiary.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log the response from the server
                var jsonResponse = JSON.parse(xhr.responseText);
                // here I get the previous data from the diarys database !!! 
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
                var MinQuantityInput = document.getElementById('diary-quantity' + curFruit);
                MinQuantityInput.value = curMinQuantity;

                var curUnitMinQuantity = jsonResponse.existingUnitMinQuantity;
                var UnitMinQuantityInput = document.getElementById('diary-unit' + curFruit);
                UnitMinQuantityInput.value = curUnitMinQuantity;

                var curAddToCart = jsonResponse.existingAddToCart;
                var AddToCartInput = document.getElementById('diary-quantity-addToCart' + curFruit);
                AddToCartInput.value = curAddToCart;

                var curUnitAddToCart = jsonResponse.existingUnitAddToCart;
                var UnitAddToCartInput = document.getElementById('diary-unit-addToCart' + curFruit);
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
        xhr.send(`diaryName=${diaryName}&account_id=${account_id}`);

        // Attach event listeners to the increment and decrement buttons
        newItem.querySelector('.increment').addEventListener('click', handleIncrement);
        newItem.querySelector('.decrement').addEventListener('click', handleDecrement);

        // Set up listener for the "Save" button
        var saveNoteButton = newItem.querySelector('#saveNoteButton' + diaryName);
        console.log(diaryName);
        saveNoteButton.addEventListener('click', function () {
            var quantity = newItem.querySelector('#quantity' + diaryName).value;
            var note = newItem.querySelector('#noteText' + diaryName).value;
            var item_date = newItem.querySelector('#Date' + diaryName).value;
            var unit = newItem.querySelector('#unit' + diaryName).value;
        });

        // Apply warning border if quantity is smaller than the minimum quantity
        var minQuantityInput = document.getElementById('diary-quantity' + diaryName);
        var quantityContainer = document.getElementById('quantityContainer' + diaryName);

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



function addItemToMainContainerSelected(diaryId) {
    diaryName = diaryId.diary_id;
    const account_id = <?php echo json_encode($account_id); ?>;

    // Check if the item with the same name already exists in the main container
    var existingItem = document.getElementById("main-" + diaryName);

    const fileType = getFileType(diaryName);
    console.log(diaryName);
    if (!existingItem) {

        // Create a new list item for the main container
        var newItem = document.createElement('li');
        newItem.className = "item selectable selected"; 

        // Set innerHTML based on the selected item in the popup
        newItem.innerHTML = `
                <div class="button-container">
                <button onclick="openPopupMinQuantity('${diaryName}')" class="top-left-button with-icon" id="topLeftButton${diaryName}">define minimum quantity </button>
                    <div id="diary-popup${diaryName}" class="popup"> 
                        <div class="popup-content-diarys">
                            <span class="close" onclick="closePopupMinQuantity('${diaryName}')">&times;</span>
                            <h6> Minimum Quantity: </h6>
                            <p class="input-row">
                                <input type="number" id="diary-quantity${diaryName}" class="diary-quantity" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="diary-unit${diaryName}" class="diary-unit-select" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupMinQuantity('${diaryName}')" id="set${diaryName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>

                    </br>
                    <button onclick="openPopupAddToCart('${diaryName}')" class="top-left-button" id="topLeftButton-AddToCart${diaryName}" >Add To Cart</button>
                    <div id="diary-popup-addToCart${diaryName}" class="popup"> 
                        <div class="popup-content-diarys">
                            <span class="close" onclick="closePopupAddToCart('${diaryName}')">&times;</span>
                            <h6>Add To Cart: </h6>
                            <p class="input-row">
                                <input type="number" id="diary-quantity-addToCart${diaryName}" class="diary-quantity-addToCart" min="0" step="1" value="0" style="width: 60px; height:25px;">
                                <select id="diary-unit-addToCart${diaryName}" class="diary-unit-select-addToCart" style="width: 60px; height:25px;">
                                    <option value="units">units</option>
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                </select>
                            </p>
                            <button class="setBtn" onclick="closePopupAddToCart('${diaryName}')" id="set-addToCart${diaryName}" style="width: 60px; height:25px;"> set</button>
                        </div>
                    </div>
                <div>
                
                    <img src="diary/${diaryName}.${fileType}" onerror="this.src='diary/${diaryName}.jpeg'; this.onerror=null;" alt="${diaryName}">
                    <h2>${diaryName}</h2>
                    <div class="item-details">
                   
                        <p>Unit:
                            <select id="unit${diaryName}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>

                        </p>

                        <div class="quantity-container" id="quantityContainer${diaryName}">
                        <button class="decrement">
                            <i class="fas fa-minus"></i> 
                        </button>
                        <input type="number" id="quantity${diaryName}" class="quantity-input small-space" min="0" step="1" value="0" style="padding: 5px;">
                        <button class="increment">
                            <i class="fas fa-plus"></i> 
                        </button>
                        </div>

                        <div id="stickyNote${diaryName}" class="sticky-note">
                            <textarea id="noteText${diaryName}" class="note-text" placeholder="Write your note here..."></textarea>
                            <input id="Date${diaryName}" class="item-date" type="date">
                            <button id="saveNoteButton${diaryName}" class="save-button">Save</button>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i id="starIcon${diaryName}" class="far fa-star"></i> 
                    </div>
                `;

        // Update the ID to make it unique
        var newItemId = "main-" + diaryName;
        newItem.id = newItemId;

        // Reset the quantity input value
        newItem.querySelector('.quantity-input').value = "0";

        // Add the cloned item to the main container
        document.getElementById('main-container').appendChild(newItem);
                
 
        var xhr = new XMLHttpRequest();
        console.log("from addItemToMainContainerSelected");
        xhr.open("POST", "addDiary.php", true);

        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log the response from the server
                var jsonResponse = JSON.parse(xhr.responseText);
                // here I get the previous data from the diarys database !!! 

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
                var MinQuantityInput = document.getElementById('diary-quantity' + curFruit);
                MinQuantityInput.value = curMinQuantity;

                var curUnitMinQuantity = jsonResponse.existingUnitMinQuantity;
                var UnitMinQuantityInput = document.getElementById('diary-unit' + curFruit);
                UnitMinQuantityInput.value = curUnitMinQuantity;

                var curAddToCart = jsonResponse.existingAddToCart;
                var AddToCartInput = document.getElementById('diary-quantity-addToCart' + curFruit);
                AddToCartInput.value = curAddToCart;

                var curUnitAddToCart = jsonResponse.existingUnitAddToCart;
                var UnitAddToCartInput = document.getElementById('diary-unit-addToCart' + curFruit);
                UnitAddToCartInput.value = curUnitAddToCart;
                        
                var curDate = jsonResponse.existingDate;
                var DateInput = document.getElementById('Date' + curFruit);
                DateInput.value = curDate;

                var isStarred = jsonResponse.is_starred;
                var starIcon = document.getElementById('starIcon' + curFruit);
                if (isStarred == 1 && starIcon) {
                    starIcon.classList.remove('far');
                    starIcon.classList.add('fas');
                }

                // Apply warning border if quantity is smaller than the minimum quantity
                if (curQuantity < curMinQuantity) {
                    var quantityContainer = document.getElementById('quantityContainer' + curFruit);
                    quantityContainer.classList.add('warning');
                }
            }
        };
        xhr.send(`diaryName=${diaryName}&account_id=${account_id}`);

        // Attach event listeners to the increment and decrement buttons
        newItem.querySelector('.increment').addEventListener('click', handleIncrement);
        newItem.querySelector('.decrement').addEventListener('click', handleDecrement);

        // Set up listener for the "Save" button
        var saveNoteButton = newItem.querySelector('#saveNoteButton' + diaryName);
        console.log(diaryName);
        saveNoteButton.addEventListener('click', function () {
            var quantity = newItem.querySelector('#quantity' + diaryName).value;
            var note = newItem.querySelector('#noteText' + diaryName).value;
            var item_date = newItem.querySelector('#Date' + diaryName).value;
            var unit = newItem.querySelector('#unit' + diaryName).value;
        });

        // Apply warning border if quantity is smaller than the minimum quantity
        var minQuantityInput = document.getElementById('diary-quantity' + diaryName);
        var quantityInput = document.getElementById('quantity' + diaryName);
        var quantityContainer = document.getElementById('quantityContainer' + diaryName);

        quantityInput.addEventListener('input', function() {
            if (parseFloat(quantityInput.value) < parseFloat(minQuantityInput.value)) {
                quantityContainer.classList.add('warning');
            } else {
                quantityContainer.classList.remove('warning');
            }
        });

        // Apply warning border when the screen is up
        window.addEventListener('load', function() {
            // Declare variables inside the event listener function scope
            var quantityInput = document.getElementById('quantity' + diaryName);
            var minQuantityInput = document.getElementById('diary-quantity' + diaryName);
            var quantityContainer = document.getElementById('quantityContainer' + diaryName);
            
            if (quantityInput && minQuantityInput && quantityContainer) {
                if (parseFloat(quantityInput.value) < parseFloat(minQuantityInput.value)) {
                    quantityContainer.classList.add('warning');
                } else {
                    quantityContainer.classList.remove('warning');
                }
            } else {
                console.error('One or more elements not found.');
            }
        });

        // Add click event listener to toggle 'selected' class
        newItem.addEventListener('click', function(event) {
            if (event.target === this) {
                this.classList.toggle('selected');
            }
        });
    }
}




    </script>

</body>
</html>


