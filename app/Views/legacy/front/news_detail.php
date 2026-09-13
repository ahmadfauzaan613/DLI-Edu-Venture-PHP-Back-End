    <!-- ======= Main Section ======= -->
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>News</h2>
                    <ol>
                        <li><a href=" <?php echo base_url();?> ">Home</a></li>
                        <li><a href=" <?php echo base_url("news");?> ">News</a></li>
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

                <?php foreach ($news as $news1): ?>

                <div class="row content text-justify pb-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                        <img  class="card-news mr-4" src="<?php echo base_url('assets/images/news/'.$news1->foto.'_thumb'.$news1->foto_type)?>" />
                    </div>
                    <div class="col-md-8 pt-2 pt-md-0" data-aos="fade-up" data-aos-delay="150">
                        <h4 data-aos="fade-up" data-aos-delay="150">
                            <?php echo $news1->judul_news; ?> 
                        </h4>
                        <p data-aos="fade-up" data-aos-delay="150">
                            <?php echo $news1->isi; ?> 
                        </p>
                    </div>
                </div>

            <?php endforeach ?> 

            </div>
        </section>
        <!-- End News Section -->

    </main>
    <!-- End #main -->