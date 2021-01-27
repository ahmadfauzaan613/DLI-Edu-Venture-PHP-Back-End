
<!-- ======= Main Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Events</h2>
                <ol>
                    <li><a href=" <?php echo base_url();?> ">Home</a></li>
                    <li><a href=" <?php echo base_url("event"); ?> ">Events</a></li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <!-- ======= Modal Search Section ======= -->
    <div class="modal fade mt-4 pt-4" id="modalRegisterEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center bg-info">
                    <h4 class="modal-title w-100 font-weight-bold">Register</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3 text-justify">
                    <p class="card-text">Do you want to continue to register for DLI Talks 8 Event?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center mb-2">
                    <button class="btn btn-danger rounded-pill" data-dismiss="modal">No</button>
                    
                    <a class="btn btn-info rounded-pill" href=" <?php echo base_url("event_join") ?> "> Yes </a>

                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Search Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
        <div class="container">


            <?php foreach ($event as $event1): ?>

            <div class="section-title" data-aos="fade-up">
                <h2>
                    <?php echo $event1->judul_event;?>
                </h2>
            </div>

            <div class="row content text-justify pb-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                    <img  class="card-img-top" src="<?php echo base_url('assets/images/event/'.$event1->foto.'_thumb'.$event1->foto_type)?>" />
                </div>
                <div class="col-md-8 pt-2 pt-md-0" data-aos="fade-up" data-aos-delay="150">
                    <h4 data-aos="fade-up" data-aos-delay="150">
                        What to discuss?
                    </h4>
                    <ul data-aos="fade-up" data-aos-delay="150">
                        <li><i class="ri-check-double-line"></i>
                            <?php echo $event1->isi;?>
                        </li>
                    </ul>
                    <h4 data-aos="fade-up" data-aos-delay="150">Day ?</h4>
                    <p data-aos="fade-up" data-aos-delay="150">
                        
                        <?php 
                            $a = $event1->jadwal_tgl;
                            $b = date("d-m-Y", strtotime($a));
                            echo $b;
                        ?>

                    </p>
                    <p data-aos="fade-up" data-aos-delay="150">
                        <?php echo $event1->jadwal_time;?>
                    </p>

                    <div class="row content text-center mt-4">
                        <div class="col" data-aos="fade-up" data-aos-delay="150">
                            <a href=" <?php echo base_url("event_join/update/".$event1->id_event) ?> " class="btn-learn-more" >Register Here!</a>
                        </div>
                    </div>

                </div>
            </div>

            <?php endforeach ?>

        </div>
    </section>
    <!-- End More Events Section -->

</main>
<!-- End #main -->
