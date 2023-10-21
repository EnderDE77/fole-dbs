<?php

$connection = include __DIR__ . "/connection.php";

function getRoomsPerFloor($connection, $building, $floor) {

    $sql = "SELECT * FROM room WHERE building = :building AND floor = :floor";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':building', $building);
    $statement->bindParam(':floor', $floor);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getFloorsPerBuilding($connection, $building) {

    $sql = "SELECT DISTINCT(floor) FROM room WHERE building = :building;";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':building', $building);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

    
function updateRoomDetails($connection, $roomId, $type, $price, $building, $floor, $number, $status, $startDate, $endDate) {
    $sql = "UPDATE room 
            SET type = :t, price = :p, building = :b, floor = :f, 
            number = :n, status = :s, startDate = :d, endDate = :e
            WHERE id = :i";
    
    $stmt = $connection->prepare($sql);
    
    // Bind values to named placeholders using bindValue
    $stmt->bindValue(':t', $type);
    $stmt->bindValue(':p', $price);
    $stmt->bindValue(':b', $building);
    $stmt->bindValue(':f', $floor);
    $stmt->bindValue(':n', $number);
    $stmt->bindValue(':s', $status);
    $stmt->bindValue(':d', $startDate);
    $stmt->bindValue(':e', $endDate);
    $stmt->bindValue(':i', $roomId);

    if ($stmt->execute()) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}


function getRoomDetails($connection, $roomId) {
    $sql = "SELECT * FROM room WHERE id = :i";
    
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":i", $roomId);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    $stmt->closeCursor();
    return $result[0];
    
}