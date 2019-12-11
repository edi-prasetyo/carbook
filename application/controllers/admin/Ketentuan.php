<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketentuan extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ketentuan_model');
  }
  //Main Ketentuan Ketentuan
  public function index()
  {
    $ketentuan = $this->ketentuan_model->listing();

    $data = array(
      'title'    => 'Data Ketentuan ('.count($ketentuan).')',
      'ketentuan'   => $ketentuan,
      'isi'      => 'admin/ketentuan/list'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  public function tambah(){

    $ketentuan = $this->ketentuan_model->listing();

    //Validasi
    $this->form_validation->set_rules('nama_ketentuan','Nama Ketentuan','required|is_unique[ketentuan.nama_ketentuan]',
    array ('required'         => '%s Harus Diisi',
  ));
  if($this->form_validation->run() === FALSE){
    //End Validasi

    $data = array(
      'title'             => 'Data Ketentuan ('.count($ketentuan).')',
      'ketentuan'              => $ketentuan,
      'isi'               => 'admin/ketentuan/tambah'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
    //Masuk Database
  }else {
    $i              = $this->input;

    $data  = array(
      'nama_ketentuan'   => $i->post('nama_ketentuan'),
      'isi_ketentuan'     => $i->post('isi_ketentuan'),
      'tanggal_post' => date('Y-m-d')
    );
    $this->ketentuan_model->tambah($data);
    $this->session->set_flashdata('sukses','Data Ketentuan telah ditambahkan');
    redirect(base_url('admin/ketentuan'), 'refresh');
  }
  //End Masuk Database

}


//Edit Ketentuan
public function edit($id_ketentuan)
{
  $ketentuan = $this->ketentuan_model->detail($id_ketentuan);
  //Validasi
  $this->form_validation->set_rules('nama_ketentuan','Nama Ketentuan','required',
  array ('required'         => '%s Harus Diisi'));
  if($this->form_validation->run() === FALSE){
    //End Validasi

    $data = array('title'             => 'Edit Ketentuan',
    'ketentuan'              => $ketentuan,
    'isi'               => 'admin/ketentuan/edit'
  );
  $this->load->view('admin/layout/wrapper', $data, FALSE);
  //Masuk Database
}else {
  $i              = $this->input;

  $data  = array(
    'id_ketentuan'     => $id_ketentuan,
    'nama_ketentuan'   => $i->post('nama_ketentuan'),
    'isi_ketentuan'   => $i->post('isi_ketentuan'),
  );
  $this->ketentuan_model->edit($data);
  $this->session->set_flashdata('sukses','Data Ketentuan telah di Update');
  redirect(base_url('admin/ketentuan'), 'refresh');
}
//End Masuk Database
}



//delete
public function delete($id_ketentuan)
{
  //Proteksi delete
  $this->check_login->check();

  $ketentuan = $this->ketentuan_model->detail($id_ketentuan);
  $data = array('id_ketentuan'   => $ketentuan->id_ketentuan);

  $this->ketentuan_model->delete($data);
  $this->session->set_flashdata('sukses','Data telah di Hapus');
  redirect(base_url('admin/ketentuan'), 'refresh');
}

}

/* end of file Ketentuan.php */
/* Location /application/controller/admin/Ketentuan.php */
