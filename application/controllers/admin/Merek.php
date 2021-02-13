<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('merek_model');
  }
  //listing data mobil
  public function index()
  {
    $merek = $this->merek_model->get_merek();
    //Validasi
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
        'content'                         => 'admin/merek/index_merek'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
        $slugcode = random_string('numeric', 5);
      $merek_slug  = url_title($this->input->post('merek_name'), 'dash', TRUE);
      $data  = [
        'user_id'                           => $this->session->userdata('id'),
        'merek_slug'                        => $slugcode . '-' .$merek_slug,
        'merek_name'                        => $this->input->post('merek_name'),
        'date_created'                      => time()
      ];
      $this->merek_model->create($data);
      $this->session->set_flashdata('message', 'Data telah ditambahkan');
      redirect(base_url('admin/merek'), 'refresh');
    }
  }
  //Update
  public function update($id)
  {
    $merek = $this->merek_model->detail_merek($id);
    //Validasi
    $this->form_validation->set_rules(
      'merek_name',
      'Nama Kategori',
      'required',
      array('required'                  => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi
      $data = [
        'title'                         => 'Edit kategori Berita',
        'merek'                      => $merek,
        'content'                       => 'admin/merek/update_merek'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
      //Masuk Database
    } else {
      $data  = [
        'id'                            => $id,
        'merek_name'                 => $this->input->post('merek_name'),
        'date_updated'                  => time()
      ];
      $this->merek_model->update($data);
      $this->session->set_flashdata('message', 'Data telah di Update');
      redirect(base_url('admin/merek'), 'refresh');
    }
    //End Masuk Database
  }
  //delete Merek
  public function delete($id)
  {
    //Proteksi delete
    is_login();
    $merek = $this->merek_model->detail_merek($id);
    $data = ['id'   => $merek->id];
    $this->merek_model->delete($data);
    $this->session->set_flashdata('message', 'Data telah di Hapus');
    redirect(base_url('admin/merek'), 'refresh');
  }

}