
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


if(isset($_POST['save'])){

    $student = new Student();
    //sanitize user inputs
    $student->firstname = htmlentities($_POST['firstname']);
    $student->lastname = htmlentities($_POST['lastname']);
    $student->username = htmlentities($_POST['username']);
    $student->email = htmlentities($_POST['email']);
    $student->password = htmlentities($_POST['password']);
    $student->course = htmlentities($_POST['course']);
    $student->year_level = htmlentities($_POST['year_level']);
    $student->section = htmlentities($_POST['section']);
    $student->sem = htmlentities($_POST['sem']);
    $student->type = $_POST['type'];

    if(isset($_POST)){
        if($student->add()){
            //redirect user to create page after saving
            header('location: manage_students.php');
        }
    }
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
</section>