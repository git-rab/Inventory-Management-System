<?php 

	// Database credentials
$host = 'localhost';
$user = 'root';
$pass = 'root1234';
$dbname = 'inventory';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $brandName = mysqli_real_escape_string($conn, $_POST['brandName']);
    $productType = mysqli_real_escape_string($conn, $_POST['productType']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);

    // Insert the form data into the database
    $sql = "INSERT INTO products (product_name, brand_name, product_type, product_price) VALUES ('$productName', '$brandName', '$productType', '$productPrice')";

    if (mysqli_query($conn, $sql)) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Information Form</title>
	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
		}

		input[type=text], input[type=number] {
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
	<h1>Add Product</h1>
	<form class="white" action="Addproducts.php" method="POST">
		<label for="productName">Product Name:</label>
		<input type="text" id="productName" name="productName" required>

		<label for="brandName">Brand Name:</label>
		<input type="text" id="brandName" name="brandName" required>

		<label for="productType">Product Type:</label>
		<select id="productType" name="productType" required>
			<option value="">-- Select One --</option>
			<option value="kids">Kids</option>
			<option value="women">Women</option>
			<option value="men">Men</option>
		</select>

		<label for="productPrice">Product Price:</label>
		<input type="number" id="productPrice" name="productPrice" min="0" step="0.01" required>

		<input type="submit" name="submit" value="Submit">
		<p>Back To <a href="dashboard.php">Dashboard</a></p>
	</form>
</body>
</html>
