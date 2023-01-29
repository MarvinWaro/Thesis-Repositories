
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <title>CCS TR | Thesis Archives</title>
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

        <div class="table-content">
            <div class="table-container">
                <div class="table-heading">
                    <h3 class="table-title">Student</h3>
                    <a href="edit_student.php" class="add-button">Add New Student</a>
                 </div>

                <hr class="content-line">
                    <!--Filters-->
                <hr class="content-line">


            <table class="content-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>Semester</th>
                        <th class="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        //create an array for list of student, use session so we can access this anywhere
                        if(!isset($_SESSION['student'])){
                            $_SESSION['student'] = array(
                                "student1" => array(
                                    "fname" => 'Jaydee',
                                    "lname" => 'Ballaho',
                                    "username" => 'jaydee',
                                    "email" => 'jaydee.ballaho@wmsu.edu.ph',
                                    "course" => 'BSCS',
                                    "year_level" => '3rd Year',
                                    "section" => 'A',
                                    "sem" => 'First Sem'
                                ),
                                "student2" => array(
                                    "fname" => 'Marvin',
                                    "lname" => 'Waro',
                                    "username" => 'marvin',
                                    "email" => 'marvin@wmsu.edu.ph',
                                    "course" => 'BSCS',
                                    "year_level" => '3rd Year',
                                    "section" => 'B',
                                    "sem" => 'First Sem'
                                ),
                                "student3" => array(
                                    "fname" => 'Luffy',
                                    "lname" => 'Mugiwara',
                                    "username" => 'luffy',
                                    "email" => 'luffy@wmsu.edu.ph',
                                    "course" => 'BSIT',
                                    "year_level" => '4th Year',
                                    "section" => 'B',
                                    "sem" => 'Second Sem'
                                )
                            );
                        }
                        
                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        //loop for each record found in the array
                        foreach ($_SESSION['student'] as $key => $value){ //start of loop
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $i ?></td>
                            <td><?php echo $value['lname'] . ', ' . $value['fname'] ?></td>
                            <td><?php echo $value['username'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['course'] ?></td>
                            <td><?php echo $value['year_level'] ?></td>
                            <td><?php echo $value['section'] ?></td>
                            <td><?php echo $value['sem'] ?></td>
                            <?php
                                if($_SESSION['user_type'] == 'admin'){ 
                            ?>
                                <td>
                                    <div class="action">
                                        <a class="action-edit" href="#">Edit</a>
                                        <a class="action-delete" href="#">Delete</a>
                                        <a class="action-delete" href="#">View</a>
                                    </div>
                                </td>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        $i++;
                    //end of loop
                    }
                    ?>
                </tbody>
                </tbody>
            </table>
        </div>
        </div>

    </section>

    <script src="../js/script.js"></script>
</body>
</html>