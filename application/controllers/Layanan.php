
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('layanan_model');

  }
  //main page - Layanan
  public function index()
  {
    $konfigurasi  = $this->konfigurasi_model->listing();

    // Listing Layanan Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('layanan/index/');
    $config['total_rows']     = count($this->layanan_model->total());
    $config['per_page']       = 6;
    $config['uri_segment']    = 3;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $layanan                   = $this->layanan_model->layanan($limit,$start);
    // End Listing Layanan

    $data = array(  'title'       => 'Layanan - '.$konfigurasi->namaweb,
                    'deskripsi'   => 'Layanan - '.$konfigurasi->namaweb,
                    'keywords'    => 'Layanan - '.$konfigurasi->namaweb,
                    'paginasi'    => $this->pagination->create_links(),
                    'layanan'     => $layanan,
                    'isi'         => 'layanan/list'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }
  //main page - detail Layanan
  public function detail($slug_layanan = NULL)
  {
    if(!empty($slug_layanan)){
       $slug_layanan;
    }else{
      redirect(base_url('layanan'));
    }

    $konfigurasi  = $this->konfigurasi_model->listing();
    $layanan      = $this->layanan_model->read($slug_layanan);




    $data = array(  'title'       => $layanan->judul_layanan,
                    'deskripsi'   => $layanan->judul_layanan.','.$layanan->keywords,
                    'keywords'    => $layanan->judul_layanan.','.$layanan->keywords,
                    'layanan'     => $layanan,
                    'isi'         => 'layanan/read'
   );
   $this->load->view('layout/wrapper', $data, FALSE);

  }
}

 /* End of file layanan.php */
 /* Location: ./application/controllers/Layanan.php */
