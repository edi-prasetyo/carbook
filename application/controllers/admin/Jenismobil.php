<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenismobil extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://edikomputer.com
   * https://grahastudio.com
   */

  public function __construct()
  {
    parent::__construct();
    $this->load->model('jenismobil_model');
  }

  public function index()
  {
    $jenismobil = $this->jenismobil_model->get_jenismobil();

    $this->form_validation->set_rules(
      'jenismobil_name',
      'Nama Jenismobil',
      'required|is_unique[jenismobil.jenismobil_name]',
      array(
        'required'                          => '%s Harus Diisi',
        'is_unique'                         => '%s <strong>' . $this->input->post('jenismobil_name') .
          '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
      )
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                                   => 'Jenis mobil',
        'jenismobil'                              => $jenismobil,
        'content'                                 => 'admin/jenismobil/index'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data  = [
        'user_id'                                 => $this->session->userdata('id'),
        'jenismobil_name'                         => $this->input->post('jenismobil_name'),
        'date_created'                            => time()
      ];
      $this->jenismobil_model->create($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
      redirect(base_url('admin/jenismobil'), 'refresh');
    }
  }

  public function update($id)
  {
    $jenismobil = $this->jenismobil_model->detail_jenismobil($id);

    $this->form_validation->set_rules(
      'jenismobil_name',
      'Nama Tipe',
      'required',
      array('required'                  => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {

      $data = [
        'title'                           => 'Edit Jenis Mobil',
        'jenismobil'                      => $jenismobil,
        'content'                         => 'admin/jenismobil/update'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data  = [
        'id'                              => $id,
        'jenismobil_name'                 => $this->input->post('jenismobil_name'),
        'date_updated'                    => time()
      ];
      $this->jenismobil_model->update($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
      redirect(base_url('admin/jenismobil'), 'refresh');
    }
  }

  public function delete($id)
  {
    is_login();
    $jenismobil = $this->jenismobil_model->detail_jenismobil($id);
    $data = ['id'   => $jenismobil->id];
    $this->jenismobil_model->delete($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect(base_url('admin/jenismobil'), 'refresh');
  }
}
