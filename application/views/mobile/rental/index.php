<nav class="site-header sticky-top py-1 bg-info">
  <div class="container py-2 d-flex justify-content-between align-items-center">
    <a class="text-white text-left" href="javascript:history.back()"><i class="ri-arrow-left-line"></i></a>
    <a class="text-white text-center" href="#" aria-label="Product">
      Rental Mobil
    </a>
  </div>
</nav>

<div class="container">
  <div class="row my-3">

    <?php foreach ($mobil as $mobil) : ?>

      <div class="col-md-4 col-6">
        <div class="card mb-3">
          <!-- <div class="img-frame"> -->
          <img src="<?php echo base_url('assets/img/mobil/' . $mobil->mobil_gambar); ?>" class="card-img-top" alt="...">
          <!-- </div> -->
          <div class="card-body text-center shadow-sm">
            <div class="badge badge-info"><?php echo $mobil->merek_name; ?></div>
            <h6 class="card-title"><?php echo $mobil->mobil_name; ?></h4>
            <small>Harga Mulai Dari</small><br>
            <span style="font-size: 14px;font-weight:700;">
              IDR. <?php echo number_format($mobil->mobil_harga, '0', ',', '.'); ?>
            </span> 
            <a href="<?php echo base_url('rental-mobil/order/') . $mobil->mobil_slug; ?>" class="btn btn-sm btn-info btn-block">Pilih</a>
          </div>
          <div class="card-footer bg-white">
            <div class="row text-center">
              <div class="col-6">
                <span class="text-muted mr-3"><i class="bi-people"></i> <?php echo $mobil->mobil_penumpang; ?></span>
              </div>
              <div class="col-6">
                <span class="text-muted"><i class="bi-briefcase"></i> <?php echo $mobil->mobil_bagasi; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

    <div class="pagination col-md-12 text-center">
      <?php if (isset($pagination)) {
        echo $pagination;
      } ?>
    </div>



  </div>
</div>