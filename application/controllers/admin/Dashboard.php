<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->model('berita_model');
    $this->load->model('galeri_model');
    $this->load->model('layanan_model');
    $this->load->model('user_model');
    $this->load->model('konfigurasi_model');
    $this->load->model('transaksi_model');

  }

  public function index()
  {
    $berita           = $this->berita_model->listing();
    $galeri           = $this->galeri_model->listing();
    $user             = $this->user_model->listing();
    $layanan          = $this->layanan_model->listing();
    $transaksi        = $this->transaksi_model->dashboard();


    $data = array(  'title'       => 'Halaman Dashboard',
                    'berita'      => $berita,
                    'galeri'      => $galeri,
                    'user'        => $user,
                    'layanan'     => $layanan,
                    'transaksi'   => $transaksi,
                    'isi'         => 'admin/dashboard/list'
   );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
}

/* end of file Dasbor.php */
/* Location /application/controller/admin/Dabor.php */
