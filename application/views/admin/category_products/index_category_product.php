<div class="card shadow">
    <div class="card-header">
        <h3><?php echo $title; ?></h3>
        <hr>
        <?php include "create_category_product.php"; ?>
    </div>
    <div class="card-body">
        <?php
        //Notifikasi
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success">';
            echo $this->session->flashdata('message');
            echo '</div>';
        }
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        ?>
        <div class="table-responsive">
            <table class="table table-bordered zero-configuration" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>Nama Kategori</th>
                      
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($category_products as $category_products) { ?>
                        <tr>
                            <td><?php echo $category_products->category_product_name; ?></td>
                 
                            <td>
                                <?php include "update_category_product.php"; ?>
                                <?php include "delete_category_product.php"; ?>
                            </td>
                        </tr>

                    <?php }; ?>


                </tbody>
            </table>
        </div>
    </div>
</div>