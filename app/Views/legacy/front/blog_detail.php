
<!-- ======= Main Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Blogs</h2>
                <ol>
                    <li><a href=" <?php echo base_url() ?> ">Home</a></li>
                    <li><a href=" <?php echo base_url("blog") ?> ">Blogs</a></li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <!-- ======= Blogs Section ======= -->
    <section id="blogs" class="blogs">
        <div class="container">

            <?php foreach ($blog as $blog1): ?>
                

            <div class="section-title" data-aos="fade-up">
                <h2>
                    <?php echo $blog1->judul_blog ?>
                </h2>
            </div>

            <div class="row content text-justify pb-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                    <img  class="card-img-top" src="<?php echo base_url('assets/images/blog/'.$blog1->foto.'_thumb'.$blog1->foto_type)?>" />
                </div>
                <div class="col-md-8 pt-2 pt-md-0" data-aos="fade-up" data-aos-delay="150">
                    <p data-aos="fade-up" data-aos-delay="150">
                        <?php echo $blog1->isi ?>
                    </p>
                </div>
            </div>

            <?php endforeach ?>

        </div>
    </section>
    <!-- End Blogs Section -->

</main>
    <!-- End #main -->