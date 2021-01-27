
<!-- ======= Main Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Events</h2>
                <ol>
                    <li><a href=" <?php echo base_url();?> ">Home</a></li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
        <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>
                        Join Event
                    </h2>
                </div>

                <div class="row content text-justify pb-4">


                    <table class="table table-striped table-bordered table-hover table-responsive text-nowrap">
                        <thead class="bg-info text-center">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Tanggal Jadwal</th>
                                <th scope="col">Waktu Jadwal</th>
                                <th scope="col">Button</th>

                            </tr>
                        </thead>
                        <tbody class="text-justify">

                            <?php echo form_open_multipart($action);?>

                              <tr>

                                <td>
                                    <?php echo form_input($judul_event,$produk->judul_event);?>
                                </td>

                                <td>
                                    <?php echo form_input($jadwal_tgl,$produk->jadwal_tgl);?>

                                    <!-- <?php 
                                    $a = $produk->jadwal_tgl;
                                    $b = date("d-m-Y", strtotime($a));
                                    echo $b;
                                    ?> -->
                                </td>

                                <td>
                                    <?php echo form_input($jadwal_time,$produk->jadwal_time);?>
                                </td>

                                <!-- <td><?php echo $produk->jadwal_time ?> WIB </td> -->

                                <td>
                                    <?php echo form_input($id_event,$produk->id_event);?>
                                    <button type="submit" name="submit" class="btn btn-success"><?php echo $button_submit ?></button>
                                </td>
                            </tr>

                        <?php echo form_close() ?>

                    </tbody>
                </table>

            </div>

    </div>
</section>
<!-- End More Events Section -->

</main>
<!-- End #main -->
