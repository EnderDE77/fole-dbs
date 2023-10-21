<?php
require_once "./floor.controller.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floor</title>
    <style>
        /* Navbar styles */
        .navbar {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        /* Container for the button row */
        .button-row {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Style for the buttons */
        .button {
            display: inline-block;
            padding: 15px 30px; /* Increase padding for larger buttons */
            margin: 5px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        /* Center the text in the buttons */
        .button span {
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }

        /* Hover effect for the buttons */
        .button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="button-row">
    <?php foreach($floorList as $floor): ?>
        <form method="GET" action="../room_page/fetch_data.php">
            <input readonly hidden name="building" value=<?= $building?>>
            <button class="button" type="submit" name="floor" value=<?= $floor[0]?>><span><?= $floor[0]?></span></button>
        </form>
    <?php endforeach; ?>
    </div>
</body>
</html>