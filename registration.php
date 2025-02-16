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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert the form data into the database
    $sql = "INSERT INTO user_info (user_name, phone_number, email, password) VALUES ('$username', '$number', '$email', '$password')";

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
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="regstyle.css">
</head>
<body>
	<div class="register-box">
		<h2>Register</h2>
		<form class="white" action="registration.php" method="POST">
			<div class="user-box">
				<input type="text" name="username" required="">
				<label>Username</label>
			</div>
			<div class="user-box">
				<input type="password" name="password" required="">
				<label>Password</label>
			</div>
			<div class="user-box">
				<input type="text" name="number" required="">
				<label>Phone Number</label>
			</div>
			<div class="user-box">
				<input type="email" name="email" required="">
				<label>Email</label>
			</div>
			<input type="submit" name="submit" value="Submit">
			<p>Already have an account? <a href="login.php">Login</a></p>
		</form>
	</div>
</body>
</html>