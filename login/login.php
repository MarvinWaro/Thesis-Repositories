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
            <input type="text" id="username" name="username" placeholder="Enter username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
            <input class="button-login" type="submit" value="Login" name="login" tabindex="3">
            <a class="create" href="create_account.php">Create an account</a>

        </form>
    </div>
</body>
</html>