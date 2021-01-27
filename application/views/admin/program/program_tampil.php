    <!-- ======= Main Section ======= -->
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Table <?php echo $title ?> </h2>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <!-- ======= Admin Section ======= -->
        <section id="admin" class="admin">
            <div class="container">

                <div class="row content text-justify justify-content-center mb-2">
                    <div class="col-md-8 mt-2" data-aos="fade-up" data-aos-delay="150">
                        <!-- ======= Alert Data Delete Success Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="150">
                                <div id="alert-data-delete-success" class="alert alert-success alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading text-center"><strong>Success!</strong></h4>
                                    <p>Data has been <strong>deleted.</strong></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Data Delete Success Section -->

                        <!-- ======= Alert Data Delete Error Section ======= -->
                        <div class="row content justify-content-center">
                            <div class="col" data-aos="fade-up" data-aos-delay="150">
                                <div id="alert-data-delete-error" class="alert alert-danger alert-dismissible fade collapse text-center" role="alert">
                                    <h4 class="alert-heading text-center"><strong>Error!</strong></h4>
                                    <p>Data hasn't been <strong>deleted.</strong></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End ALert Data Delete Error Section -->
                    </div>
                </div>

                <div class="row content text-justify mb-2">
                    <div class="col-4" data-aos="fade-up" data-aos-delay="150">
                        <div class="row justify-content-center text-center mb-2">
                            <a href=" <?php echo base_url("admin/dashboard") ?> " class="btn-admin">
                                <i class="fa fa-tachometer prefix grey-text"></i> Dashboard
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/admin") ?>" class="btn-admin">
                                <i class="fa fa-users prefix grey-text"></i> Table Admin
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/member") ?>" class="btn-admin">
                                <i class="fa fa-users prefix grey-text"></i> Table Members
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/program") ?>" class="btn-admin">
                                <i class="fa fa-tasks prefix grey-text"></i> Table Programs
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/startup") ?>" class="btn-admin">
                                <i class="fa fa-building prefix grey-text"></i> Table Startups
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/news") ?>" class="btn-admin">
                                <i class="fa fa-file-text-o prefix grey-text"></i> Table News
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/event") ?>" class="btn-admin">
                                <i class="fa fa-calendar prefix grey-text"></i> Table Events
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/blog") ?>" class="btn-admin">
                                <i class="fa fa-rss prefix grey-text"></i> Table Blogs
                            </a>
                        </div>
                        <div class="row justify-content-center text-center mb-2">
                            <a href="<?php echo base_url("admin/gallery") ?>" class="btn-admin">
                                <i class="fa fa-picture-o prefix grey-text"></i> Table Gallery
                            </a>
                        </div>
                    </div>

                    <div class="col-8 mb-2 mb-md-0" data-aos="fade-up" data-aos-delay="300">

                        <?php if($this->session->flashdata('message')): ?>
                            <?php echo $this->session->flashdata('message')?>
                        <?php endif; ?>

                        <h4 class="text-center" data-aos="fade-up" data-aos-delay="150">
                            Table programs
                        </h4>
                        <table class="table table-striped table-bordered table-hover table-responsive text-nowrap">
                            <thead class="bg-info text-center">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Body</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-justify">

                                <?php $no=1; 
                                foreach ($produk_data as $program):
                                  ?>

                                  <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td><?php echo $program->judul_program ?></td>
                                    <td>
                                        <?php 
                                        $dikit=$program->isi;
                                        $potong=substr($dikit,0, 30);
                                        echo $potong;
                                        ?> ... ... ...
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url('assets/images/program/'.$program->foto.'_thumb'.$program->foto_type)?>" width="150" height="110" />
                                    </td>
                                    <td>
                                        <?php echo $program->created ?>        
                                    </td>
                                    <td>
                                        <?php echo $program->modified ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/program/update/'.$program->id_program)?>" class="btn btn-content-update mb-2">
                                            <i class="fa fa-pencil-square-o prefix grey-text"></i> Update
                                        </a>
                                        <a href=" <?php echo base_url('admin/program/delete/'.$program->id_program) ?> " class="btn btn-content-delete mb-2">
                                            <i class="fa fa-trash-o prefix grey-text"></i> Delete
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach;?>

                        </tbody>
                    </table>
                    <div class="row content text-center">
                        <div class="col" data-aos="fade-up" data-aos-delay="150">
                            <a href="<?php echo site_url('admin/program/create') ?>" class="btn btn-content-add mb-2">
                                <i class="fa fa-user-plus prefix grey-text"></i> Add programs
                            </a>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <!-- End Admin Section -->

</main>
<!-- End #main -->


<!-- ======= Modal Sign Out Section ======= -->
<div class="modal fade mt-4 pt-4" id="modalSignOut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border border-info">
            <div class="modal-header text-center bg-info text-white">
                <h4 class="modal-title w-100 font-weight-bold">Sign Out</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-2">
                    <p>Are you sure you want to sign out?</p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center mb-2">
                <button class="btn btn-danger rounded-pill" data-dismiss="modal">Cancel</button>
                <a href="<?php echo base_url("admin/login/logout");?>" class="btn btn-info rounded-pill"> Sign Out</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Sign Out Section -->


<!-- ======= Modal Delete programs Section ======= -->
<div class="modal fade mt-4 pt-4" id="modalDeleteprogramsForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border border-danger">
            <div class="modal-header text-center bg-danger text-white">
                <h4 class="modal-title w-100 font-weight-bold">Delete programs</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-2">
                    <p>Are you sure you want to delete this item?</p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center mb-2">
                <button class="btn btn-warning rounded-pill" data-dismiss="modal">Cancel
                </button>

                <a href="#" class="btn btn-danger rounded-pill">Delete</a>

            </div>
        </div>
    </div>
</div>
    <!-- End Modal Delete programs Section -->