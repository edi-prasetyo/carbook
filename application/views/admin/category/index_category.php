<div class="card shadow">
    <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <?php echo $title; ?>

        <?php include "create_category.php"; ?>
    </div>

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
        <table class="table table-flush">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $category) { ?>
                    <tr>
                        <td><?php echo $category->category_name; ?></td>
                        <td><?php echo date('D, d F Y', $category->date_created); ?> <?php echo date('H:i', $category->date_created); ?></td>
                        <td>
                            <?php include "update_category.php"; ?>
                            <?php include "delete_category.php"; ?>
                        </td>
                    </tr>

                <?php }; ?>


            </tbody>
        </table>
    </div>

</div>