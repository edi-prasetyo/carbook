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

 <a href="<?php echo base_url('admin/info/tambah') ?>" title="Tambah Berita baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>

<hr>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
    <th>Nama Bank</th>
	<th>Nomor Rekening</th>
	<th>Cabang</th>
	<th>Atas Nama</th>
	<th>Nomor Whatsapp</th>
	<th>Aksi</th>
</tr>
</thead>
<tbody>

<?php foreach($info as $info) { ?>

<tr>
    <td><?php echo $info->nama_bank ?></td>
	<td><?php echo $info->nomor_rek ?></td>
	<td><?php echo $info->cabang ?></td>
	<td><?php echo $info->atas_nama ?></td>
	<td><?php echo $info->telpon ?></td>
	<td><a class="btn btn-success btn-sm" href="<?php echo base_url('admin/info/edit/').$info->id_info;?>"><i class="fa fa-edit"></i> Ubah Data</a></td>
</tr>

<?php } ?>

</tbody>
</table>
</div>
</div>
