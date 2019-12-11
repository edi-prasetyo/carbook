<h1 class="cat-judul text-center"><?php echo $title ?></h1>

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
    echo form_open(base_url('transaksi/detail'));

    ?>


    <h4><i class="fa fa-lg fa-lock"></i> Cek Pesanan!</h4>
    <p></p>
    <hr>

    <div class="form-group">
      <label> Kode Transaksi </label>
      <input class="form-control" type="text" name="kode_transaksi" placeholder="Kode Transaksi" autofocus>
    </div>
    <div class="form-group">
      <label> Email </label>
      <input class="form-control" type="email" name="email" placeholder="Email">
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
