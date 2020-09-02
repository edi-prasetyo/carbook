<div class="card">
    <div class="card-header">
        <div class="card-header-left">
            <h5><?php echo $title; ?></h5>
        </div>
        <div class="card-header-right">
<a class="btn btn-primary" href="<?php echo base_url('admin/buyback/create');?>"> Buat Produk Buyback</a>
        </div>

    </div>
    <div class="card-body">
        <?php
        //Notifikasi
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success alert-dismissable fade show">';
            echo '<button class="close" data-dismiss="alert" aria-label="Close">×</button>';
            echo $this->session->flashdata('message');
            echo '</div>';
        }
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        ?>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga Buyback</th>                   
                        <th>Type</th>                   
                        <th>Views</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($buyback as $buyback) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $buyback->buyback_name; ?></td>
                        <td>Rp. <?php echo number_format($buyback->buyback_price,'0',',','.'); ?></td>                       
                        <td><?php echo $buyback->category_buy_name; ?></td>
                        <td><?php echo $buyback->buyback_views; ?></td>
                        <td>
                            <a href="<?php echo base_url('buyback/detail/' . $buyback->buyback_slug); ?>" class="btn btn-primary btn-sm" target="blank"><i class="fas fa-external-link-alt"></i> Lihat</a>
                            <a href="<?php echo base_url('admin/buyback/update/' . $buyback->id); ?>" class="btn btn-success btn-sm"><i class="far fa-edit"></i> Edit</a>
                            <?php include "delete_buyback.php"; ?>
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
</div>