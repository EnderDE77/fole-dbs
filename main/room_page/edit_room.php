<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Linear gradient background for the whole page */
        body {
            background: linear-gradient(to bottom, #485563, #29323c);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        /* Blurry background for the form */
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
        .form-group {
            display: flex;
            flex-direction: column;
        }
        /* Style form input fields */
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
        /* Style form labels */
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        /* Style buttons */
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    require_once  '../backend/people.model.php';
    require_once "../backend/people.model.php";
    
    $building = '';
    $floor = 0;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['direction'] == "Edit"){
        // Handle the form submission to update the room details in the database.
        $roomId = $_POST['room_id']; // Get the room ID from the form
        
        // Capture the values from the form input fields
        $type = $_POST['type'];
        $price = $_POST['price'];
        $building = $_POST['building'];
        $floor = $_POST['floor'];
        $number = $_POST['number'];
        $status = $_POST['status'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        
        // Call the updateRoomDetails function with the captured values
        updateRoomDetails($connection, $roomId, $type, $price, $building, $floor, $number, $status, $startDate, $endDate);
    }
    else if($_POST['direction'] == "Add"){
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
    
        $stmt = $connection->prepare($sql);
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
    }
    }
    
    // Retrieve the room ID from the query parameter.
    if (isset($_GET['id'])) {
        $roomId = $_GET['id'];
    
        $roomDetails = getRoomDetails($connection, $roomId);
    
        if ($roomDetails) {
    
            echo '<form method="POST" action="index.php">';
            echo '        <input readonly hidden name = "direction" value = "Edit">';
            echo '<label for="type">Type:</label>';
            echo '<input type="text" name="type" value="' . $roomDetails['type'] . '" required><br>';
            
            echo '<label for="price">Price:</label>';
            echo '<input type="number" name="price" value="' . $roomDetails['price'] . '" required><br>';
            
            echo '<label for="building">Building:</label>';
            echo '<input type="text" name="building" value="' . $roomDetails['building'] . '" required><br>';
            
            echo '<label for="floor">Floor:</label>';
            echo '<input type="number" name="floor" value="' . $roomDetails['floor'] . '" required><br>';
            
            echo '<label for="number">Number:</label>';
            echo '<input type="text" name="number" value="' . $roomDetails['number'] . '" required><br>';
            
            echo '<label for="status">Status:</label>';
            echo '<input type="text" name="status" value="' . $roomDetails['status'] . '" required><br>';
            
            echo '<label for="startDate">Start Date:</label>';
            echo '<input type="date" name="startDate" value="' . $roomDetails['startDate'] . '"><br>';
            
            echo '<label for="endDate">End Date:</label>';
            echo '<input type="date" name="endDate" value="' . $roomDetails['endDate'] . '"><br>';
        } else {
            echo 'Room not found.';
        }
        // Sample form structure:
        echo '<form method="POST" action="edit_room.php">';
        echo '<input type="hidden" name="room_id" value="' . $roomId . '">';
        
        // Populate the form fields with existing room data and allow users to update them.
    
        // Add a "Save" button to update the room.
        echo '<button type="submit">Save</button>';
    
        echo '<button><a href="index.php">Back</a></button>';
        
        echo '</form>';
    } else {
        echo 'Invalid room ID.';
    }
    ?>
</body>
</html>
