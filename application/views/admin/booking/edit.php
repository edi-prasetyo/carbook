<div class="tile">
<div class="row">
  <div class="col-md-4">
    <b>Layanan</b>
    <p><?php echo $booking->nama_layanan ?></p>
    <b>Nama Lengkap</b>
    <p><?php echo $booking->nama_lengkap ?></p>
    <b>Alamat Lengkap</b>
    <p><?php echo $booking->alamat ?></p>
    <b>Email</b>
    <p><?php echo $booking->email ?></p>
    <b>Nomor Handphone</b>
    <p><?php echo $booking->nomorhp ?></p>
  </div>
  <div class="col-md-4">
    <b>Kota</b>
    <p><?php echo $booking->kota ?></p>
    <b>Tipe Kendaraan</b>
    <p><?php echo $booking->tipe_kendaraan ?></p>
    <b>Merek Kendaraan</b>
    <p><?php echo $booking->merek_kendaraan ?></p>
    <b>Tahun Kendaraan</b>
    <p><?php echo $booking->tahun_kendaraan ?></p>
    <b>Nomor KTP</b>
    <p><?php echo $booking->no_ktp ?></p>
  </div>
  <div class="col-md-4">
    <img src="<?php echo base_url('assets/upload/image/'.$booking->foto) ?>" width="70%"
      class="img img-thumbnail">
  </div>

</div>
</div>
