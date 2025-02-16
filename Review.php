<?php 
 ?>

 <!DOCTYPE html>
<html>
<head>
    <title>Product Review</title>
    <style>
        form {
            margin: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            width: 500px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], textarea {
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
        }

        input[type="submit"]:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h1>Product Review</h1>
        <label for="username">Your Name:</label>
        <textarea name="username" id="username" rows="5" required></textarea>
        <label for="review">Your Review:</label>
        <textarea name="review" id="review" rows="5" required></textarea>

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
            // Get the review from the form
            $name = $_POST["username"];

            $review = $_POST["review"];

            // Insert the review into the database
            $sql = "INSERT INTO review (Customer_name,give_review) VALUES ('$name','$review')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Review submitted successfully!</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    ?>
</body>
</html>
