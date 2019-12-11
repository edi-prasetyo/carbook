<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title"><?php echo $title?></h3>
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
<a href="<?php echo base_url('admin/mobil/tambah') ?>" title="Tambah Mobil baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
</p>

<hr>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
  <th width="5%">img</th>
  <th width="20%">Jenis</th>
  <th>Merek</th>
  <th>Jenis</th>
  <th>Penumpang</th>
  <th>Bagasi</th>
  <th>Harga</th>
  <th>Status</th>
  <th width="23%">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($mobil as $mobil) { ?>

<tr>
  <td><?php echo $i ?></td>
  <td><img src="<?php echo base_url('assets/upload/car/thumbs/'.$mobil->gambar) ?>" width="60"
    class="img img-thumbnail"></td>
  <td><?php echo $mobil->nama_mobil ?></td>
  <td><?php echo $mobil->nama_merek ?></td>
  <td><?php echo $mobil->nama_jenismobil ?></td>
  <td><?php echo $mobil->kap_penumpang ?></td>
  <td><?php echo $mobil->kap_bagasi ?></td>
  <td>Rp. <?php echo number_format($mobil->harga_awal,'0',',',','); ?></td>
  <td><?php echo $mobil->status_mobil ?></td>
  <td><a href="<?php echo base_url('admin/mobil/edit/' .$mobil->id_mobil) ?>" title="Edit Mobil" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
      <?php
      //link Delete
      include('delete.php');
      ?>

      <a href="<?php echo base_url('admin/mobil/paket/' .$mobil->id_mobil) ?>" title="Edit Mobil" class="btn btn-success btn-sm"><i class="fa fa-briefcase"></i> Paket</a>

  </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
