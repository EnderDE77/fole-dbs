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

function findFloorsPerBuilding($connection, $building) {

    $sql = "SELECT COUNT(DISTINCT(floor)) FROM room WHERE building = :building;";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':building', $building);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result[0];
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

    $result = $stmt->insert_id;
    $stmt->close();

    return $result;
}

function addStudent($connection, $student, $room){

    $sql = "UPDATE student(roomid) INTO (:room) WHERE id = :id;";
    
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":room", $room);
    $stmt->bindParam(":id", $student);
    $stmt->execute();


    return $result;
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

function modifyPaymentPrice($connection, $payment, $product, $quantity){

    $prod = getProduct($connection, $product)[0]['price'];

    $sql = "UPDATE `payment` SET `price` = price + ($quantity * $prod) WHERE `id` = $payment";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    $statement->closeCursor();
    
}

function getQuantity($connection, $product){
    return getProduct($connection, $product)[0]['quantity'];
}

function getNoChosenProducts($connection, $cart){
    $sql = "SELECT SUM(`quantity`) FROM `cartcontains` WHERE `cartID` = $cart";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    $result = $statement -> fetchAll();
    $statement->closeCursor();
    return $result;
}

function insertContact($connection, $name, $email, $message){

    $sql = "INSERT INTO `contact` (name, email, message, isRead) VALUES (?, ?, ?, false);";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

}