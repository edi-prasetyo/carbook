<?php
$site_info      = $this->konfigurasi_model->listing();
$page           = $this->konfigurasi_model->menu_page();
$layanan        = $this->konfigurasi_model->menu_layanan();
?>
<section class="bantuan py-md-3 mt-md-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 text-light"><span style="font-size:35px;font-weight:700;">Butuh Bantuan ? Hubungi Kami</span></div>
      <div class="col-md-4 text-light"><span style="font-size:30px;font-weight:700;"><i class="fas fa-phone"></i> <?php echo $site_info->whatsapp;?></span></div>
    </div>
  </div>
</section>
<footer class="pt-4 pt-md-5 pb-md-5 border-top bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md">
        <a href="<?php echo base_url();?>"><img class="mb-2" src="<?php echo base_url('assets/upload/image/'.$site_info->logo) ?>" alt="" width="250"></a>
        <span style="font-size:18px;">
          <i class="fa fa-phone"></i> <?php echo $site_info->telepon ?><br>
          <i class="fa fa-envelope"></i> <?php echo $site_info->email ?>
        </span>
      </div>
      <div class="col-6 col-md ml-md-5">
        <h5>Layanan</h5>
        <ul class="list-unstyled text-small">
          <?php foreach ($layanan as $layanan) { ?>
            <li><a class="text-muted" href="<?php echo base_url('layanan/detail/'.$layanan->slug_layanan) ?> "><?php echo $layanan->judul_layanan ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <div class="col-5 col-md">
        <h5>Halaman</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="<?php echo base_url('layanan') ?>">Layanan</a></li>
          <li><a class="text-muted" href="<?php echo base_url('berita') ?>">Blog Berita</a></li>
          <li><a class="text-muted" href="<?php echo base_url('galeri') ?>">Galeri Foto</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Corporate</h5>
        <ul class="list-unstyled text-small">
          <?php foreach ($page as $page) { ?>
            <li><a class="text-muted" href="<?php echo base_url('page/detail/'.$page->slug_page) ?> "><?php echo $page->judul_page ?></a></li>
          <?php } ?>
          <li><a class="text-muted" href="<?php echo base_url('kontak') ?>">Hubungi Kami</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<div class="credit text-center text-light py-md-3">Copyright &copy; <?php echo date('Y') ?> - <?php echo $site_info->namaweb ?> - <?php echo $site_info->tagline ?></div>
<!-- Load javascript Jquery -->
<script src="<?php echo base_url() ?>assets/template/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/template/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/assets/js/vendor/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/moment-with-locales.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/timepicker.js"></script>
<script>
$(function() {
  $('#id_tanggal').datetimepicker({locale:'id', format:'D MMMM YYYY',minDate: new Date(),});
});
$('.form-control-chosen').chosen({
});
$('#timepicker').timepicker();
</script>

<script>
$(function() {
  $('#id_tanggal_bayar').datetimepicker({locale:'id', format:'D MMMM YYYY'});
});
</script>
<!-- Google Analitycs -->
<?php echo $site_info->analytics; ?>
<!-- End Google Analitycs -->


</body>
</html>
