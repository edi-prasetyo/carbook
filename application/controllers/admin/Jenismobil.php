<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenismobil extends CI_Controller{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('jenismobil_model');
  }
  //listing data mobil
  public function index()
  {
    $jenismobil = $this->jenismobil_model->get_jenismobil();
    //Validasi
    $this->form_validation->set_rules(
      'jenismobil_name',
      'Nama Jenismobil',
      'required|is_unique[jenismobil.jenismobil_name]',
      array(
        'required'                        => '%s Harus Diisi',
        'is_unique'                        => '%s <strong>' . $this->input->post('jenismobil_name') .
        '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
      )
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                           => 'Jenismobil Mobil',
        'jenismobil'                             => $jenismobil,
        'content'                         => 'admin/jenismobil/index_jenismobil'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data  = [
        'user_id'                           => $this->session->userdata('id'),
        'jenismobil_name'                        => $this->input->post('jenismobil_name'),
        'date_created'                      => time()
      ];
      $this->jenismobil_model->create($data);
      $this->session->set_flashdata('message', 'Data telah ditambahkan');
      redirect(base_url('admin/jenismobil'), 'refresh');
    }
  }
  //Update
  public function update($id)
  {
    $jenismobil = $this->jenismobil_model->detail_jenismobil($id);
    //Validasi
    $this->form_validation->set_rules(
      'jenismobil_name',
      'Nama Tipe',
      'required',
      array('required'                  => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi
      $data = [
        'title'                         => 'Edit Jenis Mobil',
        'jenismobil'                      => $jenismobil,
        'content'                       => 'admin/jenismobil/update_jenismobil'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
      //Masuk Database
    } else {
      $data  = [
        'id'                            => $id,
        'jenismobil_name'                 => $this->input->post('jenismobil_name'),
        'date_updated'                  => time()
      ];
      $this->jenismobil_model->update($data);
      $this->session->set_flashdata('message', 'Data telah di Update');
      redirect(base_url('admin/jenismobil'), 'refresh');
    }
    //End Masuk Database
  }
  //delete Jenismobil
  public function delete($id)
  {
    //Proteksi delete
    is_login();
    $jenismobil = $this->jenismobil_model->detail_jenismobil($id);
    $data = ['id'   => $jenismobil->id];
    $this->jenismobil_model->delete($data);
    $this->session->set_flashdata('message', 'Data telah di Hapus');
    redirect(base_url('admin/jenismobil'), 'refresh');
  }

}