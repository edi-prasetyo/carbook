<?php
$meta = $this->meta_model->get_meta(); ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol> -->
    <div class="carousel-inner">
        <?php $i = 1;
        foreach ($slider as $slider) { ?>
            <div class="carousel-item <?php if ($i == 1) {
                                            echo 'active';
                                        } ?> ">
                <a href="<?php echo base_url() . $slider->galery_url; ?>"><img class="img-fluid" width="100%" src="<?php echo base_url('assets/img/galery/' . $slider->galery_img) ?>" alt="<?php echo $slider->galery_title ?>"></a>
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



<section class="bg-white py-3">
    <div class="container pb-5">
        <div class="header-title my-5">
            <h2 class="text-center"><span style="font-weight:400;">Keunggulan</span><span style="font-weight:700;"> Layanan</span></h2>
        </div>
        <div class="row">


            <?php foreach ($layanan as $layanan) : ?>

                <div class="col-md-4">
                    <div class="card mb-2 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div style="font-size:50px;color: <?php echo $layanan->layanan_color; ?>;">
                                        <?php echo $layanan->layanan_icon; ?>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h4><?php echo $layanan->layanan_name; ?></h4>
                                    <?php echo $layanan->layanan_desc; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>


        </div>
    </div>
</section>

<section class="bg-info">
    <?php foreach ($galery_featured as $data) : ?>
        <div class="container col-xxl-8 px-4 py-2">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="<?php echo base_url('assets/img/galery/' . $data->galery_img); ?>" class="d-block mx-lg-auto img-fluid rounded" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6 text-white">
                    <h1 class="display-5 fw-bold lh-1 mb-3"><?php echo $data->galery_title; ?></h1>
                    <p class="lead"><?php echo $data->galery_desc; ?></p>

                </div>
            </div>
        </div>
    <?php endforeach; ?>

</section>


<section class="py-5 bg-white">
    <div class="container">
        <div class="header-title mb-5">
            <h2 class="text-center"><span style="font-weight:400;">Mobil</span><span style="font-weight:700;"> Terpopuler</span></h2>
        </div>
        <div class="row">
            <?php foreach ($mobil_populer as $mobil_populer) : ?>
                <div class="col-md-3 col-6 my-3">
                    <a class="text-decoration-none text-muted" href="<?php echo base_url('rental-mobil/order/' . $mobil_populer->mobil_slug); ?>">
                        <div class="card">
                            <!-- <div class="img-frame"> -->
                            <img src="<?php echo base_url('assets/img/mobil/' . $mobil_populer->mobil_gambar); ?>" class="card-img-top" alt="...">
                            <!-- </div> -->
                            <div class="card-body text-center">
                                <div class="badge badge-info"><?php echo $mobil_populer->merek_name; ?></div>
                                <h4 class="card-title"><?php echo $mobil_populer->mobil_name; ?></h4>

                            </div>
                            <div class="card-footer bg-white">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <span class="text-muted mr-3"><i class="bi-people"></i> <?php echo $mobil_populer->mobil_penumpang; ?></span>
                                    </div>
                                    <div class="col-6">
                                        <span class="text-muted"><i class="bi-briefcase"></i> <?php echo $mobil_populer->mobil_bagasi; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="header-title mb-5">
            <h2 class="text-center"><span style="font-weight:400;">Berita</span><span style="font-weight:700;"> Terbaru</span></h2>
        </div>
        <div class="row">
            <?php foreach ($berita as $berita) : ?>

                <div class="col-md-3 col-6">
                    <a href="<?php echo base_url('berita/detail/' . $berita->berita_slug); ?>" class="card bg-dark text-white shadow-sm border-0">
                        <div class="img-frame">
                            <img class="card-img" style="opacity: .25" src="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>" alt="Card image">
                        </div>
                        <div class="card-img-overlay d-flex flex-column align-items-start overflow-hidden">
                            <h5 class="card-title"><?php echo substr($berita->berita_title, 0, 35); ?>..</h5>
                            <p class="card-text mt-auto"><?php echo date('F j, Y', strtotime($berita->date_created)); ?></p>
                            <span class="badge badge-danger font-weight-normal mr-2"><?php echo $berita->category_name; ?></span>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

</section>