<div class="container konten">
  <div class="col-md-8">
    <?php if ($transaksi->status_bayar == 'Lunas' ) {
      echo "Order Anda sudah di konfirmasi";
    }elseif($transaksi->status_bayar == 'Pending' ){
      echo "Order Anda sudah di konfirmasi";
    }else{?>
      <div class="card">
        <div class="card-header">
          Detail Penumpang
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <p class="font-weight-bold mb-4">Info Pemesan</p>
              <?php echo $transaksi->nama ?><br>
              <?php echo $transaksi->email ?><br>
              <?php echo $transaksi->telp ?><br>
            </div>
            <div class="col-6 text-right">
              <p class="font-weight-bold mb-4">Info Penjemputan</p>
              Alamat jemput : <?php echo $transaksi->alamat_jemput ?><br>
              Tanggal Jemput : <?php echo $transaksi->tanggal_jemput ?><br>
              Jam : <?php echo $transaksi->jam_jemput ?> WIB<br>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Paket</th>
                  <th scope="col">Lama Sewa</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <?php echo $transaksi->nama_mobil ?><br><small class="text-muted"><?php echo $transaksi->nama_paket; ?></small> </td>
                  <td><?php echo $transaksi->lama_sewa;?> Hari</td>
                  <td>Rp. <?php echo number_format($transaksi->harga,0,',','.'); ?></td>
                  <td>Rp. <?php echo number_format($transaksi->harga*$transaksi->lama_sewa,0,',','.'); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          Detail Penumpang
        </div>
        <div class="card-body">
          <?php
          echo form_open_multipart(base_url('transaksi/konfirmasi/' . $transaksi->id_transaksi));
          ?>
          <div class="row">
            <div class="col-md-6">
              <label>Dari Bank</label>
              <div class="form-group">
                <select class="form-control form-control-chosen" name="rek_pembayaran" value="<?php echo set_value('rek_pembayaran'); ?>">
                  <option value=""> -- Pilih Metode Pembayaran --</option>
                  <option value="BCA">BCA</option>
                  <option value="Mandiri">Mandiri</option>
                  <option value="BNI">BNI</option>
                </select>
              </div>
              <?php echo form_error('rek_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <label>Ke Bank</label>
              <div class="form-group">
                <select class="form-control form-control-chosen" name="nama_bank" value="<?php echo set_value('nama_bank'); ?>">
                  <option value=""> -- Pilih Metode Pembayaran --</option>
                  <option value="BCA">BCA</option>
                  <option value="Mandiri">Mandiri</option>
                  <option value="BNI">BNI</option>
                </select>
              </div>
              <?php echo form_error('nama_bank', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <label>Nomor Rekening</label>
              <input class="form-control" type="number" name="rek_pelanggan" placeholder="Nomor Rekening" value="<?php echo set_value('rek_pelanggan'); ?>">
              <?php echo form_error('rek_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <label>Atas Nama</label>
              <input class="form-control" type="text" name="nama_pemilik" placeholder="Atas Nama" value="<?php echo set_value('nama_pemilik'); ?>">
              <?php echo form_error('nama_pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <label>Tanggal Bayar</label>
              <input type="text" name="tanggal_bayar" class="form-control" placeholder="Tanggal" id="id_tanggal_bayar" value="<?php echo set_value('tanggal_bayar'); ?>">
              <?php echo form_error('tanggal_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <label>Jumlah Bayar</label>
              <input type="text" name="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar" value="<?php echo set_value('jumlah_bayar'); ?>">
              <?php echo form_error('jumlah_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Upload Bukti Transfer</label><br>
                <input type="file" name="bukti_bayar" value="<?php echo set_value('bukti_bayar'); ?>">
                <?php echo form_error('bukti_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fe fe-shopping-bag"></i> Kirim Konfirmasi</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
