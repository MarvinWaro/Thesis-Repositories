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
    <link rel="stylesheet" href="../assets/css/home.css" />
  </head>
  <body>
    <!--Navbar Section-->
    <nav class="navbar navbar-expand-lg position-fixed w-100">
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
          <a href="#" class="btn btn-outline-secondary shadow-sm d-sm d-block me-2">Sign-up</a>
        </div>
      </div>
    </nav>

    

    <!--Home Sectio-->
    <section id="home" class="home">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="text">Thesis Archives <spann class="text2">An Online Archive System for College of Computing Studies</spann></div>
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
      <div class="container">
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
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Accusamus nam quo velit asperiores numquam adipisci sunt
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
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Accusamus nam quo velit asperiores numquam adipisci sunt
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
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Accusamus nam quo velit asperiores numquam adipisci sunt
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
      <div class="container">
        <div class="text-header text-center">
          <h3>System Features</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos?</p>
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
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Accusamus nam quo velit asperiores numquam adipisci sunt
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
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Accusamus nam quo velit asperiores numquam adipisci sunt
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
              <i class="ri-spy-fill"></i>
              </div>
              <div class="desc">
                <h5>Plagarism Detector</h5>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Accusamus nam quo velit asperiores numquam adipisci sunt
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
              <i class="ri-grid-fill"></i>
              </div>
              <div class="desc">
                <h5>Rubrics</h5>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Accusamus nam quo velit asperiores numquam adipisci sunt
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icons">
              <i class="ri-mail-star-line"></i>
              </div>
              <div class="desc">
                <h5>Grades</h5>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Accusamus nam quo velit asperiores numquam adipisci sunt
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
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Accusamus nam quo velit asperiores numquam adipisci sunt
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
    <div class="container">
        <div class="row info-1">
          <!--Text-->
          <div class="col-md-6">
            <div class="text-information">
              <h5>Easily Manage, File upload and Download</h5>
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio
                ex facilis cum, quas veniam rerum eius illo iure doloremque
                asperiores.
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
                <h5>High Scope Thesis Titles For a Better Future</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio
                  ex facilis cum, quas veniam rerum eius illo iure doloremque
                  asperiores.
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
    <!-- end: JS -->
  </body>
</html>
