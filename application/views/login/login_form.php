<h1 class="cat-judul text-center"><?php echo $title ?></h1>
<div class="container">

  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
  </ul>


  <div class="card-login">
    <div class="col-md-5">

      <h4> Login!</h4>
      <p>Silahkan Login ke Akun anda</p>
      <hr>

      <?php
      // Notifikasi
      if ($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success custom-alert">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
      }
      //error warning
      echo validation_errors('<div class="alert alert-warning">', '</div>');
      //form open
      echo form_open(base_url('login'));

      ?>


      <h4><i class="fa fa-lg fa-lock"></i> Silahkan Login!</h4>
      <p></p>
      <hr>

      <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email" autofocus>
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password">
      </div>

      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-lock text-light"></i>Login</button>
      </div>

      <?php
      //form close
      echo form_close();

      ?>

    </div>
  </div>
</div>