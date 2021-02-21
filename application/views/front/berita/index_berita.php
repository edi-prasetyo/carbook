<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container mb-3">

    <div class="row">
        <?php foreach ($berita as $berita) : ?>
            <div class="col-md-4">
                <div class="card mb-2">
                    <div class="img-frame">
                        <img src="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title lh-lg"><?php echo substr($berita->berita_title, 0, 35); ?>..</h5>
                        <?php echo substr($berita->berita_desc, 0, 100); ?>..
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?php echo base_url('berita/detail/' . $berita->berita_slug); ?>" class="btn btn-outline-info">Read More</a>

                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>











    <div class="pagination col-md-12 text-center">
        <?php if (isset($paginasi)) {
            echo $paginasi;
        } ?>
    </div>
</div>