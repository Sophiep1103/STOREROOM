<?php
/*
    // General event listener for the "Save" button
    document.getElementById("saveButton").addEventListener("click", function () {
        var quantityInput = document.querySelector(".quantity-input");
        var noteText = document.querySelector(".note-text");
        var itemDate = document.querySelector(".item-date");

        if (quantityInput && noteText && itemDate) {
            var quantity = quantityInput.value;
            var note = noteText.value;
            var item_date = itemDate.value;
        }else {
            console.error("One or more elements not found");
        }
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
*/

/*
    function fetchSavedData() {
        fetch('fruit_fetch-data.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // assuming you are returning plain text from the server
        })
     //   .then(data => {
      //      updateSavedInfo(data);
     //   })
        .catch(error => {
            console.error('Error:', error);
        });
    }
*/

    /*
function updateSavedInfo(data) {
    var savedInfoContainer = document.getElementById("savedInfo");
    if(savedInfoContainer){
        savedInfoContainer.innerHTML = ""; // Clear existing data
    }
    else{
        console.error("Element with ID 'savedInfo' not found");
    }

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

    // Check if the item is starred and add its name to the array
    favoriteIcons.forEach(icon => {
        if (icon.classList.contains("fas")) {
            const itemName = icon.closest(".item").querySelector('img').alt;
            starredItems.push(itemName);
        }
    });

    // Save the array of starred items in localStorage
    localStorage.setItem("starredItems", JSON.stringify(starredItems));

}
*/
/*
// Fetch and display saved data on page load
    document.addEventListener('DOMContentLoaded', function () {
        fetchSavedData();
    });
*/




/*
// Function to handle changes in item information
function handleItemChange(event) {
    const targetElement = event.target;

    // Identify the parent item
    const item = targetElement.closest('.item');

    const isStarClicked = targetElement.classList.contains('favorite') || targetElement.closest('.favorite');
    console.log(isStarClicked );

    if (item && isStarClicked !== null) {
        
        // Extract relevant information from the item
        const fruitId = item.id.replace('main-', '');
        const quantity = item.querySelector('.quantity-input').value;
        const note = item.querySelector('.note-text').value;
        // Log the date element to check if it's correctly identified
        const dateElement = item.querySelector('.item-date');


        // Extract the date value
        const date = dateElement ? dateElement.value : '';


        const unit = item.querySelector('.unit-select').value;

        const isStarred = item.querySelector('.favorite i').classList.contains('fas');
        const isSelected = item.classList.contains('selected');
        const account_id = <?php echo json_encode($account_id); ?>;

        const fruit_quantity = item.querySelector('.fruit-quantity').value;
        const fruit_unit_select = item.querySelector('.fruit-unit-select').value;

        const fruit_quantity_addToCart = item.querySelector('.fruit-quantity-addToCart').value;
        const fruit_unit_select_addToCart = item.querySelector('.fruit-unit-select-addToCart').value;

        
        // Use AJAX or another method to send the data to addItem.php
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'addItem.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
            }
        };

        // Encode data and send the request
        const data = `fruitName=${fruitId}&fruit_quantity=${fruit_quantity}&fruit_unit_select=${fruit_unit_select}&account_id=${account_id}&quantity=${quantity}&note=${note}&unit=${unit}&isStarred=${isStarred}&is_selected=${isSelected}&date=${date}&fruit_quantity_addToCart=${fruit_quantity_addToCart}&fruit_unit_select_addToCart=${fruit_unit_select_addToCart}`;
        xhr.send(data);


    // Log the changes to the console
    console.log(`Item changed: ${fruitId}, Quantity: ${quantity}, Starred: ${isStarred}, Selected: ${isSelected}, Date: ${date}`);
       
    }

    
    if (item && isStarClicked === null) {
        
        // Extract relevant information from the item
        const fruitId = item.id.replace('main-', '');
        const quantity = item.querySelector('.quantity-input').value;
        const note = item.querySelector('.note-text').value;
        // Log the date element to check if it's correctly identified
        const dateElement = item.querySelector('.item-date');


        // Extract the date value
        const date = dateElement ? dateElement.value : '';


        const unit = item.querySelector('.unit-select').value;

        const isStarred = item.querySelector('.favorite i').classList.contains('fas');
        const isSelected = item.classList.contains('selected');
        const account_id = <?php echo json_encode($account_id); ?>;

        const fruit_quantity = item.querySelector('.fruit-quantity').value;
        const fruit_unit_select = item.querySelector('.fruit-unit-select').value;

        const fruit_quantity_addToCart = item.querySelector('.fruit-quantity-addToCart').value;
        const fruit_unit_select_addToCart = item.querySelector('.fruit-unit-select-addToCart').value;

        
        // Use AJAX or another method to send the data to addItem.php
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'addItem.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
            }
        };

        // Encode data and send the request
        const data = `fruitName=${fruitId}&fruit_quantity=${fruit_quantity}&fruit_unit_select=${fruit_unit_select}&account_id=${account_id}&quantity=${quantity}&note=${note}&unit=${unit}&is_selected=${isSelected}&date=${date}&fruit_quantity_addToCart=${fruit_quantity_addToCart}&fruit_unit_select_addToCart=${fruit_unit_select_addToCart}`;
        xhr.send(data);


    // Log the changes to the console
    console.log(`Item changed: ${fruitId}, Quantity: ${quantity}, Starred: ${isStarred}, Selected: ${isSelected}, Date: ${date}`);
       
    }
}
*/
?>