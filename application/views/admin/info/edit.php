<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//Error Upload Gabar

// Form Open
echo form_open(base_url('admin/info/edit/'.$info->id_info));
?>
<div class="row">

<div class="tile col-md-8">
  <div class="form-group form-group-lg">
    <label>Nama Bank</label>
    <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank"
    value="<?php echo $info->nama_bank; ?>">
  </div>
	
	<div class="form-group form-group-lg">
    <label>Nomor Rekening</label>
    <input type="text" name="nomor_rek" class="form-control" placeholder="Nama Bank"
    value="<?php echo $info->nomor_rek; ?>">
  </div>
	
	<div class="form-group form-group-lg">
    <label>Cabang</label>
    <input type="text" name="cabang" class="form-control" placeholder="Nama Bank"
    value="<?php echo $info->cabang; ?>">
  </div>
	
	<div class="form-group form-group-lg">
    <label>Atas Nama</label>
    <input type="text" name="atas_nama" class="form-control" placeholder="Nama Bank"
    value="<?php echo $info->atas_nama; ?>">
  </div>

	<div class="form-group form-group-lg">
    <label>Nomor Whatsapp</label>
    <input type="text" name="telpon" class="form-control" placeholder="Nama Bank"
    value="<?php echo $info->telpon; ?>">
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


