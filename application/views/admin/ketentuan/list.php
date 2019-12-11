<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title"><?php echo $title;?></h3>
     </div>

<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}


//Error warning
echo validation_errors('<div class="alert alert-warning custom-alert">','</div>');
//include Tambah
 ?>

 <a href="<?php echo base_url('admin/ketentuan/tambah') ?>" title="Tambah Berita baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>

<br><hr>

<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Judul Halaman</th>
  <th>Isi</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($ketentuan as $ketentuan) { ?>
<tr>
  <td><?php echo $i ?></td>
  <td><?php echo $ketentuan->nama_ketentuan ?></td>
  <td><?php echo strip_tags(character_limiter($ketentuan->isi_ketentuan,100)) ?></td>
  <td><a href="<?php echo base_url('admin/ketentuan/edit/' .$ketentuan->id_ketentuan) ?>" title="Edit Berita" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

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
