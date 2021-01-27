    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Admin Dashboard</h2>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Admin Section ======= -->
        <section id="admin" class="admin">
            <div class="container">

                <div class="row content justify-content-center pb-4">
                    <div class="col-8" data-aos="fade-up" data-aos-delay="150">

                        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                        <br>

                        <div class="row justify-content-center text-center my-2">
                            <h4>Admin Dashboard</h4>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/admin") ?>" class="btn-admin">
                                <i class="fa fa-users prefix grey-text"></i> Table Admin
                            </a>
                        </div>
                        <div class="row justify-content-center text-center my-2">
                            <a href="<?php echo base_url('admin/member');?>" class="btn-admin">
                                <i class="fa fa-users prefix grey-text"></i> Table Members
                            </a>
                        </div>
                        <div class="row justify-content-center text-center my-2">
                            <a href="<?php echo base_url("admin/program") ?>" class="btn-admin">
                                <i class="fa fa-tasks prefix grey-text"></i> Table Programs
                            </a>
                        </div>
                        <div class="row justify-content-center text-center my-2">
                            <a href="<?php echo base_url("admin/startup") ?>" class="btn-admin">
                                <i class="fa fa-building prefix grey-text"></i> Table Startups
                            </a>
                        </div>
                        <div class="row justify-content-center text-center my-2">
                            <a href="<?php echo base_url("admin/news") ?>" class="btn-admin">
                                <i class="fa fa-file-text-o prefix grey-text"></i> Table News
                            </a>
                        </div>
                        <div class="row justify-content-center text-center my-2">
                            <a href="<?php echo base_url("admin/event") ?>" class="btn-admin">
                                <i class="fa fa-calendar prefix grey-text"></i> Table Events
                            </a>
                        </div>
                        <div class="row justify-content-center text-center my-2">
                            <a href="<?php echo base_url('admin/blog');?>" class="btn-admin">
                                <i class="fa fa-rss prefix grey-text"></i> Table Blogs
                            </a>
                        </div>
                        <div class="row justify-content-center text-center my-2">
                            <a href="<?php echo base_url("admin/gallery") ?>" class="btn-admin">
                                <i class="fa fa-picture-o prefix grey-text"></i> Table Gallery
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Admin Section -->

    </main>