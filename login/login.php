<?php
        //we start session since we need to use session values
        session_start();
        if(isset($_SESSION['user_type']) == 'admin'){
            header('location: ../admin/dashboard.php');
        }
        //creating an array for list of users can login to the system
        $accounts = array(
            "user1" => array(
                "firstname" => 'Jaydee',
                "lastname" => 'Ballaho',
                "type" => 'admin',
                "username" => 'jaydee',
                "password" => 'jaydee'
            ),
            "user2" => array(
                "firstname" => 'Root',
                "lastname" => 'Root',
                "type" => 'admin',
                "username" => 'root',
                "password" => 'root'
            ),
            "user3" => array(
                "firstname" => 'Natsu',
                "lastname" => 'Dragneel',
                "type" => 'staff',
                "username" => 'natsu',
                "password" => 'natsu'
            )
        );
        if(isset($_POST['username']) && isset($_POST['password'])){
            //Sanitizing the inputs of the users. Mandatory to prevent injections!
            $username = htmlentities($_POST['username']);
            $password = htmlentities($_POST['password']);
            foreach($accounts as $keys => $value){
                //check if the username and password match in the array
                if($username == $value['username'] && $password == $value['password']){
                    //if match then save username, fullname and type as session to be reused somewhere else
                    $_SESSION['logged-in'] = $value['username'];
                    $_SESSION['fullname'] = $value['firstname'] . ' ' . $value['lastname'];
                    $_SESSION['user_type'] = $value['type'];
                    //display the appropriate dashboard page for user
                    if($value['type'] == 'admin'){
                        header('location: ../admin/dashboard.php');
                    }else{
                        header('location: ../login/login.php');
                    }
                }
            }
            //set the error message if account is invalid
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