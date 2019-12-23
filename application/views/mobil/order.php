<div class="container my-3">
  <div class="container">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <img class="img-fluid" src="<?php echo base_url('assets/upload/car/' . $listpaket->gambar) ?>" alt="<?php echo $listpaket->nama_mobil ?>">
            </div>
            <div class="col-md-5">
              <h3><?php echo $listpaket->nama_mobil ?></h3>
              <i class="fa fa-user-circle"></i> <?php echo $listpaket->kap_penumpang ?> Penumpang<br>
              <i class="fa fa-briefcase"></i> <?php echo $listpaket->kap_bagasi ?> Bagasi<br>
            </div>

            <div class="col-md-4">
              <span style="font-size:27px;font-weight:700;">
                IDR <?php echo number_format($listpaket->harga, '0', ',', '.') ?></span><br>
              <?php echo $listpaket->nama_paket ?>
            </div>

          </div>
        </div>

      </div>
      <div class="card">
        <div class="card-header">
          Detail Penumpang
        </div>
        <div class="card-body">
          <?php
          echo form_open(base_url('mobil/add/' . $listpaket->id_paket));
          $kode_transaksi = date('dmY') . strtoupper(random_string('alnum', 5));
          ?>
          <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
          <input type="hidden" name="id_mobil" value="<?php echo $listpaket->id_mobil ?>">
          <input type="hidden" name="nama_mobil" value="<?php echo $listpaket->nama_mobil ?>">

          <?php
          $sub = substr($listpaket->harga, -3);
          $total =  random_string('numeric', 3);
          $hasil =  $listpaket->harga + $total;
          $no = substr($hasil, -3);
          ?>

          <input type="hidden" name="harga" value="<?php echo $no ?>">
          <input type="hidden" name="harga" value="<?php echo $hasil ?>">


          <input type="hidden" name="nama_paket" value="<?php echo $listpaket->nama_paket ?>">
          <input type="hidden" name="ketentuan" value="<?php echo $listpaket->isi_ketentuan ?>">
          <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
          <div class="row">
            <div class="col-md-6">
              <label>Nama Lengkap <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>">
              <?php echo form_error('nama', '<span class="text-danger">', '</span>'); ?>
            </div>
            <div class="col-md-6">
              <label>Email <span class="text-danger">*</span></label>
              <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
              <?php echo form_error('email', '<span class="text-danger">', '</span>'); ?>
            </div>
            <div class="col-md-12">
              <label>Nomor Handphone <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="telp" placeholder="Nomor Handphone" value="<?php echo set_value('telp'); ?>">
              <?php echo form_error('telp', '<span class="text-danger">', '</span>'); ?>
            </div>
            <div class="col-md-4">
              <label>Tanggal Jemput <span class="text-danger">*</span></label>
              <input type="text" name="tanggal_jemput" class="form-control" placeholder="Tanggal" id="id_tanggal">
            </div>
            <div class="col-md-4">
              <div class='form-group'>
                <label>Jam Jemput <span class="text-danger">*</span></label>
                <select class="form-control form-control-chosen" name="jam_jemput" value="<?php echo set_value('jam_jemput'); ?>">
                  <option></option>
                  <option value='08.00'>08.00</option>
                  <option value='08.30'>08.30</option>
                  <option value='09.00'>09.00</option>
                  <option value='09.30'>09.30</option>
                  <option value='10.00'>10.00</option>
                  <option value='10.30'>10.30</option>
                  <option value='11.00'>11.00</option>
                  <option value='11.30'>11.30</option>
                  <option value='12.00'>12.00</option>
                  <option value='12.30'>12.30</option>
                  <option value='13.00'>13.00</option>
                  <option value='13.30'>13.30</option>
                  <option value='14.00'>14.00</option>
                  <option value='14.30'>14.30</option>
                  <option value='15.00'>15.00</option>
                  <option value='15.30'>15.30</option>
                  <option value='16.00'>16.00</option>
                  <option value='16.30'>16.30</option>
                  <option value='17.00'>17.00</option>
                  <option value='18.30'>18.30</option>
                  <option value='19.00'>19.00</option>
                  <option value='19.30'>19.30</option>
                  <option value='20.00'>20.00</option>
                  <option value='20.30'>20.30</option>
                  <option value='21.00'>21.00</option>
                  <option value='21.30'>21.30</option>
                  <option value='22.00'>22.00</option>
                  <option value='22.30'>22.30</option>
                  <option value='23.00'>23.00</option>
                  <option value='23.30'>23.30</option>
                </select>
                <?php echo form_error('jam_jemput', '<span class="text-danger">', '</span>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <label>Lama Sewa <span class="text-danger">*</span></label>
              <div class="form-group">
                <select class="form-control form-control-chosen" name="lama_sewa" value="<?php echo set_value('lama_sewa'); ?>">
                  <option></option>
                  <option value="1">1 Hari</option>
                  <option value="2">2 Hari</option>
                  <option value="3">3 Hari</option>
                  <option value="4">4 Hari</option>
                </select>
                <?php echo form_error('lama_sewa', '<span class="text-danger">', '</span>'); ?>
              </div>
            </div>
            <div class="col-md-12">
              <label>Alamat Penjemputan <span class="text-danger">*</span></label>
              <textarea class="form-control" name="alamat_jemput" value="<?php echo set_value('alamat_jemput'); ?>"></textarea>
              <?php echo form_error('alamat_jemput', '<span class="text-danger">', '</span>'); ?>
            </div>
            <div class="col-md-12">
              <label>Permintaan Khusus (Optional)</label>
              <input class="form-control" type="text" name="permintaan_khusus" placeholder="Permintaan Khusus">
            </div>
            <div class="col-md-6">
              <label>Metode Pembayaran <span class="text-danger">*</span></label>
              <div class="form-group">
                <select class="form-control form-control-chosen" name="tipe_pembayaran" value="<?php echo set_value('tipe_pembayaran'); ?>">
                  <option></option>
                  <option value="Transfer">Transfer</option>
                  <option value="Cash">Bayar Cash</option>
                </select>
                <?php echo form_error('tipe_pembayaran', '<span class="text-danger">', '</span>'); ?>
              </div>
            </div>
          </div>
          <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg">
            Syarat dan Ketentuan Sewa
          </a>
          <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fe fe-shopping-bag"></i> Pesan Sekarang</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="sidebar card">
        <h3 class="sidebar-title">Pilihan Mobil</h3>
        <?php foreach ($listing as $listing) { ?>
          <ul>
            <li>
              <img src="<?php echo base_url('assets/upload/car/' . $listing->gambar) ?>" alt="<?php echo $listing->nama_mobil ?>" class="img-fluid">
              <a href="<?php echo base_url('mobil/rent/' . $listing->id_mobil) ?>"> <?php echo strip_tags(character_limiter($listing->nama_mobil, 50)) ?> </a>
              <br><br>Rp. <?php echo number_format($listing->harga_awal, '0', ',', '.') ?>
            </li>
          </ul>
        <?php } ?>
      </div>
    </div>


  </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $listpaket->nama_ketentuan ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $listpaket->isi_ketentuan ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>