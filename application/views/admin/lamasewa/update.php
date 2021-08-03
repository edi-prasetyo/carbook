<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $data->id; ?>">
    <i class="fa fa-edit"></i> Edit
</button>

<div class="modal modal-default fade" id="Edit<?php echo $data->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Lama Sewa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php
                //Error warning
                echo validation_errors('<div class="alert alert-warning">', '</div>');

                echo form_open('admin/lamasewa/update/' . $data->id,  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));

                ?>

                <div class="form-group">
                    <label>Lama Sewa</label>
                    <input type="text" class="form-control" name="lama_sewa" value="<?php echo $data->lama_sewa ?>" required>
                    <div class="invalid-feedback">Field lama Sewa tidak boleh kosong</div>
                </div>

                <label>Status</label><br>

                <div class="custom-control custom-radio custom-control-inline">
                    <input class="form-check-input" type="radio" name="status" id="emailConsentRadio" value="1" <?php if ($data->status == 1) {
                                                                                                                    echo "checked";
                                                                                                                }; ?> required>
                    <label class="form-check-label" for="optionB">
                        Aktif
                    </label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input class="form-check-input" type="radio" name="status" id="emailConsentRadio" value="0" <?php if ($data->status == 0) {
                                                                                                                    echo "checked";
                                                                                                                }; ?> required>
                    <label class="form-check-label" for="optionB">
                        Incative
                    </label>
                </div>
                <br><br>
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