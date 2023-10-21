<?php
require_once  '../backend/people.model.php';



// Retrieve the room ID from the query parameter.
if (isset($_GET['id'])) {
    $roomId = $_GET['id'];

    $roomDetails = getRoomDetails($connection, $roomId);

    if ($roomDetails) {

        echo '<form method="POST" action="fetch_data.php">';
        echo '        <input readonly hidden name = "direction" value = "Edit">';
        echo '<label for="type">Type:</label>';
        echo '<input type="text" name="type" value="' . $roomDetails['type'] . '" required><br>';
        
        echo '<label for="price">Price:</label>';
        echo '<input type="number" name="price" value="' . $roomDetails['price'] . '" required><br>';
        
        echo '<label for="building">Building:</label>';
        echo '<input type="text" name="building" value="' . $roomDetails['building'] . '" required><br>';
        
        echo '<label for="floor">Floor:</label>';
        echo '<input type="number" name="floor" value="' . $roomDetails['floor'] . '" required><br>';
        
        echo '<label for="number">Number:</label>';
        echo '<input type="text" name="number" value="' . $roomDetails['number'] . '" required><br>';
        
        echo '<label for="status">Status:</label>';
        echo '<input type="text" name="status" value="' . $roomDetails['status'] . '" required><br>';
        
        echo '<label for="startDate">Start Date:</label>';
        echo '<input type="date" name="startDate" value="' . $roomDetails['startDate'] . '"><br>';
        
        echo '<label for="endDate">End Date:</label>';
        echo '<input type="date" name="endDate" value="' . $roomDetails['endDate'] . '"><br>';
    } else {
        echo 'Room not found.';
    }
    // Sample form structure:
    echo '<form method="POST" action="edit_room.php">';
    echo '<input type="hidden" name="room_id" value="' . $roomId . '">';
    
    // Populate the form fields with existing room data and allow users to update them.

    // Add a "Save" button to update the room.
    echo '<button type="submit">Save</button>';
    
    echo '</form>';
} else {
    echo 'Invalid room ID.';
}

