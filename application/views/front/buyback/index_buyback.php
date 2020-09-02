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

        <div class="col-lg-12">

         <b><?php echo $title;?></b> <br>Update Harga <?php echo tanggal() ?>
         <hr>

            <div class="row">
                <?php foreach ($buyback as $buyback) : ?>

                    <div class="col-md-3">
                        <figure class="card">
                            <?php if ($buyback->buyback_img == NULL) : ?>
                                <img class="card-img-top" src="<?php echo base_url('assets/img/product/empty_image.jpg'); ?>">
                            <?php else : ?>
                                <img class="card-img-top" src="<?php echo base_url('assets/img/product/') . $buyback->buyback_img; ?>">
                            <?php endif; ?>

                            <div class="card-body text-center">
                            
                                <h5 class="title"><?php echo substr($buyback->buyback_name, 0, 25); ?></h5>

                                <div style="font-size: 25px;font-weight:700;">
                                        <?php if ($buyback->buyback_price == Null) { ?>
                                        <?php } else {; ?>
                                            Rp. <?php echo number_format($buyback->buyback_price,'0',',','.'); ?>
                                        <?php }; ?>
                                        </div>
                                        <br>

                                        <a href="<?php echo base_url('buyback/detail/') . $buyback->buyback_slug; ?>" class="btn btn-sm btn-primary">Saya Mau jual</a>

                            </div>
                               
                          
        

                          
                        </figure>
                    </div> <!-- col // -->
                <?php endforeach; ?>

                <div class="pagination col-md-12 text-center">
                <?php if (isset($pagination)) {
                    echo $pagination;
                } ?>
            </div>

            </div> <!-- row.// -->

        </div>

        <!-- <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Category Produk</div>
                <div class="card-body">
                    <?php foreach ($listcategory_buyback as $listcategory_buyback) : ?>
                        <ul>
                            <li><a href="<?php echo base_url('buyback/category_buyback/' . $listcategory_buyback->id); ?>"> <?php echo $listcategory_buyback->category_buyback_name; ?></a></li>
                        </ul>

                    <?php endforeach; ?>

                </div>
            </div>
        </div> -->


    </div>
</div>