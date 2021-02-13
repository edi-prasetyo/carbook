<?php
$meta      = $this->meta_model->get_meta();

?>

<section class="bg-info py-md-3 mt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-light"><span style="font-size:35px;font-weight:700;">Butuh Bantuan ? Hubungi Kami</span></div>
            <div class="col-md-4 text-light"><span style="font-size:30px;font-weight:700;"><i class="ri-whatsapp-line"></i> <?php echo $meta->telepon; ?></span></div>
        </div>
    </div>
</section>
<footer class="pt-4 pt-md-5 pb-md-5 border-top bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md">
                <a href="<?php echo base_url(); ?>"><img class="mb-2" src="<?php echo base_url('assets/img/logo/' . $meta->logo) ?>" alt="" width="250"></a>
                <span style="font-size:18px;"><br>
                    <i class="ri-phone-line"></i> <?php echo $meta->telepon ?><br>
                    <i class="ri-mail-send-line"></i> <?php echo $meta->email ?>
                </span>
            </div>
            <div class="col-6 col-md ml-md-5">
                <h5>Produk Utama</h5>
                <ul class="list-unstyled text-small">

                    <li> <a class="text-muted" href="#">Rental Mobil Jakarta</a></li>
                    <li> <a class="text-muted" href="#">Rental Mobil Jakarta</a></li>
                    <li> <a class="text-muted" href="#">Rental Mobil Jakarta</a></li>

                </ul>
            </div>
            <div class="col-5 col-md">
                <h5>Halaman</h5>
                <ul class="list-unstyled text-small">
                    <li> <a class="text-muted" href="<?php echo base_url('about') ?>">About Us</a></li>
                    <li> <a class="text-muted" href="<?php echo base_url('contact') ?>">Contact Us</a></li>
                    <li> <a class="text-muted" href="<?php echo base_url('blog') ?>">Blog</a></li>
                    <li> <a class="text-muted" href="<?php echo base_url('transaksi') ?>">Cek Order</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Layanan</h5>
                <ul class="list-unstyled text-small">

                    <li> <a class="text-muted" href="#">Rental Mobil Jakarta</a></li>
                    <li> <a class="text-muted" href="#">Rental Mobil Jakarta</a></li>
                    <li> <a class="text-muted" href="#">Rental Mobil Jakarta</a></li>
                    <li> <a class="text-muted" href="#">Rental Mobil Jakarta</a></li>

                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="credit bg-white text-center text-muted py-md-3 border-top">Copyright &copy; <?php echo date('Y') ?> - <?php echo $meta->title ?> - <?php echo $meta->tagline ?></div>
<!-- Load javascript Jquery -->
<script src="<?php echo base_url() ?>assets/template/front/vendor/jquery/jquery-3.2.1.slim.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/front/vendor/popper/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/front/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/front/vendor/date-time-picker-bootstrap-4/js/moment.min.js" type="text/javascript"></script>
<!-- <script src="<?php echo base_url() ?>assets/template/front/js/moment-with-locales.js"></script> -->
<script src="<?php echo base_url() ?>assets/template/front/vendor/offcanvas/offcanvas.js" type="text/javascript"></script>
<!-- <script src="<?php echo base_url() ?>assets/template/front/vendor/jquery/jquery.js" type="text/javascript"></script> -->


<script src="<?php echo base_url() ?>assets/template/front/vendor/date-time-picker-bootstrap-4/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script>
    $(function() {
        var minDate = new Date();
        minDate.setDate(minDate.getDate() + 1);

        $('#id_tanggal').datetimepicker({
            locale: 'id',
            format: 'D MMMM YYYY',
            minDate: minDate
        });
    });
    $('.form-control-chosen').chosen({});
    $('#timepicker').timepicker();
</script>

<script>
    $(function() {
        $('#id_tanggal_bayar').datetimepicker({
            locale: 'id',
            format: 'D MMMM YYYY'
        });
    });
</script>

<!-- Google Analitycs -->
<?php echo $meta->google_analytics; ?>
<!-- End Google Analitycs -->


<!-- SUMMERNOTE -->
<link href="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.js'); ?>"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Deskripsi Produk ..',
        tabsize: 2,
        height: 130,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>



<!-- Gambar -->
<script>
    $('input[type="file"]').each(function() {
        // Refs
        var $file = $(this),
            $label = $file.next('label'),
            $labelText = $label.find('span'),
            labelDefault = $labelText.text();

        // When a new file is selected
        $file.on('change', function(event) {
            var fileName = $file.val().split('\\').pop(),
                tmppath = URL.createObjectURL(event.target.files[0]);
            //Check successfully selection
            if (fileName) {
                $label
                    .addClass('file-ok')
                    .css('background-image', 'url(' + tmppath + ')');
                $labelText.text(fileName);
            } else {
                $label.removeClass('file-ok');
                $labelText.text(labelDefault);
            }
        });

        // End loop of file input elements
    });
</script>


</body>

</html>