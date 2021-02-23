<div class="card">
    <div class="card-body">



        <!-- title row -->

        <!-- info row -->
        <div class="row">

            <div class="col-sm-6">
                <address>
                    <strong><?php echo $transaksi->user_name; ?> </strong> <br>
                    Alamat Jemput : <?php echo $transaksi->alamat_jemput; ?> <br>
                    Phone : <?php echo $transaksi->user_phone; ?> <br>
                    Email : <?php echo $transaksi->user_email; ?>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <b>Invoice #<?php echo $transaksi->kode_transaksi; ?></b><br>
                <b>Tanggal jemput :</b> <?php echo $transaksi->tanggal_jemput; ?><br>
                <b>Tipe Pembayaran :</b> <?php echo $transaksi->tipe_pembayaran; ?><br>
                <b>Status Pembayaran :</b> <?php if ($transaksi->status_bayar == "Pending") : ?>
                    <div class="badge badge-warning badge-pill"> <?php echo $transaksi->status_bayar; ?></div>
                <?php elseif ($transaksi->status_bayar == "Process") : ?>
                    <div class="badge badge-info badge-pill"> <?php echo $transaksi->status_bayar; ?></div>
                <?php elseif ($transaksi->status_bayar == "Cancel") : ?>
                    <div class="badge badge-danger badge-pill"> <?php echo $transaksi->status_bayar; ?></div>
                <?php else : ?>
                    <div class="badge badge-success badge-pill"> <?php echo $transaksi->status_bayar; ?></div>
                <?php endif; ?>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Paket Kendaraan</th>

                            <th>Harga</th>
                            <th>Kode Unik</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td><strong><?php echo $transaksi->nama_mobil; ?></strong><br>
                                <small><?php echo $transaksi->nama_paket; ?> , <?php echo $transaksi->lama_sewa; ?> Hari </small>
                            </td>

                            <td>IDR. <?php echo number_format($transaksi->harga_satuan, 0, ",", "."); ?></td>
                            <td><?php echo $transaksi->kode_unik; ?></td>
                            <td>IDR. <?php echo number_format($transaksi->total_harga, 0, ",", "."); ?></td>
                        </tr>
                    <tfoot>
                        <tr>
                            <th> </th>

                            <th></th>
                            <th>Total</th>
                            <th>IDR. <?php echo number_format($transaksi->total_harga, 0, ",", "."); ?></th>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div><!-- /.col -->
            <hr>
            <?php if ($transaksi->tipe_pembayaran == "Cash" && $transaksi->status_bayar == "Pending") : ?>
                <a href="<?php echo base_url('admin/transaksi/process/' . $transaksi->id); ?>" class="btn btn-success pull-right"><i class="fa fa-check"></i> Konfirmasi Order</a>
                <a href="<?php echo base_url('admin/transaksi/cancel/' . $transaksi->id); ?>" class="btn btn-danger pull-right"><i class="fa fa-times"></i> Batalkan Pesanan</a>
            <?php elseif ($transaksi->tipe_pembayaran == "Cash" && $transaksi->status_bayar == "Process") : ?>
                <a href="<?php echo base_url('admin/transaksi/cancel/' . $transaksi->id); ?>" class="btn btn-danger pull-right"><i class="fa fa-times"></i> Batalkan Pesanan</a>
                <a href="<?php echo base_url('admin/transaksi/confirm/' . $transaksi->id); ?>" class="btn btn-success pull-right"><i class="fa fa-times"></i> Selesai</a>
            <?php elseif ($transaksi->tipe_pembayaran == "Cash" && $transaksi->status_bayar == "Cancel") : ?>
            <?php else : ?>
                <div class="col-md-4">

                    <?php if ($transaksi->bukti_bayar == NULL) : ?>

                        <div class="alert alert-danger">Belum Ada Pembayaran</div>
                    <?php else : ?>

                        <img src="<?php echo base_url('assets/img/struk/' . $transaksi->bukti_bayar); ?>" class="img-fluid">
                    <?php endif; ?>

                </div>
                <div class="col-md-8">

                    <?php if ($transaksi->status_bayar == "Done") : ?>

                    <?php elseif ($transaksi->status_bayar == "Process") : ?>
                        <a href="<?php echo base_url('admin/transaksi/confirm/' . $transaksi->id); ?>" class="btn btn-success pull-right"><i class="fa fa-check"></i> Konfirmasi Pembayaran</a>
                        <a href="<?php echo base_url('admin/transaksi/cancel/' . $transaksi->id); ?>" class="btn btn-danger pull-right"><i class="fa fa-times"></i> Batalkan Pesanan</a>

                    <?php elseif ($transaksi->status_bayar == "Pending") : ?>
                        <a href="<?php echo base_url('admin/transaksi/confirm/' . $transaksi->id); ?>" class="btn btn-success pull-right"><i class="fa fa-check"></i> Konfirmasi Pembayaran</a>
                        <a href="<?php echo base_url('admin/transaksi/cancel/' . $transaksi->id); ?>" class="btn btn-danger pull-right"><i class="fa fa-times"></i> Batalkan Pesanan</a>
                    <?php else : ?>

                    <?php endif; ?>

                </div>
            <?php endif; ?>
        </div><!-- /.row -->


    </div>
</div>