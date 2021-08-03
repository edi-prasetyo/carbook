<div class="card">
    <div class="card-header">
        <?php echo $title; ?>
    </div>

    <?php
    //Notifikasi
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    echo validation_errors('<div class="alert alert-warning">', '</div>');

    ?>

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Sewa</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Mobil</th>
                    <th>Customer</th>
                    <th>Harga</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($transaksi as $data) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>
                        <b><?php echo $data->tanggal_jemput; ?></b> <br>
                        <?php echo $data->jam_jemput; ?> WIB
                    </td>
                    <td>
                        <b><?php echo $data->kode_transaksi; ?></b><br>
                        <?php if ($data->status_bayar == "Pending") : ?>
                            <div class="badge badge-warning badge-pill"> <?php echo $data->status_bayar; ?></div>
                        <?php elseif ($data->status_bayar == "Process") : ?>
                            <div class="badge badge-info badge-pill"> <?php echo $data->status_bayar; ?></div>
                        <?php elseif ($data->status_bayar == "Cancel") : ?>
                            <div class="badge badge-danger badge-pill"> <?php echo $data->status_bayar; ?></div>
                        <?php else : ?>
                            <div class="badge badge-success badge-pill"> <?php echo $data->status_bayar; ?></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <b><?php echo $data->nama_mobil; ?></b><br>
                        <?php echo $data->nama_paket; ?>
                    </td>
                    <td>
                        <?php echo $data->user_name; ?><br>
                        <?php echo $data->lama_sewa; ?> Hari
                    </td>



                    <td>
                        <b> Rp. <?php echo number_format($data->total_harga, '0', ',', '.'); ?></b><br>
                        <?php if ($data->tipe_pembayaran == "Cash") : ?>
                            <div class="text-danger"> <?php echo $data->tipe_pembayaran; ?></div>
                        <?php else : ?>
                            <div class="text-info"> <?php echo $data->tipe_pembayaran; ?></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('admin/transaksi/detail/' . $data->id); ?>" class="btn btn-primary btn-sm"><i class="fas fa-external-link-alt"></i> Lihat</a>
                    </td>
                </tr>
            <?php $no++;
            }; ?>
        </table>


    </div>

    <div class="card-footer bg-white">
        <div class="pagination col-md-12">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>
    </div>

</div>