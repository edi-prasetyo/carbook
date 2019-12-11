<?php
$site_info          = $this->konfigurasi_model->listing();
$menu_berita        = $this->konfigurasi_model->menu_berita();
$menu_profil        = $this->konfigurasi_model->menu_profil();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url()?>"><img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$site_info->logo) ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href="<?php echo base_url()?>"> Home <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('mobil') ?>">Harga Sewa</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('transaksi') ?>">Cek Pesanan</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('layanan')?>">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('berita')?>">Berita</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('kontak')?>">Kontak</a></li>
      </ul>
      <ul class="navbar-nav">
        <a href="<?php echo base_url('mobil');?>" class="btn btn-outline-primary">Booking</a>
      </ul>
    </div>
  </div>
</nav>
