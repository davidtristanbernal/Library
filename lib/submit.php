<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    
</head>
<body>
    <div class="submitted-data">
        <h1>Submitted Information:</h1>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $conn = new mysqli('localhost', 'root', '', 'tebs');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO submitted_data (grade_section, name, lrn, date, time, subject, title) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $_POST['Grade']['section'], $_POST['Name'], $_POST['LRN'], $_POST['Date'], $_POST['Time'], $_POST['subject'], $_POST['title']);

            $stmt->execute();

            $stmt->close();
            $conn->close();

            echo "<p><strong>Grade & Section:</strong> " . $_POST["Grade"]["section"] . "</p>";
            echo "<p><strong>Name:</strong> " . $_POST["Name"] . "</p>";
            echo "<p><strong>LRN:</strong> " . $_POST["LRN"] . "</p>";
            echo "<p><strong>Date:</strong> " . $_POST["Date"] . "</p>";
            echo "<p><strong>Time:</strong> " . $_POST["Time"] . "</p>";
            echo "<p><strong>Subject of the Book:</strong> " . $_POST["subject"] . "</p>";
            echo "<p><strong>Title of the Book:</strong> " . $_POST["title"] . "</p>";
        } else {
            echo "No data submitted.";
        }
        ?>
    </div>

    <div class="recent-info">
        <h1>Recent Information:</h1>
        <?php

        $conn = new mysqli('localhost', 'root', '', 'tebs');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql_recent = "SELECT grade_section, name, lrn, date, time, subject, title FROM submitted_data ORDER BY submission_date DESC";
        $result_recent = $conn->query($sql_recent);

        if ($result_recent->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Grade & Section</th><th>Name</th><th>LRN</th><th>Date</th><th>Time</th><th>Subject</th><th>Title</th></tr>";
            while($row_recent = $result_recent->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row_recent["grade_section"]."</td>";
                echo "<td>".$row_recent["name"]."</td>";
                echo "<td>".$row_recent["lrn"]."</td>";
                echo "<td>".$row_recent["date"]."</td>";
                echo "<td>".$row_recent["time"]."</td>";
                echo "<td>".$row_recent["subject"]."</td>";
                echo "<td>".$row_recent["title"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No recent data available.";
        }

        $conn->close();
        ?>
    </div>
    <div class="search-form">
    <form method="post" action="search.php">
            <h2>Search:
                <input type="text" name="search">
                <input type="submit" value="Search">
            </form></h2>
    </div>
</body>
</html>
<style>
        table {
            border-collapse: collapse;
            width: 175%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .recent-info {
            display: inline-block;
            vertical-align: top;
            margin-right: 20px; /* Adjust margin as needed */
        }

        .search-form {
            display: inline-block;
            vertical-align: top;
        }
    </style>
    