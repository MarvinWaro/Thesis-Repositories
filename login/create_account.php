<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>CCS Thesis Repositories | Create account</title>
</head>
<body>
        <div class="create-container">
            <form class="create-form" action="create_account.php" method="post">

                <div class="logo">
                    <img class="login-logo" src="../img/rlogo.png" alt="logo ccs">
                </div>

                    <h3>Create Account</h3>

                <hr class="divider">

                <label for="fname">First name</label>
                <input class="input" type="text" id="fname" name="fname" placeholder="Enter First name*" required>
                <label for="lname">Last name</label>
                <input class="input" type="text" id="lname" name="lname" placeholder="Enter Last name*" required>
                <br>

                <label for="username">Username</label>
                <input class="input" type="text" id="username" name="username" placeholder="Enter Username*" required>
                <label for="email">Email</label>
                <input class="input" type="email" id="email" name="email" placeholder="Enter Email*" required>
                <br>

                <label for="password">Password</label>
                <input class="input" type="password" id="password" name="password" placeholder="Enter password" required>
                <label for="password">Re-Enter Password</label>
                <input class="input" type="password" id="password" name="password" placeholder="Enter Re-Enter Password*" required>
                <br>

                <label for="course">Course</label>
                <select name="course" id="course">
                    <option value="none">--Select--</option>
                    <option value="bscs">BSCS</option>
                    <option value="bsit">BSIT</option>
                </select>
                <label for="year_level">Year Level</label>
                <select name="year_level" id="year_level">
                    <option value="none">--Select--</option>
                    <option value="3rd_year">3rd Year</option>
                    <option value="4th_year">4th Year</option>
                </select>

                <br>
                <label for="section">Section</label>
                <select name="section" id="section">
                    <option value="none">--Select--</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>
                <label for="sem">Semester</label>
                <select name="sem" id="sem">
                    <option value="none">--Select--</option>
                    <option value="first_sem">First Semester</option>
                    <option value="second_sem">Second Semester</option>
                </select>




                <input class="button" type="submit" value="Save" name="save">
                <a class="create" href="login.php">Back to Login</a>

            </form>
        </div>
</body>
</html>