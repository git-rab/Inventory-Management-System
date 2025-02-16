<?php 

 ?>

 <!DOCTYPE html>
<html>
<head>
    <title>Admin Reviews</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Customer Reviews</h1>
    <table>
        <tr>
            <th>Customer Name</th>
            <th>Review</th>
        </tr>
        <?php
            // Database connection
            $host = "localhost";
            $username = "root";
            $password = "root1234";
            $dbname = "inventory";

            $conn = new mysqli($host, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve reviews from the database
            $sql = "SELECT give_review,Customer_name FROM review";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                	echo "<tr>";
                	echo "<td>" . $row["Customer_name"] . "</td>";
                    echo "<td>" . $row["give_review"] . "</td>";
                    echo "</tr>";

                }
            } else {
                echo "<tr><td colspan='3'>No reviews found</td></tr>";
            }

            $conn->close();
        ?>
    </table>
    <p>Back To <a href="dashboard.php">Dashboard</a></p>
</body>
</html>
