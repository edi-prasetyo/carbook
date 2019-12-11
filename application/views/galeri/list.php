
<h1 class="cat-judul text-center"><?php echo $title ?></h1>

  <div class="container">

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>


<br>
<div class="row">
    <?php foreach ($galeri as $galeri) { ?>
  <div class="col-lg-4 text-center mb-md-5">
    <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $galeri->id_galeri ?>">
    <img class="img-thumbnail" src="<?php echo base_url('assets/upload/image/'.$galeri->gambar)?>" alt="<?php echo $galeri->judul_galeri ?>">
    </a>
    <!-- <h2><?php echo $galeri->judul_galeri ?></h2>
    <?php echo strip_tags(character_limiter($galeri->isi_galeri,200)) ?> -->


    <div class="modal fade" id="exampleModal<?php echo $galeri->id_galeri ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$galeri->gambar)?>" alt="<?php echo $galeri->judul_galeri ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-window-close"></i> Tutup</button>
            <a class="btn btn-primary" download="" href="<?php echo base_url('assets/upload/image/'.$galeri->gambar)?>"><i class="fa fa-download"></i> Download Gambar</a>
          </div>
        </div>
      </div>
    </div>


  </div><!-- /.col-lg-4 -->
  <?php } ?>
</div><!-- /.row -->
<div class="row">
      <div class="paginasi col-md-12 text-center">
          <?php if(isset($paginasi)) { echo $paginasi; } ?>
      </div>
</div>
</div>
