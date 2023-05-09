<?php


session_start();
/*
            if user is not login then redirect to login page,
            this is to prevent users from accessing pages that requires
            authentication such as the dashboard
        */
if (!isset($_SESSION['logged-in'])) {
  header('location: ../login/login.php');
}

if (isset($_GET['file'])) {
  $file_name = basename($_GET['file']);
  $file_path = '../student/upload/documents/' . $file_name;

  $path_parts = pathinfo($file_Path);
  echo $file_path;
  $ext = strtolower($path_parts["extension"]);

  switch ($ext) {
    case "pdf":
      $ctype = "application/pdf";
      break;
    case "doc":
      $ctype = "application/msword";
      break;
    case "docx":
      $ctype = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
      break;
    case "xls":
      $ctype = "application/vnd.ms-excel";
      break;
    default:
      $ctype = "application/force-download";
  }
  ob_end_clean();
  if (!empty($file_name) && file_exists($file_path)) {

    header('Cache-Control: public');
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename=' . $file_name);
    header('Content-Type: ' . $ctype);
    header('Content-Transfer-Encoding: binary');

    readfile($file_path);
    exit;
  } else {
    echo "Not Found";
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
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <!-- start: Icons -->
  <!-- start: CSS -->
  <link rel="icon" href="../img/rlogo.png" type="image/icon type">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- end: CSS -->
  <title>Thesis Repository</title>
</head>

<body>
  <!-- start: Sidebar -->
  <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
    <div class="d-flex align-items-center p-3">
      <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Thesis Repository</a>
      <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
    </div>
    <ul class="sidebar-menu p-3 m-0 mb-0">
      <li class="sidebar-menu-item">
        <a href="home.php ">
          <i class="ri-home-8-line sidebar-menu-item-icon"></i>
          Home
        </a>
      </li>
      <li class="sidebar-menu-item">
        <a href="bscs.php">
          <i class="ri-sticky-note-line sidebar-menu-item-icon"></i>
          BSCS
        </a>
      </li>
      </li>
      <li class="sidebar-menu-item">
        <a href="bsit.php">
          <i class="ri-sticky-note-line sidebar-menu-item-icon"></i>
          BSIT
        </a>
      </li>
      <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Proposals</li>

      <li class="sidebar-menu-item">
        <a href="accepted_titles.php">
          <i class="ri-sticky-note-line sidebar-menu-item-icon"></i>
          Accepted Titles
        </a>
      </li>
      <li class="sidebar-menu-item">
        <a href="archives.php">
          <i class="ri-archive-drawer-line sidebar-menu-item-icon"></i>
          Archives
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
        <h5 class="fw-bold mb-0 me-auto">Accepted Titles</h5>
        <div class="dropdown me-3 d-none d-sm-block">
          <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ri-notification-line"></i>
          </div>
          <div class="dropdown-menu fx-dropdown-menu">
            <h5 class="p-3 bg-indigo text-light">Notification</h5>
            <div class="list-group list-group-flush">
              <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                <div class="me-auto">
                  <div class="fw-semibold">Subheading</div>
                  <span class="fs-7">Content for list item</span>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                <div class="me-auto">
                  <div class="fw-semibold">Subheading</div>
                  <span class="fs-7">Content for list item</span>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                <div class="me-auto">
                  <div class="fw-semibold">Subheading</div>
                  <span class="fs-7">Content for list item</span>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                <div class="me-auto">
                  <div class="fw-semibold">Subheading</div>
                  <span class="fs-7">Content for list item</span>
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
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
          <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="me-2 d-none d-sm-block"><?php echo $_SESSION['fullname'] ?></span>
            <img class="navbar-profile-image" src="../img/u-icon.png" alt="Image" />
          </div>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#"><i class="ri-user-settings-line me-2"></i>Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="ri-settings-3-line me-2"></i>Settings</a></li>
            <hr class="w-100">
            <li><a class="dropdown-item" href="../login/logout.php"><i class="ri-logout-box-line me-2"></i>Logout</a></li>
          </ul>
        </div>
      </nav>
      <!-- end: Navbar -->

      <!-- start: Content -->
      <div class="py-4">
        <!-- start: content -->
        <div class="main-content border">
          <div class="head-number p-3">
            <h2>
              <?php
              include_once '../class/student.class.php';
              $student = new Student();

              foreach ($student->get_group_proposed_title($_GET["id"]) as $title) {
                echo $title["title"] . " ";
              ?>
            </h2>
            <div class="sub d-flex">
              <h6>
                <?php
                foreach ($student->get_group_proposed_title($_GET["id"]) as $title) {
                  foreach ($student->get_adviser($title["adviser_id"]) as $adviser) {
                    echo $adviser["firstname"] . " " . $adviser["lastname"];
                  }
                }
              }
                ?>
              </h6>
              <h6 style="margin-left: 5px; margin-right: 5px"> | </h6>
              <h6> <?php echo $_GET["course"] ?></h6>
              <h6 style="margin-left: 5px; margin-right: 5px"> | </h6>
              <?php
              foreach($student->get_group_proposed_title($_GET["id"]) as $title){
                foreach($student->get_toarchive_title($title["id"]) as $toarchive){
              ?>
              <h6> <a href="to_archive.php?file=<?php echo $toarchive['file'] ?>"><?php echo $toarchive['file'] ?></a></h6>
              <?php
                }
              }
              ?>
            </div>

          </div>

          <div class="members p-3 d-flex justify-content-evenly">

            <div class="list-mem pt-2">
              <span>Members</span>
              <ul>
                <?php
                foreach ($student->show_group_members($_GET['id'], $_GET['course']) as $value) {
                ?>
                  <li class="pb-1"><?php echo $value['firstname'] . " " . $value['lastname'] ?></li>
                <?php
                }
                ?>
              </ul>
            </div>

            <div class="list-mem pt-2">
              <span>Panelist</span>
              <ul>
                <?php
                include_once '../class/faculty.class.php';
                $faculty = new Faculty();

                $counter = 0;
                foreach ($faculty->get_panel($_GET["id"]) as $value) {
                ?>
                  <li class="pb-1"><?php echo $value['firstname'] . " " . $value['lastname'] ?></li>
                <?php
                  $counter++;
                }
                ?>
              </ul>
            </div>
          </div>

          <div class="titles-up p-3" style="max-width:100% !important;">

            <span>Abstract</span>

            <div id="overview" class="overview">
              <?php
              foreach ($student->get_group_proposed_title($_GET["id"]) as $title) {
                foreach ($student->get_accepted($title['id']) as $abstract) {
                ?>
                <p><?php echo $abstract['abstract'] != null ? $abstract['abstract'] : "N/A" ?></p>
                
              

            </div>
            <form method="POST" action="archive_title.php">
            <input hidden name="groupid" value="<?php echo $_GET['id'] ?>">
              <input hidden name="titleid" value="<?php echo $abstract['id'] ?>">
              <button id="archive-button" type="submit" name="submit" class="btn">Archive Thesis</button>
            </form>
            <?php
                }
              }
            ?>

          </div>
        </div>


      </div> <!-- END PY4 -->

      <!-- end: content -->
      <!-- start: Graph -->

      <!-- end: Graph -->
    </div>
    <!-- end: Content -->
    </div>
  </main>
  <!-- end: Main -->

  <!-- start: JS -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/script.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <!--responsive-->
  <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
  <!-- end: JS -->
</body>

</html>