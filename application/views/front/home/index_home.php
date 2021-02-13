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

            <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div style="font-size:50px;color:#00a2e9;">
                                    <i class="ri-vip-crown-line"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                <h4>Harga Sewa Murah</h4>
                                Kami memberikan harga sewa yang terjangkau.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div style="font-size:50px;color:#00a2e9;">
                                    <i class="ri-customer-service-2-fill"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                <h4>Support 24 Jam</h4>
                                Kami memberikan pelayanan 1x24 Jam.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div style="font-size:50px;color:#00a2e9;">
                                    <i class="ri-calendar-todo-line"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                <h4>Booking Terjadwal</h4>
                                Anda dapat mengatur booking sewa mobil anda.
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>