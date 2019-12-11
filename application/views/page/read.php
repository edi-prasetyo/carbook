
<h4 class="cat-judul text-center"><?php echo $title ?></h4>

  <div class="container">

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>

    <div class="row">

<!-- START THE FEATURETTES -->

        <div class="col-md-12 post-detail">
          <div class="konten-page">
          <h2><?php echo $title ?></h2>
        

          <p><?php echo $page->isi_page ?></p>

        </div>
      </div>



        <!-- <div class="col-md-4 sidebar">
          <div class="card">
          <h3 class="sidebar-title">Berita Terbaru</h3>
          <?php foreach($listing as $listing) { ?>
          <ul>
            <li>
              <img src="<?php echo base_url('assets/upload/image/'.$listing->gambar)?>" alt="<?php echo $listing->judul_page ?>" class="img-fluid">
              <a href="<?php echo base_url('page/read/'.$listing->slug_page) ?>"> <?php echo strip_tags(character_limiter($listing->judul_page, 50)) ?> </a>
              <br><i class="fa fa-calendar"></i> <?php echo date_indo($listing->tanggal_post) ?>
            </li>
          </ul>
          <?php } ?>

          </div>
          <div class="card">
          <h3 class="sidebar-title">Berita Terpopuler</h3>
          <?php foreach($popularpost as $popularpost) { ?>
          <ul>
            <li>
              <img src="<?php echo base_url('assets/upload/image/'.$popularpost->gambar)?>" alt="<?php echo $popularpost->judul_page ?>" class="img-fluid">
              <a href="<?php echo base_url('page/read/'.$popularpost->slug_page) ?>"> <?php echo strip_tags(character_limiter($popularpost->judul_page, 50)) ?> </a>
              <br><i class="fa fa-eye"></i> <?php echo $popularpost->page_views ?> Kali dilihat
            </li>
          </ul>
          <?php } ?>



        </div>
      </div> -->


<!-- /END THE FEATURETTES -->

</div>
</div>
