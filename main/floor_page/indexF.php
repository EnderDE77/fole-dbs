<?php
require_once "./floor.controller.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floor</title>
</head>
<body>
    <?php foreach($floorList as $floor): ?>
        <form method="GET" action="test.php">
            <input readonly hidden name="building" value=<?= $building?>>
            <input type="submit" name="floor" value=<?= $floor[0]?>>
        </form>
    <?php endforeach; ?>
</body>
</html>