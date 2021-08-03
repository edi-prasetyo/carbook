<div class="card">
    <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <?php echo $title; ?>

        <?php include "create.php"; ?>
    </div>

    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>


    <div class="table-responsive">
        <table class="table table-flush">
            <thead class="bg-light">
                <tr>
                    <th>Durasi</th>
                    <th>Status</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lamasewa as $data) { ?>
                    <tr>
                        <td><?php echo $data->lama_sewa; ?> Hari</td>
                        <td>
                            <?php if ($data->status == 1) : ?>
                                <div class="badge badge-success badge-pill">Active</div>
                            <?php else : ?>
                                <div class="badge badge-danger badge-pill">Inactive</div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php include "update.php"; ?>
                            <?php include "delete.php"; ?>
                        </td>
                    </tr>

                <?php }; ?>


            </tbody>
        </table>
    </div>

</div>