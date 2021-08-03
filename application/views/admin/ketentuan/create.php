<div class="col-md-7 mx-auto">
  <div class="card">
    <div class="card-header">
      <?php echo $title; ?>
    </div>
    <div class="card-body">
      <?php
      //Form Open
      echo form_open('admin/ketentuan/create',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
      ?>

      <div class="form-group">
        <label>Nama Ketentuan</label>
        <input type="text" class="form-control" name="ketentuan_name" placeholder="Nama Ketentuan" required>
        <div class="invalid-feedback">Silahkan masukan Nama Kententuan</div>
      </div>

      <div class="form-group">
        <label>Isi Ketentuan</label>
        <textarea name="ketentuan_desc" class="form-control" id="summernote" placeholder="Isi Ketentuan" required><?php echo set_value('ketentuan_desc') ?></textarea>
        <div class="invalid-feedback">Silahkan masukan Isi Ketentuan</div>
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
      </div>


      <?php
      //Form Close
      echo form_close();
      ?>
    </div>
  </div>
</div>