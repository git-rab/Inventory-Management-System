<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "inventory";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Count the number of users
$sql = "SELECT COUNT(*) as num_users FROM user_info";
$result1 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result1);
$num_users = $row['num_users'];

// Count order
$sql3 = "SELECT COUNT(*) as order_count FROM order_detail";
$result4 = mysqli_query($conn, $sql3);
$row = mysqli_fetch_assoc($result4);
$order_count = $row['order_count'];

// SQL query to count the number of brands
$sql1 = "SELECT COUNT(DISTINCT brand_name) AS brand_count FROM products";

// execute the query and get the result
$result = $conn->query($sql1);


if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    
    $brand_count = $row["brand_count"];
} else {
    
    $brand_count = 0;
}
$sql2 = "SELECT COUNT(*) AS total FROM products";
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result2);
$total_products = $row['total'];

$sql2 = "SELECT COUNT(*) AS totals FROM sales_list";
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result2);
$total_sales = $row['totals'];

$sql2 = "SELECT COUNT(*) AS totals FROM review";
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result2);
$total_review = $row['totals'];

$sql2 = "SELECT COUNT(*) AS totals FROM employee";
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result2);
$total_employee = $row['totals'];

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="Dashboardstyle.css">
</head>
<body>
	<div class="sidebar">
		<h1>Admin Dashboard</h1>
		<ul>
			<li><a href="Addproducts.php">Add Product</a></li>
			<li><a href="deleteproducts.php">Delete Product</a></li>
			<li><a href="Addemployee.php">Add Employee</a></li>
			<li><a href="deleteemployee.php">Delete Employee</a></li>
			<li><a href="logintype.php">Log Out</a></li>
		</ul>
	</div>
	<div class="main-content">
		<div class="box">
			<span>Number of Customers</span>
			<h6><?php  echo "Total Customer: ". $num_users; ?></h6>
			<button onclick="window.location.href = 'Customerdetails.php';">Customers Detail</button>
		</div>
		<div class="box">
			<span>Number of Employees</span>
			<h6><?php echo "Total Employee: ". $total_employee; ?></h6>
			<button onclick="window.location.href = 'employeedetails.php';">Employee Detail</button>
		</div>
		<div class="box">
			<span>Number of Products: <h6><?php echo "Total Product: ". $total_products; ?></h6></span>
			<button onclick="window.location.href = 'Productdetail.php';">Products Detail</button>
			
		</div>
		<div class="box">
			<span>Number of Brands</span>
			<h6><?php echo "Total Brand: ". $brand_count; ?></h6>
			<button onclick="window.location.href = 'brandDeatials.php';">Brand Detail</button>
		</div>
		<div class="box">
			<span>Order List</span>
			<h6><?php echo "Total Order: ". $order_count; ?></h6>
			<button onclick="window.location.href = 'orderlist.php';">Order List</button>
		</div>
		<div class="box">
			<span>Sales Detail</span>
			<h6><?php echo "Total Product Sales: ". $total_sales; ?></h6>
			<button onclick="window.location.href = 'Salesdetail.php';">Sales Detail</button>
		</div>
		<div class="box">
			<span>Customer Review</span>
			<h6><?php echo "Total Review: ". $total_review; ?></h6>
			<button onclick="window.location.href = 'Showreview.php';">See Review</button>
		</div>
		
	</div>
	

</body>
</html>
