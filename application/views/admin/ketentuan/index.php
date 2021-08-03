<div class="card">
  <div class="card-header d-flex justify-content-between">
    <?php echo $title; ?>
    <a href="<?php echo base_url('admin/ketentuan/create') ?>" title="Tambah Berita baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
  </div>

  <?php
  if ($this->session->flashdata('message')) {
    echo $this->session->flashdata('message');
    unset($_SESSION['message']);
  }
  ?>


  <div class="table-responsive">
    <table class="table">
      <thead class="bg-light">
        <tr>
          <th width="5%">No</th>
          <th>Nama Ketentuan</th>
          <th>Isi</th>
          <th width="20%">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php $i = 1;
        foreach ($ketentuan as $data) { ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data->ketentuan_name ?></td>
            <td><?php echo $data->ketentuan_desc ?></td>
            <td><a href="<?php echo base_url('admin/ketentuan/update/' . $data->id) ?>" title="Edit Berita" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

              <?php
              include('delete.php');
              ?>

            </td>
          </tr>

        <?php $i++;
        } ?>

      </tbody>
    </table>
  </div>
</div>