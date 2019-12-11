<div class="tile">
<div class="row">
  <div class="col-md-4">
    <h4>Data Penumpang</h4>
    <hr>
    <b>Title</b>
    <p><?php echo $booking->title ?></p>
    <b>Nama Lengkap</b>
    <p><?php echo $booking->nama_lengkap ?></p>
    <b>email</b>
    <p><?php echo $booking->email ?></p>
    <b>Telepon</b>
    <p><?php echo $booking->telepon ?></p>
  </div>
  <div class="col-md-8">
    <h4>Data Order</h4>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <b>Jumlah Penumpang</b>
        <p><?php echo $booking->jml_penumpang ?> Orang</p>
        <b>Bandara</b>
        <p><?php echo $booking->bandara ?></p>
        <b>Maskapai</b>
        <p><?php echo $booking->maskapai ?></p>
        <b>Terminal</b>
        <p><?php echo $booking->terminal ?></p>
      </div>
      <div class="col-md-6">
        <b>Tanggal Jemput</b>
        <p><?php echo $booking->tanggal_jemput ?></p>
        <b>Jam Jemput</b>
        <p><?php echo $booking->jam_jemput ?> WIB</p>
        <b>Alamat Tujuan</b>
        <p><?php echo $booking->alamat_tujuan ?></p>
      </div>
    </div>
  </div>


</div>
</div>
