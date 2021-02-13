</div>
</div>
</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('assets/template/admin/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<!-- SUMMERNOTE -->
<link href="<?php echo base_url('assets/template/admin/vendor/summernote/summernote-bs4.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/template/admin/vendor/summernote/summernote-bs4.min.js'); ?>"></script>
<script>
    $('#summernote').summernote({
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

</body>

</html>