<?php

require_once  '../student/process.php';
require_once '../class/dbconfig.php';

        session_start();
        /*
            if user is not login then redirect to login page,
            this is to prevent users from accessing pages that requires
            authentication such as the dashboard
        */
        if (!isset($_SESSION['logged-in'])){
            header('location: ../login/login.php');
        }

        if(isset($_GET['file'])){
            $file_name = basename($_GET['file']);
            $file_path = '../student/upload/documents/' . $file_name;

            $path_parts = pathinfo($fullPath);
            echo $file_path;
            $ext = strtolower($path_parts["extension"]);

            switch ($ext) {
              case "pdf":
                $ctype = "application/pdf";
                break;
              case "doc":
                $ctype = "application/msword";
                break;
              case "xls":
                $ctype = "application/vnd.ms-excel";
                break;
              default:
                $ctype = "application/force-download";
            }

            if(!empty($file_name) && file_exists($file_path)){
                header('Cache-Control: public');
                header('Content-Description: File Transfer');
                header('Content-Disposition: attachment; filename=' . $file_name);
                header('Content-Type: $ctype' );
                header('Content-Transfer-Encoding: binary');

                readfile($file_path);
                exit;
            }
            else {
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
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- end: CSS -->
    <title>Thesis Repository</title>
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
              <li><a class="dropdown-item" href="#"><i class="ri-user-settings-line me-2"></i>Profile</a></li>
              <li><a class="dropdown-item" href="../panel/home.php"><i class="ri-user-shared-2-line me-2"></i>Switch to Panelist</a></li>
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
                      <h2>Group <?php echo $_GET['groupnum'] ?></h2>
                      <h6><?php echo $_GET['course'] ?></h6>
                  </div>

                  <div class="members p-3">
                      <span>Members</span>
                      <div class="list-mem pt-2">
                          <ul>
                              <?php
                              require_once '../class/student.class.php';

                              $student = new Student();

                              foreach ($student->show_group_members($_GET['groupnum'], $_GET['course']) as $value){
                              ?>
                                <li class="pb-1"><?php echo $value['firstname']. " " . $value['lastname'] ?></li>
                              <?php
                              }
                              ?>
                          </ul>
                      </div>
                  </div>

                  <div class="titles-up p-3">
                      <span>Titles</span>
                      
                      <div class="uploading">
                      <?php
                                    require_once '../class/student.class.php';

                                    $student = new Student();
                                    foreach ($student->show_group($_GET['groupnum'], $_GET['course']) as $value){
                      ?>
                                    <form action="add_comment.php" method="POST">
                                      <div class="mb-3">
                                        <p class="me-3">Title 1: <?php echo $value['title1']?></p>
                                        <p class="me-3"><a href="advisee.php?file=<?php echo $value['title1_file'] ?>"><?php echo $value['title1_file'] ?></a></p>
                                        <textarea required class="form-control" name="comment" placeholder="Adviser Comment"><?php echo $value['title1_comment'] ?></textarea>
                                        <?php ?><input type="submit" name="submit1" id="submit" value="Submit">
                                        <input type="hidden" name="cGroupNum" value="<?php echo $_GET['groupnum'] ?>">
                                        <input type="hidden" name="cCourse" value="<?php echo $_GET['course'] ?>">
                                      </div>
                                    </form>
                                      
                                    <form action="add_comment.php" method="POST">
                                      <div class="mb-3">
                                        <p class="me-3">Title 2: <?php echo $value['title2']?></p>
                                        <p class="me-3"><a href="advisee.php?file=<?php echo $value['title2_file'] ?>"><?php echo $value['title2_file'] ?></a></p>
                                        <textarea required class="form-control" name="comment" placeholder="Adviser Comment"><?php echo $value['title2_comment'] ?></textarea>
                                        <input type="submit" name="submit2" id="submit" value="Submit">
                                        <input type="hidden" name="cGroupNum" value="<?php echo $_GET['groupnum'] ?>">
                                        <input type="hidden" name="cCourse" value="<?php echo $_GET['course'] ?>">
                                      </div>
                                    </form>

                                    <form action="add_comment.php" method="POST">
                                      <div class="mb-3">
                                        <p class="me-3">Title 3: <?php echo $value['title3']?></p>
                                        <p class="me-3"><a href="advisee.php?file=<?php echo $value['title3_file'] ?>"><?php echo $value['title3_file'] ?></a></p>
                                        <textarea required class="form-control" name="comment" placeholder="Adviser Comment"><?php echo $value['title3_comment'] ?></textarea>
                                        <input type="submit" name="submit3" id="submit" value="Submit">
                                        <input type="hidden" name="cGroupNum" value="<?php echo $_GET['groupnum'] ?>">
                                        <input type="hidden" name="cCourse" value="<?php echo $_GET['course'] ?>">
                                      </div>
                                    </form>
                        <?php
                                    }
                        ?>
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
    <!-- end: JS -->
  </body>
</html>
