<h1 class="cat-judul text-center"><?php echo $title; ?></h1>
<div class="container">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
  </ul>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <?php foreach ($mobil as $mobil) { ?>
        <div class="post card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <img class="img-fluid" src="<?php echo base_url('assets/upload/car/' . $mobil->gambar) ?>" alt="<?php echo $mobil->nama_mobil ?>">
              </div>
              <div class="col-md-5">
                <h4><a href="<?php echo base_url('mobil/rent/' . $mobil->id_mobil) ?>"><?php echo strip_tags(character_limiter($mobil->nama_mobil, 50)) ?></a></h4>
                <i class="far fa-user-circle mr-2"></i> <?php echo $mobil->kap_penumpang ?> Penumpang<br>
                <i class="fa fa-briefcase mr-2"></i> <?php echo $mobil->kap_bagasi ?> Bagasi<br>
              </div>
              <div class="col-md-4">
                mulai dari<br>
                <span style="font-size:27px;font-weight:700;"><b> IDR <?php echo number_format($mobil->harga_awal, '0', ',', '.') ?></b></span>/hari<br>
                <a class="btn btn-pill btn-primary" href="<?php echo base_url('mobil/rent/' . $mobil->id_mobil) ?>">Lihat Harga Paket</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="paginasi col-md-12 text-center">
        <?php if (isset($paginasi)) {
          echo $paginasi;
        } ?>
      </div>
    </div>

    <div class="col-md-4">
      <div class="sidebar card">
        <h3 class="sidebar-title">Pilihan Mobil</h3>
        <?php foreach ($listing as $listing) { ?>
          <ul>
            <li>
              <img src="<?php echo base_url('assets/upload/car/' . $listing->gambar) ?>" alt="<?php echo $listing->nama_mobil ?>" class="img-fluid">
              <a href="<?php echo base_url('mobil/rent/' . $listing->id_mobil) ?>"> <?php echo strip_tags(character_limiter($listing->nama_mobil, 50)) ?> </a>
              <br><br>Rp. <?php echo number_format($listing->harga_awal, '0', ',', '.') ?>
            </li>
          </ul>
        <?php } ?>
      </div>
    </div>

  </div>
</div>