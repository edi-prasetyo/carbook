<section>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    
  </ol>
  <div class="carousel-inner">
    <?php $i=1; foreach ($slider as $slider) { ?>
      <div class="carousel-item <?php if($i==1){echo 'active';} ?> ">
        <a href="<?php echo base_url().$slider->galery_url;?>"><img class="img-fluid" src="<?php echo base_url('assets/img/galery/'.$slider->galery_img) ?>" alt="<?php echo $slider->galery_title ?>"></a>
        <div class="container">
          <div class="carousel-caption text-left">
          </div>
        </div>
      </div>
      <?php $i++; } ?>
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
</section>



<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 p-md-5">
            <div class="row">
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div style="font-size:50px;color:#00a2e9;">
                                        <i class="ti-id-badge"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h4>Memiliki Sertifikat Resmi</h4>
                                    MiniGold emas 24 karat dengan sertifikasi dan lolos uji Sucofindo dan G-Lab pegadaian.
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div style="font-size:50px;color:#00a2e9;">
                                        <i class="ti-bookmark-alt"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h4>Diterima Di Toko Emas</h4>
                                    MiniGold adalah logam emas 24 karat dan akan diterima di toko emas manapun.
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div style="font-size:50px;color:#00a2e9;">
                                        <i class="ti-stats-up"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h4>Sarana Investasi Aman</h4>
                                    Memegang produk emas sendiri, membuat orang tidak khawatir dalam investasi.
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div style="font-size:50px;color:#00a2e9;">
                                        <i class="ti-gift"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h4>Bisa Ditukar Logam Mulia Antam</h4>
                                    Apabila jumlah  Mini Gold sesuai ukuran Logam Mulia Antam.
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
            </div>
                
            </div>
            <div class="col-md-4 form-signup">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Daftar Jadi Reseller</h5>
                        <hr>

                        <?php
                        echo form_open('auth/register')
                        ?>

<div class="form-group">
                            <select class="form-control form-control-chosen" name="user_title" value="">
                                <option value='Bapak'>Bapak</option>
                                <option value='Ibu'>Ibu</option>
                                <option value='Saudara'>Saudara</option>
                                <option value='Saudari'>Saudari</option>

                            </select>
                        </div>
                       
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>">
                            <?php echo form_error('user_name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_phone" placeholder="Nomor Handphone" value="<?php echo set_value('user_phone'); ?>">
                            <?php echo form_error('user_phone', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>" style="text-transform: lowercase">
                            <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control" name="password1" placeholder="Password">
                                <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password2" placeholder="Repeat Password">

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Register Account
                        </button>

                        <?php echo form_close() ?>
                        <hr>
                       
                        <div class="text-center">
                            
                            <a class="small" href="<?php echo base_url('auth/register'); ?>">Syarat dan Ketentuan</a><br>
                            <a class="small" href="<?php echo base_url('auth') ?>">Already have an account? Login!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="produk-home my-md-3">
    <div class="container">
        <h2 class="text-center pb-3"> Mini Gold </h2>
        <div class="row">
                    <?php foreach ($minigold as $minigold) :?>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <img class="card-img-top" src="<?php echo base_url('assets/img/product/' .$minigold->product_img);?>" alt="Card image cap">
                            <div class="card-body">
                               
                            <h5 class="title"><?php echo substr($minigold->product_name, 0, 25); ?></h5>
                                <div style="font-size: 25px;font-weight:700;">
                                        <?php if ($this->session->userdata('id')) : ?>
                                            Rp. <?php echo number_format($minigold->price_reseller,'0',',','.'); ?>
                                        
                                        <?php  else: ?>
                                            Rp. <?php echo number_format($minigold->product_price,'0',',','.'); ?>
                                        <?php endif; ?>
                                        </div>
                                        

                                        <a href="<?php echo base_url('products/detail/') . $minigold->product_slug; ?>" class="btn btn-sm btn-primary">Order Produk</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
        </div>
    </div>
     
               
</section>


<section class="produk-home my-md-3 py-2 bg-white">
    <div class="container">
        <h2 class="text-center pb-3"> Antam </h2>
        <div class="row">
        <?php foreach ($antam as $antam) :?>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <img class="card-img-top" src="<?php echo base_url('assets/img/product/' .$antam->product_img);?>" alt="Card image cap">
                            <div class="card-body">
                               
                            <h5 class="title"><?php echo substr($antam->product_name, 0, 25); ?></h5>                                                                  
                                <div style="font-size: 25px;font-weight:700;">
                                        <?php if ($this->session->userdata('id')) : ?>
                                            Rp. <?php echo number_format($antam->price_reseller,'0',',','.'); ?>
                                        
                                        <?php  else: ?>
                                            Rp. <?php echo number_format($antam->product_price,'0',',','.'); ?>
                                        <?php endif; ?>
                                        </div>
                                        

                                        <a href="<?php echo base_url('products/detail/') . $antam->product_slug; ?>" class="btn btn-sm btn-primary">Order Produk</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
        </div>
    </div>
     
               
</section>




