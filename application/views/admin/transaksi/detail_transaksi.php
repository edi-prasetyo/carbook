<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Invoice</h3>
                    <?php if ($detail_transaksi->status_bayar == 'Pending') { ?>
                        <small><i class='fa fa-circle text-warning'></i></small> <?php echo $detail_transaksi->status_bayar; ?>
                    <?php } elseif ($detail_transaksi->status_bayar == 'Lunas') { ?>
                        <small><i class="fa fa-circle text-success"></i></small> <?php echo $detail_transaksi->status_bayar ?>
                    <?php } else { ?>
                        <small><i class="fa fa-circle text-danger"></i></small> <?php echo $detail_transaksi->status_bayar ?><br>
                    <?php } ?>
                </div>
                <div class="col-6 text-right">
                    <p class="font-weight-bold mb-1">Kode Transaksi : <?php echo $detail_transaksi->kode_transaksi ?></p>
                    <p class="text-muted">Tanggal Transaksi : <?php echo $detail_transaksi->tanggal_transaksi ?></p>

                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <p class="font-weight-bold mb-4">Info Pemesan</p>
                    <i class="fa fa-user fa-fw mr-2"></i> <?php echo $detail_transaksi->nama ?><br>
                    <i class="fa fa-envelope fa-fw mr-2"></i> <?php echo $detail_transaksi->email ?><br>
                    <i class="fa fa-phone fa-fw mr-2"></i> <?php echo $detail_transaksi->telp ?><br>
                </div>
                <div class="col-8 text-right">
                    <p class="font-weight-bold mb-4">Info Penjemputan</p>
                    Alamat jemput : <?php echo $detail_transaksi->alamat_jemput ?><br>
                    Tanggal Jemput : <?php echo $detail_transaksi->tanggal_jemput ?><br>
                    Jam : <?php echo $detail_transaksi->jam_jemput ?> WIB<br>
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
							<td>@ Rp.<?php echo number_format($detail_transaksi->harga,'0',',',',') ?></td>
                            <td>Rp. <?php echo number_format($detail_transaksi->harga*$detail_transaksi->lama_sewa,'0',',',',') ?></td>
							
                        </tr>
                    </tbody>
                </table>

                <?php if ($detail_transaksi->status_bayar == 'Belum' && $detail_transaksi->tipe_pembayaran == 'Transfer') { ?>

                <?php } elseif ($detail_transaksi->status_bayar == 'Belum' || $detail_transaksi->status_bayar == 'Cash') { ?>
                    <a href="<?php echo base_url('admin/transaksi/konfirmasi_cash/') . $detail_transaksi->id_transaksi; ?>" class="btn btn-primary">Konfirmed</a>
                    <a href="<?php echo base_url('admin/transaksi/konfirmasi_cancel/') . $detail_transaksi->id_transaksi; ?>" class="btn btn-danger ml-3">Cancel</a>

                <?php } elseif ($detail_transaksi->status_bayar == 'Pending' && $detail_transaksi->tipe_pembayaran == 'Transfer') { ?>
                    <div class="col-4">
                        <h4>Konfirmasi Pembayaran</h4>
                        <p>Pembayaran dari Rekening : <strong><?php echo $detail_transaksi->nama_bank; ?></strong></p>
                        <p>Pembayaran Ke Rekening : <strong><?php echo $detail_transaksi->rek_pembayaran; ?></strong></p>
                        <p>Nomor Rekening : <strong><?php echo $detail_transaksi->rek_pelanggan; ?></strong></p>
                        <p>Atas Nama : <strong><?php echo $detail_transaksi->nama_pemilik; ?></strong></p>

                    </div>
                    <div class="col-4">
                        <h4>Bukti Pembayaran</h4>
                        <img class="img-fluid" src="<?php echo base_url('assets/upload/struk/') . $detail_transaksi->bukti_bayar; ?>">
                    </div>
                    <div class="col-7">
                        <a href="<?php echo base_url('admin/transaksi/konfirmasi_transfer/') . $detail_transaksi->id_transaksi; ?>" class="btn btn-primary">Konfirmed</a>
                        <a href="<?php echo base_url('admin/transaksi/konfirmasi_cancel/') . $detail_transaksi->id_transaksi; ?>" class="btn btn-danger ml-3">Cancel</a>
                    </div>

                <?php } elseif($detail_transaksi->status_bayar == 'Pending') { ?>
	<a href="<?php echo base_url('admin/transaksi/konfirmasi_selesai/') . $detail_transaksi->id_transaksi; ?>" class="btn btn-success ml-3">Selesai</a>
                <?php }else{ ?>
				<?php } ?>
            </div>

            <p class="text-muted">Tipe Pembayaran : <?php echo $detail_transaksi->tipe_pembayaran ?></p>

        </div>
        <div class="card-footer text-center">
            Terima Kasih Telah menggunakan Jasa layanan Transportasi
        </div>
    </div>
</div>
