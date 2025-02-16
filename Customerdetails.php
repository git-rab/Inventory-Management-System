<!DOCTYPE html>
<html>
<head>
	<title>User Information</title>
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
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #4CAF50;
			color: white;
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
	<h1>User Information</h1>
	<table>
		<tr>
			<th>User ID</th>
			<th>User Name</th>
			<th>Phone Number</th>
			<th>Email</th>
		</tr>
		<?php
			// Connect to MySQL database
			$host = 'localhost';
			$username = 'root';
			$password = 'root1234';
			$dbname = 'inventory';
			$conn = mysqli_connect($host, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Query database for user information
			$sql = "SELECT * FROM user_info";
			$result = mysqli_query($conn, $sql);

			// Loop through results and display user information in a table
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row["user_id"] . "</td>";
					echo "<td>" . $row["user_name"] . "</td>";
					echo "<td>" . $row["phone_number"] . "</td>";
					echo "<td>" . $row["email"] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='4'>No results found</td></tr>";
			}

			// Close database connection
			mysqli_close($conn);
		?>
	</table>
	<p>Back To <a href="dashboard.php">Dashboard</a></p>
</body>
</html>
