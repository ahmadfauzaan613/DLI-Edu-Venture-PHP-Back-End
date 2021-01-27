   <!-- ======= Main Section ======= -->
   <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Our Startups</h2>
                <ol>
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li>Startups</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <!-- ======= Startups Section ======= -->
    <section id="startups" class="startups">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Our Startups</h2>
            </div>

            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4" data-aos="fade-up" data-aos-delay="300">
                <?php foreach ($startup as $startup1): ?>
                
                <div class="col mt-4">

                    <div class="card h-100 border-info">
                        <a href="<?php echo base_url('startup/selanjutnya/'.$startup1->id_startup);?>">

                            <img  class="card-img-top" src="<?php echo base_url('assets/images/startup/'.$startup1->foto.'_thumb'.$startup1->foto_type)?>" />

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

        </div>
    </section>
    <!-- End Startups Section -->

</main>
    <!-- End #main -->