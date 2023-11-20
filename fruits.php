<?php
    $user = $_GET['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="fruits.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <h1>Fruits</h1>
    <!-- search bar (to the main container)-->
    <div class="search-wrapper">
        <label for="search" >Fruits Search:</label>
        <input type="search" id="search" data-search  placeholder="enter a fruit" oninput="searchItems()">
    </div>

    <!-- pop up window -->
    <button onclick="openPopup()" class="open-button" id= "open-window-btn">Open List of fruits</button>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h3>Fruits List:</h3>
            
           
            <div class="search-wrapper-window">
                <label for="search">Fruits Search:</label>
                <input type="search" id="search-window" data-search  placeholder="enter a fruit" oninput="searchItemsWindow()">
            </div>
            
      
            <ul class="items-container-window">
               
                <li class="selectable-window" id="apples-window" onclick="selectItem('apples-window')">
                <img src="fruits_pics/apple.jpg" alt="RedApples">
                <p>Red Apples</p>
                </li>

                <li class="selectable-window" id="Bananas-window" onclick="selectItem('Bananas-window')">
                <img src="fruits_pics/banana.jpg" alt="Bananas">
                <p>Bananas</p>
                </li>

                <li class="selectable-window" id="lemons-window" onclick="selectItem('lemons-window')">
                <img src="fruits_pics/lemon.jpg" alt="Lemon">
                <p>Lemon</p>
                </li>

                <li class="selectable-window" id="oranges-window" onclick="selectItem('oranges-window')">
                <img src="fruits_pics/orange.jpg" alt="Oranges">
                <p>Oranges</p>
                </li>

                <li class="selectable-window" id="green_apple-window" onclick="selectItem('green_apple-window')">
                <img src="fruits_pics/green_apple.jpg" alt="Green Apples">
                <p>Green Apples</p>
                </li>

                <li class="selectable-window" id="mango-window" onclick="selectItem('mango-window')">
                <img src="fruits_pics/mango.jpg" alt="Mango">
                <p>Mango</p>
                </li>

                <li class="selectable-window" id="pomegranate-window" onclick="selectItem('pomegranate-window')">
                <img src="fruits_pics/pomegranate.jpg" alt="Pomegranate">
                <p>Pomegranate</p>
                </li>

                <li class="selectable-window" id="avocado-window" onclick="selectItem('avocado-window')">
                <img src="fruits_pics/avocado.jpg" alt="Avocado">
                <p>Avocado</p>
                </li>

                <li class="selectable-window" id="persimmon-window" onclick="selectItem('persimmon-window')">
                <img src="fruits_pics/persimmon.jpg" alt="Persimmon">
                <p>Persimmon</p>
                </li>

                <li class="selectable-window" id="pomelo-window" onclick="selectItem('pomelo-window')">
                <img src="fruits_pics/pomelo.jpg" alt="Pomelo">
                <p>Pomelo</p>
                </li>

                <li class="selectable-window" id="red_pomelo-window" onclick="selectItem('red_pomelo-window')">
                <img src="fruits_pics/red_pomelo.jpg" alt="Red_Pomelo">
                <p>Red Pomelo</p>
                </li>

                <li class="selectable-window" id="watermelon-window" onclick="selectItem('watermelon-window')">
                <img src="fruits_pics/watermelon.jpg" alt="Watermelon">
                <p>Watermelon</p>
                </li>

                <li class="selectable-window" id="melon-window" onclick="selectItem('melon-window')">
                <img src="fruits_pics/melon.jpeg" alt="Melon">
                <p>Melon</p>
                </li>

                <li class="selectable-window" id="black_grapes-window" onclick="selectItem('black_grapes-window')">
                <img src="fruits_pics/black_grapes.jpg" alt="black_grapes">
                <p>Black Grapes</p>
                </li>

                <li class="selectable-window" id="green_grapes-window" onclick="selectItem('green_grapes-window')">
                <img src="fruits_pics/green_grapes.jpg" alt="green_grapes">
                <p>Green Grapes</p>
                </li>

                <li class="selectable-window" id="pineapple-window" onclick="selectItem('pineapple-window')">
                <img src="fruits_pics/pineapple.jpg" alt="pineapple">
                <p>Pineapple</p>
                </li>

            </ul>

            <button onclick="addItemToMainContainer()">Add to Main Container</button>
        </div>
    </div>
    <!-- end pop up window -->

    <!-- main container -->
    <ul class="items-container" id="main-container">
    
    <li class="item selectable" id="apples">
            <img src="fruits_pics/apple.jpg" alt="Apples">
            <h2>Red Apples</h2>
            <div class="item-details">
                <p>Unit:
                    <select id="unitApple" class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p>
                    <!-- Quantity input -->
                    <button class="decrement">-</button>
                    <input id="quantityApple" type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <!-- Note textarea -->
                <div id="stickyNoteApple" class="sticky-note">
                    <textarea id="noteTextApple" class="note-text" placeholder="Write your note here..."></textarea>
                    <!-- Item date input -->
                    <input id="DateApple" class="item-date" type="date">
                    <button id="saveNoteButtonApple" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        
    </ul>

        <button id="saveButton">Save</button>

    <script>
    // Assuming you have a list of fruit IDs
    var fruitIds = ["Apple", "Banana", "Lemon", "Orange", "GreenApple", "Mango", "Pomegranate", "Avocado", "Persimmon", "Pomelo", "RedPomelo", "Watermelon", "Melon", "BlackGrapes", "GreenGrapes", "Pineapple"];

    // Loop through each fruit ID and set up event listeners
    fruitIds.forEach(function (fruitId) {
        var saveButton = document.getElementById("saveNoteButton" + fruitId);

        if (saveButton) {
            saveButton.addEventListener("click", function () {
                var quantity = document.getElementById("quantity" + fruitId).value;
                var note = document.getElementById("noteText" + fruitId).value;
                var item_date = document.getElementById("Data" + fruitId).value;

                console.log("Fruit ID:", fruitId);
                console.log("Quantity:", quantity);
                console.log("Note:", note);
                console.log("Item Date:", item_date);
                // Additional logic or send data to the server for this specific fruit
            });
        }
    });

    // General event listener for the "Save" button
    document.getElementById("saveButton").addEventListener("click", function () {
        var quantity = document.getElementById("quantity-input").value;
        var note = document.getElementById("noteText").value;
        var item_date = document.getElementById("item_date").value;

        console.log("Sending general data to server...");

        fetch('fruit_save-info.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'quantity=' + encodeURIComponent(quantity) + '&note=' + encodeURIComponent(note) + '&item_date=' + encodeURIComponent(item_date),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // assuming you are returning plain text from the server
        })
        .then(data => {
            console.log("General data saved successfully:", data);
            // Fetch and display the saved data
            fetchSavedData();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    function fetchSavedData() {
        fetch('fruit_fetch-data.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // assuming you are returning plain text from the server
        })
        .then(data => {
            updateSavedInfo(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
/*
    function updateSavedInfo(data) {
        var savedInfoContainer = document.getElementById("savedInfo");
        savedInfoContainer.innerHTML = ""; // Clear existing data

        var quantity = data.quantity || "Not available";
        var note = data.note || "Not available";
        var item_date = data.item_date || "Not available";

        savedInfoContainer.innerHTML = `
            <h2>Saved Information:</h2>
            <p><strong>Quantity:</strong> ${quantity}</p>
            <p><strong>Note:</strong> ${note}</p>
            <p><strong>Date:</strong> ${item_date}</p>
        `;
    }

*/

function updateSavedInfo(data) {
    var savedInfoContainer = document.getElementById("savedInfo");
    savedInfoContainer.innerHTML = ""; // Clear existing data

    var quantity = data.quantity || "Not available";
    var note = data.note || "Not available";
    var item_date = data.item_date || "Not available";

    savedInfoContainer.innerHTML = `
        <h2>Saved Information:</h2>
        <p><strong>Quantity:</strong> ${quantity}</p>
        <p><strong>Note:</strong> ${note}</p>
        <p><strong>Date:</strong> ${item_date}</p>`;

    // Get references to all favorite star icons
    const favoriteIcons = document.querySelectorAll(".favorite i");

    // Array to store the names of starred items
    const starredItems = [];

    // Check if the item is starred and add its name to the array
    favoriteIcons.forEach(icon => {
        if (icon.classList.contains("fas")) {
            const itemName = icon.closest(".item").querySelector('img').alt;
            starredItems.push(itemName);
        }
    });

    // Save the array of starred items in localStorage
    localStorage.setItem("starredItems", JSON.stringify(starredItems));

    // Check if there are starred items and add them to the main container
    if (starredItems.length > 0) {
        starredItems.forEach(itemName => {
            const item = document.querySelector(`.item img[alt="${itemName}"]`).closest(".item");
            if (item) {
                addItemToMainContainerFromStar(item);
            }
        });
    }
}

//new
// Fetch and display saved data on page load
document.addEventListener('DOMContentLoaded', function () {
    fetchSavedData();

    // Load the array of starred items from localStorage
    const starredItems = JSON.parse(localStorage.getItem("starredItems")) || [];

    // Add the starred items to the main container
    if (starredItems.length > 0) {
        starredItems.forEach(itemName => {
            const item = document.querySelector(`.item img[alt="${itemName}"]`).closest(".item");
            if (item) {
                addItemToMainContainerFromStar(item);
            }
        });
    }
});
//new
// Function to add an item to the main container when starred
function addItemToMainContainer() {
    // Get all selected items in the popup
    var selectedItems = document.querySelectorAll('.selectable-window.selected-frame');

    if (selectedItems.length > 0) {
        // Iterate through each selected item
        selectedItems.forEach(function(selectedItem) {
            // Get the fruit name (assuming it's in the alt attribute of the image)
            var fruitName = selectedItem.querySelector('img').alt;

            // Check if the item with the same name already exists in the main container
            var existingItem = document.getElementById("main-" + fruitName);

            // Check if the item is already starred
            var isStarred = selectedItem.querySelector('.favorite i').classList.contains("fas");

            if (!existingItem && !isStarred) {
                // Create a new list item for the main container
                var newItem = document.createElement('li');
                newItem.className = "item selectable";

                // Set innerHTML based on the selected item in the popup
                newItem.innerHTML = `
                    <img src="${selectedItem.querySelector('img').src}" alt="${selectedItem.querySelector('img').alt}">
                    <h2>${selectedItem.querySelector('p').innerText}</h2>
                    <div class="item-details">
                        <p>Unit:
                            <select id="unit${uniqueIdCounter}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>
                        </p>
                        <button class="decrement">
                            <i class="fas fa-minus"></i> 
                        </button>
                        <input type="number" id="quantity${uniqueIdCounter}" class="quantity-input small-space" min="0" step="1" value="0">
                        <button class="increment">
                            <i class="fas fa-plus"></i> 
                        </button>

                        <div id="stickyNote" class="sticky-note">
                            <textarea id="noteText${uniqueIdCounter}" class="note-text" placeholder="Write your note here..."></textarea>
                            <input id="Date${uniqueIdCounter}" class="item-date" type="date">
                            <button id="saveNoteButton" class="save-button">Save</button>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i class="far fa-star"></i> 
                    </div>
                `;

                // Update the ID to make it unique
                var newItemId = "main-" + fruitName;
                newItem.id = newItemId;

                // Increment the counter for the next iteration
                uniqueIdCounter++;

                // Reset the quantity input value
                newItem.querySelector('.quantity-input').value = "0";

                // Remove the 'selected-frame' class from the cloned item
                selectedItem.classList.remove('selected-frame');

                // Add the cloned item to the main container
                document.getElementById('main-container').appendChild(newItem);

                // Attach event listeners to the increment and decrement buttons
                newItem.querySelector('.increment').addEventListener('click', handleIncrement);
                newItem.querySelector('.decrement').addEventListener('click', handleDecrement);
            } else {
                // Alert or notify the user that the item already exists in the main container or is starred
                if (isStarred) {
                    alert("Item '" + fruitName + "' is already starred.");
                } else {
                    alert("Item '" + fruitName + "' is already in the main container.");
                }
            }
        });

        // Close the popup
        closePopup();
    }
}


    // Fetch and display saved data on page load
    document.addEventListener('DOMContentLoaded', function () {
        fetchSavedData();
    });

        // Function to handle parsing the quantity based on the selected unit
        function parseQuantity(input, unit) {
            if (unit === "units") {
                return parseInt(input);
            } else {
                return parseFloat(input);
            }
        }

        // Set "kg" as the default unit
        function setDefaultUnit(unitSelect) {
            unitSelect.value = "kg";
        }
        

        // Get references to the input fields, unit selects, and buttons for all items
        const items = document.querySelectorAll(".item");




        //check!!!
        // Load saved quantities from local storage
        const savedQuantities = JSON.parse(localStorage.getItem("quantities")) || {};

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
        //end check!!!

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

        //check
        // Save the date when the user changes it
        itemDateInputs.forEach(dateInput => {
            dateInput.addEventListener("change", function () {
                const itemName = dateInput.nextElementSibling.textContent.trim(); // Get the item name
                const newDate = dateInput.value; // Get the updated date
                // Save the updated date to local storage or wherever you prefer
                // You can use a similar approach as saving quantities.
            });
        });

        // Get references to the favorite star icons
        const favoriteIcons = document.querySelectorAll(".favorite i");
/*
        // Add event listeners to the favorite icons
        favoriteIcons.forEach(icon => {
            icon.addEventListener("click", function () {
                icon.classList.toggle("fas"); // Toggle the "fas" class to switch between empty and full star
                icon.classList.toggle("far");
                if (icon.classList.contains("fas")) {
                    icon.style.color = "#f1c40f"; // Set the color to yellow for a full star
                } else {
                    icon.style.color = "#999"; // Set the color to the default for an empty star
                }
            });
        });

*/

        // Add event listeners to the favorite icons
favoriteIcons.forEach(icon => {
    icon.addEventListener("click", function () {
        icon.classList.toggle("fas"); // Toggle the "fas" class to switch between empty and full star
        icon.classList.toggle("far");
        if (icon.classList.contains("fas")) {
            icon.style.color = "#f1c40f"; // Set the color to yellow for a full star
            const item = icon.closest(".item");
            addItemToMainContainerFromStar(item);
        } else {
            icon.style.color = "#999"; // Set the color to the default for an empty star
            const itemName = icon.closest(".item").querySelector('img').alt;
            const mainItem = document.getElementById("main-" + itemName);
            if (mainItem) {
                mainItem.remove(); // Remove the item from the main container
            }
        }
    });
});






        // Get references to all selectable items
        const selectableItems = document.querySelectorAll(".selectable");


        // Function to check if at least one item is selected
        function isAtLeastOneItemSelected() {
                const selectedItems = document.querySelectorAll(".selected");
                return selectedItems.length > 0;
        }



    // Add a click event listener to the "favorite" elements to toggle the "starred" class
    const favoriteItems = document.querySelectorAll(".favorite");
    favoriteItems.forEach(favorite => {
        favorite.addEventListener("click", (event) => {
        favorite.classList.toggle("starred");
        event.stopPropagation(); // Prevent the click event from propagating to the parent item
        });
    });

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
    // Get all selected items in the popup
    var selectedItems = document.querySelectorAll('.selectable-window.selected-frame');

    if (selectedItems.length > 0) {
        // Iterate through each selected item
        selectedItems.forEach(function(selectedItem) {
            // Get the fruit name (assuming it's in the alt attribute of the image)
            var fruitName = selectedItem.querySelector('img').alt;

            // Check if the item with the same name already exists in the main container
            var existingItem = document.getElementById("main-" + fruitName);

            if (!existingItem) {
                // Create a new list item for the main container
                var newItem = document.createElement('li');
                newItem.className = "item selectable";

                // Set innerHTML based on the selected item in the popup
                newItem.innerHTML = `
                    <img src="${selectedItem.querySelector('img').src}" alt="${selectedItem.querySelector('img').alt}">
                    <h2>${selectedItem.querySelector('p').innerText}</h2>
                    <div class="item-details">
                        <p>Unit:
                            <select id="unit${uniqueIdCounter}" class="unit-select">
                                <option value="units">units</option>
                                <option value="kg">kg</option>
                                <option value="gram">gram</option>
                            </select>
                        </p>
                        <button class="decrement">
                            <i class="fas fa-minus"></i> 
                        </button>
                        <input type="number" id="quantity${uniqueIdCounter}" class="quantity-input small-space" min="0" step="1" value="0">
                        <button class="increment">
                            <i class="fas fa-plus"></i> 
                        </button>

                        <div id="stickyNote" class="sticky-note">
                            <textarea id="noteText${uniqueIdCounter}" class="note-text" placeholder="Write your note here..."></textarea>
                            <input id="Date${uniqueIdCounter}" class="item-date" type="date">
                            <button id="saveNoteButton" class="save-button">Save</button>
                        </div> 
                    </div>
                    <div class="favorite">
                        <i class="far fa-star"></i> 
                    </div>
                `;

                // Update the ID to make it unique
                var newItemId = "main-" + fruitName;
                newItem.id = newItemId;

                // Increment the counter for the next iteration
                uniqueIdCounter++;

                // Reset the quantity input value
                newItem.querySelector('.quantity-input').value = "0";

                // Remove the 'selected-frame' class from the cloned item
                selectedItem.classList.remove('selected-frame');

                // Add the cloned item to the main container
                document.getElementById('main-container').appendChild(newItem);

                // Attach event listeners to the increment and decrement buttons
                newItem.querySelector('.increment').addEventListener('click', handleIncrement);
                newItem.querySelector('.decrement').addEventListener('click', handleDecrement);
            } else {
                // Alert or notify the user that the item already exists in the main container
                alert("Item '" + fruitName + "' is already in the main container.");
            }
        });

        // Close the popup
        closePopup();
    }
}

// Function to handle the increment button click
function handleIncrement() {
    var quantityInput = this.parentNode.querySelector('.quantity-input');
    var selectedUnit = this.parentNode.querySelector('.unit-select').value;

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
    var quantityInput = this.parentNode.querySelector('.quantity-input');
    var selectedUnit = this.parentNode.querySelector('.unit-select').value;

    if (selectedUnit === 'kg' && parseFloat(quantityInput.value) >= 0.1) {
        quantityInput.value = (parseFloat(quantityInput.value) - 0.1).toFixed(1);
    } else if (selectedUnit === 'gram' && parseFloat(quantityInput.value) >= 0.100) {
        quantityInput.value = (parseFloat(quantityInput.value) - 0.100).toFixed(3);
    } else if (parseInt(quantityInput.value, 10) > 0) {
        quantityInput.value = parseInt(quantityInput.value, 10) - 1;
    }
}


// Add a click event listener to each item
selectableItems.forEach(item => {
    item.addEventListener("click", event => {
        // Check if the clicked element or any of its ancestors is the note or star
        const isNoteOrStar = event.target.closest('.sticky-note, .favorite');
        
        if (!isNoteOrStar) {
            // Toggle the 'selected' class when the item is clicked
            item.classList.toggle("selected");
        }
    });
});



// Add a click event listener to the main container
document.getElementById('main-container').addEventListener('click', function(event) {
    // Check if the clicked element or any of its ancestors is an item
    const clickedItem = event.target.closest('.item');

    if (clickedItem) {
        // Check if the clicked element is not the increment, decrement, unit select, note textarea, star icon, date input, or save button
        const isNotInteractiveElement = !event.target.matches('.increment, .decrement, .unit-select, .note-text, .favorite i, .item-date, .save-button');

        if (isNotInteractiveElement) {
            // Toggle the 'selected' class when the item is clicked outside of interactive elements
            clickedItem.classList.toggle('selected');
        }
    }

    // Check if the clicked element or any of its ancestors is the favorite icon
    const clickedStar = event.target.closest('.favorite i');

    if (clickedStar) {
        // Toggle the 'fas' and 'far' classes on the clicked star
        clickedStar.classList.toggle('fas');
        clickedStar.classList.toggle('far');

        // Toggle the color of the star
        if (clickedStar.classList.contains('fas')) {
            clickedStar.style.color = '#f1c40f'; // Set the color to yellow for a full star
        } else {
            clickedStar.style.color = '#999'; // Set the color to the default for an empty star
        }
    }
});


    </script>

</body>
</html>


