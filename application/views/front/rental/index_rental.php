<div class="breadcrumb">
  <div class="container">
    <ul class="breadcrumb my-3">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <?php foreach ($mobil as $mobil) : ?>

        <figure class="card">
          <div class="row">
            <div class="col-md-3">
              <div class="card-body">
                <img class="card-img-top" src="<?php echo base_url('assets/img/mobil/') . $mobil->mobil_gambar; ?>">
              </div>
            </div>
            <div class="col-md-5 border-right">
              <div class="card-body">
                <div class="badge badge-success badge-pill px-2"><?php echo $mobil->merek_name; ?></div>
                <h5 class="title"><b><?php echo substr($mobil->mobil_name, 0, 25); ?></b></h5>

                <div class="d-flex justify-content-start">
                  <span class="text-muted mr-3"><i class="ti-user"></i> <?php echo $mobil->mobil_penumpang; ?></span>
                  <span class="text-muted"><i class="ti-bag"></i> <?php echo $mobil->mobil_bagasi; ?></span>
                </div>


              </div>
            </div>
            <div class="col-md-4 text-center">
              <div class="card-body">
                <small>Harga Mulai Dari</small><br>
                <span style="font-size: 25px;font-weight:700;">
                  IDR. <?php echo number_format($mobil->mobil_harga, '0', ',', '.'); ?>
                </span> <small>/ hari</small>
                <a href="<?php echo base_url('rental-mobil/order/') . $mobil->id; ?>" class="btn btn-sm btn-info btn-block">Pilih</a>
              </div>
            </div>
          </div>
        </figure>

        <!-- col // -->
      <?php endforeach; ?>

      <div class="pagination col-md-12 text-center">
        <?php if (isset($pagination)) {
          echo $pagination;
        } ?>
      </div>

    </div> <!-- row.// -->

  </div>
</div>