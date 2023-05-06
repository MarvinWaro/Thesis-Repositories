<?php

require_once  '../student/process.php';
require_once '../class/dbconfig.php';
require_once '../class/student.class.php';

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

$stdnt = new Student();


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
      <li class="sidebar-menu-item active">
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
      <li class="sidebar-menu-item ">
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
        <h5 class="fw-bold mb-0 me-auto">Home</h5>
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

      <?php
      require_once '../class/student.class.php';

      $student = new Student();

      ?>
      <!-- start: Content -->
      <div class="py-4">
        <!-- start: content -->
        <div class="main-content border">
          <div class="head-number p-3">
            <h2>Group <?php foreach ($student->show_group_info($_GET['groupnum']) as $groupNum) echo $groupNum['group_number'] ?></h2>
            <div class="sub d-flex">
              <h6> Adviser </h6>
              <h6 class="slash-padding"> | </h6>
              <h6><?php echo $_GET['course'] ?></h6>
            </div>
          </div>

          <div class="members p-3 d-flex justify-content-evenly" id="members_and_panel">

            <div class="list-mem pt-2">
              <span>Members</span>
              <ul>
                <?php
                foreach ($student->show_group_members($_GET['groupnum'], $_GET['course']) as $value) {
                ?>
                  <li class="pb-1"><?php echo $value['firstname'] . " " . $value['lastname'] ?></li>
                <?php
                }
                ?>
              </ul>
            </div>
            <!--Adding of Panelist-->
            <div class="list-mem pt-2 d-flex flex-column">
              <span>Panelist</span>
              <ul>
                <?php
                include_once '../class/faculty.class.php';
                $faculty = new Faculty();

                $counter = 0;
                foreach ($faculty->get_panel($_GET["groupnum"]) as $value) {
                ?>
                  <li class="pb-1"><?php echo $value['firstname'] . " " . $value['lastname'] ?></li>
                <?php
                  $counter++;
                }
                ?>
              </ul>
              <?php
              if ($counter == 0) {
              ?>
                <button title="Add Panelist" id="add-panel-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="ri-add-circle-fill"></i></button>
              <?php
              }
              ?>

            </div>
          </div>

          <!-- Button trigger modal -->

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Panelist</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="add_panel.php">
                  <div class="modal-body">

                    <input hidden name="group_id" value="<?php echo $_GET["groupnum"] ?>">
                    <input hidden name="course" value="<?php echo $_GET["course"] ?>">

                    <div>
                      <label>Panel 1</label>
                      <select class="form-select" style="margin-top: -2px; margin-bottom: 15px" name="panel_one" required>
                        <option hidden disabled selected value="" required>--Select--</option>
                        <?php
                        include_once '../class/faculty.class.php';
                        $faculty = new Faculty();

                        foreach ($faculty->show() as $list) {
                        ?>
                          <option value="<?php echo $list["id"] ?>"><?php echo $list["firstname"] . " " . $list["lastname"] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>


                    <div>
                      <label>Panel 2</label>
                      <select class="form-select" style="margin-top: -2px; margin-bottom: 15px" name="panel_two" required>
                        <option hidden disabled selected value="" required>--Select--</option>
                        <?php
                        include_once '../class/faculty.class.php';
                        $faculty = new Faculty();

                        foreach ($faculty->show() as $list) {
                        ?>
                          <option value="<?php echo $list["id"] ?>"><?php echo $list["firstname"] . " " . $list["lastname"] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>


                    <div>
                      <label>Panel 3</label>
                      <select class="form-select" style="margin-top: -2px; margin-bottom: 15px" name="panel_three" required>
                        <option hidden disabled selected value="" required>--Select--</option>
                        <?php
                        include_once '../class/faculty.class.php';
                        $faculty = new Faculty();

                        foreach ($faculty->show() as $list) {
                        ?>
                          <option value="<?php echo $list["id"] ?>"><?php echo $list["firstname"] . " " . $list["lastname"] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>




                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!--Modal-->



          <div class="titles-up p-3">
            <span>Titles</span>

            <div class="uploading">
              <?php
              require_once '../class/student.class.php';

              $student = new Student();
              $counter = 1;
              foreach ($student->show_group($_GET['groupnum']) as $value) {
              ?>
                <form action="add_comment.php" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                    <p class="me-3 fw-bold">Title <?php echo $counter; ?>: <?php echo $value['title'] ?></p>
                    <p class="me-3" style="margin-top: -15px;">File: <a href="advisee.php?file=<?php echo $value['file'] ?>"><?php echo $value['file'] ?></a></p>
                    <textarea required class="form-control" name="comment" placeholder="Adviser Comment"><?php echo $value['comment'] ?></textarea>
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Adviser File: <?php echo $value['adviser_file'] ?></label>
                      <input class="form-control" type="file" id="formFile" name="myfile">
                    </div>

                    <input type="submit" name="submit<?php echo $counter ?>" id="submit" value="Submit">
                    <?php
                    if (!$value['is_locked']) {
                    ?>
                      <button onclick="return confirm('Are you sure to Lock?')" class="btn btn-danger" style="width: 100%; color:#fff; padding: 4px 9px; font-size: 14px; margin-top: 5px" name="lock<?php echo $counter ?>" form="lockTitle">Lock</button>
                    <?php
                    } else {
                    ?>
                      <button onclick="return confirm('Are you sure to Unlock?')" class="btn btn-success" style="width: 100%; color:#fff; padding: 4px 9px; font-size: 14px; margin-top: 5px" name="unlock<?php echo $counter ?>" form="lockTitle">Unlock</button>
                    <?php
                    }
                    ?>
                    <input type="hidden" name="cCourse" value="<?php echo $_GET['course'] ?>">
                    <input type="hidden" name="cGroupNum" value="<?php echo $_GET['groupnum'] ?>">
                  </div>
                </form>
                <form id="lockTitle" method="POST" action="lock_title.php">
                  <input type="hidden" name="cGroupNum" value="<?php echo $_GET['groupnum'] ?>">
                  <input type="hidden" name="cCourse" value="<?php echo $_GET['course'] ?>">
                </form>


              <?php
                $counter++;
              }
              ?>
            </div>

            <div class="d-flex justify-content-center" style="margin-top: 25px;">
              <button class="btn btn-primary" style="width: 50%; color: white; background" data-bs-toggle="modal" data-bs-target="#acceptTitle">Accept a Title</button>
            </div>
          </div>
        </div>

        <div class="modal fade" id="acceptTitle" tabindex="-1" aria-labelledby="acceptTitleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="acceptTitleModalLabel">Select Title to Accept</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="accept_title.php">
                <div class="modal-body">

                  <div class="panel-cont">
                    <?php
                    $counter = 1;
                    foreach ($student->show_group($_GET['groupnum']) as $value) {
                    ?>
                      <div class="radio-cont mt-2">
                        <input hidden name="groupnum" value="<?php echo $value["group_id"] ?>">
                        <label class="container-radio label-radio fw-bold">Title <?php echo $value["title_number"] ?>: <?php echo $value["title"] ?>
                          <input type="radio" name="type" value="<?php echo $value["title_number"] ?>" required>
                          <span class="checkmark"></span>
                        </label>


                      </div>
                    <?php
                      $counter++;
                    }
                    ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

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
  <script>
    function confirmation() {
      var result = confirm("Are you sure to you want to lock?");
      if (result) {
        console.log("Locked")
      }
    }
  </script>
  <!-- end: JS -->
</body>

</html>