<nav class="site-header sticky-top py-1 bg-info">
  <div class="container py-2 d-flex justify-content-between align-items-center">
    <a class="text-white text-left" href="javascript:history.back()"><i class="ri-arrow-left-line"></i></a>
    <a class="text-white text-center" href="#" aria-label="Product">
      Login
    </a>
  </div>
</nav>

<div class="container">
    <div class="col-md-12">
        <div class="card my-5">

            <div class="row">
                
                <!-- Nested Row within Card Body -->
                <div class="col-md-5">
                    <div class="card-body">
                        <div class="text-muted">
                            <h1 class="h4 text-gray-900 mb-4"><i class="bi-box-arrow-in-right" style="font-size: 2rem;"></i> Silahkan Login!</h1>
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                        <?php
                        echo form_open_multipart('auth',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
                        ?>
                        <div class=" form-group">
                            <input type="text" class="form-control form-control-user" name="email" placeholder="Email..." value="<?php echo set_value('email'); ?>" style="text-transform: lowercase" required>
                            <div class="invalid-feedback">Silahkan masukan Email</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                            <div class="invalid-feedback">Silahkan masukan Password</div>
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