<?php
require_once "../backend/people.model.php";

$building = '';
$floor = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['direction'] == "Edit"){
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
}
else if($_POST['direction'] == "Add"){
    // Retrieve and sanitize form data
    $type = $_POST['type'];
    $price = $_POST['price'];
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $number = $_POST['number'];
    $status = "Available";
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // SQL query to insert data into the room table
    $sql = "INSERT INTO room (type, price, building, floor, number, status, startDate, endDate)
            VALUES (:type, :price, :building, :floor, :number, :status, :startDate, :endDate)";

    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':building', $building);
    $stmt->bindParam(':floor', $floor);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':startDate', $startDate);
    $stmt->bindParam(':endDate', $endDate);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Data added to the room table successfully.";
    } else {
        echo "Failed to add data to the room table.";
    }
}
    // After updating the room, you can redirect back to the index page.
}
if(isset($_GET['building']) && isset($_GET['floor'])){
$building = $_GET['building'];
$floor = $_GET['floor'];
}
else if(isset($_POST['building']) && isset($_POST['floor'])){
$building = $_POST['building'];
$floor = $_POST['floor'];
}


require_once '../backend/people.model.php'; 
try {
    $roomDetails = getRoomsPerFloor($connection, $building, $floor);

    
    echo '<div id="dataContainer">';
    foreach ($roomDetails as $row) {
        echo '<p>ID: ' . $row['id'] . '</p>';
        echo '<p>Type: ' . $row['type'] . '</p>';
        echo '<p>Price: $' . $row['price'] . '</p>';
        echo '<p>Building: ' . $row['building'] . '</p>';
        echo '<p>Floor: ' . $row['floor'] . '</p>';
        echo '<p>Number: ' . $row['number'] . '</p>';
        echo '<p>Status: ' . $row['status'] . '</p>';
        if(isset($row['startDate'])&& $row['startDate'] != '0000-00-00')
        {
            echo '<p>Start Date: ' . date("F-Y", strtotime($row['startDate'])) . '</p>';
        }
        if(isset($row['endDate']) && $row['endDate'] != '0000-00-00')
        {
         echo '<p>End Date: ' . date("F-Y", strtotime($row['endDate'])) . '</p>';
        }
        if(isset($row['startDate'])&& $row['startDate'] != '0000-00-00' &&
        isset($row['endDate']) && $row['endDate'] != '0000-00-00')
        {
            $startDate = new DateTime($row['startDate']);
            $endDate = new DateTime($row['endDate']);
            $interval = $startDate->diff($endDate);
            $durationInMonths = $interval->y * 12 + $interval->m;

echo '<p>Duration: ' . $durationInMonths . ' months</p>';

        }
        echo '<a href="edit_room.php?id=' . $row['id'] . '">Edit</a>';
        echo '<hr>';
    }
    echo '</div>';
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>
