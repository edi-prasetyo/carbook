<div class="card">
    <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <?php echo $title; ?>

        <?php include "create_merek.php"; ?>
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
            <thead class="thead-light">
                <tr>
                    <th>Nama Kategori</th>

                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($merek as $merek) { ?>
                    <tr>
                        <td><?php echo $merek->merek_name; ?></td>

                        <td>
                            <?php include "update_merek.php"; ?>
                            <?php include "delete_merek.php"; ?>
                        </td>
                    </tr>

                <?php }; ?>


            </tbody>
        </table>
    </div>

</div>