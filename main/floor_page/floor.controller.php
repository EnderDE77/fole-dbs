<?php

require_once "../backend/people.model.php";

$floorList = [];
$building = $_GET['building'];

try{
    $floorList = getFloorsPerBuilding($connection, $building);
}
catch(PDOException $error){
    echo($error);
}