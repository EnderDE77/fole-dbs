<?php
require_once "./floor.controller.php";
?>

 <!DOCTYPE html>
<html lang="en" title="Coding design">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive HTML Table With Pure CSS - Web Design/UI Design</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Customer's Orders</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
            </div>
        </section>
        <section class="table__body">
        <div class="button-row">
        <?php foreach($floorList as $floor): ?>
            <form method="GET" action="../room_page/index.php">
                <input readonly hidden name="building" value="<?= $building ?>">
                <button class="button" type="submit" name="floor" value="<?= $floor[0] ?>"><span><?= $floor[0] ?></span></button>
            </form>
        <?php endforeach; ?>
    </div>
        </section>
    </main>
</body>

</html>