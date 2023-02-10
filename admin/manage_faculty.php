<?php

        require_once '../class/database.php';
        require_once '../class/faculty.class.php';



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

            $faculty = new Faculty();
            //sanitize user inputs
            $faculty->firstname = htmlentities($_POST['firstname']);
            $faculty->lastname = htmlentities($_POST['lastname']);
            $faculty->username = htmlentities($_POST['username']);
            $faculty->email = htmlentities($_POST['email']);
            $faculty->password = htmlentities($_POST['password']);
            $faculty->department = htmlentities($_POST['department']);
            $faculty->type = $_POST['type'];
            if(isset($_POST)){
                if($faculty->add()){
                    //redirect user to create page after saving
                    header('location: manage_faculty.php');
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
    <link rel="shortcut icon" type="image" href="../img/rlogo.png" >
    <link rel="stylesheet" href="../css/style.css">
    <!--bOXiCON cdn-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CCS TR | Manage Faculty</title>

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

        <hr class="line-ko">

        <ul class="navi-links">
            <li>
                <a href="../admin/dashboard.php">
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
                <a class ="side-active" href="../admin/manage_faculty.php">
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

        <div class="container">
            <div class="head-cont">
                <h3 class="table-title">Faculty</h3>
                <button type="button" class="btn btn-primary add-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add new Faculty
                </button>
            </div>
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Department</th>
                                <?php
                                    if($_SESSION['user_type'] == 'admin'){ 
                                ?>
                                    <th class="action">Action</th>
                                <?php
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once '../class/faculty.class.php';

                            $faculty = new Faculty();
                            //We will now fetch all the records in the array using loop
                            //use as a counter, not required but suggested for the table
                            $i = 1;
                            //loop for each record found in the array
                            foreach ($faculty->show() as $value){ //start of loop
                        ?>
                            <tr>
                                <!-- always use echo to output PHP values -->
                                <td><?php echo $i ?></td>
                                <td><?php echo $value['lastname'] . ', ' . $value['firstname'] ?></td>
                                <td><?php echo $value['email'] ?></td>
                                <td><?php echo $value['username'] ?></td>
                                <td><?php echo $value['department'] ?></td>
                                <?php
                                    if($_SESSION['user_type'] == 'admin'){ 
                                ?>
                                    <td>
                                        <div class="actions">
                                            <a class="action-edit" href="#">Edit</a>
                                             <a class="action-delete" href="delete_faculty.php?id=<?php echo $value['id'] ?>" >Delete</a>
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
                    </table>
                </div>
    </div>

<!--modal-->


        <div class="modal fade>" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Faculty</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <form class="add-form" action="manage_faculty.php" method="post">


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
                                <select name="department" id="department">
                                    <option value="none <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'None') echo ' selected="selected"'; } ?>">--Select Department--</option>
                                    <option value="BSCS" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSCS') echo ' selected="selected"'; } ?>>BSCS</option>
                                    <option value="BSIT" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSIT') echo ' selected="selected"'; } ?>>BSIT</option>
                                </select>
                                </div>

                                <div class="cont">
                                <label for="type">Active?</label>
                                <input class="checkbox" type="checkbox" name="type" id="faculty" value="faculty" required <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'faculty') echo ' checked'; } ?>>
                                </div>

                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!--<button type="submit" value="Save" name="save" class="btn btn-primary">Save changes</button>-->
                                    <input class="button form-input" type="submit" value="Save" name="save">
                                </div>
                        </div>
                    </form>
                </div>
            </div>

    </section>

    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>

    <!--responsive-->
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
</body>
</html>