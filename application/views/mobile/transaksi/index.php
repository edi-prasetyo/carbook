<nav class="site-header sticky-top py-1 bg-info">
  <div class="container py-2 d-flex justify-content-between align-items-center">
    <a class="text-white text-left" href="javascript:history.back()"><i class="ri-arrow-left-line"></i></a>
    <a class="text-white text-center" href="#" aria-label="Product">
      Cek Transaksi
    </a>
  </div>
</nav>

<div class="container my-5">

    <div class="card">

        <!-- Nested Row within Card Body -->
        <div class="row">
            
            <div class="col-md-5">
                <div class="card-body">

                    <?php
                    // Notifikasi
                    if ($this->session->flashdata('message')) {

                        echo $this->session->flashdata('message');
                    }
                    //error warning
                    echo validation_errors('<div class="alert alert-warning">', '</div>');
                    //form open
                    echo form_open('transaksi/detail',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));

                    ?>


                    <h4><i class="bi bi-bag"></i> Cek Pesanan!</h4>
                    <p></p>


                    <div class="form-group">
                        <label> Kode Transaksi </label>
                        <input class="form-control" type="text" name="kode_transaksi" placeholder="Kode Transaksi" required>
                        <div class="invalid-feedback">Silahkan Masukan Kode Transaksi</div>
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input class="form-control" type="email" name="email" placeholder="Email" required>
                        <div class="invalid-feedback">Silahkan Masukan Email</div>
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
        </div>
    </div>
</div>


</div>