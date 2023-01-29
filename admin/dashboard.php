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
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <img class="sidebar-logo" src="../img/rlogo.png" alt="logo ccs">
            <span class="logo_name">Thesis Repositories</span>
        </div>

        <hr class="line">

        <ul class="nav-links">
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
        <div class="table-content">
            <div class="table-container">
                    <div class="table-heading">
                        <h3 class="dashboard">Dashboard</h3>
                    </div>
            </div>
        </div>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <i class='bx bx-user user'></i>
                    <div class="left-side">
                        <div class="box_topic">Student</div>
                        <div class="number">347</div>
                        <!--<div class="indicator-symbol">
                            <i class='bx bxs-user'></i>
                            <span class="text">Added from Yesterday</span>
                        </div>-->
                    </div>
                    
                </div>
                <div class="box">
                    <i class='bx bx-group user-2'></i>
                    <div class="left-side">
                        <div class="box_topic">Faculty</div>
                        <div class="number">10</div>
                        <!--<div class="indicator-symbol">
                            <i class='bx bxs-user'></i>
                            <span class="text">Added from Yesterday</span>
                        </div>-->
                    </div>
                    
                </div>
                <div class="box">
                    <i class='bx bx-folder-open user-3'></i>
                    <div class="left-side">
                        <div class="box_topic">Archives</div>
                        <div class="number">1,090</div>
                        <!--<div class="indicator-symbol">
                            <i class='bx bxs-user'></i>
                            <span class="text">Added from Yesterday</span>
                        </div>-->
                    </div>
                    
                </div>
            </div>
        </div>

    </section>

    <script src="../js/script.js"></script>
</body>
</html>