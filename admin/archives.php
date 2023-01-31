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
    <title>CCS TR | Thesis Archives</title>

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
                <a href="../admin/dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a class ="side-active" href="../admin/archives.php">
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

        <div class="table-content">
            <div class="table-container">
                <div class="table-heading">
                    <h3 class="table-title">List of Archives</h3>
                 </div>

                <hr class="content-line">
                    <!--Filters-->
                    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search...">
                <hr class="content-line">

    </div>

    <table class="content-table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titles</th>
                        <th>Department</th>
                        <th>Section</th>
                        <th>Date of Upload</th>
                        <th>Semester</th>
                        <th>Grade</th>
                        <th class="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Infliction of Internet Fraud</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Hotel reservation System</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Booking Systems</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cyber Crime</td>
                        <td>BSCS</td>
                        <td>3A</td>
                        <td>January 2 2004</td>
                        <td>First Semester</td>
                        <td>89.3%</td>
                        <td>
                            <div class="action">
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">View</a>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </section>

    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

</body>
</html>