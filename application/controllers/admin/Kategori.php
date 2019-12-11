<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kategori_model');
  }
  //Main Page Kategori
  public function index()
  {
    $kategori = $this->kategori_model->listing();

    //Validasi
    $this->form_validation->set_rules('nama_kategori','Nama_Kategori','required|is_unique[kategori.nama_kategori]',
            array ('required'         => '%s Harus Diisi',
                   'is_unque'         => '%s <strong>' .$this->input->post('nama_kategori').
                                         '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Data kategori Berita ('.count($kategori).')',
                  'kategori'          => $kategori,
                  'isi'               => 'admin/kategori/list'
     );
     $this->load->view('admin/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_kategori  = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

     $data  = array(   'slug_kategori'   => $slug_kategori,
                       'nama_kategori'   => $i->post('nama_kategori')
                   );
    $this->kategori_model->tambah($data);
    $this->session->set_flashdata('sukses','Data telah ditambahkan');
    redirect(base_url('admin/kategori'), 'refresh');
   }
    //End Masuk Database
  }


  //Edit Kategori
  public function edit($id_kategori)
  {
    $kategori = $this->kategori_model->detail($id_kategori);
    //Validasi
    $this->form_validation->set_rules('nama_kategori','Nama_Kategori','required',
            array ('required'         => '%s Harus Diisi'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Edit kategori Berita',
                  'kategori'          => $kategori,
                  'isi'               => 'admin/kategori/edit'
     );
     $this->load->view('admin/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_kategori  = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

     $data  = array(    'id_kategori'     => $id_kategori,
                        'slug_kategori'   => $slug_kategori,
                        'nama_kategori'   => $i->post('nama_kategori'),
                   );
    $this->kategori_model->edit($data);
    $this->session->set_flashdata('sukses','Data telah di Update');
    redirect(base_url('admin/kategori'), 'refresh');
   }
    //End Masuk Database
  }



  //delete
  public function delete($id_kategori)
  {
    //Proteksi delete
    $this->check_login->check();

    $kategori = $this->kategori_model->detail($id_kategori);
    $data = array('id_kategori'   => $kategori->id_kategori);

    $this->kategori_model->delete($data);
    $this->session->set_flashdata('sukses','Data telah di Hapus');
    redirect(base_url('admin/kategori'), 'refresh');
  }

}

/* end of file Kategori.php */
/* Location /application/controller/admin/Kategori.php */
