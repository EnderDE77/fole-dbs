<?php
require_once "./student.controller.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../room_page/style.css">
    <style>
    .form-container {
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Two columns */
            grid-template-rows: repeat(4, 1fr); /* Four rows */
            gap: 20px; /* Gap between columns and rows */
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        </style>
</head>
<body>
<h1>Add Student</h1>
    <form method="POST" action="">
        <label for="name">Name</label>
        <input name="name" required><br>
        <label for="surname">Surname</label>
        <input name="surname" required><br>
        <label for="ID">NID</label>
        <input name="ID" required><br>
        <label for="phone">Phone Number</label>
        <input name="phone"><br>
        <label for="email">Email</label>
        <input type="email" name="email"><br>
        <button type="submit">Add</button>
    </form>
    <?=$message?>
</body>
</html>