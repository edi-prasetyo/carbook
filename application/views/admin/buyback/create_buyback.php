<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php echo $title; ?>
    </div>
    <div class="card-body">


        <div class="text-center">
            <?php
            echo $this->session->flashdata('message');
            if (isset($errors_upload)) {
                echo '<div class="alert alert-warning">' . $error_upload . '</div>';
            }
            ?>
        </div>
        <?php
        echo form_open_multipart('admin/buyback/create');
        ?>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Nama Produk <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="buyback_name" placeholder="Nama Produk" value="<?php echo set_value('buyback_name'); ?>">
                <?php echo form_error('buyback_name', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Harga Buyback <span class="text-danger">Optional</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="buyback_price" placeholder="Harga Produk" value="<?php echo set_value('buyback_price'); ?>">
                <?php echo form_error('buyback_price', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Ukuran Produk <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="buyback_size" placeholder="Ukuran Produk" value="<?php echo set_value('buyback_size'); ?>">
                <?php echo form_error('buyback_size', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Kategori Buyback<span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <select name="category_buy_id" class="form-control form-control-chosen">
                    <option value="">Pilih Kategori Buyback</option>
                    <?php foreach ($category_buy as $category_buy) { ?>
                        <option value="<?php echo $category_buy->id ?>">
                            <?php echo $category_buy->category_buy_name ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
       
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Status Product <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <select name="buyback_status" class="form-control form-control-chosen">
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Upload Gambar <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <div class="input-group mb-3">
                    <input type="file" name="buyback_img">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Deskripsi Produk <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">

                <textarea class="form-control" id="summernote" name="buyback_desc" placeholder="Deskripsi Produk"></textarea>
                <?php echo form_error('buyback_desc', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Publish
                </button>
            </div>
        </div>

        <?php echo form_close() ?>

    </div>
</div>