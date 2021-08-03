<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $data->id; ?>">
    <i class="fa fa-edit"></i> Edit
</button>

<div class="modal modal-default fade" id="Edit<?php echo $data->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Jenis Mobil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php
                //Error warning
                echo validation_errors('<div class="alert alert-warning">', '</div>');

                echo form_open('admin/jenismobil/update/' . $data->id,  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));

                ?>

                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="jenismobil_name" value="<?php echo $data->jenismobil_name ?>" required>
                    <div class="invalid-feedback">Silahkan masukan Jenis Kendaraan</div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Update Data">
                </div>


                <?php
                //Form Close
                echo form_close();
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->