<!DOCTYPE html>
<html>
<head>
	<title>Customer Dashboard</title>
	<style>
		.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 200px;
  height: 100%;
  background-color: #333;
  color: #fff;
  padding: 20px;
  box-sizing: border-box;
}

.sidebar h3 {
  font-size: 24px;
  margin-top: 0;
}

.sidebar ul {
  list-style: none;
  padding: 0;
  margin: 20px 0;
}

.sidebar ul li a {
  display: block;
  color: #fff;
  text-decoration: none;
  font-size: 20px;
  margin-bottom: 10px;
}

.sidebar ul li a:hover {
  color: #f1c40f;
}

/* Style for the content section */
.content {
  margin-left: 220px; /* The width of the sidebar + 20px for padding */
  padding: 20px;
  box-sizing: border-box;
}

.content h1 {
  font-size: 36px;
  margin-top: 0;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #333;
  color: #fff;
}

td a {
  display: inline-block;
  padding: 5px 10px;
  background-color: #f1c40f;
  color: #333;
  text-decoration: none;
  border-radius: 5px;
}

td a:hover {
  background-color: #333;
  color: #fff;
}

	</style>
</head>
<body>
	<div class="sidebar">
		<h3>Menu</h3>
		<ul>
			<li><a href="Makeorder.php">Order Product</a></li>
			<li><a href="Review.php">Give Review</a></li>
			<li><a href="logintype.php">Logout</a></li>
		</ul>
	</div>
	<div class="content">
		<h1>Customer Dashboard</h1>
		<table>
			<tr>
				<th>Product Name</th>
				<th>Brand Name</th>
				<th>Product Type</th>
				<th>Product Price</th>
				<th>Action</th>
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

				// Fetch products from database
				$sql = "SELECT * FROM products";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["product_name"] . "</td>";
						echo "<td>" . $row["brand_name"] . "</td>";
						echo "<td>" . $row["product_type"] . "</td>";
						echo "<td>" . $row["product_price"] . "</td>";
						echo "<td><a href='Payment.php?product_id=" . $row["product_id"] . "'>Buy Now</a></td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='5'>No products found.</td></tr>";
				}

				$conn->close();
			?>
		</table>
	</div>
</body>
</html>
