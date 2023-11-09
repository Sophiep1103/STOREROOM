
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits and Vegetables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="fruits.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <h1 class="rounded-3">Fruits and Vegetables</h1>
    <ul class="items-container">

        <li class="item selectable" id="apples">
            <img src="fruits_pics/apple.jpg" alt="Apples">
            <h2>Red Apples</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                    <button class="decrement">
                        <i class="fas fa-minus"></i> 
                    </button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">
                        <i class="fas fa-plus"></i> 
                    </button>

                    <div id="stickyNote" class="sticky-note">
                        <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                        <input class="item-date" type="date">
                        <button id="saveNoteButton" class="save-button">Save</button>
                    </div> 
            </div>
            <div class="favorite">
                <i class="far fa-star"></i> 
            </div>
        </li>


        <li class="item selectable" id="apples">
            <img src="fruits_pics/apple.jpg" alt="Apples">
            <h2>Red Apples</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p>
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        <li class="item selectable" id="bananas">
            <img src="fruits_pics/banana.jpg" alt="Bananas">
            <h2>Bananas</h2>
            <div class ="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>

                    </select>
                </p>
                <p>
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i> 
            </div>
        </li>

        <li class="item selectable" id="lemons">
            <img src="fruits_pics/lemon.jpg" alt="Lemon">
            <h2>Lemon</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p>
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i> 
            </div>
        </li>

        <li class="item selectable" id="oranges">
            <img src="fruits_pics/orange.jpg" alt="Oranges">
            <h2>Oranges</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p> 
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i> 
            </div>
        </li>

        <li class="item selectable" id="green_apple">
            <img src="fruits_pics/green_apple.jpg" alt="Green Apples">
            <h2>Green Apples</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>

                    </select>
                </p>
                <p>
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        <li class="item selectable" id="mango">
            <img src="fruits_pics/mango.jpg" alt="Mango">
            <h2>Mango</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>

                    </select>
                </p>
                <p>
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        <li class="item selectable" id="pomegranate">
            <img src="fruits_pics/pomegranate.jpg" alt="Pomegranate">
            <h2>Pomegranate</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p>
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        <li class="item selectable" id="avocado">
            <img src="fruits_pics/avocado.jpg" alt="Avocado">
            <h2>Avocado</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p>
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i> 
            </div>
        </li>

        <li class="item selectable" id="persimmon">
            <img src="fruits_pics/persimmon.jpg" alt="Persimmon">
            <h2>Persimmon</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>

                    </select>
                </p>
                <p>
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>


        <li class="item selectable" id="pomelo">
            <img src="fruits_pics/pomelo.jpg" alt="Pomelo">
            <h2>Pomelo</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p> 
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i> 
            </div>
        </li>

        <li class="item selectable" id="red_pomelo">
            <img src="fruits_pics/red_pomelo.jpg" alt="Red_Pomelo">
            <h2>Red Pomelo</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p> 
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        <li class="item selectable" id="watermelon">
            <img src="fruits_pics/watermelon.jpg" alt="Watermelon">
            <h2>Watermelon</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p> 
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        <li class="item selectable" id="melon">
            <img src="fruits_pics/melon.jpeg" alt="Melon">
            <h2>Melon</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p> 
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        <li class="item selectable" id="black_grapes">
            <img src="fruits_pics/black_grapes.jpg" alt="black_grapes">
            <h2>Black Grapes</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p> 
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        <li class="item selectable" id="green_grapes">
            <img src="fruits_pics/green_grapes.jpg" alt="green_grapes">
            <h2>Green Grapes</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p> 
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i> 
            </div>
        </li>

        <li class="item selectable" id="pineapple">
            <img src="fruits_pics/pineapple.jpg" alt="pineapple">
            <h2>Pineapple</h2>
            <div class="item-details">
                <p>Unit:
                    <select class="unit-select">
                        <option value="units">units</option>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                    </select>
                </p>
                <p> 
                    <button class="decrement">-</button>
                    <input type="number" class="quantity-input small-space" min="0" step="0.1" value="0.0">
                    <button class="increment">+</button>
                </p>
                <div id="stickyNote" class="sticky-note">
                    <textarea id="noteText" class="note-text" placeholder="Write your note here..."></textarea>
                    <input class="item-date" type="date">
                    <button id="saveNoteButton" class="save-button">Save</button>
                </div>
            </div>
            <div class="favorite">
                <i class="far fa-star"></i>
            </div>
        </li>

        <div class="extra_item"></div>

    </ul>

    <button id="saveButton">Save</button>
    <a href="shopping_cart.php" class="show-left-arrow-button">
        <button id="addToCartButton">
            <i class="fas fa-arrow-left"></i>
        </button>
    </a>

    <script>

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

    // Get references to all selectable items
    const selectableItems = document.querySelectorAll(".selectable");

    // Add a click event listener to each item
    selectableItems.forEach(item => {
        item.addEventListener("click", () => {
            // Toggle the 'selected' class when the item is clicked
            item.classList.toggle("selected");
        });
    });

    // Function to check if at least one item is selected
    function isAtLeastOneItemSelected() {
            const selectedItems = document.querySelectorAll(".selected");
            return selectedItems.length > 0;
        }

        // Get a reference to the left arrow button
        const leftArrowButton = document.getElementById("leftArrowButton");

        // Add an event listener to check for selected items and show/hide the button
        document.addEventListener("click", function () {
            if (isAtLeastOneItemSelected()) {
                leftArrowButton.style.display = "block"; // Show the button
            } else {
                leftArrowButton.style.display = "none"; // Hide the button
            }
        });

    // Add a click event listener to the "favorite" elements to toggle the "starred" class
    const favoriteItems = document.querySelectorAll(".favorite");
    favoriteItems.forEach(favorite => {
        favorite.addEventListener("click", (event) => {
        favorite.classList.toggle("starred");
        event.stopPropagation(); // Prevent the click event from propagating to the parent item
        });
    });


    // Get a reference to the "Add to Cart" button
    const addToCartButton = document.getElementById("addToCartButton");

    // Add a click event listener to the button
    addToCartButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the default behavior of the anchor tag

    // Get the names of selected (not starred) items
    const selectedItems = document.querySelectorAll(".selected:not(.starred)");
    const itemNames = [];

    selectedItems.forEach(item => {
        const itemName = item.querySelector("h2").textContent.trim();
        itemNames.push(itemName);
    });

    // Send the data to the server using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "save_to_shopping_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server if needed
            // For example, you can redirect to the shopping cart page
            window.location.href = "selected_items.php";
        }
    };

    // Convert the item names to a JSON string and send it in the request body
    xhr.send(JSON.stringify(itemNames));
    });

    </script>

</body>
</html>


