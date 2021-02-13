<?php
$id             = $this->session->userdata('id');
$user           = $this->user_model->user_detail($id);
$meta           = $this->meta_model->get_meta();

?>






<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm" id="top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="img-fluid" src="<?php echo base_url('assets/img/logo/' . $meta->logo) ?>"></a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav">
        <li class="nav-item active"> <a class="nav-link" href="<?php echo base_url(); ?>">Home </a> </li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('rental-mobil'); ?>"> Rental Mobil </a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('berita'); ?>"> Berita </a></li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <?php if ($this->session->userdata('email')) { ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ti-user"></i> <?php echo $user->user_name; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('myaccount') ?>">Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('myaccount/update') ?>">Ubah Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('myaccount/ubah_password') ?>">Ubah Password</a>
              <a class="dropdown-item" href="<?php echo base_url('myaccount/transaksi') ?>"> Transaksi</a>

              <div class="dropdown-divider"></div>
              <?php if ($user->role_id == 1) : ?>
                <a class="dropdown-item" href="<?php echo base_url('admin/dashboard'); ?>">Panel Admin</a>
              <?php endif; ?>
              <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"><i class="ti-power-off"></i> Logout</a>
            </div>
          </li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth') ?>"><i class="bi-box-arrow-in-right" style="font-size: 1.5rem;"></i> Login</a></li>
          <span class=" border-left mr-3"></span>
          <!-- <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth/register') ?>"> Daftar</a></li> -->
          <a class="btn btn-info text-white my-auto" href="<?php echo base_url('transaksi'); ?>"> Cek Pesanan</a>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>