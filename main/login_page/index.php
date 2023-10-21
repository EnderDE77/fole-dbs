<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page | theuicode.com</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
        <div class="login">
            <h3 class="title">User Login</h3>
            <form action="login.php" method="POST"> <!-- Set the action to your PHP script -->
                <div class="text-input">
                    <i class="ri-user-fill"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="text-input">
                    <i class="ri-lock-fill"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
            <a href="#" class="forgot"></a>
            <div class="create">
                <a href="#"></a>
                <i class="ri-arrow-right-fill"></i>
            </div>
            
                 <!-- Display the error message div if the session variable is set -->
            <?php if (isset($_SESSION['login_error_message'])) : ?>
                <div id="error-message" class="error-message">
                    <?php echo $_SESSION['login_error_message']; ?>
                </div>
                
            <?php endif; ?>
           
        
    </div>
</body>

</html>
