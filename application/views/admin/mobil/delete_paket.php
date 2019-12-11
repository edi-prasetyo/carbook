<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php
echo $paket->id_paket ?>">
     <i class="fa fa-close"></i> Hapus
</button>

<div class="modal fade" id="Delete<?php echo $paket->id_paket ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"> Menghapus Data</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-window-close"></i></span></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Ingin Menghapus Data Paket <b><?php echo $paket->nama_paket ?></b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <a href="<?php echo base_url('admin/mobil/delete_paket/'.$paket->id_paket) ?>" class="btn btn-danger pull-right"><i class="fa fa-close"></i> Ya, Hapus</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
