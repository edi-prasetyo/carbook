<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->model('page_model');
    $this->load->model('kategori_model');
    $this->load->model('berita_model');
  }

  //main page - Page
  public function index()
  {
    $konfigurasi = $this->konfigurasi_model->listing();
    $listing        = $this->page_model->listing();
    // $popularpost    = $this->berita_model->popularpost();
    // Listing Page Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('page/index/');
    $config['total_rows']     = count($this->page_model->total());
    $config['per_page']       = 3;
    $config['uri_segment']    = 3;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $page                   = $this->page_model->page($limit,$start);
    // End Listing Page dengan paginasi
    $data = array(  'title'       => 'Page - '.$konfigurasi->namaweb,
                    'deskripsi'   => 'Page - '.$konfigurasi->namaweb,
                    'keywords'    => 'Page - '.$konfigurasi->namaweb,
                    'paginasi'    => $this->pagination->create_links(),
                    'page'      => $page,
                    'listing'     => $listing,
                    //'popularpost' => $popularpost,
                    'isi'         => 'page/list'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }


  //main page - detail Page
  public function detail($slug_page = NULL)
  {
    if(!empty($slug_page)){
       $slug_page;
    }else{
      redirect(base_url('page'));
    }

    $page         = $this->page_model->read($slug_page);

    $data = array(  'id_user'     => $this->session->userdata('id_user'),
                    'title'       => $page->judul_page,
                    'deskripsi'   =>  'deskripsi',          //$page->judul_page,
                    'keywords'    =>  'keywords',            //$page->keywords,
                    'page'        => $page,
                    'tanggal_post'   => date('Y-m-d'),
                    'isi'         => 'page/read'
   );




   $this->load->view('layout/wrapper', $data, FALSE);
  }

  // //main page - detail Page
  // public function read($slug_page)
  // {
  //   $page         = $this->page_model->read($slug_page);
  //   $listing        = $this->page_model->home();
  //   $popularpost    = $this->page_model->popularpost();
  //
  //   $data = array(  'id_user'     => $this->session->userdata('id_user'),
  //                   'title'       => $page->judul_page,
  //                   'deskripsi'   => $page->judul_page,
  //                   'keywords'    => $page->keywords,
  //                   'page'      => $page,
  //                   'listing'     => $listing,
  //                   'popularpost' => $popularpost,
  //                   'tanggal_post'   => date('Y-m-d H:i:s'),
  //                   'isi'         => 'page/read'
  //  );
  //
  //
  //  $this->add_count($slug_page);
  //
  //  $this->load->view('layout/wrapper', $data, FALSE);
  // }

  // This is the counter function..
  function add_count($slug_page)
  {
  // load cookie helper
      $this->load->helper('cookie');
  // this line will return the cookie which has slug name
    $check_visitor = $this->input->cookie(urldecode($slug_page), FALSE);
  // this line will return the visitor ip address
      $ip = $this->input->ip_address();
  // if the visitor visit this article for first time then //
   //set new cookie and update article_views column  ..
  //you might be notice we used slug for cookie name and ip
  //address for value to distinguish between articles  views
      if ($check_visitor == false) {
          $cookie = array(
              "name"   => urldecode($slug_page),
              "value"  => "$ip",
              "expire" =>  time() + 7200,
              "secure" => false
          );
          $this->input->set_cookie($cookie);
          $this->page_model->update_counter(urldecode($slug_page));
      }
  }






}

 /* End of file page.php */
 /* Location: ./application/controllers/Page.php */
