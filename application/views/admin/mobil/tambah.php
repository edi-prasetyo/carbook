<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//Error Upload Gabar
if(isset($error_upload)){
  echo '<div class="alert alert-warning">'.$error_upload.'</div>';
}


//Atribut
$attribut = 'class="alert alert-default"';
// Form Open
echo form_open_multipart(base_url('admin/mobil/tambah'),$attribut);
?>
<div class="row tile">

<div class="col-md-8">
  <div class="row">
      <div class="col-3">
        <label>Nama Mobil</label>
      </div>
      <div class="col-9">
        <div class="form-group form-group-lg">
          <input type="text" name="nama_mobil" class="form-control" placeholder="Nama Mobil" value="<?php echo set_value('nama_mobil') ?>">
        </div>
      </div>

      <div class="col-3">
        <label>Merek Mobil</label>
      </div>
      <div class="col-9">
        <div class="form-group">
          <select name="id_merek" class="form-control form-control-chosen">
            <option value="">Pilih Merek</option>
            <?php foreach($merek as $merek) { ?>
            <option value="<?php echo $merek->id_merek ?>">
              <?php echo $merek->nama_merek ?>
            </option>
          <?php } ?>
          </select>
        </div>
      </div>

      <div class="col-3">
        <label>Jenis Mobil</label>
      </div>
      <div class="col-9">
        <div class="form-group">
          <select name="id_jenismobil" class="form-control form-control-chosen">
            <option value="">Pilih Jenis Mobil</option>
            <?php foreach($jenismobil as $jenismobil) { ?>
            <option value="<?php echo $jenismobil->id_jenismobil ?>">
              <?php echo $jenismobil->nama_jenismobil ?>
            </option>
          <?php } ?>
          </select>
        </div>
      </div>

      <div class="col-3">
        <label>Kapasitas Penumpang</label>
      </div>
      <div class="col-9">
        <div class="form-group form-group-lg">
          <input type="number" name="kap_penumpang" class="form-control" placeholder="Kapasitas Penumpang" value="<?php echo set_value('kap_penumpang') ?>">
        </div>
      </div>

      <div class="col-3">
        <label>Kapasitas Bagasi</label>
      </div>
      <div class="col-9">
        <div class="form-group form-group-lg">
          <input type="number" name="kap_bagasi" class="form-control" placeholder="Kapasitas Bagasi" value="<?php echo set_value('kap_bagasi') ?>">
        </div>
      </div>

      <div class="col-3">
        <label>Harga Awal</label>
      </div>
      <div class="col-9">
        <div class="form-group form-group-lg">
          <input type="number" name="harga_awal" class="form-control" placeholder="Kapasitas Bagasi" value="<?php echo set_value('harga_awal') ?>">
        </div>
      </div>

      <div class="col-3">
        <label>Status Mobil</label>
      </div>
      <div class="col-9">
        <div class="form-group">
          <select name="status_mobil" class="form-control form-control-chosen">
            <option value="">Status Mobil</option>
            <option value="Aktif">Aktif</option>
            <option value="Nonaktif">Nonaktif</option>
          </select>
        </div>
      </div>

      <div class="col-3">
        <label>Deskripsi</label>
      </div>
      <div class="col-9">
        <div class="form-group">
          <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Mobil"><?php echo set_value('deskripsi') ?></textarea>
        </div>
      </div>

      <div class="col-3">
        <label>Keyword Mobil (Untuk SEO google)</label>
      </div>
      <div class="col-9">
        <div class="form-group">
          <input type="text" name="keywords" class="form-control" placeholder="Keywords Mobil">
        </div>
      </div>
    </div>

</div>

<div class="col-md-4">
  <div class="form-group">
    <label>Upload Gambar</label><br>
    <input type="file" name="gambar">
  </div>
  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan Mobil</button>
  </div>

</div>




</div>


<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
