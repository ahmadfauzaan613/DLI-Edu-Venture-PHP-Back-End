    <!-- ======= Main Section ======= -->
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Our Programs</h2>
                    <ol>
                        <li><a href="<?php echo base_url() ?>">Home</a></li>
                        <li><a href=" <?php echo base_url("program") ?> ">Programs</a></li>
                        <li>DLI Learning Innovation Lab (LIL)</li>
                    </ol>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Programs Section ======= -->
        <section id="programs" class="programs">
            <div class="container">

                <?php foreach ($program as $program1): ?>

                <div class="section-title" data-aos="fade-up">
                    <h2> <?php echo $program1->judul_program ?> </h2>
                </div>

                <div class="row content text-justify pb-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                        
                        <img  class="card-img-top" src="<?php echo base_url('assets/images/program/'.$program1->foto.'_thumb'.$program1->foto_type)?>" />

                    </div>
                    <div class="col-md-8 pt-2" data-aos="fade-up" data-aos-delay="150">
                        <p>
                            <?php echo $program1->isi ?>
                        </p>
                    </div>
                </div>

                <?php endforeach ?>

            </div>
        </section>
        <!-- End Programs Section -->

    </main>
    <!-- End #main -->