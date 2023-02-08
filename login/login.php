<?php

        require_once '../class/database.php';
        require_once '../class/useraccounts.class.php';

        //we start session since we need to use session values
        $conn = mysqli_connect("localhost","root","","tams");
        $error="";
        session_start();
        if (isset($_POST['login'])) {
            //echo "<pre>";
            //print_r($_POST);
            $username=mysqli_real_escape_string($conn,$_POST['username']);
            $password=mysqli_real_escape_string($conn,$_POST['password']);
            $firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
            $lastname=mysqli_real_escape_string($conn,$_POST['lastname']);

            $sql=mysqli_query($conn,"SELECT * FROM useraccounts WHERE BINARY username='$username' && BINARY password='$password'");
            $num=mysqli_num_rows($sql);
            if ($num>0) {
                  //echo "found";
                  $row=mysqli_fetch_assoc($sql);
                  $_SESSION['logged-in'] = $username;
                  $_SESSION['fullname']=$row['firstname'] . ' ' . $row['lastname'];
                  $_SESSION['user_type'] = $row['type'];

                  //display the appropriate dashboard page for user
                  if (($_SESSION['user_type']) == 'student'){
                      header('location: ../admin/manage_students.php');
                  }else if (($_SESSION['user_type']) == 'admin'){
                      header('location: ../admin/dashboard.php');
                  }else if (($_SESSION['user_type']) == 'faculty'){
                    header('location: ../admin/manage_faculty.php');
                  }else{
                      header('location: login/login.php');
                  }
              }
              $error = 'Invalid username/password. Try again.';
          }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>CCS Thesis Repositories | Login</title>
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <div class="logo">
                <img class="login-logo" src="../img/rlogo.png" alt="logo ccs">
            </div>

            <div class="logo-details">
                <span class="logo-name">Thesis Repositories</span>
            </div>

            <hr class="divider">

            <label for="username">Username</label>
            <input class="form-input" type="text" id="username" name="username" placeholder="Enter username" required>

            <label for="password">Password</label>
            <input class="form-input" type="password" id="password" name="password" placeholder="Enter password" required>

            <input class="button-login form-input" type="submit" value="Login" name="login" tabindex="3">

            <a class="create" href="create_account.php">Create an account</a>
            <a class="forgot" href="#">Forgot Password</a>

        </form>
    </div>
</body>
</html>