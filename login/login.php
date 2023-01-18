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
            <div class="logo-details">
                <span class="logo-name">Thesis Archives</span>
            </div>

            <hr class="divider">

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            <input class="button" type="submit" value="Login" name="login" tabindex="3">
            <a class="create" href="create.php">Create an account</a>
            <?php
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }

            ?>
        </form>
    </div>
</body>
</html>