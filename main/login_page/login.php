<?php
session_start();
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fdm";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the hashed password from the database for the entered username
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedHashedPassword = $row['password'];

        if (password_verify($password, $storedHashedPassword)) {
            header("Location: dashboard.php");
        } else {
            $_SESSION['login_error_message'] = "Wrong Password";
            
            header("Location: index.php");
            echo "Password Verify Result: " . (password_verify($password, $storedHashedPassword) ? 'true' : 'false');
 
        }
    } else {
        $_SESSION['login_error_message'] = "Username not found";
        header("Location: index.php"); // Redirect to the login page
        echo "Password Verify Result: " . (password_verify($password, $storedHashedPassword) ? 'true' : 'false');

    }
}

$conn->close();
?>
