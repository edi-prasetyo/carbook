<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($transaksi); ?></div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                            <a href="<?php echo base_url('admin/transaksi'); ?>" style="color:#333;text-decoration:none;">
                                <span class="text-info mr-2"><i class="fas fa-arrow-right"></i> </span>
                                <span>Lihat Data Transaksi</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-bag fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Products</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($products); ?></div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                            <a href="<?php echo base_url('admin/products'); ?>" style="color:#333;text-decoration:none;">
                                <span class="text-primary mr-2"><i class="fas fa-arrow-right"></i> </span>
                                <span>Lihat Data Produk</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Category Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($category_products); ?></div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                            <a href="<?php echo base_url('admin/category_products'); ?>" style="color:#333;text-decoration:none;">
                                <span class="text-success mr-2"><i class="fas fa-arrow-right"></i> </span>
                                <span>Lihat Data Category Products</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tag fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Reseller</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo count($user_seller); ?></div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                            <a href="<?php echo base_url('admin/seller'); ?>" style="color:#333;text-decoration:none;">
                                <span class="text-info mr-2"><i class="fas fa-arrow-right"></i> </span>
                                <span>Lihat Data Seller</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice Example -->
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Terbaru</h6>
                <a class="m-0 float-right btn btn-danger btn-sm" href="<?php echo base_url('admin/transaksi'); ?>">Lihat Semua <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
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
                            <td><?php echo date('d F Y', $new_transaksi->date_created); ?></td>
                                <td><?php echo $new_transaksi->user_name; ?></td>
                                <td><?php echo $new_transaksi->user_phone; ?></td>
                                <td>
                                <?php if ($new_transaksi->type_transaksi == 'Jual') :?>
                                <div class="badge badge-success"><?php echo $new_transaksi->type_transaksi; ?></div>
                            <?php else:?>
                                <div class="badge badge-danger"><?php echo $new_transaksi->type_transaksi; ?></div>
                            <?php endif;?>
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
    <div class="col-xl-4 col-lg-5 ">
        <div class="card">
            <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-light">Reseller Terbaru</h6>
            </div>
            <div>
                <?php foreach ($user_seller as $user_seller) : ?>
                    <div class="customer-message align-items-center">
                        <a class="font-weight-bold" href="<?php echo base_url('admin/user/detail/' .$user_seller->id);?> ">
                            <div class="text-truncate message-title"><?php echo $user_seller->user_name; ?></div>
                            <div class="small text-gray-500 message-time font-weight-bold">
                                No Hp : <?php echo $user_seller->user_phone; ?> · Aktif Sejak : <?php echo date('d F Y', $user_seller->date_created); ?>
                                <br>Status : <?php if ($user_seller->is_active == 1) : ?>
                                        <span class="badge badge-success">Aktif</span>
                                    <?php else : ?>
                                        <span class="badge badge-danger">Nonaktif</span>
                                    <?php endif; ?>
                            </div>
                            
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!--Row-->