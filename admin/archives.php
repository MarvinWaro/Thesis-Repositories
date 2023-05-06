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
        <li class="sidebar-menu-item">
          <a href="dashboard.php">
            <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
            Dashboard
          </a>
        </li>

        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Thesis</li>

        <li class="sidebar-menu-item active">
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

        <li class="sidebar-menu-item">
          <a href="manage_students.php">
            <i class="ri-user-line sidebar-menu-item-icon"></i>
            Manage Student
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="manage_groups.php">
            <i class="ri-group-2-line sidebar-menu-item-icon"></i>
            Manage Groups
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="manage_faculty.php">
            <i class="ri-group-line sidebar-menu-item-icon"></i>
            Manage Faculty
          </a>
        </li>
        
        <li class="sidebar-menu-item">
          <a href="manage_schedules.php">
            <i class="ri-calendar-2-line sidebar-menu-item-icon"></i>
            Manage Events
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="manage_schoolyear.php">
            <i class="ri-global-line sidebar-menu-item-icon"></i>
            Manage School Year
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
              <li><a class="dropdown-item" href="profile.php"><i class="ri-user-settings-line me-2"></i>Profile</a></li>
              <li><a class="dropdown-item" href="settings.php"><i class="ri-settings-3-line me-2"></i>Settings</a></li>
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
                            <th>Group no.</th>
                            <th>Date of Upload</th>
                            <th>School Year</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td>
                                  <div class="actions d-flex align-items-center">
                                    <div title="Total Views" class="views-counter ">
                                      <span title="Total Views" id="views-counter" class="views-number">3251</span>
                                    </div>

                                    
                                    <button type="button" class="btn action-view" data-bs-toggle="modal" data-bs-target="#viewArchiveModal">
                                        <i class="ri-eye-line"></i>
                                    </button>

                                  </div>
                                </td>
                            <td>1</td>
                            <td>Game Dev</td>
                            <td>Jaydee Ballaho</td>
                            <td>BSIT</td>
                            <td>Group 3</td>
                            <td>2011-04-25</td>
                            <td>2022-2023</td>
                       </tr>


                    </tbody>
                </table>

                  <!-- Modal -->
                  <div class="modal fade modal-xl" id="viewArchiveModal" tabindex="-1" aria-labelledby="viewArchiveModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Research Information</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="modal-container">
                              <div id="title-section" class="title-section mb-2">
                                Proliferation of Game Development
                              </div>

                              <div id="title-info" class="title-info">
                                  <h6>Adviser: <span>Koro Sensei</span></h6>
                                  <h6>Course: <span> BSCS</span></h6>
                                  <h6>Date of Upload: <span>2011-04-25</span></h6>
                                  <h6>S.Y: <span>	2022-2023</span></h6>
                              </div>

                              <div id="title-info" class="title-info mb-4">
                                <h6>Number of Viewers: <span> 3251</span></h6>
                                <h6>Research File: <span>abcd.docs</span></h6>
                              </div>

                              <div class="member_and_panel_cont d-flex justify-content-evenly mb-3">

                                  <!--Author / Members-->
                                <div id="authors" class="list-mem pt-2">
                                  <span>Authors</span>
                                  <ul>
                                    <li>Monkey D. Luffy</li>
                                    <li>Monkey D. Dragon</li>
                                    <li>Monkey D. Garp</li>
                                  </ul>
                                </div>

                                <div class="vertical-line"></div>

                                <div id="panelist" class="list-mem pt-2">
                                  <span>Panelist</span>
                                  <ul>
                                    <li>Rimuru Tempest</li>
                                    <li>Anos Voldigold</li>
                                    <li>Kiyotaka Ayanoukoji</li>
                                  </ul>
                                </div> 

                              </div> 

                              <div id="abstract" class="abstract">
                                <span>Abstract</span><br>
                                <p>This study presents the design and development process of a multiplayer strategy 
                                  game aimed at exploring the impact of game mechanics on user engagement and monetization 
                                  strategies. Using an iterative design approach, the game was built with a combination of classic 
                                  and innovative game mechanics, such as social features, competitive challenges, and in-game purchases. 
                                  A user study was conducted to evaluate the game's usability, enjoyment, and monetization potential. 
                                  The results suggest that a balanced combination of game mechanics, social features, and in-game purchases 
                                  can significantly increase user engagement and revenue. The findings of this research can provide valuable 
                                  insights for game developers and stakeholders in the gaming industry to
                                   improve user engagement and monetization strategies in their own games.</p>
                                   
                              </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
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
