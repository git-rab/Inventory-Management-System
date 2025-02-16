<?php
session_start();
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

if(isset($_POST['login'])){
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $i=0;
    $usern = "";
    $passd = "";

    $sql="SELECT user_name, password FROM user_info WHERE user_name='$username' and password='$password'";
    $result2 = mysqli_query($conn, $sql);

    if($result2) {
        while($rows = mysqli_fetch_assoc($result2) and $i==0)
        {
            $usern = $rows['user_name'];
            $passd = $rows['password'];
            $i= $i+1;
        }
        if ($usern==$username and $passd==$password) {
            header("Location: Customerdashboard.php");
            exit();
        }
        else{
            ?>
            <script>
                alert("Invalid username or password");
            </script>
            <?php
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <?php include('project/header.php'); ?>
    <body>
        <div class="login-box">
            <h2>Login</h2>
            <form class="white" action="login.php" method="POST">
                <div class="user-box">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                </div>
                <input type="submit" name="login" value="Login">
                <p>Don't have an account? <a href="registration.php">Register</a></p>
            </form>
        </div>
        <?php include('project/footer.php'); ?>
    </body>
</html>
