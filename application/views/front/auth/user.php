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
                                <a href=" <?php echo base_url("admin/dashboard") ?> " class="btn btn-modal mb-2"><i class="fa fa-tachometer prefix grey-text"></i> Dashboard</a>
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
                    <button class="btn btn-info rounded-pill">Sign Out</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Sign Out Section -->

    <!-- ======= Modal Delete Members Section ======= -->
    <div class="modal fade mt-4 pt-4" id="modalDeleteMembersForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border border-danger">
                <div class="modal-header text-center bg-danger text-white">
                    <h4 class="modal-title w-100 font-weight-bold">Delete Members</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-2">
                        <p>Are you sure you want to delete this item?</p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center mb-2">
                    <button class="btn btn-warning rounded-pill" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger rounded-pill">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Delete Members Section -->

    <!-- ======= Main Section ======= -->
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Table Members</h2>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Admin Section ======= -->
        <section id="admin" class="admin">
            <div class="container">

                <div class="row content text-justify justify-content-center mb-2">
                    <div class="col-md-8 mt-2" data-aos="fade-up" data-aos-delay="150">
                        <!-- ======= Alert Data Delete Success Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="150">
                                <div id="alert-data-delete-success" class="alert alert-success alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading text-center"><strong>Success!</strong></h4>
                                    <p>Data has been <strong>deleted.</strong></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Data Delete Success Section -->

                        <!-- ======= Alert Data Delete Error Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="150">
                                <div id="alert-data-delete-error" class="alert alert-danger alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading text-center"><strong>Error!</strong></h4>
                                    <p>Data hasn't been <strong>deleted.</strong></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Data Delete Error Section -->
                    </div>
                </div>

                <div class="row content text-justify mb-4">

                    <div class="col-4" data-aos="fade-up" data-aos-delay="150">
                        <div class="row justify-content-center text-center mb-2">
                            <a href=" <?php echo base_url("admin/dashboard") ?> " class="btn-admin">
                                <i class="fa fa-tachometer prefix grey-text"></i> Dashboard
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/auth/user") ?>" class="btn-admin">
                                <i class="fa fa-users prefix grey-text"></i> Table Members
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/program") ?>" class="btn-admin">
                                <i class="fa fa-tasks prefix grey-text"></i> Table Programs
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/startup") ?>" class="btn-admin">
                                <i class="fa fa-building prefix grey-text"></i> Table Startups
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/news") ?>" class="btn-admin">
                                <i class="fa fa-file-text-o prefix grey-text"></i> Table News
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/event") ?>" class="btn-admin">
                                <i class="fa fa-calendar prefix grey-text"></i> Table Events
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/blog") ?>" class="btn-admin">
                                <i class="fa fa-rss prefix grey-text"></i> Table Blogs
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/gallery") ?>" class="btn-admin">
                                <i class="fa fa-picture-o prefix grey-text"></i> Table Gallery
                            </a>
                        </div>
                    </div>

                    <div class="col-8 mb-2 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                        <h4 class="mt-2 text-center" data-aos="fade-up" data-aos-delay="150">
                            Table Members
                        </h4>
                        <table class="table table-striped table-bordered table-hover table-responsive text-nowrap">
                            <thead class="bg-info text-center">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Joined At</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-justify">

                              <?php $start = 0; foreach ($users as $user):?>

                                <tr>
                                    <th scope="row"><?php echo ++$start ?></th>
                                    <td><?php echo $user->nama ?></td>
                                    <td><?php echo $user->email ?></td>
                                    <td><?php echo $user->phone ?></td>
                                    <td><?php echo $user->alamat ?></td>
                                    <td>
                                        <img src="<?php echo base_url('assets/images/user/'.$user->userfile.'_thumb'.$user->userfile_type)?>" width="150" height="110" />
                                    </td>
                                    <td><?php echo $user->created_on ?></td>
                                    <td>.....</td>
                                    <td>
                                        <a href="#" class="btn btn-content-delete mb-2" data-toggle="modal" data-target="#modalDeleteMembersForm">
                                            <i class="fa fa-trash-o prefix grey-text"></i> Delete
                                        </a>
                                    </td>
                                </tr>

                                <?php endforeach;?>

                            </tbody>
                        </table>
                        <div class="row content text-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="150">
                                <a href=" <?php echo base_url("admin/auth/create_user") ?> " class="btn btn-content-add mb-2">
                                    <i class="fa fa-user-plus prefix grey-text"></i> Add Members
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Admin Section -->

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