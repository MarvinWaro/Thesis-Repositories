
<?php
    require_once '../class/database.php';
    require_once '../class/student.class.php';

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system

    if(isset($_POST['save'])){

        $student = new Student();
        //sanitize user inputs
        $student->firstname = htmlentities($_POST['firstname']);
        $student->middle_name = htmlentities($_POST['middle_name']);
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
                header('location: login.php');
            }
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/create.css" />
    <!-- end: CSS -->
    <title>Thesis Repository - Blank Page</title>
  </head>
<body>
  <div class="container">
    <div class="logo">
      <img class="rlogo" src="../img/rlogo.png" alt="logo ccs">
    </div>
    <div class="title">
      Create Account
      <a href="login.php"><i class="ri-arrow-go-back-line"></i></a>
    </div>
    <div class="content">
      <form action="create_account.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input class="form-input" type="text" id="firstname" name="firstname" placeholder="Enter First name*" required value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
          </div>
          <div class="input-box">
            <span class="details">Middle Name</span>
            <input class="form-input" type="text" id="middle_name" name="middle_name" placeholder="Enter Middle name (optional)*" value="<?php if(isset($_POST['middle_name'])) { echo $_POST['middle_name']; } ?>">
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input class="form-input" type="text" id="lastname" name="lastname" placeholder="Enter Last name*" required value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input class="form-input" type="text" id="username" name="username" placeholder="Enter Username*" required value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input class="form-input" type="email" id="email" name="email" placeholder="Enter Email*" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input class="form-input" type="password" id="password" name="password" placeholder="Enter password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
          </div>
          <div class="input-box">
            <span class="details">Course</span>
            <select name="course" id="course">
                <option value="none <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'None') echo ' selected="selected"'; } ?>">--Select--</option>
                <option value="BSIT" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSCS') echo ' selected="selected"'; } ?>>BSCS</option>
                <option value="BSCS" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSIT') echo ' selected="selected"'; } ?>>BSIT</option>
              </select>
          </div>
          <div class="input-box">
            <span class="details">Year Level</span>
            <select name="year_level" id="year_level">
              <option value="none" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
              <option value="3rd_year" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == '3rd_year') echo ' selected="selected"'; } ?>>3rd Year</option>
              <option value="4th_year" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == '4th_year') echo ' selected="selected"'; } ?>>4th Year</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Section</span>
            <select name="section" id="section">
              <option value="none"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
              <option value="A"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'A') echo ' selected="selected"'; } ?>>A</option>
              <option value="B"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'B') echo ' selected="selected"'; } ?>>B</option>
              <option value="C"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'C') echo ' selected="selected"'; } ?>>C</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Semester</span>
            <select name="sem" id="sem">
              <option value="none" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
              <option value="First_sem" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'fisrt_sem') echo ' selected="selected"'; } ?>>First Semester</option>
              <option value="Second_sem" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'second_sem') echo ' selected="selected"'; } ?>>Second Semester</option>
            </select>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="type" id="regular"  value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
          <input type="radio" name="type" id="irregular"  value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
          <span class="gender-title">Student Status</span>
          <div class="category">
            <label for="regular">
            <span class="dot one"></span>
            <span class="type">Regular</span>
          </label>
          <label for="irregular">
            <span class="dot two"></span>
            <span class="type">Irregular</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="save" value="Save">
        </div>
      </form>
    </div>
  </div>

  <script src="../assets/js/jquery.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
      integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <!--responsive-->
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>

</body>
</html>