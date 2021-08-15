<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>

<div class="most_popular my-3 mb-3 px-3">
    <div class="row">
        <?php foreach ($berita as $data) : ?>
            <div class="col-6 pr-2">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="star position-absolute"><span class="badge badge-success"><i class="ri-price-tag-3-line"></i> <?php echo $data->category_name; ?></span></div>
                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="ri-heart-3-line"></i></a></div>
                        <a href="<?php echo base_url('berita/detail/' . $data->berita_slug); ?>">
                            <img src="<?php echo base_url('assets/img/artikel/' . $data->berita_gambar); ?>" class="img-fluid item-img w-100">
                        </a>
                    </div>
                    <div class="p-3 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1"><a href="<?php echo base_url('berita/detail/' . $data->berita_slug); ?>" class="text-black"><?php echo substr($data->berita_title, 0, 35); ?>..
                                </a>
                            </h6>
                            <p class="text-gray mb-1 small"><?php echo date('F j, Y', strtotime($data->date_created)); ?></p>
                            <p class="text-gray mb-1 rating">

                            </p>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination col-md-12 text-center">
        <?php if (isset($pagination)) {
            echo $pagination;
        } ?>
    </div>

</div>