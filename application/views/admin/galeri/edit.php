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
echo form_open_multipart(base_url('admin/galeri/edit/'.$galeri->id_galeri),$attribut);
?>


<div class="row">
<div class="col-md-8">
<div class="row">

<div class="col-md-12">
  <div class="form-group form-group-lg">
    <label>Judul Galeri</label>
    <input type="text" name="judul_galeri" class="form-control" placeholder="Judul Galeri"
    value="<?php echo $galeri->judul_galeri ?>" required>
  </div>
</div>

<div class="col-md-5">
  <div class="form-group form-group-lg">
    <label>Posisi Galeri</label>
    <select name="posisi_galeri" class="form-control">
      <option value="Galeri">Galeri</option>
      <option value="Homepage" <?php if($galeri->posisi_galeri=="Homepage"){echo "selected";}?> >Homepage Slider</option>
    </select>
  </div>
</div>

<div class="col-md-7">
  <div class="form-group">
    <label>Url / Link </label>
    <input type="url" name="website" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo
    $galeri->website ?>" required>
  </div>
</div>



</div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label>Ganti Gambar </label>
    <input type="file" name="gambar" class="form-control" style="border:0;">
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" width="60%"
      class="img img-thumbnail">
  </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
  <!-- <div class="form-group">
    <label>Isi Galeri</label>
    <textarea name="isi_galeri" class="form-control tinymce" placeholder="Isi Galeri">
<?php echo $galeri->isi_galeri ?>
    </textarea>
  </div> -->

  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update Galeri</button>
  </div>
</div>


</div>


<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
