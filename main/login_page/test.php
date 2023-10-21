<?php
if(isset($_GET['pass'])){
}else{
    $_GET['pass'] = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="test.php">
        <input type="text" name="pass">
        <button type="submit">Submit</button>
    </form>
    <?php
        var_dump(password_hash($_GET['pass'],PASSWORD_DEFAULT));
    ?>
</body>
</html>