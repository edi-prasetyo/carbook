<?php
$meta      = $this->meta_model->get_meta();
?>
<div class="breadcrumb-default">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="margin-top container">
<div class="card">
    <div class="card-body">
        <div class="text-center">
        <div style="font-size:70px">Sukses</div>
            <h1 style="font-size:150px"><span class="text-success"><i class="ti-check-box"></i></span></h1><br>

        Terima Kasih Kami akan segera menghubungi anda untuk proses Buyback anda <br>
        Info
          <?php echo $meta->telepon;?><br>
          <a href="<?php echo base_url();?>" class="btn btn-success">Kembali Ke Halaman Depan </a>
        </div>
    </div>
</div>

</div>