<!--
Added by  : Edi Prasetyo
Date      : 25 Maret 2019
 -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('galeri_model');

  }
  //main page - Galeri
  public function index()
  {
    $konfigurasi  = $this->konfigurasi_model->listing();

    // Listing Galeri Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('galeri/index/');
    $config['total_rows']     = count($this->galeri_model->total());
    $config['per_page']       = 6;
    $config['uri_segment']    = 3;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $galeri                   = $this->galeri_model->galeri($limit,$start);
    // End Listing Galeri

    $data = array(  'title'       => 'Galeri - '.$konfigurasi->namaweb,
                    'deskripsi'   => 'Galeri - '.$konfigurasi->namaweb,
                    'keywords'    => 'Galeri - '.$konfigurasi->namaweb,
                    'paginasi'    => $this->pagination->create_links(),
                    'galeri'     => $galeri,
                    'isi'         => 'galeri/list'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }
  //main page - detail Galeri
  public function read($slug_galeri)
  {
    $konfigurasi  = $this->konfigurasi_model->listing();
    $galeri      = $this->galeri_model->read($slug_galeri);




    $data = array(  'title'       => $galeri->judul_galeri,
                    'deskripsi'   => $galeri->judul_galeri.','.$galeri->keywords,
                    'keywords'    => $galeri->judul_galeri.','.$galeri->keywords,
                    'galeri'     => $galeri,
                    'isi'         => 'galeri/read'
   );
   $this->load->view('layout/wrapper', $data, FALSE);

  }
}

 /* End of file galeri.php */
 /* Location: ./application/controllers/Galeri.php */
