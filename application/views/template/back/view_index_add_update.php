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
                <a href=" <?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/Logo_DLI_Eduventure_Warna.png" alt="Logo DLI Edu Venture" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href=" <?php echo base_url();?> ">Home</a></li>
                    <li><a href=" <?php echo base_url();?>#about">About</a></li>
                    <li><a href=" <?php echo base_url();?>#programs">Programs</a></li>
                    <li><a href=" <?php echo base_url();?>#startups">Startups</a></li>
                    <li><a href=" <?php echo base_url();?>#news">News</a></li>
                    <li><a href=" <?php echo base_url();?>#events">Events</a></li>
                    <li><a href=" <?php echo base_url();?>#blogs">Blogs</a></li>
                    <li><a href=" <?php echo base_url();?>#gallery">Gallery</a></li>
                    <li><a href=" <?php echo base_url();?>#contact">Contact</a></li>
                    <li><a href=" <?php echo base_url();?>#search">Search <i class="fa fa-search" aria-hidden="true"></i></a></li>
                    <li class="drop-down">
                        <a href="#">Admin</a>
                        <ul>
                            <li>
                                <a href=" <?php echo base_url('admin/dashboard') ?> " class="btn btn-modal mb-2"><i class="fa fa-tachometer prefix grey-text"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/login/logout");?>" class="btn btn-modal mb-2">
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

    <!-- ======= Main Section ======= -->
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>
                        
                        <?php echo $title; ?>

                    </h2>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Admin Section ======= -->
        <section id="admin" class="admin">
            <div class="container">

                <div class="row content text-justify justify-content-center mb-2">
                    <div class="col-md-8 mt-2" data-aos="fade-up" data-aos-delay="150">
                        <!-- ======= Alert Data Create Success Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="150">
                                <div id="alert-data-create-success" class="alert alert-success alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading text-center"><strong>Success!</strong></h4>
                                    <p>Data has been <strong>created.</strong></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Data Create Success Section -->

                        <!-- ======= Alert Data Create Error Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="150">
                                <div id="alert-data-create-error" class="alert alert-danger alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading text-center"><strong>Error!</strong></h4>
                                    <p>Data hasn't been <strong>created.</strong></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Data Create Error Section -->
                    </div>
                </div>

                    <?php $this->load->view($content); ?>                    


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


<script type="text/javascript">

  function tampilkanPreview(foto,idpreview)
      { //membuat objek gambar
        var gb = foto.files;
        //loop untuk merender gambar
        for (var i = 0; i < gb.length; i++)
        { //bikin variabel
          var gbPreview = gb[i];
          var imageType = /image.*/;
          var preview=document.getElementById(idpreview);
          var reader = new FileReader();
          if (gbPreview.type.match(imageType))
          { //jika tipe data sesuai
            preview.file = gbPreview;
            reader.onload = (function(element)
            {
              return function(e)
              {
                element.src = e.target.result;
              };
            })(preview);
            //membaca data URL gambar
            reader.readAsDataURL(gbPreview);
          }
          else
            { //jika tipe data tidak sesuai
              alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
          }
        }

    
         function editPreview(foto,idpreview)
      { //membuat objek gambar
        var gb = foto.files;
        //loop untuk merender gambar
        for (var i = 0; i < gb.length; i++)
        { //bikin variabel
          var gbPreview = gb[i];
          var imageType = /image.*/;
          var preview=document.getElementById(idpreview);
          var reader = new FileReader();
          if (gbPreview.type.match(imageType))
          { //jika tipe data sesuai
            preview.file = gbPreview;
            reader.onload = (function(element)
            {
              return function(e)
              {
                element.src = e.target.result;
              };
            })(preview);
            //membaca data URL gambar
            reader.readAsDataURL(gbPreview);
          }
            else
            { //jika tipe data tidak sesuai
              alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
      }

      </script>

</body>

</html>