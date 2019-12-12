<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <?php $i = 1;
    foreach ($slider as $slider) { ?>
      <div class="carousel-item <?php if ($i == 1) {
                                    echo 'active';
                                  } ?> ">
        <a href="<?php echo base_url() . $slider->website; ?>"><img class="img-fluid" width="100%" src="<?php echo base_url('assets/upload/image/' . $slider->gambar) ?>" alt="<?php echo $slider->judul_galeri ?>"></a>
        <div class="container">
          <div class="carousel-caption text-left">
          </div>
        </div>
      </div>
    <?php $i++;
    } ?>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php foreach ($section as $section) { ?>
  <section class="boot-elemant-bg py-md-5 py-4">
    <div class="container position-relative py-md-5 py-0">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="display-4 font-weight-bold"><?php echo $section->judul; ?> </h2>
          <p class="f-16 mb-4"><?php echo $section->deskripsi; ?>.</p>
          <a href="<?php echo $section->url; ?>" class="btn btn-outline-primary"><i class="fa fa-car"></i> Booking Rent Car</a>
        </div>
        <div class="col-md-4">
          <img class="img-fluid" width="100%" src="<?php echo base_url('assets/upload/image/' . $section->gambar) ?>">
        </div>
      </div>
    </div>
  </section>
<?php } ?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-product py-5">
    <?php $i = 1;
    foreach ($mobil as $mobil) { ?>
      <div class="carousel-item <?php if ($i == 1) {
                                    echo 'active';
                                  } ?> ">

        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <h3><?php echo $mobil->nama_mobil ?></h3>
              <h2><span class="text-success">IDR. <?php echo number_format($mobil->harga_awal, '0', ',', '.') ?></span><small>/day</small></h2>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Booking Now</a></p>
            </div>
            <div class="col-md-5">
              <a href="<?php echo base_url() . $slider->website; ?>">
                <img class="img-fluid" width="100%" src="<?php echo base_url('assets/upload/car/' . $mobil->gambar) ?>">
              </a>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <i class="far fa-user-circle mr-2"></i> <?php echo $mobil->kap_penumpang ?> Penumpang<br>
                  <i class="fa fa-briefcase mr-2"></i> <?php echo $mobil->kap_bagasi ?> Koper<br>
                </div>

              </div>
            </div>

          </div>
        </div>

      </div>
    <?php $i++;
    } ?>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





<section class="services-area pt-md-3 pb-70" id="services">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 mx-auto text-center">
        <div class="section-title">
          <h4>Keunggulan Kami</h4>
          <p>Elite Rentcar Memiliki keunggulan yang bisa anda dapatkan</p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($services as $services) { ?>
        <div class="col-lg-4 col-md-6">
          <div class="single-service">
            <img src="<?php echo base_url('assets/upload/image/' . $services->gambar) ?>" alt="Image articles">
            <h4><?= $services->judul; ?></h4>
            <p><?= $services->deskripsi; ?> </p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<section class="boot-elemant py-md-1 py-3">
  <div class="container position-relative py-md-5 py-0">
    <div class="boot-block pb-md-3 pb-4 text-center">
      <div class="berita-title">
        <h4>Berita</h4>
        <p>Update Berita Rental mobil Bandung </p>
      </div>
    </div>
    <div class="row">
      <?php foreach ($berita as $berita) { ?>
        <div class="col-md-4">
          <div class="single-blog">
            <div class="single-blog-img">
              <a href="blog_single.html"><img src="<?php echo base_url('assets/upload/image/' . $berita->gambar) ?>" alt="Blog Image"></a>
            </div>
            <div class="blog-content-box">
              <div class="blog-content">
                <h4><a href="<?php echo base_url('berita/detail/' . $berita->slug_berita) ?>"><?php echo character_limiter($berita->judul_berita, 50) ?></a></h4>
                <div class="meta-post">
                  <span class="author">Post By: <a href="#"><?php echo $berita->nama; ?></a></span>
                </div>
                <a href="<?php echo base_url('berita/detail/' . $berita->slug_berita) ?>" class="btn-two">Read More</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>