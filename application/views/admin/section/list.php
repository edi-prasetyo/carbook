<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title"><?php echo $title;?></h3>
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
<a href="<?php echo base_url('admin/section/tambah') ?>" title="Tambah Section baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
</p>

<hr>

<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Gambar</th>
  <th width="15%">Judul Section</th>
  <th>Website</th>
  <th>Penulis</th>
  <th>Tanggal</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>


<?php $i=1; foreach($section as $section) { ?>



<tr>
  <td><?php echo $i ?></td>
  <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$section->gambar) ?>" width="60"
    class="img img-thumbnail"></td>
  <td><?php echo $section->judul ?></td>
  <td><?php echo $section->url ?></td>
  <td><?php echo $section->deskripsi ?></td>
  <td><?php echo $section->tanggal_post ?></td>
  <td><a href="<?php echo base_url('admin/section/edit/' .$section->id_section) ?>" title="Edit Section" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>

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
