<div class="tile">
        <?php
        //Form Open
        echo form_open(base_url('admin/ketentuan/tambah'));
        ?>

        <div class="form-group">
           <label>Nama Ketentuan</label>
             <input type="text" class="form-control" name="nama_ketentuan" placeholder="Nama Ketentuan">
        </div>

        <div class="form-group">
          <label>Isi Ketentuan</label>
          <textarea name="isi_ketentuan" class="form-control tinymce" placeholder="Isi Ketentuan">
        <?php echo set_value('isi_ketentuan') ?>
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
