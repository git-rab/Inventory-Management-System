<!DOCTYPE html>
<html>
<head>
	<title>Product List</title>
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

		tr:nth-child(even) {
			background-color: #f2f2f2;
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
	<h1>Product List</h1>
	<table>
		<tr>
			<th>Product Name</th>
			<th>Brand Name</th>
			<th>Product Type</th>
			<th>Product Price</th>
		</tr>
		<?php
			
			$conn = mysqli_connect("localhost", "root", "root1234", "inventory");

			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			
			$sql = "SELECT * FROM products";
			$result = mysqli_query($conn, $sql);

			// Loop through the retrieved data and display it in table format
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['product_name'] . "</td>";
					echo "<td>" . $row['brand_name'] . "</td>";
					echo "<td>" . $row['product_type'] . "</td>";
					echo "<td>" . $row['product_price'] . "</td>";
					echo "</tr>";
				}
			}

			// Close database connection
			mysqli_close($conn);
		?>
	</table>
	<p>Back To <a href="dashboard.php">Dashboard</a></p>
</body>
</html>
