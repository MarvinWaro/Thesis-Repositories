<?php


        session_start();
        /*
            if user is not login then redirect to login page,
            this is to prevent users from accessing pages that requires
            authentication such as the dashboard
        */
        //check if user is login already
        if(isset($_SESSION['logged_id']) && $_SESSION['user_type'] == 'admin'){
            header('location: ../admin/dashboard.php');
        }else if(isset($_SESSION['logged_id']) && $_SESSION['user_type'] == 'faculty'){
            header('location: ../faculty/dashboard.php');
        }else if(isset($_SESSION['logged_id']) && $_SESSION['user_type'] == 'student'){
            header('location: ../student/index.php');
        }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome!</title>

    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="icon" href="../img/rlogo.png" type="image/icon type" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/home.css" />
  </head>
  <body>
    <!--Navbar Section-->
    <nav id="navbar" class="navbar navbar-expand-lg position-fixed w-100">
      <div class="container">
        <a id="logo-name" class="navbar-brand" href="#">
          <img src="../img/rlogo.png" alt="CCSLOGO">
          Thesis Archives </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto  ">
            <a class="nav-link" aria-current="page" href="#home">Home</a>
            <a class="nav-link" href="#how"">How</a>
            <a class="nav-link me-5" href="#features">System Features</a>
          </div>

          <hr class="line">

          <a href="../login/login.php" class="btn btn-outline-secondary shadow-sm d-sm d-block me-2">Login</a>
          <a href="../login/create_account.php" class="btn btn-outline-secondary shadow-sm d-sm d-block me-2">Sign-up</a>
        </div>
      </div>
    </nav>



    <div class="modal fade modal-xl" id="archiveModal" tabindex="-1" aria-labelledby="archiveModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="archiveModalLabel">Archive Titles</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">


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

                        <tr>

                            <td>
                                <div class="actions d-flex align-items-center">
                                    <div title="Total Views" class="views-counter ">
                                      <span title="Total Views" id="views-counter" class="views-number">85</span>
                                    </div>


                                    <button type="button" class="btn action-view" data-bs-toggle="modal" data-bs-target="#viewArchiveModal">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </div>
                            </td>

                            <td>1</td>
                            <td>Data Science</td>
                            <td>Lucy Felix Sadiwa</td>
                            <td>BSCS</td>
                            <td>2011-04-25</td>
                            <td>2022-2023</td>
                        </tr>
                    </tbody>
                </table>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


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

    <!--Home Section-->
    <section id="home" class="home">
      <div class="container" id="first">
        <div class="row">
          <div class="col-md-6">
            <div class="text">Thesis Archives <spann class="text2">An Online Archive System for College of Computing Studies</spann></div>
            <button class="btn btn-outline-primary fs-4 mt-2" type="button" type="button" data-bs-toggle="modal" data-bs-target="#archiveModal">Explore Archives</button>
          </div>



          <!--Separate-->

          <div class="col-md-6">
            <img src="../img/3p.png" alt="background" class="w-100" />
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#b4e0b7" fill-opacity="1" d="M0,224L48,218.7C96,213,192,203,288,165.3C384,128,480,64,576,80C672,96,768,192,864,202.7C960,213,1056,139,1152,96C1248,53,1344,43,1392,37.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>

    <!--Setup Section-->

    <section id="how" class="setup">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#b4e0b7" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,186.7C384,149,480,107,576,101.3C672,96,768,128,864,170.7C960,213,1056,267,1152,282.7C1248,299,1344,277,1392,266.7L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
      <div id="second" class="container">
        <div class="text-header text-center">
          <h3>Get Started and Hassle free Experience</h3>
          <p>Submission of titles without worriying of hard copy output.</p>
        </div>
        <div class="items text-center">
          <div class="row">
            <div class="col-md-4">
              <div class="icons">
                <i class="ri-user-fill"></i>
              </div>
              <div class="desc">
                <h5>Create Account</h5>
                <p>
                To submit your thesis to our archiving system, you'll need to create an account. 
                It's quick and easy - simply sign up and start uploading your document today!
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
                <i class="ri-upload-2-fill"></i>
              </div>
              <div class="desc">
                <h5>Upload Your Titles</h5>
                <p>
                To add your titles to our system, simply upload them using the provided form. 
                It's quick and easy - start uploading your titles today and make them accessible to a wider audience!
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
                <i class="ri-book-read-fill"></i>
              </div>
              <div class="desc">
                <h5>Publish Your Work</h5>
                <p>
                Publish your work with ease on our platform. Simply follow our step-by-step guide to submit your thesis project, 
                and we'll take care of the rest. Start sharing your research with the university today!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DDDDDD" fill-opacity="1" d="M0,224L48,218.7C96,213,192,203,288,165.3C384,128,480,64,576,80C672,96,768,192,864,202.7C960,213,1056,139,1152,96C1248,53,1344,43,1392,37.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>

        <!--System Features-->

    <section id="features" class="setup">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DDDDDD" fill-opacity="1" d="M0,128L48,133.3C96,139,192,149,288,149.3C384,149,480,139,576,122.7C672,107,768,85,864,85.3C960,85,1056,107,1152,138.7C1248,171,1344,213,1392,234.7L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
      <div id="third" class="container">
        <div class="text-header text-center">
          <h3>System Features</h3>
          <p>Our platform is packed with powerful features to help you manage and share your academic work. 
            From easy document uploads to robust search and collaboration tools, our system has everything you need to streamline your research process. 
            Explore our features today and discover a better way to work!</p>
        </div>
        <div class="items text-center">
          <div class="row">
            <div class="col-md-4">
              <div class="icons">
              <i class="ri-archive-drawer-fill"></i>
              </div>
              <div class="desc">
                <h5>Manage Archives</h5>
                <p>
                Effortlessly manage your archives with our platform. Our user-friendly 
                system allows you to easily organize and access your archived content from anywhere. 
                With powerful search and filter tools, 
                finding and retrieving your archives has never been easier.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
              <i class="ri-attachment-fill"></i>
              </div>
              <div class="desc">
                <h5>Paperless</h5>
                <p>
                Say goodbye to paper clutter and go paperless with our platform. 
                With our digital archiving system, you can store and manage all your academic
                 content online, eliminating the need for physical copies.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
              <i class="ri-spy-fill"></i>
              </div>
              <div class="desc">
                <h5>Similarity Checker</h5>
                <p>
                Our similarity checker tool scans your documents for potential matches with a vast database of sources, 
                ensuring the originality of your work and maintaining academic integrity. 
                Try it out today to produce high-quality, original content!
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
              <i class="ri-eye-line"></i>
              </div>
              <div class="desc">
                <h5>Views</h5>
                <p>
                Track the views of your content on our platform with ease. Our system provides detailed analytics on the number of 
                views your content has received.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
              <i class="ri-list-check-2"></i>
              </div>
              <div class="desc">
                <h5>Evaluation</h5>
                <p>
                Get valuable feedback on your research with our evaluation system.
                 Our platform provides an easy and efficient way for reviewers to evaluate your work, 
                providing you with detailed feedback and suggestions for improvement.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
              <i class="ri-calendar-fill"></i>
              </div>
              <div class="desc">
                <h5>Calendar</h5>
                <p>
                Stay organized with our user-friendly calendar feature. 
                Set reminders and never miss an important deadline again.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="setup lower">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#CFB997" fill-opacity="1" d="M0,224L48,218.7C96,213,192,203,288,165.3C384,128,480,64,576,80C672,96,768,192,864,202.7C960,213,1056,139,1152,96C1248,53,1344,43,1392,37.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>

    <!--Information Section-->

    <section class="information">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#CFB997" fill-opacity="1" d="M0,256L30,266.7C60,277,120,299,180,261.3C240,224,300,128,360,106.7C420,85,480,139,540,170.7C600,203,660,213,720,197.3C780,181,840,139,900,122.7C960,107,1020,117,1080,128C1140,139,1200,149,1260,170.7C1320,192,1380,224,1410,240L1440,256L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>
    <div id="fourth" class="container">
        <div class="row info-1">
          <!--Text-->
          <div class="col-md-6">
            <div class="text-information">
              <h5>Easily Manage, File upload and Download</h5>
              <p>
              Our platform makes it easy to manage, upload, and download your academic files. 
              With our user-friendly interface, you can easily organize and access your content from anywhere, 
              as well as upload and download files with just a few clicks. 
              Say goodbye to the hassle of file management and try our platform today!
              </p>
            </div>
          </div>
          <!--Image-->
          <div class="col-md-6">
            <img src="../img/5.png" alt="pic info" class="w-100" />
          </div>
        </div>
        <hr id="line">
        <div class="row info-2">
            <!--Image-->
            <div class="col-md-6">
                <img src="../img/4.png" alt="pic info" class="w-100" />
              </div>
            <!--Text-->
            <div class="col-md-6">
              <div class="text-information">
                <h5>Thesis titles with a broad scope, designed to contribute to a better future.</h5>
                <p>
                thesis titles available on our platform are not only focused on specific research topics, 
                but are also aimed at addressing larger issues that can have a positive impact on society. 
                By choosing thesis titles with a broad scope, researchers can explore complex issues and propose 
                innovative solutions that can contribute to building a better future for all. This approach encourages 
                a more holistic and multidisciplinary approach to research, 
                which can lead to new insights and breakthroughs in various fields.
                </p>
              </div>
            </div>
          </div>
      </div>
    </section>

    <section class="information lower">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#b4e0b7" fill-opacity="1" d="M0,64L30,80C60,96,120,128,180,122.7C240,117,300,75,360,48C420,21,480,11,540,53.3C600,96,660,192,720,218.7C780,245,840,203,900,181.3C960,160,1020,160,1080,181.3C1140,203,1200,245,1260,245.3C1320,245,1380,203,1410,181.3L1440,160L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    </section>

    <!--Footer Section-->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col-md-3">
                            <div>
                                <small>
                                    <a href="#home" class="text-decoration-none">Home</a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <small>
                                    <a href="#how" class="text-decoration-none">About</a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <small>
                                    <a href="#features" class="text-decoration-none">Features</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy">
                    &copy; Thesis Repository | <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="../assets/js/jquery.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
      integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>

    <script type="text/javascript">
      var lastScrollTop = 0;
        navbar = document.getElementById("navbar");
      window.addEventListener("scroll", function(){
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop){
          navbar.style.top="-80px";
        }else{
          navbar.style.top="0";
        }
        lastScrollTop = scrollTop;
      })
    </script>

    <script>
      $(window).scroll(function(){
        $("#first").css("opacity", 1 - $(window).scrollTop() / 200);
      })
    </script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <!--responsive-->
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <!-- end: JS -->
  </body>
</html>
