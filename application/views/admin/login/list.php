<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/font-awesome/css/font-awesome.min.css">
    <title>Login - Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="login-box">
        <div class="login-form">


          <?php
        // Notifikasi
        if($this->session->flashdata('sukses')){
          echo '<div class="alert alert-success custom-alert">';
          echo $this->session->flashdata('sukses');
          echo '</div>';
          }
          //error warning
          echo validation_errors('<div class="alert alert-warning">','</div>');
          //form open
          echo form_open(base_url('connect/auth'));

           ?>


          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>

          <?php
        //form close
        echo form_close();

           ?>


        </div>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url() ?>assets/admin/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url() ?>assets/admin/js/plugins/pace.min.js"></script>
    <script>
        window.setTimeout(function() {
          //$(".custom-alert").alert('close'); <--- Do not use this

          $(".custom-alert").slideUp(500, function() {
              $(this).remove();
          });
        }, 3000);

      </script>
  </body>
</html>
