
<!-- ======= Main Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Blogs</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Blogs</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <!-- ======= Blogs Section ======= -->
    <section id="blogs" class="blogs">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Blogs</h2>
            </div>

            <div class="row">

                <?php foreach ($blog as $blog1): ?>

                <div class="col-6 col-lg-4 d-flex align-items-stretch mb-4 mb-lg-4">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <a href="<?php echo base_url('blog/selanjutnya/'.$blog1->id_blog);?>">

                            <img  class="card-img-top" src="<?php echo base_url('assets/images/blog/'.$blog1->foto.'_thumb'.$blog1->foto_type)?>" />

                            <h4 class="title text-center">
                                <?php echo $blog1->judul_blog ?>
                            </h4>
                            <p class="description text-justify">

                                <?php 
                                    $dikit=$blog1->isi;
                                    $potong=substr($dikit,0, 130);
                                    echo $potong;
                                ?> ... ... ...

                            </p>
                        </a>
                    </div>
                </div>

                <?php endforeach ?>

            </div>

        </div>
    </section>
    <!-- End Blogs Section -->

</main>
    <!-- End #main -->