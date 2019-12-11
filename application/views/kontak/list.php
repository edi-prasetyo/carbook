<h1 class="cat-judul text-center"><?php echo $title ?></h1>
<div class="container">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
  </ul>
  <br>
  <div class="row judul">
    <div class="row">
      <div class="col-md-5">
        <?php echo $konfigurasi->map ?>
      </div>
      <div class="col-md-7">
        <p><strong><?php echo $konfigurasi->namaweb ?></strong>
          <br><i class="fas fa-home"></i> <?php echo nl2br($konfigurasi->alamat) ?>
          <br><i class="fas fa-phone"></i> <?php echo $konfigurasi->telepon ?>
          <br><i class="fas fa-envelope"></i> <?php echo $konfigurasi->email ?>
          <br><i class="fas fa-globe"></i> <?php echo $konfigurasi->website ?>
        </p>
        <hr>
        Kirimkan Kritik dan Saran melalui Form di bawah ini.
        <?php
        if($this->session->flashdata('sukses'))
        {
          echo '<div class="alert alert-success">';
          echo $this->session->flashdata('sukses');
          echo '</div>';
        }
        echo validation_errors('<div class="alert alert-danger">','</div>');
        echo form_open(base_url('kontak'));
        ?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" placeholder="Nama" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Nomor Telepon/Hp</label>
              <input type="number" name="telepon" placeholder="Telepon" class="form-control">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Pesan</label>
              <textarea name="pesan" placeholder="Pesan Anda" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Kirim">
            </div>
          </div>
        </div>
        <?php
        echo form_close();
        ?>
      </div>
    </div>
  </div>
</div>
