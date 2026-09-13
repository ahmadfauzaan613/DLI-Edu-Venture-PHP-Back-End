
<!-- ======= Main Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>News</h2>
                <ol>
                    <li><a href=" <?php echo base_url();?> ">Home</a></li>
                    <li>News</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <!-- ======= News Section ======= -->
    <section id="news" class="news news-height">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>News</h2>
            </div>

            <div class="row content text-justify" data-aos="fade-up" data-aos-delay="300">

                <?php foreach ($news as $news1): ?>

                    <div class="col-6 col-md-4 mt-2">
                        <div class="icon-box rounded">
                            
                            <img  class="card-news mr-4" src="<?php echo base_url('assets/images/news/'.$news1->foto.'_thumb'.$news1->foto_type)?>" />

                            <h3><a href="<?php echo base_url('news/selanjutnya/'.$news1->id_news);?>"> <?php echo $news1->judul_news; ?> </a></h3>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>

        </div>
    </section>
    <!-- End News Section -->

</main>
    <!-- End #main -->