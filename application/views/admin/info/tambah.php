<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//Error Upload Gabar



//Atribut
$attribut = 'class="alert alert-default"';
// Form Open
echo form_open(base_url('admin/info/tambah'),$attribut);
?>
<div class="row">

<div class="tile col-md-8">
  <div class="form-group form-group-lg">
    <label>Judul Info</label>
    <input type="text" name="judul_info" class="form-control" placeholder="Judul Info"
    value="<?php echo set_value('judul_info') ?>">
  </div>

  <div class="form-group">
    <label>Isi Info</label>
    <textarea name="isi_info" class="form-control tinymce" placeholder="Isi Berita">
  <?php echo set_value('isi_info') ?>
    </textarea>
  </div>

  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan Info</button>
  </div>

</div>
</div>


<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
