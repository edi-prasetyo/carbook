<div class="card">
    <div class="card-header">
        <?php echo $title; ?>
    </div>
    <div class="card-body">
        <?php
        //Form Open
        echo form_open(base_url('admin/ketentuan/update/' . $ketentuan->id));
        ?>

        <div class="form-group">
            <label>Nama Ketentuan</label>
            <input type="text" class="form-control" name="ketentuan_name" value="<?php echo $ketentuan->ketentuan_name; ?>">
        </div>

        <div class="form-group">
            <label>Isi Ketentuan</label>
            <textarea name="ketentuan_desc" class="form-control" id="summernote" placeholder="Isi Ketentuan"><?php echo $ketentuan->ketentuan_desc; ?></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
        </div>


        <?php
        //Form Close
        echo form_close();
        ?>
    </div>
</div>