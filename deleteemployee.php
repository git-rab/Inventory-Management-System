<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Employee</title>
	<style>
		body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

h1 {
  text-align: center;
  margin-top: 50px;
}

form {
  width: 50%;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 50px;
  padding: 20px;
  border: 1px solid #ccc;
  background-color: #fff;
}

label {
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}



	</style>
</head>
<body>
	<h1>Delete Employee</h1>
	<form method="POST">
		<label for="employeeID">Employee ID:</label>
		<input type="text" id="employeeID" name="employeeID" required>

		<label for="employeeName">Employee Name:</label>
		<input type="text" id="employeeName" name="employeeName" required>

		<input type="submit" name="deleteEmployee" value="Delete">
		<p>Back To <a href="dashboard.php">Dashboard</a></p>
	</form>

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

		// Delete employee from database
		if (isset($_POST['deleteEmployee'])) {
			$employeeID = $_POST['employeeID'];
			$employeeName = $_POST['employeeName'];

			$sql = "DELETE FROM employee WHERE employee_id='$employeeID' AND employee_name='$employeeName'";
			if ($conn->query($sql) === TRUE) {
				echo "<p>Employee deleted successfully!</p>";
			} else {
				echo "<p>Error deleting employee: " . $conn->error . "</p>";
			}
		}

		
		$conn->close();
	?>

</body>
</html>
