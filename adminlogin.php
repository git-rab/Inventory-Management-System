<?php 
 ?>
 <?php
    

    if(isset($_POST['login'])) {

        // Get the username and password from the login form
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username=='admin' and $password=='123456'){
          
            header('location:dashboard.php');
        }
         else {
            // Show an error message if the password is incorrect
            //echo 'Invalid username or password';
        }
    }

?>

<!DOCTYPE html>
<html>
    <?php include('project/header.php'); ?>
    <body>
        <div class="login-box">
            <h2>Login</h2>
            <form class="white" action="adminlogin.php" method="POST">
                <div class="user-box">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                </div>
                <input type="submit" name="login" value="Login">
                
            </form>
        </div>
        <?php include('project/footer.php'); ?>
    </body>
</html>



