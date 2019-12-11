<h3 class="cat-judul text-center"><?php echo $title ?></h3>

<div class="col-md-3 mx-auto">
  <div style="margin:40px 0 30px 0;">
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
