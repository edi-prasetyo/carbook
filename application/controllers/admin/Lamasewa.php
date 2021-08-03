<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamasewa extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://ediomputer.com
   * https://grahastudio.com
   */

  public function __construct()
  {
    parent::__construct();
    $this->load->model('lamasewa_model');
  }

  public function index()
  {
    $lamasewa = $this->lamasewa_model->get_lamasewa();

    $this->form_validation->set_rules(
      'lama_sewa',
      'Lama Sewa',
      'required|is_unique[lamasewa.lama_sewa]',
      array(
        'required'                        => '%s Harus Diisi',
        'is_unque'                        => '%s <strong>' . $this->input->post('lama_sewa') .
          '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
      )
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                           => 'Durasi sewa',
        'lamasewa'                        => $lamasewa,
        'content'                         => 'admin/lamasewa/index'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data  = [
        'lama_sewa'                       => $this->input->post('lama_sewa'),
        'status'                          => $this->input->post('status'),
        'date_created'                    => date('Y-m-d H:i:s')
      ];
      $this->lamasewa_model->create($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
      redirect(base_url('admin/lamasewa'), 'refresh');
    }
  }

  public function update($id)
  {
    $lamasewa = $this->lamasewa_model->detail_lamasewa($id);

    $this->form_validation->set_rules(
      'lama_sewa',
      'Lama Sewa',
      'required',
      array('required'                  => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {

      $data = [
        'title'                         => 'Edit kategori Berita',
        'lamasewa'                      => $lamasewa,
        'content'                       => 'admin/lamasewa/update'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data  = [
        'id'                            => $id,
        'lama_sewa'                       => $this->input->post('lama_sewa'),
        'status'                          => $this->input->post('status'),
        'date_updated'                    => date('Y-m-d H:i:s')
      ];
      $this->lamasewa_model->update($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
      redirect(base_url('admin/lamasewa'), 'refresh');
    }
  }

  public function delete($id)
  {
    is_login();
    $lamasewa = $this->lamasewa_model->detail_lamasewa($id);
    $data = ['id'   => $lamasewa->id];
    $this->lamasewa_model->delete($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect(base_url('admin/lamasewa'), 'refresh');
  }
}
