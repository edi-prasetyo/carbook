<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('merek_model');
  }
  //Main Page Merek
  public function index()
  {
    $merek = $this->merek_model->listing();

    //Validasi
    $this->form_validation->set_rules('nama_merek','Nama_Merek','required|is_unique[merek.nama_merek]',
            array ('required'         => '%s Harus Diisi',
                   'is_unque'         => '%s <strong>' .$this->input->post('nama_merek').
                                         '</strong>Nama Merek Sudah Ada. Buat Nama yang lain!'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Data merek Berita ('.count($merek).')',
                  'merek'          => $merek,
                  'isi'               => 'admin/merek/list'
     );
     $this->load->view('admin/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_merek  = url_title($this->input->post('nama_merek'), 'dash', TRUE);

     $data  = array(   'slug_merek'   => $slug_merek,
                       'nama_merek'   => $i->post('nama_merek')
                   );
    $this->merek_model->tambah($data);
    $this->session->set_flashdata('sukses','Data telah ditambahkan');
    redirect(base_url('admin/merek'), 'refresh');
   }
    //End Masuk Database
  }


  //Edit Merek
  public function edit($id_merek)
  {
    $merek = $this->merek_model->detail($id_merek);
    //Validasi
    $this->form_validation->set_rules('nama_merek','Nama_Merek','required',
            array ('required'         => '%s Harus Diisi'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Edit merek Berita',
                  'merek'          => $merek,
                  'isi'               => 'admin/merek/edit'
     );
     $this->load->view('admin/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_merek  = url_title($this->input->post('nama_merek'), 'dash', TRUE);

     $data  = array(    'id_merek'     => $id_merek,
                        'slug_merek'   => $slug_merek,
                        'nama_merek'   => $i->post('nama_merek'),
                   );
    $this->merek_model->edit($data);
    $this->session->set_flashdata('sukses','Data telah di Update');
    redirect(base_url('admin/merek'), 'refresh');
   }
    //End Masuk Database
  }



  //delete
  public function delete($id_merek)
  {
    //Proteksi delete
    $this->check_login->check();

    $merek = $this->merek_model->detail($id_merek);
    $data = array('id_merek'   => $merek->id_merek);

    $this->merek_model->delete($data);
    $this->session->set_flashdata('sukses','Data telah di Hapus');
    redirect(base_url('admin/merek'), 'refresh');
  }

}

/* end of file Merek.php */
/* Location /application/controller/admin/Merek.php */
