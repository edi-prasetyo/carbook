<div class="breadcrumb">
  <div class="container">
    <ul class="breadcrumb my-3">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>
  </div>
</div>

<div class="container mb-3">
  <div class="row">
    <div class="col-md-4">

      <div class="card">
        <div class="card-header">
          Detail Pesanan
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <img class="img-fluid" src="<?php echo base_url('assets/img/mobil/' . $listpaket->mobil_gambar) ?>" alt="<?php echo $listpaket->mobil_name ?>">
            </div>
            <div class="col-md-12">

              <h3><?php echo $listpaket->mobil_name ?></h3>


              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="bi-people"></i> <?php echo $listpaket->mobil_penumpang ?> Penumpang</li>
                <li class="list-group-item"><i class="bi-briefcase"></i> <?php echo $listpaket->mobil_bagasi ?> Koper</li>
                <li class="list-group-item"><i class="bi-collection"></i> <?php echo $listpaket->paket_name ?></li>

              </ul>


            </div>
          </div>
        </div>
        <div class="card-footer text-light bg-info">
          <h3 class="d-flex">
            <div>
              Price
            </div>
            <div class="ml-auto">
              IDR. <?php echo number_format($listpaket->paket_price, '0', ',', '.') ?>
            </div>
          </h3>
        </div>
      </div>


    </div>

    <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          Detail Penumpang
        </div>
        <div class="card-body">

          <?php
          echo form_open(base_url('rental-mobil/booking/' . $listpaket->id));
          $kode_transaksi = date('dmY') . strtoupper(random_string('alnum', 5));
          ?>
          <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
          <input type="hidden" name="mobil_id" value="<?php echo $listpaket->mobil_id ?>">
          <input type="hidden" name="nama_mobil" value="<?php echo $listpaket->mobil_name ?>">






          <input type="hidden" name="harga_satuan" value="<?php echo $listpaket->paket_price; ?>">
          <input type="hidden" name="nama_paket" value="<?php echo $listpaket->paket_name; ?>">
          <input type="hidden" name="ketentuan" value="<?php echo $listpaket->ketentuan_desc; ?>">
          <div class="row">

            <?php if ($this->session->userdata('id')) : ?>

              <?php $id = $this->session->userdata('id');
              $user = $this->user_model->user_detail($id);
              ?>

              <div class="col-md-3">
                <label>Title <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user_title" placeholder="Nama Lengkap" value="<?php echo $user->user_title; ?>" readonly>
                <?php echo form_error('user_title', '<span class="text-danger">', '</span>'); ?>
              </div>

              <div class="col-md-5">
                <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user_name" placeholder="Nama Lengkap" value="<?php echo $user->user_name; ?>">
                <?php echo form_error('user_name', '<span class="text-danger">', '</span>'); ?>
              </div>

              <div class="col-md-4">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user_email" placeholder="Email" value="<?php echo $user->email; ?>">
                <?php echo form_error('user_email', '<span class="text-danger">', '</span>'); ?>
              </div>
              <div class="col-md-12">
                <label>Nomor Handphone <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user_phone" placeholder="Nomor Handphone" value="<?php echo $user->user_phone; ?>">
                <?php echo form_error('user_phone', '<span class="text-danger">', '</span>'); ?>
              </div>





            <?php else : ?>



              <div class="col-md-3">
                <label>Title <span class="text-danger">*</span></label>
                <div class="form-group">
                  <select class="form-control form-control-chosen" name="user_title" value="<?php echo set_value('user_title'); ?>">
                    <option></option>
                    <option value="Bapak">Bapak</option>
                    <option value="Ibu">Ibu</option>
                    <option value="Saudara">Saudara</option>
                    <option value="Saudari">Saudari</option>
                  </select>
                  <?php echo form_error('user_title', '<span class="text-danger">', '</span>'); ?>
                </div>
              </div>


              <div class="col-md-5">
                <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user_name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>">
                <?php echo form_error('user_name', '<span class="text-danger">', '</span>'); ?>
              </div>
              <div class="col-md-4">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user_email" placeholder="Email" value="<?php echo set_value('user_email'); ?>">
                <?php echo form_error('user_email', '<span class="text-danger">', '</span>'); ?>
              </div>
              <div class="col-md-12">
                <label>Nomor Handphone <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user_phone" placeholder="Nomor Handphone" value="<?php echo set_value('user_phone'); ?>">
                <?php echo form_error('user_phone', '<span class="text-danger">', '</span>'); ?>
              </div>







            <?php endif; ?>





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
            <div class="col-md-12 my-3">
              <label>Metode Pembayaran <span class="text-danger">*</span></label>



              <div class="my-1">
                <div class="row">

                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <i class="bi-cash-stack text-warning" style="font-size: 3rem;"></i>
                        <label class="form-check-label">
                          <input type="radio" name="tipe_pembayaran" value="Cash"> Cash
                        </label>
                      </div>
                    </div>
                  </div>



                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <i class="bi-credit-card text-success" style="font-size: 3rem;"></i>
                        <label class="form-check-label">
                          <input type="radio" name="tipe_pembayaran" value="Transfer"> Transfer
                        </label>
                      </div>
                    </div>
                  </div>


                </div>
              </div>



            </div>
          </div>
          <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg">
            Syarat dan Ketentuan Sewa
          </a>
          <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-info btn-block"><i class="fe fe-shopping-bag"></i> Pesan Sekarang</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>





  </div>
</div>




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $listpaket->ketentuan_name ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $listpaket->ketentuan_desc ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>