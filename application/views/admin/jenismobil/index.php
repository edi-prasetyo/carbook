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
        <table class="table table-flush" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
                <tr>
                    <th>Nama Jenis Mobil</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jenismobil as $data) { ?>
                    <tr>
                        <td><?php echo $data->jenismobil_name; ?></td>

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