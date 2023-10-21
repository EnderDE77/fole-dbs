<?php
require_once  '../backend/people.model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission to update the room details in the database.
    $roomId = $_POST['room_id']; // Get the room ID from the form
    
    // Capture the values from the form input fields
    $type = $_POST['type'];
    $price = $_POST['price'];
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $number = $_POST['number'];
    $status = $_POST['status'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    
    // Call the updateRoomDetails function with the captured values
    updateRoomDetails($connection, $roomId, $type, $price, $building, $floor, $number, $status, $startDate, $endDate);

    // After updating the room, you can redirect back to the index page.
    header('Location: room.html'); // Adjust the URL as needed.
    exit;
}


// Retrieve the room ID from the query parameter.
if (isset($_GET['id'])) {
    $roomId = $_GET['id'];

    $roomDetails = getRoomDetails($connection, $roomId);

    if ($roomDetails) {

        echo '<form method="POST" action="">';
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
        echo '<input type="date" name="startDate" value="' . $roomDetails['startDate'] . '" required><br>';
        
        echo '<label for="endDate">End Date:</label>';
        echo '<input type="date" name="endDate" value="' . $roomDetails['endDate'] . '" required><br>';
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

// Add a button to return to the index page.
echo '<a href="room.html">Back to Index</a>';
?>
