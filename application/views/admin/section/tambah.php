<div class="tile">

<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//Error Upload Gabar
if(isset($error_upload)){
  echo '<div class="alert alert-warning">'.$errors_upload.'</div>';
}


//Atribut
$attribut = '';
// Form Open
echo form_open_multipart(base_url('admin/section/tambah'),$attribut);
?>

<div class="row">
<div class="col-md-8">
<div class="row">

<div class="col-md-12">
  <div class="form-group form-group-lg">
    <label>Judul Section</label>
    <input type="text" name="judul" class="form-control" placeholder="Judul Section"
    value="<?php echo set_value('judul_section') ?>">
  </div>
</div>

<div class="col-md-12">
  <div class="form-group">
    <label>Link / URL Section</label>
    <input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo
    base_url() ?>" >
  </div>
</div>

<div class="col-md-12">
  <div class="form-group form-group-lg">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"
    value="<?php echo set_value('judul_section') ?>"></textarea>
  </div>
</div>

</div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label>Upload Gambar</label>
    <input type="file" name="gambar" class="form-control" style="border:0;" required>
  </div>
</div>

</div>

<div class="row">
<div class="col-md-12">

  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan Section</button>
  </div>
</div>
</div>

<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
