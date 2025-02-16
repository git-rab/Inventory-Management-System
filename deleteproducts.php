<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$servername = "localhost";
			$username = "root";
			$password = "root1234";
			$dbname = "inventory";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// Escape user inputs for security
			$productName = $conn->real_escape_string($_POST['productName']);
			$productType = $conn->real_escape_string($_POST['productType']);

			// Delete row from table
			$sql = "DELETE FROM products WHERE product_name='$productName' AND product_type='$productType'";
			if ($conn->query($sql) === TRUE) {
				echo "<p>Product deleted successfully.</p>";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			// Close connection
			$conn->close();
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Product</title>
	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
		}

		input[type=text] {
			margin-bottom: 10px;
			padding: 10px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
			width: 300px;
			font-size: 16px;
		}

		input[type=submit] {
			background-color: #f44336;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			width: 150px;
			font-size: 16px;
		}

		input[type=submit]:hover {
			background-color: #d32f2f;
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
	<h1>Delete Product</h1>
	<form method="post">
		<label for="productName">Product Name:</label>
		<input type="text" id="productName" name="productName" required>

		<label for="productType">Product Type:</label>
		<select id="productType" name="productType" required>
			<option value="">-- Select One --</option>
			<option value="kids">Kids</option>
			<option value="women">Women</option>
			<option value="men">Men</option>
		</select>
		<br>

		<input type="submit" value="Delete">
		<p>Back To <a href="dashboard.php">Dashboard</a></p>
	</form>
	
</body>
</html>
