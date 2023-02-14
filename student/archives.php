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
    <link rel="shortcut icon" type="image" href="../img/rlogo.png" >
    <link rel="stylesheet" href="../css/style.css">
    <!--bOXiCON cdn-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CCS TR | Thesis Archives</title>

    <!--DATA TABLES LINK-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

     <!--responsive-->
     <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap.min.css">


    

</head>
<body>
    <div class="sidebar-admin">
        <div class="logo-details">
            <img class="sidebar-logo" src="../img/rlogo.png" alt="logo ccs">
            <span class="logo_name">Thesis Repositories</span>
        </div>

        <hr class="line-logout">

        <ul class="navi-links">
            <li>
                <a href="home.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link-name">Home</span>
                </a>
            </li>
            <li>
                <a href="thesis.php">
                    <i class='bx bx-folder-open'></i>
                    <span class="link-name">Thesis</span>
                </a>
            </li>

            <li>
                <a href="grades.php">
                    <i class='bx bx-note'></i>
                    <span class="link-name">Grades</span>
                </a>
            </li>
            <li>
                <a class ="side-active" href="archives.php">
                    <i class='bx bx-folder-open'></i>
                    <span class="link-name">Archives</span>
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
            <!--
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            -->

            <div class="profile-details">
                <i class='bx bx-user-circle'></i>
                <span class="admin_name"> <?php echo $_SESSION['fullname']?> </span>
                <i class='bx bx-chevron-down'></i>
            </div>

        </nav>

        <!--Table-->

        <div class="container">

                <div class="head-cont">
                    <h3 class="table-title">Archives</h3>
                </div>

                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titles</th>
                                <th>Department</th>
                                <th>Section</th>
                                <th>Date of Upload</th>
                                <th>Semester</th>
                                <th>Grade</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>BSCS</td>
                                <td>B</td>
                                <td>2011-04-25</td>
                                <td>First Semester</td>
                                <td>89%</td>
                                <td>
                                    <div class="actions">
                                        <a class="action-edit" href="#">Edit</a>
                                        <a class="action-delete" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Software Engineering</td>
                                <td>BSCS</td>
                                <td>B</td>
                                <td>2011-04-25</td>
                                <td>First Semester</td>
                                <td>89%</td>
                                <td>
                                    <div class="actions">
                                        <a class="action-edit" href="#">Edit</a>
                                        <a class="action-delete" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Cyber Crime</td>
                                <td>BSCS</td>
                                <td>B</td>
                                <td>2011-04-25</td>
                                <td>First Semester</td>
                                <td>89%</td>
                                <td>
                                    <div class="actions">
                                        <a class="action-edit" href="#">Edit</a>
                                        <a class="action-delete" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>

    </section>

    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    
     <!--responsive-->
     <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>


</body>
</html>