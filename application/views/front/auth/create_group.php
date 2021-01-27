<?php $this->load->view('template/back/header') ?>

<?php $this->load->view('template/back/navbar') ?>

<?php $this->load->view('template/back/leftbar') ?>

<section class="content">
<!-- .Box Body -->
<div class="box">
<div class="box-header">

<div class="content-wrapper">
  <section class='content'>
    <div class='row'>    
      <div id="infoMessage"></div>
      <?php echo form_open("admin/auth/create_group_action");?>
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title"><b>Tambah Group</b></h4>
            </div><!-- /.box-header -->
            <div class="box-body"><?php echo form_error('name') ?>
              <div class="form-group"><label>Nama</label>
              	<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
              <button type="reset" name="reset" class="btn btn-danger">Reset</button>
            </div>
          </div><!-- /.box -->
          <!-- left column -->
        </div>
      <?php echo form_close(); ?>
    </div>
  </section>
</div>

<?php $this->load->view('back/footer'); ?>      