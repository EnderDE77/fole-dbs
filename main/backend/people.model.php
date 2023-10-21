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
    return $result  ;
}

function createRoom($connection, $type, $building, $floor, $number) {
    
    $sql = "INSERT INTO room (`type`, price, building, floor, `number`) VALUES ('Free', ?, ?, ?, ?)";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("dsii", $price, $building, $floor, $number);
    $stmt->execute();

    $stmt->close();

}

function addStudentToRoom($connection, $student, $room){

    $sql = "UPDATE student(roomid) SET roomId = (:room) WHERE id = :id;";
    
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":room", $room);
    $stmt->bindParam(":id", $student);
    $stmt->execute();

}

function addNewAdmin($connection, $username, $password, $name, $surname){
    

}