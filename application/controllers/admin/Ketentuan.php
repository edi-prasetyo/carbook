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
    $ketentuan = $this->ketentuan_model->get_ketentuan();

    $data = array(
      'title'    => 'Data Ketentuan ('.count($ketentuan).')',
      'ketentuan'   => $ketentuan,
      'content'      => 'admin/ketentuan/index_ketentuan'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }


  public function create(){

    $ketentuan = $this->ketentuan_model->get_ketentuan();

    //Validasi
    $this->form_validation->set_rules('ketentuan_name','Nama Ketentuan','required|is_unique[ketentuan.ketentuan_name]',
    array ('required'         => '%s Harus Dicontent',
  ));
  if($this->form_validation->run() === FALSE){
    //End Validasi

    $data = array(
      'title'             => 'Data Ketentuan ('.count($ketentuan).')',
      'ketentuan'              => $ketentuan,
      'content'               => 'admin/ketentuan/create_ketentuan'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
    //Masuk Database
  }else {
    $i              = $this->input;

    $data  = array(
      'ketentuan_name'      => $i->post('ketentuan_name'),
      'ketentuan_desc'      => $i->post('ketentuan_desc'),
      'date_created'        => time()
    );
    $this->ketentuan_model->create($data);
    $this->session->set_flashdata('sukses','Data Ketentuan telah ditambahkan');
    redirect(base_url('admin/ketentuan'), 'refresh');
  }
  //End Masuk Database

}


//Edit Ketentuan
public function update($id)
{
  $ketentuan = $this->ketentuan_model->detail($id);
  //Validasi
  $this->form_validation->set_rules('nama_ketentuan','Nama Ketentuan','required',
  array ('required'         => '%s Harus Dicontent'));
  if($this->form_validation->run() === FALSE){
    //End Validasi

    $data = array('title'             => 'Edit Ketentuan',
    'ketentuan'              => $ketentuan,
    'content'               => 'admin/ketentuan/edit'
  );
  $this->load->view('admin/layout/wrapp', $data, FALSE);
  //Masuk Database
}else {
  $i              = $this->input;

  $data  = array(
    'id_ketentuan'     => $id,
    'nama_ketentuan'   => $i->post('nama_ketentuan'),
    'content_ketentuan'   => $i->post('content_ketentuan'),
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
