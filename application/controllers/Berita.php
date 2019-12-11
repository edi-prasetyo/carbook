<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->model('berita_model');
    $this->load->model('kategori_model');
    $this->load->model('mobil_model');
  }

  //main page - Berita
  public function index()
  {
    $konfigurasi = $this->konfigurasi_model->listing();
    $listing        = $this->berita_model->home();
    $popularpost    = $this->berita_model->popularpost();
    $rentcar       = $this->mobil_model->sidebar();

    // Listing Berita Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('berita/index/');
    $config['total_rows']     = count($this->berita_model->total());
    $config['per_page']       = 3;
    $config['uri_segment']    = 3;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $berita                   = $this->berita_model->berita($limit,$start);
    // End Listing Berita dengan paginasi
    $data = array(
      'title'       => 'Berita - '.$konfigurasi->namaweb,
      'deskripsi'   => 'Berita - '.$konfigurasi->namaweb,
      'keywords'    => 'Berita - '.$konfigurasi->namaweb,
      'paginasi'    => $this->pagination->create_links(),
      'berita'      => $berita,
      'listing'     => $listing,
      'popularpost' => $popularpost,
      'rentcar'     => $rentcar,
      'isi'         => 'berita/list'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

  // Kategori - Berita
  public function kategori($slug_kategori)
  {
    $kategori       = $this->kategori_model->read($slug_kategori);
    $id_kategori    = $kategori->id_kategori;
    $konfigurasi    = $this->konfigurasi_model->listing();
    // Listing Berita Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('berita/kategori/'.$slug_kategori.'/index/');
    $config['total_rows']     = count($this->berita_model->total_kategori($id_kategori));
    $config['per_page']       = 3;
    $config['uri_segment']    = 5;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $berita                   = $this->berita_model->berita_kategori($id_kategori,$limit,$start);
    // End Listing Berita
    $data = array(  'title'       => 'Kategori Berita - '.$kategori->nama_kategori,
    'deskripsi'   => 'Kategori Berita - '.$kategori->nama_kategori,
    'keywords'    => 'Kategori Berita - '.$kategori->nama_kategori,
    'paginasi'    => $this->pagination->create_links(),
    'berita'      => $berita,
    'isi'         => 'berita/list'
  );
  $this->load->view('layout/wrapper', $data, FALSE);
}

//main page - detail Berita
public function detail($slug_berita = NULL)
{
  if(!empty($slug_berita)){
     $slug_berita;
  }else{
    redirect(base_url('berita'));
  }

  $berita         = $this->berita_model->read($slug_berita);
  $listing        = $this->berita_model->home();
  $popularpost    = $this->berita_model->popularpost();
  $rentcar        = $this->mobil_model->sidebar();


  $data = array(  'id_user'     => $this->session->userdata('id_user'),
  'title'       => $berita->judul_berita,
  'deskripsi'   => $berita->judul_berita,
  'keywords'    => $berita->keywords,
  'berita'      => $berita,
  'listing'     => $listing,
  'popularpost' => $popularpost,
  'rentcar'     => $rentcar,
  'tanggal_post'   => date('Y-m-d H:i:s'),
  'isi'         => 'berita/read'
);


$this->add_count($slug_berita);

$this->load->view('layout/wrapper', $data, FALSE);
}

// This is the counter function..
function add_count($slug_berita)
{
  // load cookie helper
  $this->load->helper('cookie');
  // this line will return the cookie which has slug name
  $check_visitor = $this->input->cookie(urldecode($slug_berita), FALSE);
  // this line will return the visitor ip address
  $ip = $this->input->ip_address();
  // if the visitor visit this article for first time then //
  //set new cookie and update article_views column  ..
  //you might be notice we used slug for cookie name and ip
  //address for value to distinguish between articles  views
  if ($check_visitor == false) {
    $cookie = array(
      "name"   => urldecode($slug_berita),
      "value"  => "$ip",
      "expire" =>  time() + 7200,
      "secure" => false
    );
    $this->input->set_cookie($cookie);
    $this->berita_model->update_counter(urldecode($slug_berita));
  }
}






}

/* End of file berita.php */
/* Location: ./application/controllers/Berita.php */
