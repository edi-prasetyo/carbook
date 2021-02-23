<div class="container">
    <div class="col-md-12">
        <div class="card my-5">

            <div class="row">
                <div class="col-md-7">
                    <div class="card-body">
                        <div style="line-height: 35px;">
                            <h3><b>Booking Lebih Mudah dengan Login Ke akun</b></h3>
                            Silahkan Login untuk lebih mudah dalam melakukan pesanan, Jika anda belum memiliki akun silahkan Datfar Gratis sekarang juga.<br><br>
                        </div>
                    </div>
                </div>
                <!-- Nested Row within Card Body -->
                <div class="col-md-5 border-left">
                    <div class="card-body">
                        <div class="text-muted">
                            <h1 class="h4 text-gray-900 mb-4"><i class="bi-box-arrow-in-right" style="font-size: 2rem;"></i> Silahkan Login!</h1>
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                        <?php
                        echo form_open('auth')
                        ?>
                        <div class=" form-group">
                            <input type="text" class="form-control form-control-user" name="email" placeholder="Email..." value="<?php echo set_value('email'); ?>" style="text-transform: lowercase">
                            <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                            <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">
                            Login
                        </button>

                        <?php echo form_close() ?>
                        <hr>
                        <div class="text-center">
                            <a class="text-muted" href="<?php echo base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            Belum Punya Akun? <a class="text-muted" href="<?php echo base_url('auth/register') ?> ">Daftar Sekarang!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>