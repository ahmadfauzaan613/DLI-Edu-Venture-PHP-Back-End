    <!-- ======= Main Section ======= -->
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Our Startups</h2>
                    <ol>
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li><a href="<?php echo base_url("startup");?>">Startups</a></li>
                    </ol>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Startups Section ======= -->
        <section id="startups" class="startups">
            <div class="container">

                <?php foreach ($startup as $startup1): ?>

                <div class="section-title" data-aos="fade-up">
                    <h2>
                        <?php echo $startup1->judul_startup ?>
                    </h2>
                </div>

                <div class="row content text-justify pb-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                        <img  class="card-img-top" src="<?php echo base_url('assets/images/startup/'.$startup1->foto.'_thumb'.$startup1->foto_type)?>" />
                    </div>
                    <div class="col-md-8 pt-2 pt-md-0" data-aos="fade-up" data-aos-delay="150">
                        <h4 data-aos="fade-up" data-aos-delay="150">
                            Deskripsi
                        </h4>
                        <p data-aos="fade-up" data-aos-delay="150">
                            
                            <?php echo $startup1->isi ?>

                        </p>
                        <h4 data-aos="fade-up" data-aos-delay="150">
                            Spesifikasi
                        </h4>
                        <ul data-aos="fade-up" data-aos-delay="150">
                            <li><i class="ri-check-double-line"></i>
                                <?php echo $startup1->spesifikasi ?>
                            </li>
                        </ul>
                        <h4 data-aos="fade-up" data-aos-delay="150">
                            Keunggulan
                        </h4>
                        <ul data-aos="fade-up" data-aos-delay="150">
                            <li><i class="ri-check-double-line"></i>
                                <?php echo $startup1->keunggulan ?>
                            </li>
                        </ul>
                        <h4 data-aos="fade-up" data-aos-delay="150">
                            Pencapaian/Prestasi
                        </h4>
                        <ul data-aos="fade-up" data-aos-delay="150">
                            <li><i class="ri-check-double-line"></i>
                                <?php echo $startup1->pencapaian ?>
                            </li>
                        </ul>
                        <h4 data-aos="fade-up" data-aos-delay="150">
                            Bidang Startup
                        </h4>
                        <p data-aos="fade-up" data-aos-delay="150">
                            <?php echo $startup1->kategori ?>
                        </p>
                        <h4 data-aos="fade-up" data-aos-delay="150">
                            Disruptive Technology yang digunakan
                        </h4>
                        <p data-aos="fade-up" data-aos-delay="150">
                            <?php echo $startup1->teknologi ?>
                        </p>
                        
                        <a href="<?php echo $startup1->ig ?>" target="_blank" class="btn-learn-more" data-aos="fade-up" data-aos-delay="150"><i class="fa fa-instagram pr-1"></i> Instagram</a>

                        <a href="<?php echo $startup1->web ?>" target="_blank" class="btn-learn-more" data-aos="fade-up" data-aos-delay="150"><i class="fa fa-chrome pr-1"></i> Website</a>

                        <a href="<?php echo $startup1->fb ?>" target="_blank" class="btn-learn-more" data-aos="fade-up" data-aos-delay="150"><i class="fa fa-facebook pr-1"></i> Facebook</a>
                    </div>
                </div>

                <?php endforeach ?>

            </div>
        </section>
        <!-- End Startups Section -->

    </main>
    <!-- End #main -->