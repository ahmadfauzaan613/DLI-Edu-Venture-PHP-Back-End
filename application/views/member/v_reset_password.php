<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>DLI Edu Venture | Members Login</title>
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
								<a href=" <?php echo base_url("user/login");?> " class="btn btn-modal mb-2">
									<i class="fa fa-sign-in prefix grey-text"></i> Login
								</a>
							</li>
							<li>
								<a href=" <?php echo base_url("user") ?> " class="btn btn-modal mb-2">
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
					<h2>Reset Password</h2>
				</div>

			</div>
		</section>
		<!-- End Breadcrumbs Section -->

		<!-- ======= Members Forgot Section ======= -->
		<section id="members" class="members">
			<div class="container">

				<div class="section-title" data-aos="fade-up">
					<h4>Reset Your Password?</h4>
				</div>

				<div class="row content text-justify justify-content-center mb-2">
					<div class="col-md-8 mt-2" data-aos="fade-up" data-aos-delay="150">
						<!-- ======= Alert Forgot Email Success Section ======= -->
						<div class="row content justify-content-center">
							<div class="col" data-aos="fade-up" data-aos-delay="150">
								<div id="alert-forgot-email-success" class="alert alert-success alert-dismissible fade collapse text-center" role="alert">
									<h4 class="alert-heading text-center"><strong>Success!</strong></h4>
									<p>We have sent an <strong>Email.</strong> Please check your <strong>Email.</strong></p>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
						</div>
						<!-- End ALert Forgot Email Success Section -->

						<!-- ======= Alert Forgot Email Error Section ======= -->
						<div class="row content justify-content-center">
							<div class="col" data-aos="fade-up" data-aos-delay="150">
								<div id="alert-forgot-email-error" class="alert alert-danger alert-dismissible fade collapse text-center" role="alert">
									<h4 class="alert-heading text-center"><strong>Error!</strong></h4>
									<p>We're sorry. Something went wrong, please <strong>try again</strong> later.</p>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
						</div>
						<!-- End ALert Forgot Email Error Section -->
					</div>
				</div>

				<div class="row content text-justify justify-content-center mb-2">
					<div class="col-md-6 mb-2" data-aos="fade-up" data-aos-delay="200">
						<!-- <form> -->


							<?php $reset_key = $this->uri->segment(3);?>

							<?php echo form_open('user/reset_password_validation') ?>

							<div class="text-justify mb-4">
								<p> Reset Password with new password </p>
							</div>
							
								<?php echo form_hidden('reset_key', set_value('reset_key', $reset_key)); ?>
							
							<div class="form-group">
								<i class="fa fa-envelope prefix grey-text"></i>
								<label for="inputEmail"> | Input New Password</label>

								<?php echo form_input('password', $this->input->post('password')); ?>
								
							</div>
							<div class="form-group">
								<i class="fa fa-envelope prefix grey-text"></i>
								<label for="inputEmail"> | Confirm New Password </label>
								
								<?php echo form_input('retype_password', $this->input->post('confirm_password')); ?>
							</div>
							<div class="text-center">
								<input type="submit" class="btn btn-info btn-form rounded-pill" value="Reset Password">
							</div>

							<?php echo form_close() ?>
							<!-- </form> -->
							<hr>
						</div>
					</div>

				</div>
			</section>
			<!-- End Members Forgot Section -->

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









	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body>

		<?php $reset_key = $this->uri->segment(3);?>

		<?php echo form_open('user/reset_password_validation') ?>

		<?php echo form_input('reset_key', set_value('reset_key', $reset_key)); ?>
		<?php echo form_input('password', $this->input->post('password')); ?>
		<?php echo form_input('retype_password', $this->input->post('confirm_password')); ?>

		<input type="submit" name="" value="reset password" placeholder="">

		<?php echo form_close() ?>

	</body>
	</html>