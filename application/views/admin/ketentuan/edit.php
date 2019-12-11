
<div class="tile">
<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
// Form Open
echo form_open_multipart(base_url('admin/ketentuan/edit/'.$ketentuan->id_ketentuan));
?>

        <div class="form-group">
           <label>Judul Halaman</label>
             <input type="text" class="form-control" name="nama_ketentuan" value="<?php echo $ketentuan->nama_ketentuan ?>">
        </div>

        <div class="form-group">
          <label>Isi Ketentuan</label>
          <textarea name="isi_ketentuan" class="form-control tinymce">
        <?php echo $ketentuan->isi_ketentuan ?>
          </textarea>
        </div>


        <div class="form-group">
             <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
        </div>


       <?php
       //Form Close
       echo form_close();
        ?>
</div>
