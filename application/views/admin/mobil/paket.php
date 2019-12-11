<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title"><?php echo $title?></h3>
        <?php echo $mobil->nama_mobil; ?>
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
include('tambahpaket.php');

 ?>

<hr>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Gambar</th>
  <th>Nama Paket</th>
  <th>Harga</th>
  <th>Edit</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($paket as $paket) { ?>

<tr>
  <td><?php echo $i ?></td>
  <td><img src="<?php echo base_url('assets/upload/car/thumbs/'.$mobil->gambar) ?>" width="60"
    class="img img-thumbnail"></td>
  <td><?php echo $paket->nama_paket ?></td>
  <td>Rp. <?php echo number_format($paket->harga,'0',',',','); ?></td>
  <td>
    <a href="<?php echo base_url('admin/mobil/editpaket/' .$paket->id_paket) ?>" title="Edit Mobil" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
      <?php
      //link Delete
      include('delete_paket.php');
      ?>



  </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
