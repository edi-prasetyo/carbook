<h1 class="cat-judul text-center"><?php echo $title; ?></h1>
<div class="container">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1)) ?>">
        <?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(1))) ?>
      </a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
  </ul>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <img src="<?php echo base_url('assets/upload/car/' . $mobil->gambar) ?>" alt="<?php echo $mobil->nama_mobil ?>" class="img-fluid">
            </div>
            <div class="col-md-6">
              <h2><?php echo $title ?></h2>
              <i class="fa fa-user-circle"></i> <?php echo $mobil->kap_penumpang ?> Penumpang<br>
              <i class="fa fa-briefcase"></i> <?php echo $mobil->kap_bagasi ?> Bagasi
            </div>
          </div>
        </div>
      </div>

      <h5><strong>Pilihan Paket</strong></h5>

      <?php if ($listpaket) {
        foreach ($listpaket as $listpaket) { ?>
          <div class="card">
            <div class="card-body">
              <div class="row">

                <div class="col-md-6">
                  <?php echo $listpaket->nama_paket ?>
                  <h3> IDR <?php echo number_format($listpaket->harga, '0', ',', '.') ?></h3>
                </div>
                <div class="col-md-6 text-right">
                  <a href="<?php echo base_url('mobil/add/' . $listpaket->id_paket); ?>" class="btn btn-pill btn-primary ml-auto"><i class="fe fe-shopping-cart mr-2"></i> Booking</a>
                </div>

              </div>
            </div>
          </div>
      <?php }
      }
      ?>

      <h5><strong>Deskripsi Kendaraan</strong></h5>
      <div class="card">
        <div class="card-body">
          <?php echo $mobil->deskripsi ?>
        </div>
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
</div>