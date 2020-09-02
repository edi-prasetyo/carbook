<div class="breadcrumb-default">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="margin-top container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Detail Buyback</div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <?php if ($buyback->buyback_img == NULL) : ?>
                                <div class="img-wrap"><img class="img-fluid" src="<?php echo base_url('assets/img/product/empty_image.jpg'); ?>"></div>
                            <?php else : ?>
                                <div class="img-wrap"><img class="img-fluid" src="<?php echo base_url('assets/img/product/') . $buyback->buyback_img; ?>"></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <h2><?php echo $buyback->buyback_name; ?></h2>
                            <br>
                            Ukuran :
                            <div class="alert alert-info"><?php echo $buyback->buyback_size; ?></div>
                            Kategori Produk :
                            <div class="alert alert-info"><?php echo $buyback->category_buy_name; ?></div>
                        </div>

                        <hr>
                        <div class="col-md-12">

                            <h3>Deskripsi Produk</h3>

                            <?php echo $buyback->buyback_desc; ?>


                            <a class="btn btn-primary" href="<?php echo base_url('buyback/jual/' .$buyback->id);?>">Jual Emas</a>





                        </div>



                    </div>



                </div>
            </div>
        </div>


        <div class="col-md-4">
            


            <div class="card">
                <div class="card-header">Produk Lainya</div>
                <div class="card-body">


                    <?php foreach ($related_buyback as $related_buyback) : ?>
                       
                                <div class="row">
                                    <span class="col-md-4"><img src="<?php echo base_url('assets/img/product/' . $related_buyback->buyback_img); ?>" class="img img-thumbnail img-fluid"></span>


                                    <span class="col-md-8">
                                        <h5><a href="<?php echo base_url('buyback/detail/' . $related_buyback->buyback_slug); ?>"> <?php echo $related_buyback->buyback_name; ?></a></h5>
                                        <a class="btn btn-primary btn-sm" href="<?php echo base_url('buyback/detail/' . $related_buyback->buyback_slug); ?>"> Detail Produk</a>
                                    </span>
                                </div>
                                <hr>

                           
                    <?php endforeach; ?>













                </div>
            </div>

        </div>
    </div>

</div>