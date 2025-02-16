<!DOCTYPE html>
<html>
<head>
	<title>Selected Product</title>
	<link rel="stylesheet" type="text/css" href="SelectedProduct.css">
</head>
<body>
	

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
		if (isset($_POST['payment'])) {
			$product_name = $_POST['product_name'];
			$brand_name = $_POST['brand_name'];
			$product_type = $_POST['product_type'];
			$product_price = $_POST['product_price'];

			// Insert selected product details into sales_list table
			$sql = "INSERT INTO sales_list (product_name, brand_name, product_type, product_price) VALUES ('$product_name', '$brand_name', '$product_type', '$product_price')";
			if ($conn->query($sql) === TRUE) {
				echo "Payment complete";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

		// Get selected product details from database
		if (isset($_GET['product_id'])) { 
			$id = $_GET['product_id'];
			$sql = "SELECT * FROM products WHERE product_id='$id'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				echo "<div class='product'>";
				echo "<h2>" . $row["product_name"] . "</h2>";
				echo "<p><strong>Brand Name:</strong> " . $row["brand_name"] . "</p>";
				echo "<p><strong>Product Type:</strong> " . $row["product_type"] . "</p>";
				echo "<p><strong>Product Price:</strong> BDT " . $row["product_price"] . "</p>";
				echo "<form method='post'>";
				echo "<input type='hidden' name='product_name' value='" . $row["product_name"] . "'>";
				echo "<input type='hidden' name='brand_name' value='" . $row["brand_name"] . "'>";
				echo "<input type='hidden' name='product_type' value='" . $row["product_type"] . "'>";
				echo "<input type='hidden' name='product_price' value='" . $row["product_price"] . "'>";
				echo "<button type='submit' name='payment'>Payment</button>";
				echo "</form>";
				echo "</div>";
			} else {
				echo "<p>No product found.</p>";
			}
		} else {
			echo "<p>No product selected.</p>";
		}

		$conn->close();
	?>
	<p>Back To <a href="Customerdashboard.php">Dashboard</a></p>
</body>
</html>
