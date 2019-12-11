

<div class="row">


  <div class="col-md-6 col-lg-3">
    <div class="widget-small info"><i class="icon fa fa-shopping-bag fa-3x"></i>
      <div class="info">
        <h4>Transaksi</h4>
        <p><b><?php echo count($transaksi) ?></b></p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="widget-small danger"><i class="icon fa fa-newspaper-o fa-3x"></i>
      <div class="info">
        <h4>Berita</h4>
        <p><b><?php echo count($berita) ?></b></p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="widget-small info"><i class="icon fa fa-image fa-3x"></i>
      <div class="info">
        <h4>Galery</h4>
        <p><b><?php echo count($galeri) ?></b></p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="widget-small primary"><i class="icon fa fa-line-chart fa-3x"></i>
      <div class="info">
        <h4>User</h4>
        <p><b><?php echo count($user) ?></b></p>
      </div>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-7">
    <div class="tile">
      <h4>Data Order</h4>
      <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
      <tr>
		  <th>ID</th>
          <th>Nama</th>
        <th width="20%">Paket</th>
        <th>Tanggal Sewa</th>
        <th width="17%">Aksi</th>
      </tr>
      </thead>
      <tbody>

      <?php foreach($transaksi as $transaksi) { ?>

      <tr>
		  <td><?php echo $transaksi->id_transaksi ?>
          <td><?php echo $transaksi->nama ?>

            <?php if($transaksi->status_read == 0) {
              echo '<span class="badge badge-danger">';
              echo "Order Baru";
              echo '</span>';
            }else {
              // echo '<span class="badge badge-success">';
              // echo "Ok";
              // echo '</span>';
            } ?>


          </td>
        <td><?php echo $transaksi->nama_mobil ?><br><small class="text-muted"><?php echo $transaksi->nama_paket ?></small></td>
        <td><?php echo $transaksi->tanggal_jemput ?></td>
        <td><a href="<?php echo base_url('admin/transaksi/detail_transaksi/' . $transaksi->id_transaksi) ?>" title="Edit Transaksi" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Lihat</a>
        </td>
      </tr>

      <?php } ?>

      </tbody>
      </table>
      </div>
    </div>
  </div>

  <div class="col-md-5">
    <div class="tile">
        <h4>Berita Terbaru</h4>
      <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
      <tr>
        <th>Berita</th>
        <th width="17%">Edit</th>
      </tr>
      </thead>
      <tbody>

      <?php foreach($berita as $berita) { ?>

      <tr>

        <td>
          <?php echo $berita->judul_berita ?><br>
          <span><i class="fa fa-eye"></i> <?php echo $berita->berita_views ?> Views <span><i class="fa fa-calendar"></i> <?php echo $berita->tanggal_post ?></span>
        </td>
        <td><a href="<?php echo base_url('admin/berita/edit/' .$berita->id_berita) ?>" title="Edit Berita" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

        </td>
      </tr>

      <?php } ?>

      </tbody>
      </table>
      </div>

    </div>
  </div>
