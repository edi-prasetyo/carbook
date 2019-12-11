<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenismobil extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('jenismobil_model');
  }
  //Main Page Jenismobil
  public function index()
  {
    $jenismobil = $this->jenismobil_model->listing();

    //Validasi
    $this->form_validation->set_rules('nama_jenismobil','Nama_Jenismobil','required|is_unique[jenismobil.nama_jenismobil]',
            array ('required'         => '%s Harus Diisi',
                   'is_unque'         => '%s <strong>' .$this->input->post('nama_jenismobil').
                                         '</strong>Nama Jenismobil Sudah Ada. Buat Nama yang lain!'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Data jenismobil Berita ('.count($jenismobil).')',
                  'jenismobil'          => $jenismobil,
                  'isi'               => 'admin/jenismobil/list'
     );
     $this->load->view('admin/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_jenismobil  = url_title($this->input->post('nama_jenismobil'), 'dash', TRUE);

     $data  = array(   'slug_jenismobil'   => $slug_jenismobil,
                       'nama_jenismobil'   => $i->post('nama_jenismobil')
                   );
    $this->jenismobil_model->tambah($data);
    $this->session->set_flashdata('sukses','Data telah ditambahkan');
    redirect(base_url('admin/jenismobil'), 'refresh');
   }
    //End Masuk Database
  }


  //Edit Jenismobil
  public function edit($id_jenismobil)
  {
    $jenismobil = $this->jenismobil_model->detail($id_jenismobil);
    //Validasi
    $this->form_validation->set_rules('nama_jenismobil','Nama_Jenismobil','required',
            array ('required'         => '%s Harus Diisi'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Edit jenismobil Berita',
                  'jenismobil'          => $jenismobil,
                  'isi'               => 'admin/jenismobil/edit'
     );
     $this->load->view('admin/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_jenismobil  = url_title($this->input->post('nama_jenismobil'), 'dash', TRUE);

     $data  = array(    'id_jenismobil'     => $id_jenismobil,
                        'slug_jenismobil'   => $slug_jenismobil,
                        'nama_jenismobil'   => $i->post('nama_jenismobil'),
                   );
    $this->jenismobil_model->edit($data);
    $this->session->set_flashdata('sukses','Data telah di Update');
    redirect(base_url('admin/jenismobil'), 'refresh');
   }
    //End Masuk Database
  }



  //delete
  public function delete($id_jenismobil)
  {
    //Proteksi delete
    $this->check_login->check();

    $jenismobil = $this->jenismobil_model->detail($id_jenismobil);
    $data = array('id_jenismobil'   => $jenismobil->id_jenismobil);

    $this->jenismobil_model->delete($data);
    $this->session->set_flashdata('sukses','Data telah di Hapus');
    redirect(base_url('admin/jenismobil'), 'refresh');
  }

}

/* end of file Jenismobil.php */
/* Location /application/controller/admin/Jenismobil.php */
