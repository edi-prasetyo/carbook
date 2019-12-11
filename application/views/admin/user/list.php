<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">Data User</h3>
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
<a href="<?php echo base_url('admin/user/tambah') ?>" title="Tambah User baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
</p>
<hr>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Foto</th>
  <th>Nama</th>
  <th>Email</th>
  <th>Level</th>
  <th>Status</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($user as $user) { ?>

<tr>
  <td><?php echo $i ?></td>
  <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$user->foto_user) ?>" width="60"
    class="img img-thumbnail"></td>
  <td><?php echo $user->nama ?></td>
  <td><?php echo $user->email ?></td>
  <td><?php echo $user->akses_level ?></td>
  <td><?php
    if ($user->active == 0) {
      echo "<span class='badge badge-danger'>";
      echo "Tidak Aktif";
      echo "</span>";
    }else{
      echo "<span class='badge badge-success'>";
      echo "Aktif";
      echo "</span>";
    }


   ?></td>
  <td><a href="<?php echo base_url('admin/user/edit/' .$user->id_user) ?>" title="Edit User" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit User</a>

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
