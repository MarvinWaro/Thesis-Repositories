
<?php

    require_once '../tools/functions.php';
    require_once '../class/database.php';
    require_once '../class/dbconfig.php';
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
        $student->year_and_section = htmlentities($_POST['year_and_section']);
        $student->sem = htmlentities($_POST['sem']);
        $student->school_year = htmlentities($_POST['school_year']);
        $student->your_adviser = htmlentities($_POST['your_adviser']);
        $student->your_group = htmlentities($_POST['your_group']);
        $student->type = isset($_POST['type']) ? $_POST['type'] : '';

        if(validate_add_student($_POST)){
            if($student->add()){
                //redirect user to create page after saving
                header('location: login.php');
            }
        }
    }

    $s =  mysqli_query($conn, "SELECT * FROM faculty");

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
            <input class="form-input" type="text" id="firstname" name="firstname" placeholder="Enter First name*" value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">

                    <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                                <p class="error">First name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>

          </div>





          <div class="input-box">
            <span class="details">Middle Name</span>
            <input class="form-input" type="text" id="middle_name" name="middle_name" placeholder="Enter Middle name (optional)*" value="<?php if(isset($_POST['middle_name'])) { echo $_POST['middle_name']; } ?>">
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input class="form-input" type="text" id="lastname" name="lastname" placeholder="Enter Last name*" value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
          
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Last name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
          
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input class="form-input" type="text" id="username" name="username" placeholder="Enter Username*" value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
          
                    <?php
                        if(isset($_POST['save']) && !validate_username($_POST)){
                    ?>
                                <p class="error">Username is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
          
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input class="form-input" type="email" id="email" name="email" placeholder="Enter Email*" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">

            <?php
                  if(isset($_POST['save']) && !validate_email($_POST)){
              ?>
                          <p class="error">Email is invalid. Use only @wmsu.edu.ph</p>
              <?php
                  }
              ?>

          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input class="form-input" type="password" id="password" name="password" placeholder="Enter password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
          </div>
          <div class="input-box">
            <span class="details">Course</span>
            <select name="course" id="course">
                <option value="None" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                <option value="BSIT" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSIT') echo ' selected="selected"'; } ?>>BSIT</option>
                <option value="BSCS" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSCS') echo ' selected="selected"'; } ?>>BSCS</option>
              </select>

              <?php
                    if(isset($_POST['save']) && !validate_course($_POST)){
                ?>
                      <p class="error">Please choose a course from the dropdown list to proceed.</p>
                <?php
                    }
                ?>


          </div>



          <div class="input-box">
            <span class="details">Year & Section</span>
            <select name="year_and_section" id="year_and_section">
                <option value="None" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                <option value="3-A" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '3-A') echo ' selected="selected"'; } ?>>3-A</option>
                <option value="3-B" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '3-B') echo ' selected="selected"'; } ?>>3-B</option>
                <option value="3-C" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '3-C') echo ' selected="selected"'; } ?>>3-C</option>
                <option value="4-A" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '4-A') echo ' selected="selected"'; } ?>>4-A</option>
                <option value="4-B" <?php if(isset($_POST['year_and_section'])) { if ($_POST['year_and_section'] == '4-B') echo ' selected="selected"'; } ?>>4-B</option>
              </select>

              <?php
                    if(isset($_POST['save']) && !validate_year_and_section($_POST)){
                ?>
                      <p class="error">Please choose a year and section from the dropdown list to proceed.</p>
                <?php
                    }
                ?>


          </div>
          <div class="input-box">
            <span class="details">Semester</span>
            <select name="sem" id="sem">
              <option value="None" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
              <option value="First Semester" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'First Semester') echo ' selected="selected"'; } ?>>First Semester</option>
              <option value="Second Semester" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'Second Semester') echo ' selected="selected"'; } ?>>Second Semester</option>
            </select>


            <?php
                    if(isset($_POST['save']) && !validate_semester($_POST)){
                ?>
                      <p class="error">Please choose semester from the dropdown list to proceed.</p>
                <?php
                    }
                ?>


          </div>

          <div class="input-box">
            <span class="details">Your Group</span>
            <input class="form-input" type="number" id="your_group" name="your_group" min="1" required placeholder="Group no.*" value="<?php if(isset($_POST['your_group'])) { echo $_POST['your_group']; } ?>">
          </div>



          <div class="input-box">
            <span class="details">Your Adviser</span>
            <select name="your_adviser" id="your_adviser">
              <option value="None" <?php if(isset($_POST['your_adviser'])) { if ($_POST['your_adviser'] == 'None') echo ' selected="selected"'; } ?>>--Select Adviser--</option>
              <?php
                  while($r = mysqli_fetch_array($s)){
              ?>
              <option value="<?php echo $r['firstname'] .' '. $r['lastname'];?>" <?php if(isset($_POST['your_adviser'])) { if ($_POST['your_adviser'] == $r['firstname'] .' '. $r['lastname']) echo ' selected="selected"'; } ?>><?php echo$r['firstname'] .' '. $r['lastname'];?> </option>
              <?php
                  }
              ?>
              </select>

            <?php
                    if(isset($_POST['save']) && !validate_adviser($_POST)){
                ?>
                      <p class="error">Please choose your adviser from the dropdown list to proceed.</p>
                <?php
                    }
                ?>



          </div>


          <div class="input-box">
            <span class="details">School Year</span>
            <select name="school_year" id="school_year">
              <option value="2022-2023" <?php if(isset($_POST['school_year'])) { if ($_POST['school_year'] == '2022-2023') echo ' selected="selected"'; } ?>>2022-2023</option>
            </select>
          </div>


        </div>

        <div class="gender-details">
        <input type="radio" name="type" id="regular" required value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
        <input type="radio" name="type" id="irregular" required value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
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