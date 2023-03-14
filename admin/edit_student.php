
    <?php

    require_once '../tools/functions.php';
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


    if(isset($_POST['save'])){
      //sanitize user inputs
      $student->id = $_POST['student-id'];
      $student->firstname = htmlentities($_POST['firstname']);
      $student->middle_name = htmlentities($_POST['middle_name']);
      $student->lastname = htmlentities($_POST['lastname']);
      $student->username = htmlentities($_POST['username']);
      $student->email = htmlentities($_POST['email']);
      $student->password = htmlentities($_POST['password']);
      $student->course = htmlentities($_POST['course']);
      $student->year_and_section = htmlentities($_POST['year_and_section']);
      $student->sem = htmlentities($_POST['sem']);
      $student->school_year = htmlentities($_POST['school_year']);
      $student->your_adviser = htmlentities($_POST['your_adviser']);
      $student->your_group = htmlentities($_POST['your_group']);
      $student->type = $_POST['type'];
      if(isset($_POST)){
          if($student->edit_student()){
              //redirect user to create page after saving
              header('location: manage_students.php');
          }
      }
  }else{
      if ($student->fetch($_GET['id'])){
          $data = $student->fetch($_GET['id']);
          $student->firstname = $data['firstname'];
          $student->middle_name = $data['middle_name'];
          $student->lastname = $data['lastname'];
          $student->username = $data['username'];
          $student->email = $data['email'];
          $student->password = $data['password'];
          $student->course = $data['course'];
          $student->year_and_section = $data['year_and_section'];
          $student->sem = $data['sem'];
          $student->school_year = $data['school_year'];
          $student->your_adviser = $data['your_adviser'];
          $student->your_group = $data['your_group'];
          $student->type = $data['type'];
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
          <a href="manage_students.php">
            <i class="ri-user-line sidebar-menu-item-icon"></i>
            Manage Student
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="manage_student.php">
            <i class="ri-group-line sidebar-menu-item-icon"></i>
            Manage student
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
            Schedules
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
          <h5 class="fw-bold mb-0 me-auto">Student</h5>
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
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="../login/logout.php">Logout </a></li>
            </ul>
          </div>
        </nav>
        <!-- end: Navbar -->

        <!-- start: Content -->
        <div class="py-4">
          <!-- start: Summary -->
           <div class="main-content border">
              <div class="form-cont">
                  <form class="edit-form" action="edit_student.php" method="POST">
                    <div class="d-flex justify-content-between pt-2 pb-3">
                        <h3>Update Student</h3>
                        <a href="manage_students.php"><i class="ri-arrow-go-back-line back pb-2"></i>Back</a>
                    </div>

                      <input type="text" hidden name="student-id" value="<?php echo $data['id']; ?>">

                      <div class="cont">
                      <label for="firstname">First Name</label>
                      <input class="form-input" type="text" id="firstname" name="firstname" placeholder="Enter First name*" value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } else { echo $data['firstname']; }?>">
                      
                      <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                        ?>
                                    <p class="error">First name is invalid. Trailing spaces will be ignored.</p>
                        <?php
                            }
                        ?>

                      <label for="middle_name">Middle Name</label>
                      <input class="form-input" type="text" id="middle_name" name="middle_name" placeholder="Enter Middle name" value="<?php if(isset($_POST['middle_name'])) { echo $_POST['middle_name']; } else { echo $data['middle_name']; }?>">
                      
                      <label for="lastname">Last Name</label>
                      <input class="form-input" type="text" id="lastname" name="lastname" placeholder="Enter Last name*" value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } else { echo $data['lastname']; }?>">
                      
                      <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                        ?>
                                    <p class="error">Last name is invalid. Trailing spaces will be ignored.</p>
                        <?php
                            }
                        ?>

                    </div>

                      <div class="cont">
                      <label for="username">Username</label>
                      <input class="form-input" type="text" id="username" name="username" placeholder="Enter Username*" value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } else { echo $data['username']; }?>">
                      
                      <?php
                            if(isset($_POST['save']) && !validate_username($_POST)){
                        ?>
                                    <p class="error">Username is invalid. Trailing spaces will be ignored.</p>
                        <?php
                            }
                        ?>
                      
                      <label for="email">Email</label>
                      <input class="form-input" type="email" id="email" name="email" placeholder="Enter Email*"  value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } else { echo $data['email']; }?>">
                      </div>

                      <?php
                            if(isset($_POST['save']) && !validate_email($_POST)){
                        ?>
                              <p class="error">Email is invalid. Use only @wmsu.edu.ph</p>
                        <?php
                            }
                        ?>

                      <div class="cont">
                      <label for="password">Password</label>
                      <input class="form-input" type="password" id="password" name="password" placeholder="Enter password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } else { echo $data['password']; }?>">
                      </div>



                      <div class="cont">
                      <label for="course">Course</label>
                      <select name="course" id="course">
                          <option value="None" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'None') echo ' selected="selected"'; } ?>>--Select Course--</option>
                          <option value="BSIT" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSCS') echo ' selected="selected"'; } else { echo $data['course']; }?> >BSCS</option>
                          <option value="BSCS" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSIT') echo ' selected="selected"'; } else { echo $data['course']; }?> >BSIT</option>
                      </select>
                      <?php
                        if(isset($_POST['save']) && !validate_course($_POST)){
                      ?>
                        <p class="error">Please select a course from the dropdown.</p>
                      <?php
                          }
                      ?>
                      </div>

                      
                      <div class="cont">
                      <label for="year_and_section">Year & Section</label>
                      <select name="year_and_section" id="year_and_section">
                          <option value="None" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == 'None') echo ' selected="selected"'; } ?>>--Select Year & Section--</option>
                          <option value="3-A" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '3-A') echo ' selected="selected"'; } ?>>3-A</option>
                          <option value="3-B" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '3-B') echo ' selected="selected"'; } ?>>3-B</option>
                          <option value="3-C" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '3-C') echo ' selected="selected"'; } ?>>3-C</option>
                          <option value="4-A" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '4-A') echo ' selected="selected"'; } ?>>4-A</option>
                          <option value="4-B" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '4-B') echo ' selected="selected"'; } ?>>4-B</option>
                        </select>
                      </div>


                        


                      <div class="cont">
                      <label for="sem">Semester</label>
                      <select name="sem" id="sem">
                          <option value="None" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'None') echo ' selected="selected"'; } ?>>--Select Semester--</option>
                          <option value="First Semester" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'First Semester') echo ' selected="selected"'; } ?>>First Semester</option>
                          <option value="Second Semester" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'Second Semester') echo ' selected="selected"'; } ?>>Second Semester</option>
                      </select>
                      </div>

                       

                      
                      <div class="cont">
                      <label for="your_adviser">Adviser</label>
                      <select name="your_adviser" id="your_adviser">
                          <option value="None" <?php if(isset($_POST['your_adviser'])) { if ($_POST['your_adviser'] == 'None') echo ' selected="selected"'; } ?>>--Select Adviser--</option>
                          <option value="Jaydee Ballaho" <?php if(isset($_POST['your_adviser'])) { if ($_POST['your_adviser'] == 'Jaydee Ballaho') echo ' selected="selected"'; } ?>>Jaydee Ballaho</option>
                          <option value="Marjorie Rojas" <?php if(isset($_POST['your_adviser'])) { if ($_POST['your_adviser'] == 'Marjorie Rojas') echo ' selected="selected"'; } ?>>Marjorie Rojas</option>
                      </select>
                      </div>

                      

                      <div class="cont">
                      <label for="your_group">Group no.</label>
                      <select name="your_group" id="your_group">
                      <option value="None" <?php if(isset($_POST['your_group'])) { if ($_POST['your_group'] == 'None') echo ' selected="selected"'; } ?>>--Select Group No.--</option>
                        <option value="1" <?php if(isset($_POST['your_group'])) { if ($_POST['your_group'] == '1') echo ' selected="selected"'; } ?>>Group 1</option>
                      </select>
                      </div>

                     

                      <div class="cont">
                      <label for="school_year">School Year</label>
                      <select name="school_year" id="school_year">
                        <option value="2022-2023" <?php if(isset($_POST['school_year'])) { if ($_POST['school_year'] == '2022-2023') echo ' selected="selected"'; } ?>>2022-2023</option>
                      </select>
                      </div>



                      <label for="type">Regular?</label>
                      <input type="radio" name="type" id="student" required value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
                      <label for="type">Irregular?</label>
                      <input type="radio" name="type" id="student" required value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
                      <br>

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
