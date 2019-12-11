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
echo form_open_multipart(base_url('admin/galeri/tambah'),$attribut);
?>

<div class="row">
<div class="col-md-8">
<div class="row">

<div class="col-md-12">
  <div class="form-group form-group-lg">
    <label>Judul Galeri</label>
    <input type="text" name="judul_galeri" class="form-control" placeholder="Judul Galeri"
    value="<?php echo set_value('judul_galeri') ?>">
  </div>
</div>

<div class="col-md-5">
  <div class="form-group form-group-lg">
    <label>Posisi Galeri</label>
    <select name="posisi_galeri" class="form-control form-control-chosen">
      <option value="Galeri">Galeri</option>
      <option value="Homepage">Homepage Slider</option>
    </select>
  </div>
</div>

<div class="col-md-7">
  <div class="form-group">
    <label>Link / URL Galeri</label>
    <input type="url" name="website" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo
    base_url() ?>" >
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
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan Galeri</button>
  </div>
</div>
</div>

<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
