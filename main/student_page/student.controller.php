<?php
require_once "../backend/people.model.php";
$message = '';
if(isset($_POST['name'])){
    addStudent($connection, $_POST['ID'], $_POST['name'], $_POST['surname'], $_POST['phone'], $_POST['email']);
    $message = "student added successfully";
}