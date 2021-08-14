<?php if ($this->session->userdata('id')) : ?>

    <nav class="site-header sticky-top py-1 bg-info">
  <div class="container py-2 d-flex justify-content-between align-items-center">
    <a class="text-white text-left" href="javascript:history.back()"><i class="ri-arrow-left-line"></i></a>
    <a class="text-white text-center" href="#" aria-label="Product">
      Transaksi
    </a>
  </div>
</nav>

    <div class="container ">
        <div class="list-group shadow-sm mb-5 mt-3">
	<?php
                                foreach ($transaksi as $transaksi) : ?>
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php echo $transaksi->nama_mobil; ?></h5>
      <small><?php if ($transaksi->status_bayar == "Pending") : ?>
                                                <div class="badge badge-warning badge-pill px-3"> <?php echo $transaksi->status_bayar; ?> </div>
                                            <?php elseif ($transaksi->status_bayar == "Process") : ?>
                                                <div class="badge badge-info badge-pill px-3"> <?php echo $transaksi->status_bayar; ?> </div>
                                            <?php elseif ($transaksi->status_bayar == "Cancel") : ?>
                                                <div class="badge badge-danger badge-pill px-3"> <?php echo $transaksi->status_bayar; ?> </div>
                                            <?php else : ?>
                                                <div class="badge badge-success badge-pill px-3"> <?php echo $transaksi->status_bayar; ?> </div>
                                            <?php endif; ?></small>
    </div>
    <p class="mb-1">Rp. <?php
                                                echo number_format($transaksi->total_harga, '0', ',', '.'); ?></p>
    <small><?php echo date('d/m/Y', strtotime($transaksi->date_created)); ?></small>
  </a>

  <?php
                                endforeach; ?>


  
</div>


<div class="pagination col-md-12 text-center">
                            <?php if (isset($pagination)) {
                                echo $pagination;
                            } ?>
                        </div>
    </div>



<?php else : ?>

    <?php redirect('auth'); ?>

<?php endif; ?>




