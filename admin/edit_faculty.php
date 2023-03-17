
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

$faculty = new Faculty();

//sanitize user inputs
if(isset($_POST['save'])){
    //sanitize user inputs
    $faculty->id = $_POST['faculty-id'];
    $faculty->firstname = htmlentities($_POST['firstname']);
    $faculty->middle_name = htmlentities($_POST['middle_name']);
    $faculty->lastname = htmlentities($_POST['lastname']);
    $faculty->username = htmlentities($_POST['username']);
    $faculty->email = htmlentities($_POST['email']);
    $faculty->password = htmlentities($_POST['password']);
    $faculty->department = htmlentities($_POST['department']);
    $faculty->type = $_POST['type'];
    if(isset($_POST)){
        if($faculty->edit_faculty()){
            //redirect user to create page after saving
            header('location: manage_faculty.php');
        }
    }
}else{
    if ($faculty->fetch($_GET['id'])){
        $data = $faculty->fetch($_GET['id']);
        $faculty->firstname = $data['firstname'];
        $faculty->middle_name = $data['middle_name'];
        $faculty->lastname = $data['lastname'];
        $faculty->username = $data['username'];
        $faculty->email = $data['email'];
        $faculty->password = $data['password'];
        $faculty->department = $data['department'];
        $faculty->type = $data['type'];
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- start: Icons -->
<link
  href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
  rel="stylesheet"
/>
<!-- start: Icons -->
<!-- start: CSS -->
<link rel="icon" href="../img/rlogo.png" type="image/icon type">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/css/style.css" />
<!-- end: CSS -->
<title>Thesis Repository - Blank Page</title>
</head>

<body>
<!-- start: Sidebar -->
<div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
  <div class="d-flex align-items-center p-3">
    <a
      href="#"
      class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4"
      >Thesis Repository</a
    >
    <i
      class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"
    ></i>
  </div>
  <ul class="sidebar-menu p-3 m-0 mb-0">
    <li class="sidebar-menu-item ">
      <a href="dashboard.php">
        <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
        Dashboard
      </a>
    </li>
    <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Thesis</li>
    <li class="sidebar-menu-item">
      <a href="archives.php">
        <i class="ri-archive-drawer-line sidebar-menu-item-icon"></i>
        Archives
      </a>
    </li>
    <li class="sidebar-menu-item has-dropdown">
      <a href="thesis_status.php">
          <i class="ri-bar-chart-box-line sidebar-menu-item-icon"></i>
          Thesis Status
          <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
      </a>
      <ul class="sidebar-dropdown-menu">
          <li class="sidebar-dropdown-menu-item">
              <a href="accepted.php">
                  Accepted Titles
              </a>
          </li>
          <li class="sidebar-dropdown-menu-item">
              <a href="rejected.php">
                  Rejected Titles
              </a>
          </li>
      </ul>
  </li>

    <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Manage</li>

    <li class="sidebar-menu-item active">
      <a href="manage_facultys.php">
        <i class="ri-user-line sidebar-menu-item-icon"></i>
        Manage faculty
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="manage_faculty.php">
        <i class="ri-group-line sidebar-menu-item-icon"></i>
        Manage Faculty
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="manage_rubrics.php">
        <i class="ri-table-2 sidebar-menu-item-icon"></i>
        Manage Rubrics
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="manage_schedules.php">
        <i class="ri-calendar-2-line sidebar-menu-item-icon"></i>
        Manage Events
      </a>
    </li>
  </ul>
</div>
<div class="sidebar-overlay"></div>
<!-- end: Sidebar -->

<!-- start: Main -->
<main class="bg-light">
  <div class="p-2">
    <!-- start: Navbar -->
    <nav class="px-3 py-2 bg-white rounded shadow-sm">
      <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
      <h5 class="fw-bold mb-0 me-auto">faculty</h5>
      <div class="dropdown me-3 d-none d-sm-block">
        <div
          class="cursor-pointer dropdown-toggle navbar-link"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="ri-notification-line"></i>
        </div>
        <div class="dropdown-menu fx-dropdown-menu">
          <h5 class="p-3 bg-indigo text-light">Notification</h5>
          <div class="list-group list-group-flush">
            <a
              href="#"
              class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
            >
              <div class="me-auto">
                <div class="fw-semibold">Subheading</div>
                <span class="fs-7">Content for list item</span>
              </div>
              <span class="badge bg-primary rounded-pill">14</span>
            </a>
            <a
              href="#"
              class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
            >
              <div class="me-auto">
                <div class="fw-semibold">Subheading</div>
                <span class="fs-7">Content for list item</span>
              </div>
              <span class="badge bg-primary rounded-pill">14</span>
            </a>
            <a
              href="#"
              class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
            >
              <div class="me-auto">
                <div class="fw-semibold">Subheading</div>
                <span class="fs-7">Content for list item</span>
              </div>
              <span class="badge bg-primary rounded-pill">14</span>
            </a>
            <a
              href="#"
              class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
            >
              <div class="me-auto">
                <div class="fw-semibold">Subheading</div>
                <span class="fs-7">Content for list item</span>
              </div>
              <span class="badge bg-primary rounded-pill">14</span>
            </a>
            <a
              href="#"
              class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
            >
              <div class="me-auto">
                <div class="fw-semibold">Subheading</div>
                <span class="fs-7">Content for list item</span>
              </div>
              <span class="badge bg-primary rounded-pill">14</span>
            </a>
          </div>
        </div>
      </div>
      <div class="dropdown">
        <div
          class="d-flex align-items-center cursor-pointer dropdown-toggle"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <span class="me-2 d-none d-sm-block"><?php echo $_SESSION['fullname'] ?></span>
          <img
            class="navbar-profile-image"
            src="../img/u-icon.png" alt="Image"
          />
        </div>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="profile.php"><i class="ri-user-settings-line me-2"></i>Profile</a></li>
          <li><a class="dropdown-item" href="settings.php"><i class="ri-settings-3-line me-2"></i>Settings</a></li>
          <hr class="w-100">
          <li><a class="dropdown-item" href="../login/logout.php"><i class="ri-logout-box-line me-2"></i>Logout</a></li>
        </ul>
      </div>
    </nav>
    <!-- end: Navbar -->

    <!-- start: Content -->
    <div class="py-4">
      <!-- start: Summary -->
       <div class="main-content border">
          <div class="form-cont">
                <form class="edit-form" action="edit_faculty.php" method="post">

                  <div class="d-flex justify-content-between pt-2 pb-3">
                      <h3>Update Faculty</h3>
                      <a href="manage_faculty.php"><i class="ri-arrow-go-back-line back pb-2"></i>Back</a>
                  </div>

                  <input type="text" hidden name="faculty-id" value="<?php echo $data['id']; ?>">

                  <div class="cont">
                  <label for="firstname">First Name</label>
                  <input class="form-input me-2" type="text" id="firstname" name="firstname" placeholder="Enter First name*" required value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } else { echo $data['firstname']; } ?>">
                  <label for="middle_name">Middle Name</label>
                  <input class="form-input" type="text" id="middle_name" name="middle_name" placeholder="Enter Middle name (optional)*" value="<?php if(isset($_POST['middle_name'])) { echo $_POST['middle_name']; } else { echo $data['middle_name']; } ?>">
                  </div>

                  <div class="cont">
                  <label for="lastname">Last Name</label>
                  <input class="form-input me-2" type="text" id="lastname" name="lastname" placeholder="Enter Last name*" required value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } else { echo $data['lastname']; } ?>">
                  <label for="username">Username</label>
                  <input class="form-input" type="text" id="username" name="username" placeholder="Enter Username*" required value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } else { echo $data['username']; } ?>">
                  </div>

                  <div class="cont">
                  <label for="email">Email </label>
                  <input class="form-input me-2" type="email" id="email" name="email" placeholder="Enter Email*" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } else { echo $data['email']; } ?>">
                  <label for="password">Password</label>
                  <input class="form-input" type="password" id="password" name="password" placeholder="Enter password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } else { echo $data['password']; } ?>">
                  </div>

                  <div class="cont">
                  <label for="department">Department</label>
                  <select name="department" id="department">
                    <option value="none <?php if(isset($_POST['department'])) { if ($_POST['department'] == 'None') echo ' selected="selected"'; } ?>">--Select Department--</option>
                    <option value="Computer Science" <?php if(isset($_POST['department'])) { if ($_POST['department'] == 'Computer Science') echo ' selected="selected"'; } ?>>Computer Science</option>
                    <option value="Information Technolgy" <?php if(isset($_POST['department'])) { if ($_POST['department'] == 'Information Technology') echo ' selected="selected"'; } ?>>Information Technology</option>
                  </select>
                  </div>

                  

                  <div class="cont">
                    <label class="container-label label-font">Active
                      <input type="checkbox" checked="checked" class="checkbox" name="type" id="faculty" value="faculty" required <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'faculty') echo ' checked'; } ?>>
                      <span class="checkmark"></span>
                    </label>
                  </div>


                  <div class="pbutton">
                      <input class="save-btn form-input" type="submit" value="Save" name="save">
                  </div>

                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end: Summary -->
      <!-- start: Graph -->

      <!-- end: Graph -->
    </div>
    <!-- end: Content -->
  </div>
</main>
<!-- end: Main -->

<!-- start: JS -->
<script src="../assets/js/jquery.min.js"></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
  integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script>
<!-- end: JS -->
</body>
</html>
