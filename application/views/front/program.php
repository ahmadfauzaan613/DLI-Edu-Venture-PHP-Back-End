    <!-- ======= Main Section ======= -->
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Our Programs</h2>
                    <ol>
                        <li><a href=" <?php echo base_url();?> ">Home</a></li>
                        <li>Programs</li>
                    </ol>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Programs Section ======= -->
        <section id="programs" class="programs">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Our Programs</h2>
                </div>

                <div class="row content text-center justify-content-center">

                    <?php foreach ($program as $program1): ?>

                    <div class="col-sm-6 col-md-4 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card mb-3">
                            <img class="card-img-top" src="assets/img/programs/Programs_1_LIL.png" alt="DLI Learning Innovation Lab (LIL)">
                            <div class="card-img-overlay">
                                <div class="card-header card-title text-dark">
                                    <h5> <?php echo $program1->judul_program;?> </h5>

                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="<?php echo base_url('program/selanjutnya/'.$program1->id_program);?>" class="btn btn-learn-more-card" data-aos="fade-up" data-aos-delay="150">Learn More ➔</a>
                            </div>
                        </div>
                    </div>

                    <?php endforeach ?>

                </div>

            </div>
        </section>
        <!-- End Programs Section -->

    </main>
    <!-- End #main -->