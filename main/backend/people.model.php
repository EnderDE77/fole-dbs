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
    $dateX = date("Y/m/d");
    $card = 'Card';
    $z = 0;

    // Check if the payment record already exists for the given user
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

function setProductToCart($connection, $product, $quantity, $cart){

    $sql = "INSERT INTO `cartcontains` VALUES (?, ?, ?);";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("iii", $product, $cart, $quantity);
    $stmt->execute();
}

function getUser($connection){
    $sql = "SELECT * FROM `user` WHERE id = $id;";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getPayment($connection, $id){
    $sql = "SELECT * FROM `payment` WHERE id = $id;";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getCart($connection, $id){
    $sql = "SELECT * FROM `cart` WHERE id = $id;";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getChosenProducts($connection,$cart) {
    $sql = "SELECT * FROM `cartcontains` WHERE cartId = $cart;";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function lowerProductQuantity($connection, $product, $quantity){

    $sql = "UPDATE `product` SET `quantity` = quantity - $quantity WHERE `id` = $product";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    $statement->closeCursor();
    
}
