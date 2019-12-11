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
<a href="<?php echo base_url('admin/galeri/tambah') ?>" title="Tambah Galeri baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
</p>

<hr>

<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Gambar</th>
  <th width="15%">Judul Galeri</th>
  <th>Posisi</th>
  <th>Website</th>
  <th>Penulis</th>
  <th>Tanggal</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>


<?php $i=1; foreach($galeri as $galeri) { ?>



<tr>
  <td><?php echo $i ?></td>
  <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" width="60"
    class="img img-thumbnail"></td>
  <td><?php echo $galeri->judul_galeri ?></td>
  <td><?php echo $galeri->posisi_galeri ?></td>
  <td><?php echo $galeri->website ?></td>
  <td><?php echo $galeri->nama ?></td>
  <td><?php echo $galeri->tanggal_post ?></td>
  <td><a href="<?php echo base_url('admin/galeri/edit/' .$galeri->id_galeri) ?>" title="Edit Galeri" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>

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
