<?php
// Include your database connection script here.
$conn = include './backend/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submissions here (if needed).
}

?>

<!DOCTYPE html>
<html lang="en" title="Coding design">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Students Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="table">
        <section class="table__header">
            <h1>Students</h1>
            <div class="input-group">
                <input type="search" id="searchInput" placeholder="Search Data...">
                <img id="searchImage" src="images/search.png" alt="Search">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Personal No</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Phone No</th>
                        <th>Email</th>
                        <th>Room ID</th>
                        <th>Contract</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['id'])) {
                        $studentId = $_GET['id'];
                        
                        // SQL query to fetch data for the specified student
                        $sql = "SELECT id, personalNo, name, surname, phoneNo, email, roomId FROM student WHERE id = :student_id";

                        try {
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':student_id', $studentId, PDO::PARAM_INT);
                            $stmt->execute();
                            $studentData = $stmt->fetch(PDO::FETCH_ASSOC);
                            
                            if ($studentData) {
                                echo '<tr>';
                                echo '<td>' . $studentData['id'] . '</td>';
                                echo '<td>' . $studentData['personalNo'] . '</td>';
                                echo '<td>' . $studentData['name'] . '</td>';
                                echo '<td>' . $studentData['surname'] . '</td>';
                                echo '<td>' . $studentData['phoneNo'] . '</td>';
                                echo '<td>' . $studentData['email'] . '</td>';
                                echo '<td>' . $studentData['roomId'] . '</td>';
                                // Add a column for Contract with an attach file option
                                echo '<td><input type="file" name="contract" id="contract" accept=".pdf"></td>';
                                echo '</tr>';
                            } else {
                                echo "Student not found.";
                            }
                        } catch (PDOException $error) {
                            echo "Error: " . $error->getMessage();
                        }
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
            var input, filter, tbody, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
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
