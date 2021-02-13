<div class="tile">
        <?php
        //Form Open
        echo form_open(base_url('admin/ketentuan/create'));
        ?>

        <div class="form-group">
           <label>Nama Ketentuan</label>
             <input type="text" class="form-control" name="ketentuan_name" placeholder="Nama Ketentuan">
        </div>

        <div class="form-group">
          <label>Isi Ketentuan</label>
          <textarea name="ketentuan_desc" class="form-control" id="summernote" placeholder="Isi Ketentuan"><?php echo set_value('ketentuan_desc') ?></textarea>
        </div>

        <div class="form-group">
             <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
        </div>


       <?php
       //Form Close
       echo form_close();
        ?>
</div>
