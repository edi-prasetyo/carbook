<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">Data Merek</h3>
     </div>

<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}


//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//include Tambah
include('tambah.php');
 ?>

<br><hr>

<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Nama Merek</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($merek as $merek) { ?>
<tr>
  <td><?php echo $i ?></td>
  <td><?php echo $merek->nama_merek ?></td>
  <td><?php
      //link Delete
      include('edit.php');
      ?>

      <?php
      //link Delete
      include('delete.php');
      ?>

  </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
