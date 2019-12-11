<div class="tile">
  <div class="tile-title-w-btn">
    <h3 class="title"><?php echo $title ?></h3>
  </div>

  <?php
  //Notifikasi
  if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success custom-alert">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }

  ?>

  <p>
    <a href="<?php echo base_url('admin/transaksi/tambah') ?>" title="Tambah Transaksi baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
  </p>

  <hr>
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th width="5%">No</th>
          <th>kode Transaksi</th>
          <th>Nama</th>
          <th>tanggal Jemput</th>
          <th>Paket</th>
			<th>Lama Sewa</th>
          <th>Pembayaran</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php $i = 1;
        foreach ($transaksi as $transaksi) { ?>

          <tr>
            <td><?php echo $i ?></td>
            <td><span class="text-muted"><?php echo $transaksi->kode_transaksi ?></span></td>
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
            <td><?php echo $transaksi->tanggal_jemput; ?></td>
            <td><strong><?php echo $transaksi->nama_mobil ?></strong><br><small class="text-muted"><?php echo $transaksi->nama_paket ?></small></td>
			  <td><?php echo $transaksi->lama_sewa; ?> Hari</td>
            
            <td><?php echo $transaksi->tipe_pembayaran ?></td>
            <td>
              <?php if ($transaksi->status_bayar == 'Pending') { ?>
                <small><i class='fa fa-circle text-warning'></i></small> <?php echo $transaksi->status_bayar; ?>
              <?php } elseif ($transaksi->status_bayar == 'Lunas') { ?>
                <small><i class="fa fa-circle text-success"></i></small> <?php echo $transaksi->status_bayar ?>
              <?php } else { ?>
                <small><i class="fa fa-circle text-danger"></i></small> <?php echo $transaksi->status_bayar ?>
              <?php } ?>
            </td>

            <td><a href="<?php echo base_url('admin/transaksi/detail_transaksi/' . $transaksi->id_transaksi) ?>" title="Edit Transaksi" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a>






            </td>
          </tr>

          <?php $i++;
        } ?>

      </tbody>
    </table>
  </div>
</div>
