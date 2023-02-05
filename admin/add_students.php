<?php


        session_start();
        /*
            if user is not login then redirect to login page,
            this is to prevent users from accessing pages that requires
            authentication such as the dashboard
        */
        if (!isset($_SESSION['logged-in'])){
            header('location: ../login/login.php');
        }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!--bOXiCON cdn-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CCS TR | Dashboard</title>

    <!--DATA TABLES LINK-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

</head>
<body>
    <div class="sidebar-admin">
        <div class="logo-details">
            <img class="sidebar-logo" src="../img/rlogo.png" alt="logo ccs">
            <span class="logo_name">Thesis Repositories</span>
        </div>

        <hr class="line-ko">

        <ul class="navi-links">
            <li>
                <a class ="side-active" href="../admin/dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../admin/archives.php">
                    <i class='bx bx-folder-open'></i>
                    <span class="link-name">Archives</span>
                </a>
            </li>
            <li>
                <a href="../admin/thesis_status.php">
                    <i class='bx bx-task'></i>
                    <span class="link-name">Thesis Status</span>
                </a>

            </li>
            <li>
                <a href="../admin/manage_students.php">
                    <i class='bx bx-user'></i>
                    <span class="link-name">Manage Student</span>
                </a>
            </li>
            <li>
                <a href="../admin/manage_faculty.php">
                    <i class='bx bx-group' ></i>
                    <span class="link-name">Manage Faculty</span>
                </a>
            </li>
            <li>
                <a href="../admin/manage_schedules.php">
                    <i class='bx bx-calendar' ></i>
                    <span class="link-name">Managae Schedule</span>
                </a>
            </li>
            <li>
                <a href="../admin/manage_rubricks.php">
                    <i class='bx bx-note'></i>
                    <span class="link-name">Manage Rubricks</span>
                </a>
            </li>
            
            <hr class="line-logout">

            <li class="logout" id="logout-link">
                <a href="../login/logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link-name">Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!--Homecontent-->

    <section class="home-section">
        <nav>
            <div class="sidebar-menu">
                <i class='bx bx-menu sidebarBtn'></i>
            </div>

            <div class="profile-details">
                <i class='bx bx-user-circle'></i>
                <span class="admin_name"> <?php echo $_SESSION['fullname']?> </span>
                <i class='bx bx-chevron-down'></i>
            </div>

        </nav>

        <!--Home CONTENT-->

            <div class="container">

                <div class="head-cont">
                    <h3 class="table-title">Add Student</h3>
                </div>

                <form class="add-form" action="create_account.php" method="post">

                    <label for="firstname">First name</label>
                    <input class="form-input" type="text" id="firstname" name="firstname" placeholder="Enter First name*" required value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
                    <label for="lastname">Last name</label>
                    <input class="form-input" type="text" id="lastname" name="lastname" placeholder="Enter Last name*" required value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
                    <br>

                    <label for="username">Username</label>
                    <input class="form-input" type="text" id="username" name="username" placeholder="Enter Username*" required value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
                    <label for="email">Email</label>
                    <input class="form-input" type="email" id="email" name="email" placeholder="Enter Email*" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                    <br>

                    <label for="password">Password</label>
                    <input class="form-input" type="password" id="password" name="password" placeholder="Enter password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
                    <br>

                    <label for="course">Course</label>
                    <select name="course" id="course">
                        <option value="none <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'None') echo ' selected="selected"'; } ?>">--Select--</option>
                        <option value="BSIT" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSCS') echo ' selected="selected"'; } ?>>BSCS</option>
                        <option value="BSCS" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSIT') echo ' selected="selected"'; } ?>>BSIT</option>
                    </select>
                    <label for="year_level">Year Level</label>
                    <select name="year_level" id="year_level">
                        <option value="none" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                        <option value="3rd_year" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == '3rd_year') echo ' selected="selected"'; } ?>>3rd Year</option>
                        <option value="4th_year" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == '4th_year') echo ' selected="selected"'; } ?>>4th Year</option>
                    </select>

                    <br>
                    <label for="section">Section</label>
                    <select name="section" id="section">
                        <option value="none"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                        <option value="A"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'A') echo ' selected="selected"'; } ?>>A</option>
                        <option value="B"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'B') echo ' selected="selected"'; } ?>>B</option>
                        <option value="C"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'C') echo ' selected="selected"'; } ?>>C</option>
                    </select>
                    <label for="sem">Semester</label>
                    <select name="sem" id="sem">
                        <option value="none" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                        <option value="First_sem" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'fisrt_sem') echo ' selected="selected"'; } ?>>First Semester</option>
                        <option value="Second_sem" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'second_sem') echo ' selected="selected"'; } ?>>Second Semester</option>
                    </select>

                    <label for="type">Regular?</label>
                    <input type="radio" name="type" id="student" value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
                    <label for="type">Irregular?</label>
                    <input type="radio" name="type" id="student" value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
                    <br>

                    <input class="reset_btn form-input" type="reset" value="Clear all" name="clear">
                    <input class="button form-input" type="submit" value="Save" name="save">
                    <br>

                </form>

            </div>

    </section>

    <script src="../js/script.js"></script>
</body>
</html>