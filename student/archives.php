<?php

require_once '../class/database.php';
require_once '../class/archive.class.php';

session_start();
/*
            if user is not login then redirect to login page,
            this is to prevent users from accessing pages that requires
            authentication such as the dashboard
        */
if (!isset($_SESSION['logged-in'])) {
  header('location: ../login/login.php');
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
  <!-- end: CSS -->
  <title>Thesis Repository - Blank Page</title>
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
        <a href="home.php">
          <i class="ri-home-8-line sidebar-menu-item-icon"></i>
          Home
        </a>
      </li>
      <li class="sidebar-menu-item">
        <a href="thesis.php">
          <i class="ri-sticky-note-line sidebar-menu-item-icon"></i>
          Thesis
        </a>
      </li>

      <li class="sidebar-menu-item active">
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
        <h5 class="fw-bold mb-0 me-auto">Archives</h5>
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
            <li><a class="dropdown-item" href="student_profile.php"><i class="ri-user-settings-line me-2"></i>Profile</a></li>
            <li><a class="dropdown-item" href="student_settings.php"><i class="ri-settings-3-line me-2"></i>Settings</a></li>
            <hr class="w-100">
            <li><a class="dropdown-item" href="../login/logout.php"><i class="ri-logout-box-line me-2"></i>Logout</a></li>
          </ul>
        </div>
      </nav>
      <!-- end: Navbar -->

      <!-- start: Content -->
      <div class="py-4">
        <!-- start: content -->
        <div class="container">

          <table id="example" class="table table-striped" style="width:100%">
            <thead id="head">
              <tr>
                <th>Action</th>
                <th>#</th>
                <th>Titles</th>
                <th>Adviser</th>
                <th>Course</th>
                <th>Date of Upload</th>
                <th>School Year</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include_once '../class/student.class.php';
              $student = new Student();

              $counter = 1;
              foreach ($student->get_archived_titles() as $title) {
              ?>
                <tr>
                  <td>
                    <div class="actions d-flex align-items-center">
                      <div title="Total Views" class="views-counter ">
                        <span title="Total Views" id="views-counter" class="views-number"><?php echo $title["views"] ?></span>
                      </div>

                      <button type="button" class="btn action-view" data-bs-toggle="modal" data-bs-target="#viewArchiveModal<?php echo $title["id"] ?>">
                        <i class="ri-eye-line"></i>
                      </button>
                    </div>
                  </td>

                  <td><?php echo $counter ?></td>
                  <td>
                    <?php
                    echo $title["title"];
                    ?>
                  </td>
                  <td>
                    <?php
                    foreach ($student->get_grouparchived_titles($title["group_id"]) as $archive) {
                      foreach ($student->get_adviser($archive["adviser_id"]) as $adviser) {
                        echo $adviser["firstname"] . " " . $adviser["lastname"];
                      }
                    }
                    ?>
                  </td>
                  <td>
                    <?php
                    foreach ($student->get_grouparchived_titles($title["group_id"]) as $archive) {
                      echo $archive["curriculum"];
                    }
                    ?>
                  </td>
                  <td><?php echo $title["file_upload_date"] ?></td>
                  <td>
                    <?php
                    foreach ($student->get_grouparchived_titles($title["group_id"]) as $archive) {
                      echo $archive["school_year"];
                    }
                    ?>
                  </td>
                </tr>
              <?php
                $counter++;
              }
              ?>
            </tbody>
          </table>
        </div>

      </div> <!--End py4-->

      <!--Modal Archive-->

      <?php
      include_once '../class/student.class.php';
      $student = new Student();

      $counter = 1;
      foreach ($student->get_archived_titles() as $title) {
      ?>
        <div class="modal fade modal-xl" id="viewArchiveModal<?php echo $title["id"] ?>" tabindex="-1" aria-labelledby="viewArchiveModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Research Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="modal-container">
                  <div id="title-section" class="title-section mb-2">
                    <?php echo $title["title"] ?>
                  </div>

                  <div id="title-info" class="title-info">
                    <h6>Adviser: <span>
                        <?php
                        foreach ($student->get_grouparchived_titles($title["group_id"]) as $archive) {
                          foreach ($student->get_adviser($archive["adviser_id"]) as $adviser) {
                            echo $adviser["firstname"] . " " . $adviser["lastname"];
                          }
                        }
                        ?>
                      </span></h6>
                    <h6>Course: <span>
                        <?php
                        foreach ($student->get_grouparchived_titles($title["group_id"]) as $archive) {
                          echo $archive["curriculum"];
                        }
                        ?>
                      </span></h6>
                    <h6>Date of Upload: <span><?php echo $title["file_upload_date"] ?></span></h6>
                    <h6>S.Y: <span>
                        <?php
                        foreach ($student->get_grouparchived_titles($title["group_id"]) as $archive) {
                          echo $archive["school_year"];
                        }
                        ?>
                      </span></h6>
                  </div>

                  <div id="title-info" class="title-info mb-4">
                    <h6>Number of Viewers: <span> <?php echo $title["views"] ?></span></h6>
                    <h6>Research File: <span><a href="archives.php?file=<?php echo $title['file'] ?>"><?php echo $title['file'] ?></a></span></h6>
                  </div>

                  <div class="member_and_panel_cont d-flex justify-content-evenly mb-3">

                    <!--Author / Members-->
                    <div id="authors" class="list-mem pt-2">
                      <span>Authors</span>
                      <ul>
                        <?php
                        foreach ($student->get_grouparchived_titles($title["group_id"]) as $archive) {
                          foreach ($student->show_group_members($title["group_id"], $archive["curriculum"]) as $value) {
                        ?>
                            <li class="pb-1"><?php echo $value['firstname'] . " " . $value['lastname'] ?></li>
                        <?php
                          }
                        }
                        ?>
                      </ul>
                    </div>

                    <div class="vertical-line"></div>

                    <div id="panelist" class="list-mem pt-2">
                      <span>Panelist</span>
                      <ul>
                        <?php
                        include_once '../class/faculty.class.php';
                        $faculty = new Faculty();

                        $counter = 0;
                        foreach ($faculty->get_panel($title["group_id"]) as $value) {
                        ?>
                          <li class="pb-1"><?php echo $value['firstname'] . " " . $value['lastname'] ?></li>
                        <?php
                          $counter++;
                        }
                        ?>
                      </ul>
                    </div>

                  </div>

                  <div id="abstract" class="abstract">
                    <span>Abstract</span><br>
                    <p><?php echo $title["abstract"] ?></p>

                  </div>

                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

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