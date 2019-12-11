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
echo form_open_multipart(base_url('admin/services/edit/'.$services->id_services),$attribut);
?>


<div class="row">
<div class="col-md-8">
<div class="row">

<div class="col-md-12">
  <div class="form-group form-group-lg">
    <label>Judul Services</label>
    <input type="text" name="judul" class="form-control" placeholder="Judul Services"
    value="<?php echo $services->judul ?>">
  </div>
</div>

<div class="col-md-7">
  <div class="form-group">
    <label>Deskripsi </label>
    <textarea name="deskripsi" class="form-control" value="<?php echo $services->deskripsi; ?>"><?php echo $services->deskripsi; ?></textarea>
  </div>
</div>



</div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label>Ganti Gambar </label>
    <input type="file" name="gambar" class="form-control" style="border:0;">
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$services->gambar) ?>" width="60%"
      class="img img-thumbnail">
  </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
  <!-- <div class="form-group">
    <label>Isi Services</label>
    <textarea name="isi_services" class="form-control tinymce" placeholder="Isi Services">
<?php echo $services->isi_services ?>
    </textarea>
  </div> -->

  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update Services</button>
  </div>
</div>


</div>


<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
