
<div class="card">
  <div class="card-body">
        <?php
        //Form Open
        echo form_open(base_url('admin/mobil/editpaket/'.$paket->id_paket));
        ?>

        <input type="hidden" name="id_mobil" value="<?php echo $paket->id_mobil ?>">

        <div class="form-group">
           <label>Nama Paket</label>
             <input type="text" class="form-control" name="nama_paket" value="<?php echo $paket->nama_paket ?>">
        </div>

        <div class="form-group">
           <label>Harga</label>
             <input type="text" class="form-control" name="harga" value="<?php echo $paket->harga ?>">
        </div>

        <div class="form-group">
          <label>Syarat & Ketentuan</label>
          <select name="id_ketentuan" class="form-control form-control-chosen">
            <option value="">Pilih Ketentuan</option>
            <?php foreach($ketentuan as $ketentuan) { ?>
            <option value="<?php echo $ketentuan->id_ketentuan ?>" <?php if($paket->id_ketentuan==$ketentuan->id_ketentuan){echo "selected";}?>>
              <?php echo $ketentuan->nama_ketentuan ?>
            </option>
          <?php } ?>
          </select>
        </div>

        <div class="form-group">
             <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
        </div>


       <?php
       //Form Close
       echo form_close();
        ?>
      </div>
    </div>
