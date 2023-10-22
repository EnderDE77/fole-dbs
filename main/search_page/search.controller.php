<?php
require_once "../backend/people.model.php";
$freeRooms = [];
$date = date("yyyy-mm-dd");
if(isset($_GET['searchDate'])){
$date = $_GET['searchDate'];
}
$freeRooms = getFreeRooms($connection, $date);