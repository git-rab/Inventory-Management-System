<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "inventory";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve employee data from database
$sql = "SELECT employee_id, employee_name, employee_number, email FROM employee";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Information</title>
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

		tr:hover {background-color: #f5f5f5;}
	</style>
</head>
<body>
	<h1>Employee Information</h1>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Employee Name</th>
				<th>Employee Number</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>"; 
					echo "<td>".$row["employee_id"]."</td>";
					echo "<td>".$row["employee_name"]."</td>";
					echo "<td>".$row["employee_number"]."</td>";
					echo "<td>".$row["email"]."</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='3'>No data found</td></tr>";
			}
			?>
		</tbody>
	</table>
	<p>Back To <a href="dashboard.php">Dashboard</a></p>
</body>
</html>

<?php
mysqli_close($conn);
?>
