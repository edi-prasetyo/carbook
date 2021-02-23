<?php
$meta = $this->meta_model->get_meta();
?>


<div class="container my-5">

    <div class="card">

        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-7 border-right">
                <div class="card-body">
                    <div style="line-height: 35px;">
                        <h3><b>Cek Pesanan Anda</b></h3>
                        Untuk mengecek order silahkan masukan email dan kode transaksi yang telah kami kirim ke email anda pada saat melakukan order<br><br>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card-body">

                    <?php
                    // Notifikasi
                    if ($this->session->flashdata('message')) {

                        echo $this->session->flashdata('message');
                    }
                    //error warning
                    echo validation_errors('<div class="alert alert-warning">', '</div>');
                    //form open
                    echo form_open(base_url('transaksi/detail'));

                    ?>


                    <h4><i class="bi bi-bag"></i> Cek Pesanan!</h4>
                    <p></p>


                    <div class="form-group">
                        <label> Kode Transaksi </label>
                        <input class="form-control" type="text" name="kode_transaksi" placeholder="Kode Transaksi">
                        <?php echo form_error('kode_transaksi', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input class="form-control" type="email" name="email" placeholder="Email">
                        <?php echo form_error('email', '<span class="text-danger">', '</span>'); ?>
                    </div>

                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-lock text-light"></i>Cek Pesanan</button>
                    </div>

                    <?php
                    //form close
                    echo form_close();

                    ?>


                </div>
            </div>
        </div>
    </div>
</div>


</div>