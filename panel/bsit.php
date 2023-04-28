<?php


        session_start();
        /*
            if user is not login then redirect to login page,
            this is to prevent users from accessing pages that requires
            authentication such as the dashboard
        */
        if (!isset($_SESSION['logged-in'])){
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

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

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
        <li class="sidebar-menu-item ">
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
          <li class="sidebar-menu-item active">
            <a href="bsit.php">
                <i class="ri-sticky-note-line sidebar-menu-item-icon"></i>
                BSIT
            </a>
          </li>
          <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Proposals</li>
          <li class="sidebar-menu-item ">
            <a href="accepted_titles.php">
                <i class="ri-check-fill sidebar-menu-item-icon"></i>
                Accepted Titles
            </a>
          </li>
          <li class="sidebar-menu-item ">
            <a href="implementation_titles.php">
                <i class="ri-check-fill sidebar-menu-item-icon"></i>
                Implementation Titles
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
          <h5 class="fw-bold mb-0 me-auto">BSIT | Panelist</h5>
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
              <li><a class="dropdown-item" href="../adviser/home.php"><i class="ri-user-shared-2-line me-2"></i>Switch to Adviser</a></li>
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
          <div class="container padding-bottom">


          <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                        <th class="action">Action</th>
                            <th>Group #</th>
                            <th>Curriculum</th>
                            <th>Adviser</th>
                            <th>School Year</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                          require_once '../class/student.class.php';

                          $student = new Student();
                          //We will now fetch all the records in the array using loop
                          //use as a counter, not required but suggested for the table
                          $i = 1;
                          //loop for each record found in the array
                          foreach ($student->show_all_groups() as $value){
                            if($value['curriculum'] == "BSIT" ){
                          ?>
                                    <tr>
                                    <td>
                                              <div class="actions">
                                                <a class="action-view" href="thesis.php?groupnum=<?php echo $value['id'] ?>&course=<?php echo $value['curriculum'] ?>"><i class="ri-eye-line"></i></a>
                                              </div>
                                          </td>
                                        <!-- always use echo to output PHP values -->
                                        <td> Group <?php echo $value["group_number"] ?></td>
                                        <td>BSIT</td>
                                        <?php foreach ($student->get_adviser($value['adviser_id']) as $adviser){
                                        ?>
                                                <td><?php echo $adviser["firstname"] . " " . $adviser["lastname"] ?></td>
                                        <?php
                                        } ?>
                                        
                                        <td> 2022-2023</td>
                                          
                                    </tr>
                          <?php
                            }
                          }
                          ?>
                        </tbody>
                    </table>
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
