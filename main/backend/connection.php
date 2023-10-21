<?php

$dbName = "fdm";
$user = "root";
$password = "";

function connect($dbname, $user, $password) {
    $connection = NULL;
    $dns = "mysql:host=localhost;dbname=$dbname;charset=utf8";

    try {
        $connection = new PDO($dns, $user, $password, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $error) {
        var_dump($error->getMessage());
    }

    return $connection;
}

return connect($dbName, $user, $password);