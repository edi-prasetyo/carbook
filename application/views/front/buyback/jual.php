<?php
$id             = $this->session->userdata('id');
$user           = $this->user_model->user_detail($id);
?>

<div class="breadcrumb-default">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="margin-top container">
    <div class="card">
        <div class="card-body">
        <h3> Detail Produk</h3>
            <div class="row">
            <div class="col-md-3">
                            <?php if ($buyback->buyback_img == NULL) : ?>
                                <div class="img-wrap"><img class="img-fluid" src="<?php echo base_url('assets/img/buyback/empty_image.jpg'); ?>"></div>
                            <?php else : ?>
                                <div class="img-wrap"><img class="img-fluid" src="<?php echo base_url('assets/img/product/') . $buyback->buyback_img; ?>"></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <h2><?php echo $buyback->buyback_name; ?></h2>
                            Ukuran : <?php echo $buyback->buyback_size; ?>
                            <h3 style="font-size:50px;font-weight:700;">
                            <?php if ($this->session->userdata('id')) : ?>
                                            Rp. <?php echo number_format($buyback->buyback_price,'0',',','.'); ?>
                                        
                                        <?php  else: ?>
                                            Rp. <?php echo number_format($buyback->buyback_price,'0',',','.'); ?>
                                        <?php endif; ?>
                           </h3>                          
                        </div>
            </div>
<hr>
            <h3> Detail Customer</h3>
          
                <?php echo form_open_multipart('buyback/jual/' .$buyback->id);
                $kode_buyback = date('dmY') . strtoupper(random_string('alnum', 5));
                ?>

<!-- Input Hidden data produk -->
<input type="hidden" name="kode_transaksi" value="<?php echo $kode_buyback ?>">
<input type="hidden" name="product_name" value="<?php echo $buyback->buyback_name;?>">
<input type="hidden" name="product_size" value="<?php echo $buyback->buyback_size;?>">


<div class="form-group row">
            <label class="col-lg-3 col-form-label">Jumlah yang di jual<span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">

            <div class="input-group mb-3 number-spinner">
                <div class="input-group-prepend">
                    <button class="btn btn-primary" data-dir="dwn" type="button"><i class="fas fa-minus"></i></button>
                </div>
                <input type="text" class="form-control text-center" name="product_qty" value="1">
                <div class="input-group-append">
                    <button class="btn btn-primary" data-dir="up" type="button"><i class="fas fa-plus"></i></button>
                </div>
            </div>                       
            </div>
        </div>

<!-- If User Login -->
<?php if ($this->session->userdata('id')) :?>

    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
    <input type="hidden" name="user_title" value="<?php echo $user->user_title;?>">
    <input type="hidden" name="buyback_price" value="<?php echo $buyback->buyback_price;?>">
    
<div class="form-group row">
            <label class="col-lg-3 col-form-label">Nama Lengkap<span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="user_name" placeholder="Nama Lengkap" value="<?php echo $user->user_name ; ?>">
            </div>
        </div>

<div class="form-group row">
            <label class="col-lg-3 col-form-label">Email <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="user_email" placeholder="Email" value="<?php echo $user->email ; ?>">
            </div>
        </div>

<div class="form-group row">
            <label class="col-lg-3 col-form-label">Nomor Handphone <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="user_phone" placeholder="Nomor Handphone" value="<?php echo $user->user_phone; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Alamat Penjual <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <textarea class="form-control" name="user_address" placeholder="Alamat Pengiriman"><?php echo $user->user_address; ?></textarea>
            </div>
        </div>

<!-- End If User Login -->
<?php else:?>
    <input type="hidden" name="buyback_price" value="<?php echo $buyback->buyback_price;?>">

    <div class="form-group row">
    <label class="col-lg-3 col-form-label">Title<span class="text-danger">*   </span> 
            </label>
            <div class="col-lg-6">
                            <select class="form-control form-control-chosen" name="user_title" value="">
                                <option></option>
                                <option value='Bapak'>Bapak</option>
                                <option value='Ibu'>Ibu</option>
                                <option value='Saudara'>Saudara</option>
                                <option value='Saudari'>Saudari</option>

                            </select>
                        </div><br>

                        <?php echo form_error('user_title', '<small class="text-danger">', '</small>'); ?>
                        
</div>

<div class="form-group row">
            <label class="col-lg-3 col-form-label">Nama Lengkap<span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="user_name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>">
                <?php echo form_error('user_name', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

<div class="form-group row">
            <label class="col-lg-3 col-form-label">Email <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="user_email" placeholder="Email" value="<?php echo set_value('user_email'); ?>">
                <?php echo form_error('user_email', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

<div class="form-group row">
            <label class="col-lg-3 col-form-label">Nomor Handphone <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="user_phone" placeholder="Nomor Handphone" value="<?php echo set_value('user_phone'); ?>">
                <?php echo form_error('user_phone', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Alamat Pengiriman <span class="text-danger">*</span>
            </label>
            <div class="col-lg-6">
                <textarea class="form-control" name="user_address" placeholder="Alamat Pengiriman"></textarea>
                <?php echo form_error('user_address', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>

        <?php endif;?>

        <div class="form-group row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Jual Sekarang
                </button>
            </div>
        </div>


<?php echo form_close();?>

        </div>
    </div>
</div>