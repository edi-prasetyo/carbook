<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">', '</div>');
//Error Upload Gabar
if (isset($error_upload)) {
  echo '<div class="alert alert-warning">' . $errors_upload . '</div>';
}


//Atribut
$attribut = '';
// Form Open
echo form_open_multipart(base_url('admin/transaksi/edit/' . $transaksi->id_transaksi), $attribut);
?>
<div class="row">
  <div class="tile col-md-8">
    <div class="form-group form-group-lg">
      <label>Judul transaksi</label>
      <input type="text" name="judul_transaksi" class="form-control" placeholder="Judul transaksi" value="<?php echo $transaksi->judul_transaksi ?>" required>
    </div>

    <div class="form-group">
      <label>Isi transaksi</label>
      <textarea name="isi_transaksi" class="form-control tinymce" placeholder="Isi transaksi">
  <?php echo $transaksi->isi_transaksi ?>
    </textarea>
    </div>

    <div class="form-group">
      <label>Keyword transaksi (Untuk SEO google)</label>
      <input type="text" name="keywords" class="form-control" placeholder="Keywords transaksi" value="<?php echo $transaksi->keywords ?>">

    </div>

    <div class="form-group">
      <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update transaksi</button>
    </div>


  </div>

  <div class="tile col-md-4">
    <div class="form-group form-group-lg">
      <label>Status transaksi</label>
      <select name="status_transaksi" class="form-control form-control-chosen">
        <option value="Publish">Publish</option>
        <option value="Draft" <?php if ($transaksi->status_transaksi == "Draft") {
                                echo "selected";
                              } ?>>Draft</option>
      </select>
    </div>


    <div class="form-group">
      <label>Jenis transaksi</label>
      <select name="jenis_transaksi" class="form-control form-control-chosen">
        <option value="transaksi">transaksi</option>
        <option value="Profil" <?php if ($transaksi->jenis_transaksi == "Profil") {
                                  echo "selected";
                                } ?>>Profil</option>
      </select>
    </div>

    <div class="form-group">
      <label>kategori transaksi</label>
      <select name="id_kategori" class="form-control form-control-chosen">

        <?php foreach ($kategori as $kategori) { ?>
          <option value="<?php echo $kategori->id_kategori ?>" <?php if ($transaksi->id_kategori == $kategori->id_kategori) {
                                                                  echo "selected";
                                                                } ?>>
            <?php echo $kategori->nama_kategori ?>
          </option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label>Ganti Gambar</label><br>
      <input type="file" name="gambar"><br><br>
      <img src="<?php echo base_url('assets/upload/image/thumbs/' . $transaksi->gambar) ?>" width="70%" class="img img-thumbnail">

    </div>


  </div>
</div>


<div class="clearfix"></div>
<?php
//Form close
echo form_close();
?>