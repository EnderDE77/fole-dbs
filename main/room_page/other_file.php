<?php
$roomId = $_GET['id'];


require_once "../backend/people.model.php";

$room = getRoomDetails($connection, $roomId);
$students = getStudentsOfRoom($connection, $roomId);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room Details</title>
    <link rel="stylesheet" href="style2.css">
    <style>
       body{
        background: linear-gradient(to bottom right, #fff56d, #5cb2e4, #011f33);
        background-repeat: no-repeat;
       }
        /* .room-container {
            display: flex;
            justify-content: space-between;
        } */
        .room-container {
    display: flex;
    justify-content: space-between;
}

        .room-photo {
            width: 300px;
            height: 200px;
            border: 1px solid #ccc;
            border-radius: 50px;
        }
        .room-attributes {
            flex: 1;
            margin: 0 20px;
          
        }
        .students-list {
            flex: 1;
            text-align: right;
        }
        .students-list ul {
            list-style: none;
            padding: 0;
        }
        .students-list li {
            margin-bottom: 10px;
        }
        .inner{
            position: relative;
            left:120vh;
            top:-70.5vh;
        }
    </style>
</head>
<body>
    <h1 align = "center">Room Details</h1>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <div class="room-container">
        <!-- Left Side: Customized Room Photo and Attributes -->
        <div class="room-attributes" style="margin-left: 70px;";>
            <img class="img-fluid" src="https://media.istockphoto.com/id/1335298641/photo/university-dorm-room.jpg?s=612x612&w=0&k=20&c=alddvj2W1zcI4yhDCeUARvbFoUlXNChm7Dx6ytGU1BY=" alt="Room Photo">
           <div class="inner">
           <h2 style="margin-left: 0px; ">Room Details</h2>

           <p><strong>Room ID:</strong> <?php echo $room['id']; ?></p>
            <p><strong>Type:</strong> <?php echo $room['type']; ?></p>
            <p><strong>Price:</strong> $<?php echo $room['price']; ?></p>
            <p><strong>Building:</strong> <?php echo $room['building']; ?></p>
            <p><strong>Floor:</strong> <?php echo $room['floor']; ?></p>

           </div>
            
        </div>

        <!-- Right Side: List of Students in the Room -->
        <div class="students-list" style="margin-right: 70px;">
            <h2>Students in the Room</h2>
            <ul>
                <?php
                foreach ($students as $student) {
                    echo '<li><strong>Personal No:</strong> ' . $student['personalNo'] . '</li>';
                    echo '<li><strong>Surname:</strong> ' . $student['surname'] . '</li>';
                    echo '<li><strong>Phone No:</strong> ' . $student['phoneNo'] . '</li>';
                    echo '<li><strong>Email:</strong> ' . $student['email'] . '</li>';
                    echo '<br>'; // Add some spacing between students
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>