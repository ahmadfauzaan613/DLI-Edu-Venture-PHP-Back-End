<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DLI Edu Venture | Admin</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url();?>assets/img/Logo_DLI_Eduventure_Putih.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <a href="index.html"><img src="<?php echo base_url();?>assets/img/Logo_DLI_Eduventure_Warna.png" alt="Logo DLI Edu Venture" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="index.html#home">Home</a></li>
                    <li><a href="index.html#about">About</a></li>
                    <li><a href="index.html#programs">Programs</a></li>
                    <li><a href="index.html#startups">Startups</a></li>
                    <li><a href="index.html#news">News</a></li>
                    <li><a href="index.html#events">Events</a></li>
                    <li><a href="index.html#blogs">Blogs</a></li>
                    <li><a href="index.html#gallery">Gallery</a></li>
                    <li><a href="index.html#contact">Contact</a></li>
                    <li><a href="index.html#search">Search <i class="fa fa-search" aria-hidden="true"></i></a></li>
                    <li class="drop-down">
                        <a href="#">Admin</a>
                        <ul>
                            <li>
                                <a href="v_admin_dashboard.html" class="btn btn-modal mb-2"><i class="fa fa-tachometer prefix grey-text"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-modal mb-2" data-toggle="modal" data-target="#modalSignOut">
                                    <i class="fa fa-sign-out prefix grey-text"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Modal Sign Out Section ======= -->
    <div class="modal fade mt-4 pt-4" id="modalSignOut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border border-info">
                <div class="modal-header text-center bg-info text-white">
                    <h4 class="modal-title w-100 font-weight-bold">Sign Out</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-2">
                        <p>Are you sure you want to sign out?</p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center mb-2">
                    <button class="btn btn-danger rounded-pill" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url('admin/auth/logout');?>" class="btn btn-info rounded-pill">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Sign Out Section -->

    <!-- ======= Main Section ======= -->

    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Admin Login</h2>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Admin Login Section ======= -->
        <section id="admin" class="admin">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h4>Admin Login!</h4>
                </div>

                <div class="row content text-justify justify-content-center mb-2">
                    <div class="col-md-8 mt-2" data-aos="fade-up" data-aos-delay="150">
                        <!-- ======= Alert Login Success Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="300">
                                <div id="alert-login-success" class="alert alert-success alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading"><strong>Login Successful!</strong></h4>
                                    <p>You have <strong>successfully logged in.</strong></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Login Success Section -->

                        <!-- ======= Alert Login Error Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="300">
                                <div id="alert-login-error" class="alert alert-danger alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading">
                                        <strong>
                                            <?php echo $message ?>
                                        </strong>
                                    </h4>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Login Error Section -->
                    </div>
                </div>

                <div class="row content text-justify justify-content-center mb-2">
                    <div class="col-md-4 mt-2" data-aos="fade-up" data-aos-delay="150">
                        <img src="<?php echo base_url();?>assets/img/login.png" class="card-img-top rounded" alt="Login">
                    </div>
                    <div class="col-md-6 mt-2" data-aos="fade-up" data-aos-delay="200">
                        
                        <?php echo form_open("admin/auth/login");?>

                        <form>
                            <div class="form-group">
                                <i class="fa fa-user-circle prefix grey-text"></i>
                                <label for="inputUsername"> | Username</label>
                                <!-- <input type="text" class="form-control" id="inputUsername" placeholder="Admin Username" required>
 -->
                                <?php echo form_input(array('name' => 'username', 'value' => set_value('username'), 'placeholder' => 'Username', 'class' => 'form-control')); ?>

                            </div>
                            <div class="form-group">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <label for="inputPassword"> | Password</label>
                                
                                <!-- <input type="password" class="form-control" id="inputPassword" placeholder="Admin Password" required> -->

                                <?php echo form_password(array('name' => 'password', 'value' => set_value('password'), 'placeholder' => 'Password', 'class' => 'form-control')); ?>

                            </div>
                            <div class="text-center">
                                <button type="reset" class="btn btn-danger btn-form rounded-pill">Reset</button>
                                <button type="submit" class="btn btn-info btn-form rounded-pill">Login</button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center mb-2">
                            <a href="index.html">Back to Home</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Members Login Section -->

    </main>


    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12 text-lg-center text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>DLI Edu Venture</strong> | 2020
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/counterup/counterup.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/venobox/venobox.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>

</html>
