<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results:</h1>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST["search"];

        $conn = new mysqli('localhost', 'root', '', 'tebs');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $search_query = "SELECT grade_section, name, lrn, date, time, subject, title FROM submitted_data WHERE 
        grade_section LIKE '%$search%' OR 
        name LIKE '%$search%' OR 
        lrn LIKE '%$search%' OR 
        date LIKE '%$search%' OR 
        time LIKE '%$search%' OR 
        subject LIKE '%$search%' OR 
        title LIKE '%$search%'";

        $result_search = $conn->query($search_query);

        if ($result_search->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Grade & Section</th><th>Name</th><th>LRN</th><th>Date</th><th>Time</th><th>Subject</th><th>Title</th></tr>";
            while($row_search = $result_search->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row_search["grade_section"]."</td>";
                echo "<td>".$row_search["name"]."</td>";
                echo "<td>".$row_search["lrn"]."</td>";
                echo "<td>".$row_search["date"]."</td>";
                echo "<td>".$row_search["time"]."</td>";
                echo "<td>".$row_search["subject"]."</td>";
                echo "<td>".$row_search["title"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }

        $conn->close();
    } else {
        echo "No search query submitted.";
    }
    ?>
</body>
</html>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
