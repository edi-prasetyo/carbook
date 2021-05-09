<!-- Invoice Example -->
<?php
//Notifikasi
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>';
    echo $this->session->flashdata('message');
    echo '</div>';
}
echo validation_errors('<div class="alert alert-warning">', '</div>');

?>

<div class="mb-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <?php echo $title; ?>
            <a href="<?php echo base_url('admin/layanan/create'); ?>" class="btn btn-success btn-sm text-white">Buat Layanan baru</a>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Layanan</th>
                        <th>Warna Icon</th>
                        <th>Icon</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($layanan as $layanan) : ?>
                        <tr>
                            <td class="text-info"><?php echo $no; ?></td>
                            <td><?php echo $layanan->layanan_name; ?></td>
                            <td>
                                <div style="color:<?php echo $layanan->layanan_color; ?>"> <i class="ri-focus-fill"></i></div>
                            </td>
                            <td><?php echo $layanan->layanan_icon; ?></td>

                            <td>
                                <a href="<?php echo base_url('admin/layanan/update/' . $layanan->id); ?>" class="btn btn-sm btn-success text-white"><i class="ti-edit"></i> Edit</a>
                                <?php include "delete_layanan.php"; ?>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>

                </tbody>
            </table>
        </div>
        <div class="card-footer"></div>
    </div>
</div>