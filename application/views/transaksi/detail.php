<div class="container konten">
  <div class="card col-md-8 mx-auto">
    <?php if ($detail_transaksi !== null) { ?>
      <div class="card-header">
        <div class="row">
          <div class="col-6">
            <h3>Invoice</h3>
          </div>
          <div class="col-6 text-right">
            <p class="font-weight-bold mb-1">Kode Transaksi : <?php echo $detail_transaksi->kode_transaksi ?></p>
            <p class="text-muted">Tanggal Transaksi : <?php echo $detail_transaksi->tanggal_transaksi ?></p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <?php foreach($info as $info){?>
              <p class="font-weight-bold mb-4">Info pembayaran</p>
              <p class="mb-1"><span class="text-muted">Bank : </span> <?php echo $info->nama_bank;?></p>
              <p class="mb-1"><span class="text-muted">Nomor Rek.: </span> <?php echo $info->nomor_rek;?></p>
              <p class="mb-1"><span class="text-muted">KCP : </span> <?php echo $info->cabang;?></p>
              <p class="mb-1"><span class="text-muted">Atas Nama : </span> <?php echo $info->atas_nama;?></p>
            <?php } ?>
          </div>
          <div class="col-md-6 text-right">
            <p class="font-weight-bold mb-4">Info Pemesan</p>
            <?php echo $detail_transaksi->nama ?><br>
            <?php echo $detail_transaksi->email ?><br>
            <?php echo $detail_transaksi->telp ?><br>
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
                <td> <?php echo $detail_transaksi->nama_mobil ?><br><small class="text-muted"><?php echo $detail_transaksi->nama_paket ?></small> </td>
                <td><?php echo $detail_transaksi->lama_sewa ?> Hari</td>
                <td>@Rp. <?php echo number_format($detail_transaksi->harga,'0',',','.') ?></td>
                <td>Rp. <?php echo number_format($detail_transaksi->harga*$detail_transaksi->lama_sewa,'0',',','.') ?></td>
              </tr>
            </tbody>
          </table>
          <div class="col-md-8">
            <p class="font-weight-bold mb-4">Info Penjemputan</p>
            Alamat jemput : <?php echo $detail_transaksi->alamat_jemput ?><br>
            Tanggal Jemput : <?php echo $detail_transaksi->tanggal_jemput ?><br>
            Jam : <?php echo $detail_transaksi->jam_jemput ?> WIB<br>
          </div>
          <div class="col-md-4">
            <p class="font-weight-bold mb-4">Status Pembayaran</p>
            <?php if ($detail_transaksi->status_bayar == 'Pending') { ?>
              <small><i class='fa fa-circle text-warning'></i></small> <?php echo $detail_transaksi->status_bayar; ?>
            <?php } elseif ($detail_transaksi->status_bayar == 'Lunas') { ?>
              <small><i class="fa fa-circle text-success"></i></small> <?php echo $detail_transaksi->status_bayar ?>
            <?php } elseif ($detail_transaksi->tipe_pembayaran == 'Cash') { ?>
              <small><i class="fa fa-circle text-danger"></i></small> <?php echo $detail_transaksi->status_bayar ?><br>
            <?php } else { ?>
              <small><i class="fa fa-circle text-danger"></i></small> <?php echo $detail_transaksi->status_bayar ?><br>
              <a class="btn btn-success" href="<?php echo base_url('transaksi/konfirmasi/') . $detail_transaksi->id_transaksi; ?>">Konfirmasi Pembayaran</a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="card-footer text-center">
        Terima Kasih Telah memnggunakan Jasa layanan Transportasi <?php echo $site_info->namaweb ?>
        Untuk Informasi Layanan Pelanggan Silahkan Hubungi Customer Service Kami di <br>
        <i class="fa fa-phone"> </i> <?php echo $site_info->telepon ?> atau <i class="fab fa-whatsapp"> </i>  <?php echo $site_info->whatsapp ?>
      </div>
    <?php } else { ?>
      <div class="card-header">
        <div class="row">
          <div class="col-6">
            <h3>Invoice</h3>
          </div>
          <div class="col-6 text-right">
            <p class="font-weight-bold mb-1">Kode Transaksi : Tidak Di temukan</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          Kode Transaksi Tidak Di temukan, Pastikan Anda memasukan kode transaksi dan email dengan Benar
        </div>
      </div>
      <div class="card-footer text-center">
        Terima Kasih Telah memnggunakan Jasa layanan Transportasi <?php echo $site_info->namaweb ?>
        Untuk Informasi Layanan Pelanggan Silahkan Hubungi Customer Service Kami di <br>
        <i class="fa fa-phone"> </i> <?php echo $site_info->telepon ?> atau <i class="fab fa-whatsapp"> </i>  <?php echo $site_info->whatsapp ?>
      </div>
    <?php } ?>
  </div>
</div>
