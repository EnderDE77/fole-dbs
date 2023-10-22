<!DOCTYPE html>
<html>
<head>
    <title>Edit Room</title>
    <link rel="stylesheet" type="text/css" href="EditStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Edit Room</h2>
                <?php
                // Include your database connection script here.
                $conn = include './backend/connection.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Handle form submission and update data in the database.
                    $roomId = $_GET['id']; // Get the room ID from the URL

                    // Update the data in the 'room' table based on the provided ID
                    $sql = "UPDATE room SET type = :type, price = :price, building = :building, floor = :floor, number = :number, status = :status, startDate = :startDate, endDate = :endDate WHERE id = :roomId";

                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
                    $stmt->bindParam(':type', $_POST['type']);
                    $stmt->bindParam(':price', $_POST['price']);
                    $stmt->bindParam(':building', $_POST['building']);
                    $stmt->bindParam(':floor', $_POST['floor']);
                    $stmt->bindParam(':number', $_POST['number']);
                    $stmt->bindParam(':status', $_POST['status']);
                    $stmt->bindParam(':startDate', $_POST['startDate']);
                    $stmt->bindParam(':endDate', $_POST['endDate']);

                    if ($stmt->execute()) {
                        echo "Data updated successfully!";
                    } else {
                        echo "Error updating data.";
                    }
                }

                // Check if the 'id' parameter is present in the URL
                if (isset($_GET['id'])) {
                    $roomId = $_GET['id'];

                    // Fetch data from the 'room' table based on the provided ID
                    $sql = "SELECT id, type, price, building, floor, number, status, startDate, endDate FROM room WHERE id = :roomId";

                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
                    $stmt->execute();
                    $roomData = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                ?>
                <form method="post">
                    <input type="text" class="field" name="type" placeholder="Type" value="<?php echo $roomData['type']; ?>">
                    <input type="text" class="field" name="price" placeholder="Price" value="<?php echo $roomData['price']; ?>">
                    <input type="text" class="field" name="building" placeholder="Building" value="<?php echo $roomData['building']; ?>">
                    <input type="text" class="field" name="floor" placeholder="Floor" value="<?php echo $roomData['floor']; ?>">
                    <input type="text" class="field" name="number" placeholder="Number" value="<?php echo $roomData['number']; ?>">
                    <input type="text" class="field" name="status" placeholder="Status" value="<?php echo $roomData['status']; ?>">
                    <input type="text" class="field" name="startDate" placeholder="Start Date" value="<?php echo $roomData['startDate']; ?>">
                    <input type="text" class="field" name="endDate" placeholder="End Date" value="<?php echo $roomData['endDate']; ?>">
                    <button type="submit" class="btn">Update</button>
					<br><br>
					<button type="submit" class="btn">
						<a href="index.php" style="text-decoration: none; color: white;">Back</a>
					</button>




                </form>
            </div>
        </div>
    </div>
</body>
</html>
