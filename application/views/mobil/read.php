<h1 class="cat-judul text-center"><?php echo $title; ?></h1>
<div class="container">
  <div class="row">
    <div class="col-md-8 post-detail">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1)) ?>">
          <?php echo ucfirst(str_replace('_',' ', $this->uri->segment(1))) ?>
        </a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
      </ul>
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo base_url('assets/upload/car/'.$mobil->gambar)?>" alt="<?php echo $mobil->nama_mobil ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2><?php echo $title ?></h2>
          <i class="fa fa-user-circle"></i> <?php echo $mobil->kap_penumpang ?> Penumpang<br>
          <i class="fa fa-briefcase"></i> <?php echo $mobil->kap_bagasi ?> Koper
        </div>
      </div>
      <h5><strong>Pilihan Paket</strong></h5>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Paket</th>
              <th scope="col">Harga</th>
              <th width="20%">Booking</th>
            </tr>
          </thead>
          <tbody>
            <?php if($listpaket){
              foreach ($listpaket as $listpaket)
              {?>
                <tr>
                  <td><?php echo $listpaket->nama_paket ?></td>
                  <td>Rp. <?php echo number_format($listpaket->harga,'0',',','.') ?></td>
                  <td>
                    <a href="<?php echo base_url('mobil/add/'.$listpaket->id_paket);?>" class="btn btn-pill btn-primary ml-auto"><i class="fe fe-shopping-cart mr-2"></i> Booking</a>
                  </td>
                </tr>
              <?php }
            }
            ?>
          </tbody>
        </table>
      </div>
      <h5><strong>Deskripsi Kendaraan</strong></h5>
      <p><?php echo $mobil->deskripsi ?></p>
    </div>
    <div class="col-md-4 sidebar">
      <div class="sidebar-konten">
        <h3 class="sidebar-title">Pilihan Mobil</h3>
        <?php foreach($listing as $listing) { ?>
          <ul>
            <li>
              <img src="<?php echo base_url('assets/upload/car/'.$listing->gambar)?>" alt="<?php echo $listing->nama_mobil ?>" class="img-fluid">
              <a href="<?php echo base_url('mobil/rent/'.$listing->id_mobil) ?>"> <?php echo strip_tags(character_limiter($listing->nama_mobil, 50)) ?> </a>
              <br><br>Rp. <?php echo number_format($listing->harga_awal,'0',',','.') ?>
            </li>
          </ul>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
