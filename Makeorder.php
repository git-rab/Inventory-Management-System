<!DOCTYPE html>
<html>
<head>
    <title>Order Product</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #f1c40f;
            color: #333;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h1>Order Product</h1>
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" id="product_name" required>

        <label for="brand_name">Brand Name:</label>
        <input type="text" name="brand_name" id="brand_name" required>

        <label for="customer_name">Your Name:</label>
        <input type="text" name="customer_name" id="customer_name" required>

        <label for="customer_phone">Your Phone:</label>
        <input type="text" name="customer_phone" id="customer_phone" required>

        <label for="customer_email">Your Email:</label>
        <input type="text" name="customer_email" id="customer_email" required>

        <input type="submit" name="submit" value="Submit">
        <p>Back To <a href="Customerdashboard.php">Dashboard</a></p>
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

        // Check if form is submitted
        if (isset($_POST["submit"])) {
            // Get the customer details from the form
            $customer_name = $_POST["customer_name"];
            $customer_phone = $_POST["customer_phone"];
            $customer_email = $_POST["customer_email"];

            // Get the product details from the form
            $product_name = $_POST["product_name"];
            $brand_name = $_POST["brand_name"];

            // Insert the order details into the database
            $sql = "INSERT INTO order_detail (product_name, brand_name, customer_name, customer_phone, customer_email) VALUES ('$product_name', '$brand_name', '$customer_name', '$customer_phone', '$customer_email')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Order placed successfully!</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    ?>
</body>
</html>
