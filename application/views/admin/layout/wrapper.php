<?php
//Proteksi Halaman Admin
$this->check_login->check();

if ($this->session->userdata('akses_level') == "Pelanggan") {
    redirect(base_url('myaccount'), 'refresh');
}
//Gabungan Semua layout
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
