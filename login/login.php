<?php
        require_once '../class/database.php';
        require_once '../class/student.class.php';
        //we start session since we need to use session values
        
        session_start();
        if (isset($_POST['login'])) {
            //echo "<pre>";
            //print_r($_POST);
            require '../class/dbconfig.php';
            $username=mysqli_real_escape_string($conn,$_POST['username']);
            $password=mysqli_real_escape_string($conn,$_POST['password']);
            $sql=mysqli_query($conn,"SELECT * FROM student WHERE BINARY username='$username' && BINARY password='$password'");
            $num=mysqli_num_rows($sql);
            if ($num>0) {
                  //echo "found";
                  $row=mysqli_fetch_assoc($sql);
                  $_SESSION['logged-in'] = $username;
                  $_SESSION['fullname']=$row['firstname'] . ' ' . $row['lastname'];
                  $_SESSION['groupnum']=$row['your_group'];
                  $_SESSION['course']=$row['course'];
                  $_SESSION['adviser']=$row['your_adviser'];
                  $_SESSION['user_type'] = $row['type'];
                  //display the appropriate dashboard page for user
                  if (($_SESSION['user_type']) == 'student'){
                      header('location: ../student/home.php');
                  }else if (($_SESSION['user_type']) == 'admin'){
                      header('location: ../admin/dashboard.php');
                  }else if (($_SESSION['user_type']) == 'adviser'){
                    header('location: ../adviser/home.php');
                  }else{
                      header('location: login/login.php');
                  }
              }
              $error = 'Invalid username/password. Try again.';
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
    <link rel="stylesheet" href="../assets/css/signin.css" />
    <!-- end: CSS -->
    <title>Thesis Repository - Blank Page</title>
  </head>
<body>
  <div class="container">
    <div class="logo">
      <img class="rlogo" src="../img/rlogo.png" alt="logo ccs">
    </div>
    <div class="title pt-3 pb-3">
      Thesis Archives
    </div>
    <div class="content">
      <form action="login.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input class="form-input" type="text" id="username" name="username" placeholder="Enter username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input class="form-input" type="password" id="password" name="password" placeholder="Enter password" required>
          </div>
          <div class="button">
            <input type="submit" name="login" value="Login">
          </div>
          <div class="opt">
            <a class="create" href="create_account.php">Create an account</a>
            <a class="forgot" href="#">Forgot Password</a>
          </div>

          <?php
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }

            ?>
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