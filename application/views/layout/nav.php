<?php
$site_info          = $this->konfigurasi_model->listing();
$menu_berita        = $this->konfigurasi_model->menu_berita();
$menu_profil        = $this->konfigurasi_model->menu_profil();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="img-fluid" src="<?php echo base_url('assets/upload/image/' . $site_info->logo) ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href="<?php echo base_url() ?>"> Home <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('mobil') ?>">Harga Sewa</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('layanan') ?>">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('berita') ?>">Berita</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('daftar') ?>">Daftar</a></li>
        <?php if ($this->session->userdata('id_user')) { ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('myaccount') ?>"><i class="far fa-user"></i> myaccount</a></li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login') ?>"><i class="fas fa-lock"></i> Login</a></li>
        <?php } ?>

        <a href="<?php echo base_url('transaksi') ?>" class="btn btn-outline-primary">Cek Order</a>
      </ul>
    </div>
  </div>
</nav>