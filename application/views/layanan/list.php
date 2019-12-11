<h1 class="cat-judul text-center"><?php echo $title ?></h1>
<div class="container">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
  </ul>
  <br>
  <div class="row">
    <?php foreach ($layanan as $layanan) { ?>
      <div class="col-lg-4 text-center mb-md-5">
        <img class="img-thumbnail" src="<?php echo base_url('assets/upload/image/'.$layanan->gambar)?>" alt="<?php echo $layanan->judul_layanan ?>" width="160" height="160">
        <h2><?php echo $layanan->judul_layanan ?></h2>
        <?php echo strip_tags(character_limiter($layanan->isi_layanan,200)) ?>
        <p><a class="btn btn-secondary" href="<?php echo base_url('layanan/detail/'.$layanan->slug_layanan)?>" role="button">View details</a></p>
      </div>
    <?php } ?>
  </div>
  <div class="row">
    <div class="paginasi col-md-12 text-center">
      <?php if(isset($paginasi)) { echo $paginasi; } ?>
    </div>
  </div>
</div>
