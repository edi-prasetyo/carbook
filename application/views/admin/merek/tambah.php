<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
     <i class="fa fa-plus"></i> Tambah Baru
</button>

<div class="modal modal-default fade" id="Tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Merek</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <?php
        //attribut
        $attribut = 'class="form-horizontal"';
        //Form Open
        echo form_open(base_url('admin/merek'),$attribut);
        ?>

        <div class="form-group">
           <label>Nama Merek</label>
             <input type="text" class="form-control" name="nama_merek" placeholder="Nama Merek" required="required">
        </div>

        <div class="form-group">
             <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
        </div>


       <?php
       //Form Close
       echo form_close();
        ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
