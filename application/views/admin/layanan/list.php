<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">Data Layanan</h3>
     </div>

<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

 ?>

<p>
<a href="<?php echo base_url('admin/layanan/tambah') ?>" title="Tambah Layanan baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
</p>

<hr>

<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Gambar</th>
  <th>Nama Layanan</th>
  <th>Status</th>
  <th>Penulis</th>
  <th>Tanggal</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody>


<?php $i=1; foreach($layanan as $layanan) { ?>



<tr>
  <td><?php echo $i ?></td>
  <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$layanan->gambar) ?>" width="60"
    class="img img-thumbnail"></td>
  <td><?php echo $layanan->judul_layanan ?></td>
  <td><?php echo $layanan->status_layanan ?></td>
  <td><?php echo $layanan->nama ?></td>
  <td><?php echo $layanan->tanggal_post ?></td>
  <td><a href="<?php echo base_url('admin/layanan/edit/' .$layanan->id_layanan) ?>" title="Edit Layanan" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>

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
