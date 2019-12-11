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
echo form_open_multipart(base_url('admin/layanan/tambah'),$attribut);
?>

<div class="row">
<div class="col-md-8">
<div class="row">

  <div class="col-md-12">
    <div class="form-group form-group-lg">
      <label>Judul Layanan</label>
      <input type="text" name="judul_layanan" class="form-control" placeholder="Judul Layanan"
      value="<?php echo set_value('judul_layanan') ?>" required>
    </div>
  </div>

  

<div class="col-md-5">
  <div class="form-group form-group-lg">
    <label>Status Layanan</label>
    <select name="status_layanan" class="form-control form-control-chosen">
      <option value="Publish">Publish</option>
      <option value="Draft">Draft</option>
    </select>
  </div>
</div>

</div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label>Upload Gambar</label>
    <input type="file" name="gambar" class="form-control" style="border:none;" required>
  </div>
</div>



<div class="col-md-12">
  <div class="form-group">
    <label>Isi Layanan</label>
    <textarea name="isi_layanan" class="form-control tinymce" placeholder="Isi Layanan">
<?php echo set_value('isi_layanan') ?>
    </textarea>
  </div>

  <div class="form-group">
    <label>Keyword Layanan (Untuk SEO google)</label>
    <input name="keywords" class="form-control" placeholder="Keywords Layanan" value="<?php echo set_value('keywords') ?>">
  </div>

  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan Layanan</button>
  </div>

</div>
</div>




<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
