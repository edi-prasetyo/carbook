<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Baru
</button>

<div class="modal modal-default fade" id="Tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Durasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php
                //Form Open
                echo form_open('admin/jamsewa',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
                ?>

                <div class="form-group">
                    <label>Jam Sewa</label>
                    <input type="text" class="form-control" name="jam" placeholder="Durasi Sewa" required>
                    <div class="invalid-feedback">Silahkan masukan Durasi Sewa</div>
                </div>

                <label>Status</label><br>

                <div class="custom-control custom-radio custom-control-inline">
                    <input class="form-check-input" type="radio" name="status" id="emailConsentRadio" value="1" required>
                    <label class="form-check-label" for="optionB">
                        Active
                    </label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input class="form-check-input" type="radio" name="status" id="emailConsentRadio" value="0" required>
                    <label class="form-check-label" for="optionB">
                        Incative
                    </label>
                </div>

                <br><br>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
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