<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">Data Order Masuk</h3>
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

<hr>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
    <th>Nama</th>
  <th width="20%">Email</th>
  <th>Tanggal Post</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($booking as $booking) { ?>

<tr>
  <td><?php echo $i ?></td>
    <td><?php echo $booking->nama_lengkap ?>

      <?php if($booking->status_read == 0) {
        echo '<span class="badge badge-danger">';
        echo "New Booking";
        echo '</span>';
      }else {
        // echo '<span class="badge badge-success">';
        // echo "Ok";
        // echo '</span>';
      } ?>


    </td>
  <td><?php echo $booking->email ?></td>
  <td><?php echo shortdate_indo($booking->tanggal_post) ?></td>
  <td><a href="<?php echo base_url('admin/booking/lihat/' .$booking->id_booking) ?>" title="Edit Berita" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> view</a>

      <?php
      //link Delete
      include('delete.php');
      ?>

  </td>
</tr>

<?php } ?>

</tbody>
</table>
</div>
</div>
