<?php

$connection = include __DIR__ . "/connection.php";

function searchProducts($connection, $search) {
    $search = "%$search%";

    $sql = "SELECT * FROM `product` WHERE name LIKE :search;";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':search', $search);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getProducts($connection) {
    $sql = "SELECT * FROM `product`;";

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

function getProduct($connection, $id) {

    $sql = "SELECT * FROM `product` WHERE id = $id;";

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

function createPayment($connection, $user) {
    $dateX = date("Y/m/d");
    $card = 'Card';
    $z = 0;

    // Check if the payment record already exists for the given user
    $sql = "INSERT INTO `payment` (`price`, `date`, `method`, `payingUserId`) VALUES (?, ?, ?, ?)";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("dssi", $z, $dateX, $card, $user);
    $stmt->execute();

    $result = $stmt->insert_id;
    $stmt->close();

    return $result;
}

function createCart($connection, $user, $payment){

    $sql = "INSERT INTO `cart` (cartPaymentId, cartHolderId) VALUE (?, ?);";
    
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $payment, $user);
    $stmt->execute();

    $result = $connection->insert_id;

    return $result;
}

function setProductToCart($connection, $product, $quantity, $cart){

    $sql = "INSERT INTO `cartcontains` VALUES (?, ?, ?);";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("iii", $product, $cart, $quantity);
    $stmt->execute();
}

function getUser($connection, $id){
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