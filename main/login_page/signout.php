<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in (you may have a session variable set during login)
if (isset($_SESSION['username'])) {
    // Unset or destroy the session variable
    unset($_SESSION['username']);
    // Destroy the session
    session_destroy();
}

// Redirect to the login page or another appropriate location
header("Location: index.php");
?>
