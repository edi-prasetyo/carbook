<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('page_model');
  }
  //Main Page Page
  public function index()
  {
    $page = $this->page_model->listing();

    $data = array( 'title'    => 'Data Halaman ('.count($page).')',
                   'page'   => $page,
                   'isi'      => 'admin/page/list'
                 );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  public function tambah(){

    $page = $this->page_model->listing();

    //Validasi
    $this->form_validation->set_rules('judul_page','Judul Halaman','required|is_unique[page.judul_page]',
            array ('required'         => '%s Harus Diisi',
                                        ));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Data Halaman ('.count($page).')',
                  'page'              => $page,
                  'isi'               => 'admin/page/tambah'
     );
     $this->load->view('admin/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_page  = url_title($this->input->post('judul_page'), 'dash', TRUE);

     $data  = array(   'slug_page'    => $slug_page,
                       'judul_page'   => $i->post('judul_page'),
                       'isi_page'     => $i->post('isi_page'),
                       'tanggal_post' => date('Y-m-d')
                   );
    $this->page_model->tambah($data);
    $this->session->set_flashdata('sukses','Data Page telah ditambahkan');
    redirect(base_url('admin/page'), 'refresh');
   }
    //End Masuk Database

  }


  //Edit Page
  public function edit($id_page)
  {
    $page = $this->page_model->detail($id_page);
    //Validasi
    $this->form_validation->set_rules('judul_page','Judul Halaman','required',
            array ('required'         => '%s Harus Diisi'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Edit Halaman',
                  'page'              => $page,
                  'isi'               => 'admin/page/edit'
     );
     $this->load->view('admin/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_page  = url_title($this->input->post('judul_page'), 'dash', TRUE);

     $data  = array(    'id_page'     => $id_page,
                        'slug_page'   => $slug_page,
                        'judul_page'   => $i->post('judul_page'),
                        'isi_page'   => $i->post('isi_page'),
                   );
    $this->page_model->edit($data);
    $this->session->set_flashdata('sukses','Data Page telah di Update');
    redirect(base_url('admin/page'), 'refresh');
   }
    //End Masuk Database
  }



  //delete
  public function delete($id_page)
  {
    //Proteksi delete
    $this->check_login->check();

    $page = $this->page_model->detail($id_page);
    $data = array('id_page'   => $page->id_page);

    $this->page_model->delete($data);
    $this->session->set_flashdata('sukses','Data telah di Hapus');
    redirect(base_url('admin/page'), 'refresh');
  }

}

/* end of file Page.php */
/* Location /application/controller/admin/Page.php */
