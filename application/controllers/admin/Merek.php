<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merek extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://edikomputer.com
   * https://grahastudio.com
   */
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('merek_model');
  }

  public function index()
  {
    $merek = $this->merek_model->get_merek();
    $this->form_validation->set_rules(
      'merek_name',
      'Nama Merek',
      'required|is_unique[merek.merek_name]',
      array(
        'required'                        => '%s Harus Diisi',
        'is_unique'                        => '%s <strong>' . $this->input->post('merek_name') .
          '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
      )
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                           => 'Merek Mobil',
        'merek'                             => $merek,
        'content'                         => 'admin/merek/index'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $slugcode = random_string('numeric', 5);
      $merek_slug  = url_title($this->input->post('merek_name'), 'dash', TRUE);
      $data  = [
        'user_id'                           => $this->session->userdata('id'),
        'merek_slug'                        => $slugcode . '-' . $merek_slug,
        'merek_name'                        => $this->input->post('merek_name'),
        'date_created'                      => time()
      ];
      $this->merek_model->create($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
      redirect(base_url('admin/merek'), 'refresh');
    }
  }

  public function update($id)
  {
    $merek = $this->merek_model->detail_merek($id);

    $this->form_validation->set_rules(
      'merek_name',
      'Nama Kategori',
      'required',
      array('required'                  => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {

      $data = [
        'title'                         => 'Edit kategori Berita',
        'merek'                      => $merek,
        'content'                       => 'admin/merek/update'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data  = [
        'id'                            => $id,
        'merek_name'                 => $this->input->post('merek_name'),
        'date_updated'                  => time()
      ];
      $this->merek_model->update($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
      redirect(base_url('admin/merek'), 'refresh');
    }
  }

  public function delete($id)
  {
    is_login();
    $merek = $this->merek_model->detail_merek($id);
    $data = ['id'   => $merek->id];
    $this->merek_model->delete($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect(base_url('admin/merek'), 'refresh');
  }
}
