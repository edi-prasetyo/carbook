<div class="container konten">
  <div class="card col-md-8 mx-auto">
    <div class="card-header">
      <div class="row">
        <div class="col-6">
          <h3>Invoice</h3>
        </div>
        <div class="col-6 text-right">
          <p class="font-weight-bold mb-1">Kode Transaksi : <?php echo $last_transaksi->kode_transaksi ?></p>
          <p class="text-muted">Tanggal Transaksi : <?php echo $last_transaksi->tanggal_transaksi ?></p>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <p class="font-weight-bold mb-4">Info pembayaran</p>
          <?php foreach($info as $info){?>
            <p class="mb-1"><span class="text-muted">Nama Bank: </span> <?php echo $info->nama_bank;?></p>
            <p class="mb-1"><span class="text-muted">Nomor Rek : </span> <?php echo $info->nomor_rek;?></p>
            <p class="mb-1"><span class="text-muted">Cabang : </span> <?php echo $info->cabang;?></p>
            <p class="mb-1"><span class="text-muted">Atas Nama : </span> <?php echo $info->atas_nama;?></p>
          <?php } ?>
        </div>
        <div class="col-md-6 text-right">
          <p class="font-weight-bold mb-4">Info Pemesan</p>
          <?php echo $last_transaksi->nama ?><br>
          <?php echo $last_transaksi->email ?><br>
          <?php echo $last_transaksi->telp ?><br>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Paket</th>
              <th scope="col">Lama Sewa</th>
              <th scope="col">Harga</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> <?php echo $last_transaksi->nama_mobil ?><br><small class="text-muted"><?php echo $last_transaksi->nama_paket ?></small> </td>
              <td><?php echo $last_transaksi->lama_sewa ?> Hari</td>
              <td>@ Rp <?php echo number_format($last_transaksi->harga,'0',',','.') ?> </td>
              <td>Rp. <?php echo number_format($last_transaksi->harga*$last_transaksi->lama_sewa,'0',',','.') ?></td>
            </tr>
          </tbody>
        </table>
        <div class="col-md-8">
          <p class="font-weight-bold mb-4">Info Penjemputan</p>
          Alamat jemput : <?php echo $last_transaksi->alamat_jemput ?><br>
          Tanggal Jemput : <?php echo $last_transaksi->tanggal_jemput ?><br>
          Jam : <?php echo $last_transaksi->jam_jemput ?> WIB<br>
        </div>
        <div class="col-md-4">
          <p class="font-weight-bold mb-4">Status Pembayaran</p>
          <?php if ($last_transaksi->status_bayar == 'Pending') { ?>
            <small><i class='fa fa-circle text-warning'></i></small> <?php echo $last_transaksi->status_bayar; ?>
          <?php } elseif ($last_transaksi->status_bayar == 'Lunas') { ?>
            <small><i class="fa fa-circle text-success"></i></small> <?php echo $last_transaksi->status_bayar ?>
          <?php } elseif ($last_transaksi->tipe_pembayaran == 'Cash') { ?>
            <small><i class="fa fa-circle text-danger"></i></small> <?php echo $last_transaksi->status_bayar ?><br>
          <?php } else { ?>
            <small><i class="fa fa-circle text-danger"></i></small> <?php echo $last_transaksi->status_bayar ?><br>
            <a class="btn btn-success" href="<?php echo base_url('transaksi/konfirmasi/') . $last_transaksi->id_transaksi; ?>">Konfirmasi Pembayaran</a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="card-footer text-center">
      Terima Kasih Telah memnggunakan Jasa layanan Transportasi <?php echo $site_info->namaweb ?>
      Untuk Informasi Layanan Pelanggan Silahkan Hubungi Customer Service Kami di <br>
      <i class="fa fa-phone"> </i> <?php echo $site_info->telepon ?> atau <i class="fab fa-whatsapp"> </i>  <?php echo $site_info->whatsapp ?>
    </div>
  </div>
</div>
