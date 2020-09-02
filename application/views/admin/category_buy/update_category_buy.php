<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $category_buy->id ?>">
    <i class="fa fa-pencil"></i> Edit
</button>

<div class="modal modal-default fade" id="Edit<?php echo $category_buy->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Nama Kategori Beli</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php
                //Form Open
                echo form_open(base_url('admin/category_buy/update/') . $category_buy->id);
                ?>

                <div class="form-group">
                    <label>Nama Kategori Jual</label>
                    <input type="text" class="form-control" name="category_buy_name" value="<?php echo $category_buy->category_buy_name ?>">
                </div>

                

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