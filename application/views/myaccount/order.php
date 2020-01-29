<h1 class="cat-judul text-center"><?php echo $title ?></h1>

<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>
    <div class="row">
        <div class="col-md-3">
            <?php include "sidebar.php"; ?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    History Order
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kode Transaksi</th>
                                        <th>Mobil</th>
                                        <th>Pembayaran</th>
                                        <th>Tanggal</th>
                                        <th width="23%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $transaksi) {; ?>



                                        <tr>
                                            <td><?php echo $transaksi->kode_transaksi; ?></td>
                                            <td><?php echo $transaksi->nama_mobil; ?></td>
                                            <td><?php echo $transaksi->status_bayar; ?></td>
                                            <td><?php echo $transaksi->tanggal_jemput; ?></td>
                                            <td><a href="" title="Edit Berita" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                <?php
                                                //link Delete
                                                include('delete.php');
                                                ?>

                                                <a href="" title="" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i> Lihat</a>

                                            </td>
                                        </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>











                    </div>
                </div>
            </div>
        </div>
    </div>
</div>