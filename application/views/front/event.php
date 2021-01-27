
<!-- ======= Main Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Events</h2>
                <ol>
                    <li><a href=" <?php echo base_url();?> ">Home</a></li>
                    <li>Events</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Events</h2>
            </div>

            <div class="row content text-center">

                <?php foreach ($event as $event1): ?>

                <div class="col-sm-6 col-md-4 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card mb-3">
                        <a href="<?php echo base_url('event/selanjutnya/'.$event1->id_event);?>">

                            <img  class="card-img-top" src="<?php echo base_url('assets/images/event/'.$event1->foto.'_thumb'.$event1->foto_type)?>" />

                            <div class="card-img-overlay">
                                <div class="card-footer card-content text-dark">
                                    <h5>
                                        <?php echo $event1->judul_event;?>
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

        </div>
    </section>
    <!-- End More Events Section -->

</main>
    <!-- End #main -->