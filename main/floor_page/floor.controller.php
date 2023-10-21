<?php

require_once "../backend/people.model.php";

$floorList = [];
$building = 'A';
$floor = '1';

try{
    $floorList = getRoomsPerFloor($connection, $building, $floor);
}
catch(PDOException $error){
    echo($error);
}