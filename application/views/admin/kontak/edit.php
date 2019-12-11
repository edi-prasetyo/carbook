<div class="tile">
<div class="row">
  <div class="col-md-4">
    <b>Layanan</b>
    <p><?php echo $kontak->nama_layanan ?></p>
    <b>Nama Lengkap</b>
    <p><?php echo $kontak->nama_lengkap ?></p>
    <b>Alamat Lengkap</b>
    <p><?php echo $kontak->alamat ?></p>
    <b>Email</b>
    <p><?php echo $kontak->email ?></p>
    <b>Nomor Handphone</b>
    <p><?php echo $kontak->nomorhp ?></p>
  </div>
  <div class="col-md-4">
    <b>Kota</b>
    <p><?php echo $kontak->kota ?></p>
    <b>Tipe Kendaraan</b>
    <p><?php echo $kontak->tipe_kendaraan ?></p>
    <b>Merek Kendaraan</b>
    <p><?php echo $kontak->merek_kendaraan ?></p>
    <b>Tahun Kendaraan</b>
    <p><?php echo $kontak->tahun_kendaraan ?></p>
    <b>Nomor KTP</b>
    <p><?php echo $kontak->no_ktp ?></p>
  </div>
  <div class="col-md-4">
    <img src="<?php echo base_url('assets/upload/image/'.$kontak->foto) ?>" width="70%"
      class="img img-thumbnail">
  </div>

</div>
</div>
