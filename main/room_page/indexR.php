<!DOCTYPE html>
<html>
<head>
    <title>Add Room</title>
</head>
<body>
    <h1>Add Room</h1>
    <form method="POST" action="fetch_data.php">
        <input readonly hidden name = "direction" value = "Add">
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
