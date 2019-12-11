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
echo form_open_multipart(base_url('admin/berita/tambah'),$attribut);
?>
<div class="row">

<div class="tile col-md-8">
  <div class="form-group form-group-lg">
    <label>Judul Berita</label>
    <input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita"
    value="<?php echo set_value('judul_berita') ?>">
  </div>

  <div class="form-group">
    <label>Isi Berita</label>
    <textarea name="isi_berita" class="form-control tinymce" placeholder="Isi Berita">
  <?php echo set_value('isi_berita') ?>
    </textarea>
  </div>

  <div class="form-group">
    <label>Keyword Berita (Untuk SEO google)</label>
    <input type="text" name="keywords" class="form-control" placeholder="Keywords Berita">
  </div>

  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan Berita</button>
  </div>

</div>

<div class="tile col-md-4">
  <div class="form-group form-group-lg">
    <label>Status Berita</label>
    <select name="status_berita" class="form-control form-control-chosen">
      <option value="Publish">Publish</option>
      <option value="Draft">Draft</option>
    </select>
  </div>

  <div class="form-group">
    <label>Jenis Berita</label>
    <select name="jenis_berita" class="form-control form-control-chosen">
      <option value="Berita">Berita</option>
      <option value="Profil">Profil</option>
    </select>
  </div>

  <div class="form-group">
    <label>kategori Berita</label>
    <select name="id_kategori" class="form-control form-control-chosen">
      <option value="">Pilih Kategori</option>
      <?php foreach($kategori as $kategori) { ?>
      <option value="<?php echo $kategori->id_kategori ?>">
        <?php echo $kategori->nama_kategori ?>
      </option>
    <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label>Upload Gambar</label><br>
    <input type="file" name="gambar">
  </div>

</div>
</div>


<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
