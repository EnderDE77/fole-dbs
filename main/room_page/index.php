<?php
require_once "../backend/people.model.php";

$building = '';
$floor = 0;

if(isset($_GET['building'])){
    $building = $_GET['building'];
    $floor = $_GET['floor'];
}
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
    // After updating the room, you can redirect back to the index page.
}
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
            <h1>Rooms</h1>
            <div class="input-group">
                <input type="search" id="searchInput" placeholder="Search Room Type...">
                <img id="searchImage" src="images/search.png" alt="Search">
            </div>
            <div class="input-group">
                <button onclick="window.location.href='indexR.php'" class="btn-primary">Add Room</button>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Type <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Price <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Building <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Floor <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Number <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Start Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th>End Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include your database connection script here.
                    // $conn = include './backend/connection.php';

                    // SQL query to fetch data from the room table
                    try {
                        $data = getRoomsPerFloor($connection, $building, $floor);

                        foreach ($data as $row) {
                            $statusClass = '';
                            switch ($row['status']) {
                                case 'Occupied':
                                    $statusClass = 'red-text';
                                    break;
                                case 'Reserved':
                                    $statusClass = 'green-text';
                                    break;
                                case 'Empty':
                                    $statusClass = 'yellow-text';
                                    break;
                                case 'Reserved without payment':
                                    $statusClass = 'light-blue-text';
                                    break;
                                default:
                                    // Handle other cases if needed
                                    break;
                            }

                            echo '<tr>';
                            echo '<tr class="clickable-row" data-href="other_file.php?id=' . $row['id'] . '">';

                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['type'] . '</td>';
                            echo '<td>' . $row['price'] . '</td>';
                            echo '<td>' . $row['building'] . '</td>';
                            echo '<td>' . $row['floor'] . '</td>';
                            echo '<td>' . $row['number'] . '</td>';
                            echo '<td class="' . $statusClass . '">' . $row['status'] . '</td>';
                            echo '<td>' . $row['startDate'] . '</td>';
                            echo '<td>' . $row['endDate'] . '</td>';
                            echo '<td><button ><a href="edit_room.php?id=' . $row['id'] . '">Edit</a></button></td>';
                            echo '</tr>';
                        }
                    } catch (PDOException $error) {
                        echo "Error: " . $error->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    
    <script>
          var table = document.querySelector("table");
        table.addEventListener("click", function (event) {
            var target = event.target;
            if (target.parentElement.classList.contains("clickable-row")) {
                window.location.href = target.parentElement.getAttribute("data-href");
            }
        });
        // JavaScript function to filter table rows based on search input
        document.getElementById('searchImage').addEventListener('click', function() {
            var input, filter, table, tbody, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tbody = table.getElementsByTagName("tbody");
            tr = tbody[0].getElementsByTagName("tr");
            
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Change to the appropriate column you want to search
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        });
    </script>
</body>
</html>
