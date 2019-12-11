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
echo form_open_multipart(base_url('admin/section/edit/'.$section->id_section),$attribut);
?>


<div class="row">
<div class="col-md-8">
<div class="row">

<div class="col-md-12">
  <div class="form-group form-group-lg">
    <label>Judul Section</label>
    <input type="text" name="judul" class="form-control" placeholder="Judul Section"
    value="<?php echo $section->judul ?>">
  </div>
</div>

<div class="col-md-7">
  <div class="form-group">
    <label>Url / Link </label>
    <input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo
    $section->url ?>" required>
  </div>
</div>

<div class="col-md-7">
  <div class="form-group">
    <label>Deskripsi </label>
    <textarea name="deskripsi" class="form-control" value="<?php echo $section->deskripsi; ?>"><?php echo $section->deskripsi; ?></textarea>
  </div>
</div>



</div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label>Ganti Gambar </label>
    <input type="file" name="gambar" class="form-control" style="border:0;">
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$section->gambar) ?>" width="60%"
      class="img img-thumbnail">
  </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
  <!-- <div class="form-group">
    <label>Isi Section</label>
    <textarea name="isi_section" class="form-control tinymce" placeholder="Isi Section">
<?php echo $section->isi_section ?>
    </textarea>
  </div> -->

  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update Section</button>
  </div>
</div>


</div>


<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
