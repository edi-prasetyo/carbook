<div class="card">
    <div class="card-header">
        <div class="card-header-left">
            <h5><?php echo $title; ?></h5>
        </div>
        <div class="card-header-right">

        </div>

    </div>

    <?php
    //Notifikasi
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    echo validation_errors('<div class="alert alert-warning">', '</div>');

    ?>

    <div class="table-responsive">
        <table class="table table-flush">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pakai</th>
                    <th>Nama Mobil</th>
                    <th>Customer</th>
                    <th>Paket</th>
                    <th>Lama Sewa</th>
                    <th>Ststus</th>
                    <th>Payment</th>
                    <th>Harga</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($transaksi as $transaksi) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $transaksi->tanggal_jemput; ?></td>
                    <td><?php echo $transaksi->nama_mobil; ?></td>
                    <td><?php echo $transaksi->user_name; ?></td>
                    <td><?php echo $transaksi->nama_paket; ?> </td>
                    <td><?php echo $transaksi->lama_sewa; ?> Hari</td>
                    <td>
                        <?php if ($transaksi->status_bayar == "Pending") : ?>
                            <div class="badge badge-warning badge-pill"> <?php echo $transaksi->status_bayar; ?></div>
                        <?php elseif ($transaksi->status_bayar == "Process") : ?>
                            <div class="badge badge-info badge-pill"> <?php echo $transaksi->status_bayar; ?></div>
                        <?php elseif ($transaksi->status_bayar == "Cancel") : ?>
                            <div class="badge badge-danger badge-pill"> <?php echo $transaksi->status_bayar; ?></div>
                        <?php else : ?>
                            <div class="badge badge-success badge-pill"> <?php echo $transaksi->status_bayar; ?></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($transaksi->tipe_pembayaran == "Cash") : ?>
                            <div class="text-danger"> <?php echo $transaksi->tipe_pembayaran; ?></div>
                        <?php else : ?>
                            <div class="text-info"> <?php echo $transaksi->tipe_pembayaran; ?></div>
                        <?php endif; ?>
                    </td>
                    <td>Rp. <?php
                            echo number_format($transaksi->total_harga, '0', ',', '.'); ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/transaksi/detail/' . $transaksi->id); ?>" class="btn btn-primary btn-sm"><i class="fas fa-external-link-alt"></i> Lihat</a>
                    </td>
                </tr>
            <?php $no++;
            }; ?>
        </table>
        <hr>
        <div class="pagination col-md-12 text-center">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>
    </div>

</div>