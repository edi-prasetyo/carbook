<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow-sm bg-info text-white">
            <div class="card-header text-xs font-weight-bold text-uppercase">Transaksi</div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">

                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($transaksi); ?></div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                            <a href="<?php echo base_url('admin/transaksi'); ?>" style="color:#fff;text-decoration:none;">
                                <span class="text-white mr-2"><i class="fas fa-arrow-right"></i> </span>
                                <span>Lihat Data Transaksi</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi-clipboard-data mr-3 text-white fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100 bg-success text-white">
            <div class="card-header text-xs font-weight-bold text-uppercase">Admin</div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($count_user); ?></div>
                        <div class="text-muted text-xs">
                            <a href="<?php echo base_url('admin/user'); ?>" style="color:#fff;text-decoration:none;">
                                <span class="text-white mr-2"><i class="fas fa-arrow-right"></i> </span>
                                <span>Lihat Data Admin</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi-person fa-4x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100 bg-danger text-white">
            <div class="card-header text-xs font-weight-bold text-uppercase">Member</div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo count($user_member); ?></div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                            <a href="<?php echo base_url('admin/member'); ?>" style="color:#fff;text-decoration:none;">
                                <span class="text-white mr-2"><i class="fas fa-arrow-right"></i> </span>
                                <span>Lihat Data Member</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi-people fa-4x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice Example -->
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header bg-white py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Terbaru</h6>
                <a class="m-0 float-right btn btn-danger btn-sm" href="<?php echo base_url('admin/transaksi'); ?>">Lihat Semua <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead">
                        <tr>
                            <th>Tanggal</th>
                            <th>Customer</th>
                            <th>No Hp</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($new_transaksi as $new_transaksi) : ?>
                            <tr>
                                <td><?php echo date('d/m/Y', strtotime($new_transaksi->date_created)); ?></td>
                                <td><?php echo $new_transaksi->user_name; ?></td>
                                <td><?php echo $new_transaksi->user_phone; ?></td>
                                <td>
                                    <?php if ($new_transaksi->status_bayar == 'Pending') : ?>
                                        <div class="badge badge-warning"><?php echo $new_transaksi->status_bayar; ?></div>
                                    <?php elseif ($new_transaksi->status_bayar == 'Process') : ?>
                                        <div class="badge badge-primary"><?php echo $new_transaksi->status_bayar; ?></div>
                                    <?php elseif ($new_transaksi->status_bayar == 'Done') : ?>
                                        <div class="badge badge-success"><?php echo $new_transaksi->status_bayar; ?></div>
                                    <?php else : ?>
                                        <div class="badge badge-danger"><?php echo $new_transaksi->status_bayar; ?></div>
                                    <?php endif; ?>
                                </td>
                                <td><a href="<?php echo base_url('admin/transaksi/detail/') . $new_transaksi->id; ?>" class="btn btn-sm btn-primary" target="blank">Detail</a></td>
                            </tr>

                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>

            <div class="card-footer"></div>
        </div>
    </div>
    <!-- Message From Customer-->

</div>
<!--Row-->