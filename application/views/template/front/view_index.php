<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DLI Edu Venture</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/img/Logo_DLI_Eduventure_Putih.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>



    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <a href=" <?php echo base_url(); ?> ">
                    <img src="<?php echo base_url(); ?>assets/img/Logo_DLI_Eduventure_Warna.png" alt="Logo DLI Edu Venture" class="img-fluid">
                </a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>#about">About</a></li>
                    <li><a href="<?php echo base_url(); ?>#programs">Programs</a></li>
                    <li><a href="<?php echo base_url(); ?>#startups">Startups</a></li>
                    <li><a href="<?php echo base_url(); ?>#news">News</a></li>
                    <li><a href="<?php echo base_url(); ?>#events">Events</a></li>
                    <li><a href="<?php echo base_url(); ?>#blogs">Blogs</a></li>
                    <li><a href="<?php echo base_url(); ?>#gallery">Gallery</a></li>
                    <li><a href="<?php echo base_url(); ?>#contact">Contact</a></li>
                    <li><a href="<?php echo base_url(); ?>#search">Search <i class="fa fa-search" aria-hidden="true"></i></a></li>
                    <li class="drop-down">

                        <?php if (isset($_SESSION['email'])) { ?>

                            <a href="#">
                                <?php echo $this->session->userdata('email') ?>
                            </a>
                            <ul>
                                <li>
                                    <a href=" <?php echo base_url("profile") ?> " class="btn btn-modal mb-2">

                                        <i class="fa fa-sign-in prefix grey-text"></i> Profil
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("user/logout"); ?>" class="btn btn-modal mb-2">
                                        <i class="fa fa-user-plus prefix grey-text"></i> Logout
                                    </a>
                                </li>
                            </ul>

                        <?php } else { ?>

                            <a href="#">
                                Members
                            </a>
                            <ul>
                                <li>
                                    <a href=" <?php echo base_url("user/login"); ?> " class="btn btn-modal mb-2">
                                        <i class="fa fa-sign-in prefix grey-text"></i> Login
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("user/register"); ?>" class="btn btn-modal mb-2">
                                        <i class="fa fa-user-plus prefix grey-text"></i> Register
                                    </a>
                                </li>
                            </ul>

                        <?php } ?>


                    </li>
                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->


    <?php $this->load->view($content); ?>



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

    <!-- ======= Whatsapp Floating Button Section ======= -->
    <a href="https://api.whatsapp.com/send?phone=6283853427582&text=Hello%20Admin!" target="_blank" class="float-button"><i class="fa fa-whatsapp my-float-button"></i></a>
    <!-- Whatsapp Floating Button Section -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/counterup/counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/venobox/venobox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>


</html>

</html>