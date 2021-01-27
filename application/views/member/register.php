<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DLI Edu Venture | Members Register</title>
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
                <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/Logo_DLI_Eduventure_Warna.png" alt="Logo DLI Edu Venture" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="<?php echo base_url();?>#home">Home</a></li>
                    <li><a href="<?php echo base_url();?>#about">About</a></li>
                    <li><a href="<?php echo base_url();?>#programs">Programs</a></li>
                    <li><a href="<?php echo base_url();?>#startups">Startups</a></li>
                    <li><a href="<?php echo base_url();?>#news">News</a></li>
                    <li><a href="<?php echo base_url();?>#events">Events</a></li>
                    <li><a href="<?php echo base_url();?>#blogs">Blogs</a></li>
                    <li><a href="<?php echo base_url();?>#gallery">Gallery</a></li>
                    <li><a href="<?php echo base_url();?>#contact">Contact</a></li>
                    <li><a href="<?php echo base_url();?>#search">Search <i class="fa fa-search" aria-hidden="true"></i></a></li>
                    <li class="drop-down active"><a href="#">Members</a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url();?>user/login" class="btn btn-modal mb-2">
                                    <i class="fa fa-sign-in prefix grey-text"></i> Login
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>user" class="btn btn-modal mb-2">
                                    <i class="fa fa-user-plus prefix grey-text"></i> Register
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

    <!-- ======= Main Section ======= -->
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Members Register</h2>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Members Register Section ======= -->
        <section id="members" class="members">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h4>Create an Account!</h4>
                </div>

                <div class="row content text-justify justify-content-center mb-2">
                    <div class="col-md-8 mt-2" data-aos="fade-up" data-aos-delay="150">
                        <!-- ======= Alert Registration Success Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="150">
                                <div id="alert-registration-success" class="alert alert-success alert-dismissible fade collapse text-justify" role="alert">
                                    <h4 class="alert-heading text-center"><strong>Registration Successful!</strong></h4>
                                    <p>Your account <strong>created successfully</strong>, please check your <strong>email</strong> for verification link to activate your account and complete registration.</p>
                                    <p>If you have not received it, please check your spam folder, then mark it as <strong>not</strong> spam.</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Registration Success Section -->

                        <!-- ======= Alert Registration Error Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="150">
                                <div id="alert-registration-error" class="alert alert-danger alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading text-center"><strong>Registration Error!</strong></h4>
                                    <p>We're sorry. Something went wrong, user registration <strong>failed.</strong> Please try again later.</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Registration Error Section -->

                        <!-- ======= Alert Email Verified Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="200">
                                <div id="alert-email-verified" class="alert alert-success alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading"><strong>Email Verified!</strong></h4>
                                    <p>Thank you, your email has been <strong>verified</strong>. Your account is now activate.</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Email Verified Section -->

                        <!-- ======= Alert Email Error Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="200">
                                <div id="alert-email-error" class="alert alert-danger alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading"><strong>Email Error!</strong></h4>
                                    <p>We're sorry. Something went wrong, email <strong>not verified.</strong> Please try again later.</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Email Error Section -->
                    </div>
                </div>

                <div class="row content text-justify justify-content-center mb-2">
                    <div class="col-md-4 mb-2" data-aos="fade-up" data-aos-delay="150">
                        <img src="<?php echo base_url();?>assets/img/register.png" class="card-img-top rounded" alt="Register">
                    </div>
                    <div class="col-md-6 mb-2" data-aos="fade-up" data-aos-delay="200">

                        <?php
                        if(validation_errors()){
                            ?>
                            <div class="alert alert-info text-center">
                                <?php echo validation_errors(); ?>
                            </div>
                            <?php
                        }

                        if($this->session->flashdata('message')){
                            ?>
                            <div class="alert alert-info text-center">
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                            <?php
                        }   
                        ?>

                        <form method="POST" action="<?php echo base_url().'user/register'; ?>">

                            <div class="form-group">
                                <i class="fa fa-user prefix grey-text"></i>
                                <label for="inputName"> | Full Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Full Name" required>
                            </div>
                            <div class="form-group">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <label for="inputEmail"> | Email Address</label>

                                <input type="email" placeholder="Your Email Address" required class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <label for="inputPassword"> | Password</label>

                                    <input type="password" placeholder="Your Password" required class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>">

                                </div>
                                <div class="form-group col-md-6">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <label for="inputRepeatPassword"> | Confirm Password</label>

                                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Repeat Your Password" value="<?php echo set_value('password_confirm'); ?>">

                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <i class="fa fa-phone prefix grey-text"></i>
                                <label for="inputPhone"> | Phone Number</label>
                                <input type="tel" class="form-control" id="inputPhone" placeholder="Your Phone Number" required>
                            </div>
                            <div class="form-group">
                                <i class="fa fa-map-marker prefix grey-text"></i>
                                <label for="inputAddress"> | Address</label>
                                <textarea class="form-control" id="inputAddress" rows="3" placeholder="Your Address" required></textarea>
                            </div>
                            <div class="form-group">
                                <i class="fa fa-user-circle prefix grey-text"></i>
                                <label for="inputBio"> | Bio</label>
                                <input type="text" class="form-control" id="inputBio" placeholder="Your Bio" required>
                            </div>
                            <div class="form-group">
                                <i class="fa fa-camera prefix grey-text"></i>
                                <label for="inputPhoto"> | Photo</label>
                                <input type="file" class="form-control" id="inputPhoto" required>
                            </div> -->
                            
                            <div class="text-center">
                                <button type="reset" class="btn btn-danger btn-form rounded-pill">Reset</button>
                                <button type="submit" class="btn btn-info btn-form rounded-pill">Register</button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center mb-2">
                            <a href="<?php echo base_url("user/reset_password");?>">Forgot Password?</a>
                        </div>
                        <div class="text-center mb-2">
                            <a href=" <?php echo base_url("user/login");?> ">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Members Register Section -->

    </main>
    <!-- End Main Section -->

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