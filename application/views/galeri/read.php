
<h4 class="cat-judul text-center"><?php echo $title ?></h4>

  <div class="container">

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1)) ?>">
          <?php echo ucfirst(str_replace('_',' ', $this->uri->segment(1))) ?>
        </a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>
<br>
<div class="row">
  <div class="col-lg-4">
    <img class="img img-thumbnail img-responsive" src="<?php echo base_url('assets/upload/image/'.$layanan->gambar)?>" alt="<?php echo $title ?>">
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-8">
    <h2><?php echo $layanan->judul_layanan ?></h2>

    <?php echo $layanan->isi_layanan ?>

  </div><!-- /.col-lg-4 -->

</div><!-- /.row -->


</div>
