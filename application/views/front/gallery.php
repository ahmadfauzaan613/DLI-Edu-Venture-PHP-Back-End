
<!-- ======= Main Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Our Gallery</h2>
                <ol>
                    <li><a href=" <?php echo base_url();?> ">Home</a></li>
                    <li>Gallery</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="container">

            <div class="row gallery-container" data-aos="fade-up" data-aos-delay="400">

                <?php foreach ($gallery as $gallery1): ?>

                <div class="col-lg-3 col-md-4 col-6 gallery-item filter-talks">
                    <div class="gallery-wrap">
                        
                        <img  class="img-fluid" src="<?php echo base_url('assets/images/gallery/'.$gallery1->foto.'_thumb'.$gallery1->foto_type)?>" />

                        <div class="gallery-info">
                            <div class="gallery-links">
                                <a href="<?php echo base_url('assets/images/gallery/'.$gallery1->foto.'_thumb'.$gallery1->foto_type)?>" data-gall="galleryGallery" class="venobox" title="Webinar 1"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach ?>

            </div>

        </div>
    </section>
    <!-- End Gallery Section -->

</main>
    <!-- End #main -->