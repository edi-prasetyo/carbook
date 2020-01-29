<?php
$site_info = $this->konfigurasi_model->listing();

error_reporting(0);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title ?> </title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/' . $site_info->icon) ?>">
  <meta name="description" content="<?php echo $deskripsi ?>">
  <meta name="keywords" content="<?php echo $title . ',' . $keywords ?>">
  <meta name="author" content="<?php echo $title ?>">
  <meta name="google-site-verification" content="<?php echo $site_info->metatext ?>" />
  <meta name="msvalidate.01" content="<?php echo $site_info->bingmeta ?>" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fontawesome5/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/template/css/component-chosen.css">
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/template/css/bootstrap-datetimepicker.css" />
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/template/css/timepicker.css" />
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/template/css/dataTables.bootstrap4.min.css" />

</head>

<body>