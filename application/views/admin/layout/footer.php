</main>
<!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url() ?>assets/admin/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url() ?>assets/admin/js/plugins/pace.min.js"></script>
    <!-- Data table plugin-->
      <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/plugins/dataTables.bootstrap.min.js"></script>

      <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/plugins/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/chosen.jquery.min.js"></script>

      <script type="text/javascript">
      $('#dataTable').DataTable({
    order: [[0, 'desc']],
});
    </script>
      <script>
          window.setTimeout(function() {
            //$(".custom-alert").alert('close'); <--- Do not use this

            $(".custom-alert").slideUp(500, function() {
                $(this).remove();
            });
          }, 3000);

          $('.form-control-chosen').chosen({
          });

        </script>

  <!-- TinyMce -->
  <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>

  <script>
  tinymce.init({
  selector: '.tinymce',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});

  </script>


  <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/plugins/chart.js"></script>
      



  </body>
</html>
