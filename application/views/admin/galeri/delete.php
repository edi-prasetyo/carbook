<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php
echo $galeri->id_galeri ?>">
     <i class="fa fa-trash-o"></i> Hapus
</button>

<div class="modal modal-danger fade" id="Delete<?php echo $galeri->id_galeri ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Menghapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Ingin Menghapus Data Ini? <b><?php echo $galeri->judul_galeri ;?></b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
          <a href="<?php echo base_url('admin/galeri/delete/'.$galeri->id_galeri) ?>" class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i> Ya, Hapus data ini</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
