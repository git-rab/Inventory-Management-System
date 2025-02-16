<?php 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background: linear-gradient(90deg, #1d976c 0%, #93f9b9 100%);
			background-repeat: no-repeat;
			background-size: cover;
			height: 100vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}

		h1 {
			text-align: center;
			color: #ffffff;
			margin-bottom: 50px;
		}

		.login-buttons {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			margin-top: 50px;
		}

		.login-button {
			background-color: #ffffff;
			border: none;
			color: #1d976c;
			padding: 12px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 10px;
			cursor: pointer;
			border-radius: 5px;
			transition: background-color 0.3s ease;
			box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		}

		.login-button:hover {
			background-color: #e6e6e6;
		}

		@media (max-width: 600px) {
			.login-button {
				padding: 8px 16px;
			}
		}
	</style>
</head>
<body>
	<h1>Welcome to our website!</h1>
	<h1>Choose Your Login Type!</h1>
	<div class="login-buttons">
		<button class="login-button" onclick="goToCustomerLogin()">Customer</button>
		<button class="login-button" onclick="goToAdminLogin()">Admin</button>
	</div>

	<script>
		function goToCustomerLogin() {
			window.location.href = "login.php";
		}

		function goToAdminLogin() {
			window.location.href = "adminlogin.php";
		}

		// dynamically change button size for mobile devices
		if (window.innerWidth < 600) {
			document.styleSheets[0].addRule(
				"@media (max-width: 600px)",
				".login-button { padding: 8px 16px; }"
			);
		}
	</script>
</body>
</html>
