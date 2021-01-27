                <div class="row content text-justify mb-2">
                  <div class="col-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="row justify-content-center text-center mb-2">
                      <a href="<?php echo base_url('admin/dashboard') ?>" class="btn-admin">
                        <i class="fa fa-tachometer prefix grey-text"></i> Back to Dashboard
                      </a>
                    </div>
                    <div class="row justify-content-center text-center mb-2">
                      <a href=" <?php echo base_url('admin/admin') ?> " class="btn-admin">
                        <i class="fa fa-rss prefix grey-text"></i> Back to Table 

                        <?php echo $titleAll; ?>
                      </a>
                    </div>
                  </div>


                  <div class="col-8 mb-2 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                    

                    <?php echo form_open_multipart($action);?>
                    <?php echo validation_errors() ?>
                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

                    <div class="form-group">
                      <i class="fa fa-font prefix grey-text"></i>
                      <label for="inputTitle"> | Nama</label>
                      <?php echo form_input($name);?>
                    </div>

                    <div class="form-group">
                      <i class="fa fa-font prefix grey-text"></i>
                      <label for="inputTitle"> | Email</label>
                      <?php echo form_input($email);?>
                    </div>

                    <div class="form-group">
                      <i class="fa fa-font prefix grey-text"></i>
                      <label for="inputTitle"> | Password</label>
                      <?php echo form_input($password);?>
                    </div>

                      <div class="text-center">
                        <button type="reset" class="btn btn-danger btn-form rounded-pill">Reset</button>
                        <button type="submit" class="btn btn-info btn-form rounded-pill">Add</button>
                      </div>

                      <?php echo form_close() ?>


                    </div>


