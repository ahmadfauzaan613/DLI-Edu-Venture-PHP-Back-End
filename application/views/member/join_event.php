<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DLI Edu Venture | Members Profile</title>
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
                    <li class="drop-down">
                        <a href="#">
                            <?php echo $this->session->userdata('email')?>
                        </a>
                        <ul>
                            <li>
                                <a href=" <?php echo base_url("profile/detail"); ?> " class="btn btn-modal-profile mb-2"><i class="fa fa-user prefix grey-text"></i> My Profile</a>
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
                    <a href="<?php echo base_url("user/logout");?>" class="btn btn-info rounded-pill"> Sign Out</a>
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
                    <h2>My Profile</h2>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Profile Section ======= -->
        <section id="profile" class="profile">
            <div class="container">

                <div class="row content text-justify mb-2">
                    <div class="col-4" data-aos="fade-up" data-aos-delay="150">
                        <div class="row justify-content-center text-center mb-2">
                            <a href=" <?php echo base_url("profile/detail"); ?> " class="btn-learn-more btn-profile">
                                <i class="fa fa-user prefix grey-text"></i> My Profile
                            </a>
                        </div>

                        <?php foreach ($profil as $profil1): ?>

                            <div class="row justify-content-center text-center mb-2">
                                <a href=" <?php echo base_url('profile/update/'.$profil1->id)?> " class="btn-learn-more btn-profile">
                                    <i class="fa fa-pencil-square-o prefix grey-text"></i> Updates Profile
                                </a>
                            </div>
                            
                        <?php endforeach ?>

                        <div class="row justify-content-center text-center mb-2">
                            <a href=" <?php echo base_url("profile/cekevent"); ?> " class="btn-learn-more btn-profile">
                                <i class="fa fa-history prefix grey-text"></i> Activity History
                            </a>
                        </div>
                    </div>

                    <div class="col-8 mb-2 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                        <h4 class="text-center" data-aos="fade-up" data-aos-delay="150">
                            Events
                        </h4>
                        <table class="table table-striped table-bordered table-hover table-responsive-sm text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Event</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach ($event as $event1): 
                                    ?>

                                    <tr>
                                        <th scope="row">
                                            <?php echo $no++ ?>
                                        </th>

                                        <td>
                                            <?php echo $event1->judul_event;?>
                                        </td>

                                        <td>
                                            <?php 
                                            $a = $event1->jadwal_tgl;
                                            $b = date("d-m-Y", strtotime($a));
                                            echo $b;
                                            ?>
                                        </td>

                                        <td><?php echo $event1->jadwal_time ?> WIB </td>

                                    </tr>

                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Profile Section -->

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