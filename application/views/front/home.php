    <!-- ======= Home Section ======= -->
    <section id="home" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Act Your Thoughts Confidently</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400" class="text-justify">Welcome to Center of Excellence with focus in Disruptive Learning Innovation</h2>
                    <h6 data-aos="fade-up" data-aos-delay="600" class="text-justify">DLI Edu Venture merupakan bagian dari PUI-PT DLI Universitas Negeri Malang yang berfokus pada pengembangan inovasi pembelajaran secara disruptif pada era digital milenial yang unggul dan berdaya sains tinggi melalui produk riset dengan
                        <i>disruptive technology.</i> </h6>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="#about" class="btn-get-started scrollto">Get Started ➔</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 home-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="assets/img/home-img.png" class="img-fluid animated" alt="Home">
                </div>
            </div>
        </div>

    </section>
    <!-- End Home -->

    <!-- ======= Main Section ======= -->
    <main id="main">


        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients clients">
            <div class="container">

                <div class="row text-center justify-content-center">

                    <div class="col-12 col-sm-6 col-md-4">
                        <img src="assets/img/clients/Client_1_Logo_PUIPT.png" class="img-fluid" alt="Logo PU IPT" data-aos="zoom-in" data-aos-delay="100">
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <img src="assets/img/clients/Client_2_Logo_DLI.png" class="img-fluid" alt="Logo DLI" data-aos="zoom-in" data-aos-delay="100">
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <img src="assets/img/clients/Client_3_Logo_UM.png" class="img-fluid" alt="Logo UM" data-aos="zoom-in" data-aos-delay="100">
                    </div>

                </div>

            </div>
        </section>
        <!-- End Clients Section -->

        <!-- ======= Our Partners Section ======= -->
        <section id="partners" class="partners">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Our Partners</h2>
                </div>

                <div class="row content text-justify">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="150">
                        <div class="owl-carousel partners-carousel">
                            <img src="<?php echo base_url('assets/') ?>img/partners/Partner_OrbitFutureAcademy.png" alt="Orbit Future Academy">
                            <img src="<?php echo base_url('assets/') ?>img/partners/Partner_PusatBisnisUNM.png" alt="Pusat Bisnis UNM">
                            <img src="<?php echo base_url('assets/') ?>img/partners/Partner_UGM.png" alt="UGM">
                            <img src="<?php echo base_url('assets/') ?>img/partners/Partner_Unikama.png" alt="Unikama">
                            <img src="<?php echo base_url('assets/') ?>img/partners/Partner_UnivMulawarman.png" alt="Universitas Mulawarman">
                            <img src="<?php echo base_url('assets/') ?>img/partners/Partner_PoliteknikNegeriJember.png" alt="Politeknik Negeri Jember">
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Our Partners Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>About Us</h2>
                </div>

                <div class="row content text-justify">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                        <p>
                            Pusat Unggulan Ipteks Perguruan Tinggi Disruptive Learning Innovation Universitas Negeri Malang merupakan salah satu Center of Excellence, dimana nantinya kami akan mengembangkan untuk memberi fasilitas pembelajaran untuk membantu mereka dalam belajar.
                            "Disruptive Learning Innovation" merupakan konsep yang akan kami berikan dengan strategi pembelajaran di lingkungan yang ada disekitar atau bisa dikenal dengan "Smart Learning Environment"
                        </p>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <p>
                            Dalam pengembangannya kami akan berfokus pada 3 pilar ;
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Membangun system administrasi dan manajemen riset (Personalized Learning, Ubiquitous Learning, Gamified Learning, dan Heutagogy Learning).</li>
                            <li><i class="ri-check-double-line"></i> Menguatkan aspek akademis bertaraf internasional.</li>
                            <li><i class="ri-check-double-line"></i> Hilirisasi inovasi belajar dan komersialisasi produk.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Programs Section ======= -->
        <section id="programs" class="programs">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Our Programs</h2>
                </div>

                <div class="row content text-center justify-content-center">

                    <?php foreach ($program as $program1) { ?>

                        <div class="col-sm-6 col-md-4 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card mb-3">

                                <img class="card-img-top" src="<?php echo base_url('assets/images/program/' . $program1->foto . '_thumb' . $program1->foto_type) ?>" />

                                <div class="card-img-overlay">
                                    <div class="card-header card-title text-dark">
                                        <h5>
                                            <?php echo $program1->judul_program ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="<?php echo base_url('program/selanjutnya/' . $program1->id_program); ?>" class="btn btn-learn-more-card" data-aos="fade-up" data-aos-delay="150">Learn More ➔</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>

                <div class="row content text-center">
                    <div class="col-lg-12 mt-4" data-aos="fade-up" data-aos-delay="150">
                        <a href="<?php echo base_url("program") ?>" class="btn-learn-more">Read More ➔</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Programs Section -->

        <!-- ======= Startups Section ======= -->
        <section id="startups" class="startups">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Our Startups</h2>
                </div>

                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4" data-aos="fade-up" data-aos-delay="300">

                    <?php foreach ($startup as $startup1) : ?>

                        <div class="col mt-4">
                            <div class="card h-100 border-info">
                                <a href="<?php echo base_url('startup/selanjutnya/' . $startup1->id_startup); ?>">

                                    <img class="card-img-top" src="<?php echo base_url('assets/images/startup/' . $startup1->foto . '_thumb' . $startup1->foto_type) ?>" />

                                    <div class="card-body">
                                        <h5 class="card-title text-center">

                                            <?php echo $startup1->judul_startup; ?>

                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>


                <div class="row content text-center">
                    <div class="col-lg-12 mt-4" data-aos="fade-up" data-aos-delay="150">
                        <a href=" <?php echo base_url("startup") ?> " class="btn-learn-more">Read More ➔</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Startups Section -->

        <!-- ======= News Section ======= -->
        <section id="news" class="news">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>News</h2>
                </div>

                <div class="row content text-justify" data-aos="fade-up" data-aos-delay="300">

                    <?php foreach ($news as $news1) : ?>

                        <div class="col-6 col-md-4 mt-2">
                            <div class="icon-box rounded">

                                <img class="card-news mr-4" src="<?php echo base_url('assets/images/news/' . $news1->foto . '_thumb' . $news1->foto_type) ?>" />

                                <h3><a href="<?php echo base_url('news/selanjutnya/' . $news1->id_news); ?>"> <?php echo $news1->judul_news; ?> </a></h3>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>

                <div class="row content text-center">
                    <div class="col-lg-12 mt-4" data-aos="fade-up" data-aos-delay="150">
                        <a href="<?php echo base_url("news"); ?>" class="btn-learn-more">Read More ➔</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End News Section -->

        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Events</h2>
                </div>

                <div class="row content text-center">

                    <?php foreach ($event as $event1) : ?>

                        <div class="col-sm-6 col-md-4 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card mb-3">
                                <a href="<?php echo base_url('event/selanjutnya/' . $event1->id_event); ?>">

                                    <img class="card-img-top" src="<?php echo base_url('assets/images/event/' . $event1->foto . '_thumb' . $event1->foto_type) ?>" />

                                    <div class="card-img-overlay">

                                        <div class="card-footer card-content text-dark">
                                            <h5>
                                                <?php echo $event1->judul_event; ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card-footer card-date bg-transparent">
                                        <h6>

                                            <?php
                                            $a = $event1->jadwal_tgl;
                                            $b = date("d-m-Y", strtotime($a));
                                            echo $b;
                                            ?>

                                        </h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>

                <div class="row content text-center mt-4">
                    <div class="col" data-aos="fade-up" data-aos-delay="150">
                        <a href="<?php echo base_url("event"); ?>" class="btn-learn-more">Read More ➔</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End More Events Section -->

        <!-- ======= Blogs Section ======= -->
        <section id="blogs" class="blogs">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Blogs</h2>
                </div>

                <div class="row">

                    <?php foreach ($blog as $blog1) : ?>

                        <div class="col-6 col-lg-4 d-flex align-items-stretch mb-4 mb-lg-4">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <a href="<?php echo base_url('blog/selanjutnya/' . $blog1->id_blog); ?>">

                                    <img class="card-img-top" src="<?php echo base_url('assets/images/blog/' . $blog1->foto . '_thumb' . $blog1->foto_type) ?>" />

                                    <h4 class="title text-center">
                                        <?php echo $blog1->judul_blog ?>
                                    </h4>

                                    <p class="description text-justify">
                                        <?php
                                        $dikit = $blog1->isi;
                                        $potong = substr($dikit, 0, 150);
                                        echo $potong;
                                        ?> ... ...
                                    </p>
                                </a>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>

                <div class="row content text-center">
                    <div class="col" data-aos="fade-up" data-aos-delay="150">
                        <a href="<?php echo base_url("blog"); ?>" class="btn-learn-more">Read More ➔</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Blogs Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Gallery</h2>
                </div>

                <div class="row gallery-container" data-aos="fade-up" data-aos-delay="400">

                    <?php foreach ($gallery as $gallery1) : ?>

                        <div class="col-lg-3 col-md-4 col-6 gallery-item filter-talks">
                            <div class="gallery-wrap">

                                <img class="img-fluid" src="<?php echo base_url('assets/images/gallery/' . $gallery1->foto . '_thumb' . $gallery1->foto_type) ?>" />

                                <div class="gallery-info">
                                    <div class="gallery-links">
                                        <a href="<?php echo base_url('assets/images/gallery/' . $gallery1->foto . '_thumb' . $gallery1->foto_type) ?>" data-gall="galleryGallery" class="venobox" title="Webinar 1"><i class="bx bx-plus"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php endforeach ?>

                </div>

                <div class="row content text-center">
                    <div class="col" data-aos="fade-up" data-aos-delay="150">
                        <a href="<?php echo base_url("gallery"); ?>" class="btn-learn-more">View More ➔</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Gallery Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="contact-area" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-inner area-padding">
                    <div class="contact-overly"></div>
                    <div class="container">

                        <div class="section-title" data-aos="fade-up">
                            <h2>Contact Us</h2>
                        </div>

                        <div class="row" data-aos="fade-up" data-aos-delay="100">
                            <!-- Start contact icon column -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="contact-icon text-center">
                                    <div class="single-icon">
                                        <i class="fa fa-mobile"></i>
                                        <p>
                                            <a href="https://api.whatsapp.com/send?phone=6281233764606&text=Hello%20Admin!" target="_blank">Call: 0812-3376-4606 <br>(Admin)</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Start contact icon column -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="contact-icon text-center">
                                    <div class="single-icon">
                                        <i class="fa fa-envelope-o"></i>
                                        <p>
                                            <a href="mailto:dli@um.ac.id">Email: dli@um.ac.id</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Start contact icon column -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="contact-icon text-center">
                                    <div class="single-icon">
                                        <i class="fa fa-map-marker"></i>
                                        <p>
                                            <a href="https://goo.gl/maps/mepzCRTiBU8LtXV69"> Address: H7 Building 5 Semarang Street <br> Malang East Java, Indonesia</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" data-aos="fade-up" data-aos-delay="100">

                            <!-- Start Google Map -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!-- Start Map -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.3410517142324!2d112.61740321413369!3d-7.963662194264164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6282a9b0f9ec3%3A0xab6264ff036a3e99!2sH7%20Gedung%2C%20Jl.%20Semarang%20No.5%2C%20Sumbersari%2C%20Kec.%20Lowokwaru%2C%20Kota%20Malang%2C%20Jawa%20Timur%2065145!5e0!3m2!1sid!2sid!4v1594115351323!5m2!1sid!2sid" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                                <!-- End Map -->
                            </div>
                            <!-- End Google Map -->

                            <!-- Start  contact -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form contact-form">
                                    <form action="<?= base_url('home/contact') ?>" method="post" role="form" class="php-email-form">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Your message has been sent. Thank you!</div>
                                        </div>
                                        <div class="text-center mb-4">
                                            <button type="submit">Send Message ➚</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Left contact -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

        <!-- ======= Search Section ======= -->
        <section id="search" class="search">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Search</h2>
                </div>


                <form method="post" action="<?= base_url('home/search') ?>">
                    <div class="row justify-content-center mt-2">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
                            <!-- Search form -->

                            <a class="form-inline d-flex justify-content-center md-form form-sm active-cyan active-cyan-2 mt-2 get-started">

                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input name="keyword" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">

                            </a>

                        </div>
                    </div>

                    <div class="row content text-center mt-4">
                        <div class="col" data-aos="fade-up" data-aos-delay="150">

                            <input type="submit" name="" value="search" placeholder="" class="btn-learn-more">

                        </div>

                    </div>
                </form>

                <!-- ======= Modal Search Section ======= -->
                <!--    <div class="modal fade mt-4 pt-4" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center bg-info">
                                <h4 class="modal-title w-100 font-weight-bold">Search Result</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3 text-justify">
                                <p class="card-text">This is the search result.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- End Modal Search Section -->

            </div>
        </section>
        <!-- End Search Section -->

    </main>
    <!-- End #main -->