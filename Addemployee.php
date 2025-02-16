<?php 

$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "inventory";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Validate form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["employeeName"]) && isset($_POST["employeeNumber"]) && isset($_POST["employeeEmail"])) {
		// Retrieve form data
		$employeeName = $_POST["employeeName"];
		$employeeNumber = $_POST["employeeNumber"];
		$employeeEmail = $_POST["employeeEmail"];

		// Insert data into database
		$sql = "INSERT INTO employee (employee_name, employee_number,email) VALUES ('$employeeName', '$employeeNumber', '$employeeEmail')";
		if ($conn->query($sql) === TRUE) {
			echo "Employee added successfully";
		} else {
			echo "Error adding employee: " . $conn->error;
		}
	} else {
		echo "All form fields are required";
	}
}

$conn->close();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
		}

		input[type=text], input[type=number], input[type=email] {
			margin-bottom: 10px;
			padding: 10px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
			width: 300px;
			font-size: 16px;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			width: 150px;
			font-size: 16px;
		}

		input[type=submit]:hover {
			background-color: #3e8e41;
		}

		label {
			font-size: 18px;
			font-weight: bold;
			margin-bottom: 5px;
		}
		h1{
			text-align: center;
		}

	</style>
</head>
<body>
	<h1>Add Employee</h1>
	<form action="Addemployee.php" method="POST">
		<label for="employeeName">Employee Name:</label>
		<input type="text" id="employeeName" name="employeeName" required>

		<label for="employeeNumber">Employee Number:</label>
		<input type="number" id="employeeNumber" name="employeeNumber" required>

		<label for="employeeEmail">Employee Email:</label>
		<input type="email" id="employeeEmail" name="employeeEmail" required>

		<input type="submit" value="Submit">
		<p>Back To <a href="dashboard.php">Dashboard</a></p>
	</form>
</body>
</html>
