<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ketentuan extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://edikomputer.com
   * https://grahastudio.com
   */
  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ketentuan_model');
  }

  public function index()
  {
    $ketentuan = $this->ketentuan_model->get_ketentuan();

    $data = array(
      'title'    => 'Data Ketentuan (' . count($ketentuan) . ')',
      'ketentuan'   => $ketentuan,
      'content'      => 'admin/ketentuan/index'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }


  public function create()
  {
    $ketentuan = $this->ketentuan_model->get_ketentuan();

    $this->form_validation->set_rules(
      'ketentuan_name',
      'Nama Ketentuan',
      'required|is_unique[ketentuan.ketentuan_name]',
      array(
        'required'         => '%s Harus di isi',
      )
    );
    if ($this->form_validation->run() === FALSE) {

      $data = array(
        'title'             => 'Buat Data Ketentuan',
        'ketentuan'              => $ketentuan,
        'content'               => 'admin/ketentuan/create'
      );
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $i              = $this->input;

      $data  = array(
        'ketentuan_name'      => $i->post('ketentuan_name'),
        'ketentuan_desc'      => $i->post('ketentuan_desc'),
        'date_created'        => time()
      );
      $this->ketentuan_model->create($data);
      $this->session->set_flashdata('sukses', '<div class="alert alert-success">Data Ketentuan telah ditambahkan</div>');
      redirect(base_url('admin/ketentuan'), 'refresh');
    }
  }

  public function update($id)
  {
    $ketentuan = $this->ketentuan_model->detail_ketentuan($id);

    $this->form_validation->set_rules(
      'ketentuan_name',
      'Nama Ketentuan',
      'required',
      array('required'         => '%s Harus Di isi')
    );
    if ($this->form_validation->run() === FALSE) {

      $data = array(
        'title'                 => 'Edit Ketentuan',
        'ketentuan'             => $ketentuan,
        'content'               => 'admin/ketentuan/update'
      );
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $i              = $this->input;

      $data  = array(
        'id'                  => $id,
        'ketentuan_name'      => $i->post('ketentuan_name'),
        'ketentuan_desc'      => $i->post('ketentuan_desc'),
        'date_updated'        => time()
      );
      $this->ketentuan_model->update($data);
      $this->session->set_flashdata('sukses', '<div class="alert alert-success">Data Ketentuan telah di Update</div>');
      redirect(base_url('admin/ketentuan'), 'refresh');
    }
  }

  public function delete($id)
  {
    is_login();

    $ketentuan = $this->ketentuan_model->detail_ketentuan($id);
    $data = array('id'   => $ketentuan->id);

    $this->ketentuan_model->delete($data);
    $this->session->set_flashdata('sukses', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect(base_url('admin/ketentuan'), 'refresh');
  }
}
