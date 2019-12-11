<div class="tile">
  <div class="tile-title-w-btn">
      <h3 class="title">Seting Logo</h3>
   </div>

<?php

//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
//Error upload
if(isset($error))
{
  echo '<div class="alert alert-danger">';
  echo $error;
  echo '</div>';
}

//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//Error Upload Gabar
if(isset($error_upload)){
  echo '<div class="alert alert-warning">'.$errors_upload.'</div>';
}


//Atribut
$attribut = '';
// Form Open
echo form_open_multipart(base_url('admin/konfigurasi/logo'),$attribut);
?>
<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">

<div class="row">
<div class="col-md-4">

  <div class="form-group">
    <label>Upload Logo Website</label><br>
    <input type="file" name="logo" required="required">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary btn-lg" value="Upload Logo">
  </div>

</div>

<div class="col-md-6">
<?php if($konfigurasi->logo !="") { ?>
  <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->logo) ?>" alt="<?php echo
  $konfigurasi->namaweb ?>" class="img img-responsive img-thumbnail">
<?php }else{ ?>
  <p class="alert alert-warning text-center">Anda Belum Memiliki Logo</p>
<?php } ?>


</div>
</div>

<?php
//Form Close
echo form_close();
?>

</div>
