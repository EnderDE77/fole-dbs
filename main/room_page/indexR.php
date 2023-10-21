<?php
try {
    // Include your connection script here.
    $conn = include '../backend/connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve and sanitize form data
        $type = $_POST['type'];
        $price = $_POST['price'];
        $building = $_POST['building'];
        $floor = $_POST['floor'];
        $number = $_POST['number'];
        $status = "Available";
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        // SQL query to insert data into the room table
        $sql = "INSERT INTO room (type, price, building, floor, number, status, startDate, endDate)
                VALUES (:type, :price, :building, :floor, :number, :status, :startDate, :endDate)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':building', $building);
        $stmt->bindParam(':floor', $floor);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':endDate', $endDate);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Data added to the room table successfully.";
        } else {
            echo "Failed to add data to the room table.";
        }
         header('Location: room.html'); // Adjust the URL as needed.
    exit;
    }
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Room</title>
</head>
<body>
    <h1>Add Room</h1>
    <form method="POST" action="">
        <label for="type">Type:</label>
        <input type="text" name="type" required><br>
        
        <label for="price">Price:</label>
        <input type="number" name="price" required><br>
        
        <label for="building">Building:</label>
        <input type="text" name="building" required><br>
        
        <label for="floor">Floor:</label>
        <input type="number" name="floor" required><br>
        
        <label for="number">Number:</label>
        <input type="text" name="number" required><br>
  
        <label for="startDate">Start Date:</label>
        <input type="date" name="startDate" ><br>
        
        <label for="endDate">End Date:</label>
        <input type="date" name="endDate" ><br>

        <button type="submit" >Add Room</button>
    </form>
</body>
</html>
