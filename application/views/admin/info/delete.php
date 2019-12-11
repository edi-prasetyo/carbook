<a href="" data-toggle="modal" data-target="#Delete<?php
echo $info->id_info ?>">
     <i class="fa fa-close"></i> Hapus
</a>

<div class="modal fade" id="Delete<?php echo $info->id_info ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"> Menghapus Data</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-window-close"></i></span></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Ingin Menghapus Pesan Dari  <b><?php echo $info->judul_info;?></b> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <a href="<?php echo base_url('admin/info/delete/'.$info->id_info) ?>" class="btn btn-danger pull-right"><i class="fa fa-close"></i> Ya, Hapus Pesan ini</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
