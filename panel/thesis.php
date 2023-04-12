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
    <!-- end: CSS -->
    <title>Thesis Repository - Thesis</title>
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
          <li class="sidebar-menu-item ">
            <a href="approve_titles.php">
                <i class="ri-check-fill sidebar-menu-item-icon"></i>
                Approved Titles
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
          <h5 class="fw-bold mb-0 me-auto">Thesis</h5>
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
                src="../img/u-icon.png"
                alt="Image"
              />
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="student_profile.php"><i class="ri-user-settings-line me-2"></i>Profile</a></li>
              <li><a class="dropdown-item" href="../adviser/home.php"><i class="ri-user-shared-2-line me-2"></i>Switch to Adviser</a></li>
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
              <div class="main-content border">
                  <div class="head-number p-3"> 
                      <div class="head-searchbar d-flex align-items-center justify-content-between">
                        <h2>Group 1</h2>
                        <div class="search-container ml-auto">
                          <form method="GET">
                            <input type="text" name="search" placeholder="Search..." id="search-record">
                            <button type="submit" id="search-icon"><i class="ri-search-line"></i></i></button>
                          </form>
                        </div>
                      </div>
                      <div class="sub d-flex">
                        <h6> >>Adviser<< </h6>
                        <h6> | </h6>
                        <h6> >>Course<< </h6>
                      </div>
                  </div>

                  <div class="members p-3">
                      <span>Members</span>
                      <div class="list-mem pt-2">
                          <ul>
                              <li class="pb-1">Marvin Waro</li>
                              <li class="pb-1">Christian Fernandez</li>
                              <li class="pb-1">Faye Lacsi</li>
                          </ul>
                      </div>
                  </div>

            <div class="titles-up p-3">
              <span>Titles</span>

            <div class="panel-comment mt-2">

              <form action="" method="POST">
                <div class="panel-cont">
                  <div class="radio-cont mt-2">
                    <label class="container-radio label-radio fw-bold">Title 1:
                      <input type="radio" name="type" required>
                      <span class="checkmark"></span>
                    </label>

                    <br>File attachment: </br><a href=""></a>

                    <textarea class="form-control mt-2" name="comment" placeholder="Panel Comment"></textarea>
                  </div>

                  <div class="radio-cont mt-2">
                    <label class="container-radio label-radio fw-bold">Title 2:
                      <input type="radio" name="type" required>
                      <span class="checkmark"></span>
                    </label>

                    <br>File attachment: </br><a href=""></a>

                    <textarea class="form-control mt-2" name="comment" placeholder="Panel Comment"></textarea>
                  </div>

                  <div class="radio-cont mt-2">
                    <label class="container-radio label-radio fw-bold">Title 3:
                      <input type="radio" name="type" required>
                      <span class="checkmark"></span>
                    </label>

                    <br>File attachment: </br><a href=""></a>

                    <textarea class="form-control mt-2" name="comment" placeholder="Panel Comment"></textarea>
                  </div>
                </div>

                <div class="submit-cont">
                  <input class="panel-submit" type="submit" name="submit" id="submit" value="Proceed to Proposal">
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
