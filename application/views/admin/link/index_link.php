<div class="card">
    <div class="card-header d-flex flex-row align-items-center justify-content-between">

        <?php echo $title; ?>
        <a href="<?php echo base_url('admin/link/create'); ?>" class="btn btn-rounded btn-info text-white">Tambah Link</a>

    </div>

    <?php
    //Notifikasi
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('message');
        echo '</div>';
    }

    ?>

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead>
                <tr>
                    <th>Nama Link</th>
                    <th>Url</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($list_link as $link) { ?>
                <tr>
                    <td><?php echo $link->link_name; ?></td>
                    <td><?php echo $link->link_url; ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/link/update/') . $link->id; ?>" class="btn btn-info btn-sm text-white"> Ubah</a>
                        <?php include "delete_link.php"; ?>
                    </td>
                </tr>

            <?php }; ?>
        </table>
    </div>
</div>