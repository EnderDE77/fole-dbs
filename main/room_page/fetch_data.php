<?php

$building = 'A';
$floor = 3; 
// $_GET['building'];
// $_GET['floor'];
require_once '../backend/people.model.php'; 
try {
    $roomDetails = findRoomsPerFloor($connection, $building, $floor);

    
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
    echo '</div';
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>
