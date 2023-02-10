
    <?php

    require_once '../class/database.php';
    require_once '../class/student.class.php';

    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }

        $student = new Student();

        //sanitize user inputs
        if(isset($_POST['save'])){
            //sanitize user inputs
            $student->id = $_POST['student-id'];
            $student->firstname = htmlentities($_POST['firstname']);
            $student->lastname = htmlentities($_POST['lastname']);
            $student->username = htmlentities($_POST['username']);
            $student->email = htmlentities($_POST['email']);
            $student->password = $_POST['password'];
            $student->course = $_POST['course'];
            $student->year_level = $_POST['year_level'];
            $student->section = $_POST['section'];
            $student->sem = $_POST['sem'];
            $student->type = $_POST['type'];

            if(isset($_POST)){
                if($student->edit_student()){
                    //redirect user to student page after saving
                    header('location: manage_students.php');
                }
            }
        }else{
            if ($student->fetch($_GET['id'])){
                $data = $student->fetch($_GET['id']);
                $student->firstname = $data['firstname'];
                $student->lastname = $data['lastname'];
                $student->username = $data['username'];
                $student->email = $data['email'];
                $student->password = $data['password'];
                $student->course = $data['course'];
                $student->year_level = $data['year_level'];
                $student->section = $data['section'];
                $student->sem = $data['sem'];
                $student->type = $data['type'];
            }
        }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="../img/rlogo.png" >
    <link rel="stylesheet" href="../css/style.css">
    <!--bOXiCON cdn-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CCS TR | Manage Students</title>

    <!--DATA TABLES LINK-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



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
                <a href="../admin/dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a  href="../admin/archives.php">
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
                <a class ="side-active" href="../admin/manage_students.php">
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
                <span class="admin_name"><?php echo $_SESSION['fullname']?></span>
                <i class='bx bx-chevron-down'></i>
            </div>

        </nav>

        <!--Table-->

    <div class="container padding-bottom">
        <div class="head-cont">
            <h3 class="table-title">Edit Student</h3>
        </div>
    </div>

    <div class="form-cont">

        <form class="edit-form" action="edit_student.php" method="POST">

            <input type="text" hidden name="student-id" value="<?php echo $data['id']; ?>">

            <div class="cont">
            <input class="form-input" type="text" id="firstname" name="firstname" placeholder="Enter First name*" required value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
            <input class="form-input" type="text" id="lastname" name="lastname" placeholder="Enter Last name*" required value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
            </div>

            <div class="cont">
            <input class="form-input" type="text" id="username" name="username" placeholder="Enter Username*" required value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
            <input class="form-input" type="email" id="email" name="email" placeholder="Enter Email*" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
            </div>

            <div class="cont">
            <input class="form-input" type="password" id="password" name="password" placeholder="Enter password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
            </div>


            <label for="course">Course</label>
            <select name="course" id="course">
                <option value="none <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'None') echo ' selected="selected"'; } ?>">--Select--</option>
                <option value="BSIT" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSCS') echo ' selected="selected"'; } ?>>BSCS</option>
                <option value="BSCS" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSIT') echo ' selected="selected"'; } ?>>BSIT</option>
            </select>



            <label for="year_level">Year Level</label>
            <select name="year_level" id="year_level">
                <option value="none" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                <option value="3rd Year" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == '3rd_year') echo ' selected="selected"'; } ?>>3rd Year</option>
                <option value="4th Year" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == '4th_year') echo ' selected="selected"'; } ?>>4th Year</option>
            </select>



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
                <option value="First Semester" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'fisrt_sem') echo ' selected="selected"'; } ?>>First Semester</option>
                <option value="Second Semester" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'second_sem') echo ' selected="selected"'; } ?>>Second Semester</option>
            </select>



            <label for="type">Regular?</label>
            <input type="radio" name="type" id="student" value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
            <label for="type">Irregular?</label>
            <input type="radio" name="type" id="student" value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
            <br>

            <input class="reset_btn form-input" type="reset" value="Clear all" name="clear">
            <input class="button form-input" type="submit" value="Save" name="save">
        </form>
    </div>

</section>