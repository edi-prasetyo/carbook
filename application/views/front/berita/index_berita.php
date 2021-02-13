<div class="breadcrumb-default">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="col-md-9">

        <?php foreach ($berita as $berita) { ?>
            <div class="card">
                <div class="row">
                    <div class="col-md-4"><img class="img-fluid" src="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>"> </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4><?php echo $berita->berita_title; ?></h4>
                            <?php echo $berita->berita_desc; ?>
                            <a href="<?php echo base_url('berita/detail/' . $berita->berita_slug); ?>">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>



        <div class="pagination col-md-12 text-center">
            <?php if (isset($paginasi)) {
                echo $paginasi;
            } ?>
        </div>
    </div>
</div>