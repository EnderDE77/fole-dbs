<?php
require_once "search.controller.php";
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
            <h1>Search by Date</h1>
    <form method="GET" action="">
        <label for="searchDate"></label>
        <input type="date" name="searchDate" id="searchDate">
        <button type="submit">Search</button>
    </form>
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
                    // SQL query to fetch data from the room table

                        foreach ($freeRooms as $row) {
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
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['type'] . '</td>';
                            echo '<td>' . $row['price'] . '</td>';
                            echo '<td>' . $row['building'] . '</td>';
                            echo '<td>' . $row['floor'] . '</td>';
                            echo '<td>' . $row['number'] . '</td>';
                            echo '<td class="' . $statusClass . '">' . $row['status'] . '</td>';
                            echo '<td>' . $row['startDate'] . '</td>';
                            echo '<td>' . $row['endDate'] . '</td>';
                            echo '<td><button>Edit</button></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    
    <script>
        // JavaScript function to filter table rows based on search input
        const search = document.getElementById("searchDate");
        search.min = new Date().toISOString().split("T")[0];
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
