<?php  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Brand Details</title>
	<style>
		table {
			width: 50%;
            margin: 0 auto;
            margin-top: 50px;
            border-collapse: collapse;
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

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		h1 {
        text-align: center;
      }
      p {
        text-align: center;
      }
	</style>
</head>
<body>
	<h1>Brand Details</h1>
	<table>
		<tr>
			<th>Brand Name</th>
			<th>Number of Products</th>
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

			// Retrieve brand details from database
			$sql = "SELECT brand_name, COUNT(*) AS num_products FROM products GROUP BY brand_name";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["brand_name"] . "</td>";
					echo "<td>" . $row["num_products"] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='2'>No brands found.</td></tr>";
			}

			$conn->close();
		?>
	</table>
	<p>Back To <a href="dashboard.php">Dashboard</a></p>
</body>
</html>
