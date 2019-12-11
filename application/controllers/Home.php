<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('berita_model');
    $this->load->model('konfigurasi_model');
    $this->load->model('layanan_model');
    $this->load->model('galeri_model');
    $this->load->model('section_model');
    $this->load->model('services_model');
  }

  //main page - home page
  public function index()
  {
    $konfigurasi                    = $this->konfigurasi_model->listing();
    $slider                         = $this->galeri_model->slider();
    $layanan                        = $this->layanan_model->home();
    $berita                         = $this->berita_model->home();
    $section                        = $this->section_model->listing();
    $services                        = $this->services_model->listing();



    $data = array(  'title'         => $konfigurasi->namaweb.' - '.$konfigurasi->tagline,
                    'keywords'      => $konfigurasi->namaweb.' - '.$konfigurasi->tagline.','.$konfigurasi->keywords,
                    'deskripsi'     => $konfigurasi->deskripsi,
                    'slider'        => $slider,
                    'layanan'       => $layanan,
                    'berita'        => $berita,
                    'section'       => $section,
                    'services'      => $services,
                    'isi'       => 'home/list'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }
}

 /* End of file home.php */
 /* Location: ./application/controllers/Home.php */
