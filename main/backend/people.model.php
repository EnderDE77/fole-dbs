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

function getFreeRooms($connection, $date) {
    $sql = "SELECT * FROM room WHERE status = 'Available' OR endDate < :d";
    
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":d", $date);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    $stmt->closeCursor();
    return $result;
    
}

function getStudents($connection){
    $sql = "SELECT * FROM student";
    
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    $stmt->closeCursor();
    return $result;
    
}

function addStudent($connection, $personalid, $name, $surname, $email, $phone){
    $sql = "INSERT INTO student(personalno, name, surname, phoneno, email) VALUES (:num, :name, :surname, :phone, :email)";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":num", $personalid);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":surname", $surname);
    $stmt->bindParam(":phone", $email);
    $stmt->bindParam(":email", $phone);
    $stmt->execute();
    $stmt->closeCursor();
}

function sendStudentToRoom($connection, $student, $room){
    $sql = "UPDATE student SET roomid = :room WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":room", $room);
    $stmt->bindParam(":id", $student);
    $stmt->execute();
    $stmt->closeCursor();
}

function getStudentsOfRoom($connection, $room){
    $sql = "SELECT * FROM student WHERE roomid = :room";
    
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":room", $room);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    $stmt->closeCursor();
    return $result;
}
