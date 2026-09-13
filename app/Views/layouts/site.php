<?php $session = service('session'); ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DLI Edu Venture — Disruptive Learning Innovation, Universitas Negeri Malang.">
    <title><?= esc($title ?? 'DLI Edu Venture') ?></title>
    <link rel="icon" href="<?= base_url('assets/img/Logo_DLI_Eduventure_Putih.ico') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Raleway:300,400,600,700&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/icofont/icofont.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/owl.carousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/venobox/venobox.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/fontawesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/modern.css') ?>" rel="stylesheet">
</head>
<body>
<a class="skip-link" href="#page-content">Lewati ke konten</a>
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <div class="logo mr-auto">
            <a href="<?= base_url('/') ?>"><img src="<?= base_url('assets/img/Logo_DLI_Eduventure_Warna.png') ?>" alt="DLI Edu Venture" class="img-fluid"></a>
        </div>
        <nav class="nav-menu d-none d-lg-block" aria-label="Navigasi utama">
            <ul>
                <li><a href="<?= base_url('/') ?>">Home</a></li>
                <li><a href="<?= base_url('/#about') ?>">About</a></li>
                <li><a href="<?= base_url('program') ?>">Programs</a></li>
                <li><a href="<?= base_url('startup') ?>">Startups</a></li>
                <li><a href="<?= base_url('news') ?>">News</a></li>
                <li><a href="<?= base_url('event') ?>">Events</a></li>
                <li><a href="<?= base_url('blog') ?>">Blogs</a></li>
                <li><a href="<?= base_url('gallery') ?>">Gallery</a></li>
                <li><a href="<?= base_url('/#contact') ?>">Contact</a></li>
                <li class="drop-down"><a href="#"><?= $session->get('member_email') ? esc($session->get('member_email')) : 'Members' ?></a>
                    <ul>
                        <?php if ($session->get('member_id')): ?>
                            <li><a href="<?= base_url('profile') ?>">Profil</a></li>
                            <li><a href="<?= base_url('user/logout') ?>">Keluar</a></li>
                        <?php else: ?>
                            <li><a href="<?= base_url('user/login') ?>">Login</a></li>
                            <li><a href="<?= base_url('user/register') ?>">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div class="site-main" id="page-content">
    <?php if ($message = $session->getFlashdata('contactMessage')): ?>
        <div class="container site-flash alert alert-info" role="status"><?= esc($message) ?></div>
    <?php endif; ?>
    <?php if ($message = $session->getFlashdata('eventMessage')): ?>
        <div class="container site-flash alert alert-info" role="status"><?= esc($message) ?></div>
    <?php endif; ?>
    <?= $content ?>
</div>
<footer id="footer">
    <div class="container text-center">
        <p class="mb-0">&copy; <?= date('Y') ?> <strong>DLI Edu Venture</strong> · Universitas Negeri Malang</p>
        <a href="mailto:dli@um.ac.id">Kebijakan privasi dan kontak</a>
    </div>
</footer>
<a href="https://api.whatsapp.com/send?phone=6283853427582&amp;text=Hello%20Admin!" target="_blank" rel="noopener noreferrer" class="float-button" aria-label="Hubungi DLI melalui WhatsApp"><i class="fa fa-whatsapp my-float-button"></i></a>
<a href="#" class="back-to-top" aria-label="Kembali ke atas"><i class="icofont-simple-up"></i></a>
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery.easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/waypoints/jquery.waypoints.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/counterup/counterup.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/owl.carousel/owl.carousel.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/venobox/venobox.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>
