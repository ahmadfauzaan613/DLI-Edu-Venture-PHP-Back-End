                <div class="row content text-justify mb-2">
                  <div class="col-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="row justify-content-center text-center mb-2">
                      <a href="<?php echo base_url('admin/dashboard') ?>" class="btn-admin">
                        <i class="fa fa-tachometer prefix grey-text"></i> Back to Dashboard
                      </a>
                    </div>
                    <div class="row justify-content-center text-center mb-2">
                      <a href=" <?php echo base_url('admin/news') ?> " class="btn-admin">
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
                      <label>Judul news</label>
                      <?php echo form_input($judul_news, $produk->judul_news);?>
                    </div>
                    <div class="form-group">
                      <i class="fa fa-file-text prefix grey-text"></i>
                      <label>isi</label>
                      <?php echo form_textarea($isi, $produk->isi);?>
                    </div>
                    <div class="form-group"><label>Gambar Sebelumnya</label><br>
                      <img src="<?php echo base_url('assets/images/news/'.$produk->foto.$produk->foto_type.'') ?>" width="200px"/>
                    </div>
                    <div class="form-group"><label>Gambar</label>
                      <input type="file" class="form-control" name="foto" id="foto" onchange="tampilkanPreview(this,'preview')"/>
                      <br><p><b>Preview Gambar</b><br>
                        <img id="preview" src="" alt="" width="350px"/>
                      </div>
                      <?php echo form_input($id_news,$produk->id_news);?>
                      <hr>
                      <button type="submit" name="submit" class="btn btn-success"><?php echo $button_submit ?></button>
                      <button type="reset" name="reset" class="btn btn-danger"><?php echo $button_reset ?></button>

                      <?php echo form_close() ?>

                      
                    </div>
