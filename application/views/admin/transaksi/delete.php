<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php
echo $transaksi->id_transaksi ?>">
     <i class="fa fa-close"></i> Hapus
</button>

<div class="modal fade" id="Delete<?php echo $transaksi->id_transaksi ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"> Menghapus Data</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-window-close"></i></span></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Ingin Menghapus Data Artkel <b><?php echo $transaksi->kode_transaksi ?></b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <a href="<?php echo base_url('admin/transaksi/delete/'.$transaksi->id_transaksi) ?>" class="btn btn-danger pull-right"><i class="fa fa-close"></i> Ya, Hapus Artikel</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
