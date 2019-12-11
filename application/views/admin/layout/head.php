<?php
$site = $this->konfigurasi_model->listing();
$total_pendaftaran = $this->konfigurasi_model->total_pendaftaran();
$total_kontak = $this->konfigurasi_model->total_kontak();
$total_transaksi = $this->konfigurasi_model->total_transaksi();
$total_unread = $this->konfigurasi_model->total_unread();

 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <title>Admin - <?php echo $title ?></title>






     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="../assets/upload/image/favicon.png ?>">
     <!-- Main CSS-->
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/css/main.css">
     <!-- Style CSS-->
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/css/style.css">
     <!-- Style chosen -->
     <link href="<?php echo base_url() ?>assets/admin/css/component-chosen.css" rel="stylesheet">
     <!-- Font-icon css-->
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/font-awesome/css/font-awesome.min.css">

   </head>
   <body class="app sidebar-mini rtl">
