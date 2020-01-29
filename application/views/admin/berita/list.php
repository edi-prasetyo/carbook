<div class="tile">
  <div class="tile-title-w-btn">
    <h3 class="title">Data Artikel</h3>
  </div>

  <?php
  //Notifikasi
  if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success custom-alert">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }

  ?>

  <p>
    <a href="<?php echo base_url('admin/berita/tambah') ?>" title="Tambah Berita baru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
  </p>

  <hr>
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th width="5%">No</th>
          <th width="5%">img</th>
          <th width="20%">Judul</th>
          <th>Kategori</th>
          <th>Jenis - Status</th>
          <th>Penulis</th>
          <th>Views</th>
          <th>Tanggal</th>
          <th width="23%">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php $i = 1;
        foreach ($berita as $berita) { ?>

          <tr>
            <td><?php echo $i ?></td>
            <td><img src="<?php echo base_url('assets/upload/image/thumbs/' . $berita->gambar) ?>" width="60" class="img img-thumbnail"></td>
            <td><?php echo $berita->judul_berita ?></td>
            <td><?php echo $berita->nama_kategori ?></td>
            <td><?php echo $berita->jenis_berita ?> - <?php echo $berita->status_berita ?></td>
            <td><?php echo $berita->nama ?></td>
            <td><?php echo $berita->berita_views ?></td>
            <td><?php echo $berita->tanggal_post ?></td>
            <td><a href="<?php echo base_url('admin/berita/edit/' . $berita->id_berita) ?>" title="Edit Berita" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
              <?php
              //link Delete
              include('delete.php');
              ?>

              <a href="<?php echo base_url('berita/' . $berita->slug_berita) ?>" title="<?php echo $berita->judul_berita ?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i> Lihat</a>

            </td>
          </tr>

        <?php $i++;
        } ?>

      </tbody>
    </table>
  </div>
</div>