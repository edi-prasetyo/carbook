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
            <thead class="thead-light">
                <tr>
                    <th>Nama Kategori</th>

                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($merek as $data) { ?>
                    <tr>
                        <td><?php echo $data->merek_name; ?></td>
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