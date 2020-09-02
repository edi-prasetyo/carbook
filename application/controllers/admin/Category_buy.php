<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_buy extends CI_Controller
{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('category_buy_model');
  }
  //Index Category
  public function index()
  {
    $category_buy = $this->category_buy_model->get_category_buy();
    //Validasi
    $this->form_validation->set_rules(
      'category_buy_name','Nama Kategori','required|is_unique[category_buy.category_buy_name]',
      array(
        'required'                      => '%s Harus Diisi',
        'is_unque'                      => '%s <strong>' . $this->input->post('category_buy_name') .
        '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
      )
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                         => 'Category Jual',
        'category_buy'                  => $category_buy,
        'content'                       => 'admin/category_buy/index_category_buy'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $category_buy_slug  = url_title($this->input->post('category_buy_name'), 'dash', TRUE);
      $data  = [
        'category_buy_slug'             => $category_buy_slug,
        'category_buy_name'             => $this->input->post('category_buy_name'),
        'date_created'                  => time()
      ];
      $this->category_buy_model->create($data);
      $this->session->set_flashdata('message', 'Data telah ditambahkan');
      redirect(base_url('admin/category_buy'), 'refresh');
    }
  }
  //Update
  public function update($id)
  {
    $category_buy = $this->category_buy_model->detail_category_buy($id);
    //Validasi
    $this->form_validation->set_rules(
      'category_buy_name',
      'Nama Kategori',
      'required',
      array('required'                  => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi
      $data = [
        'title'                         => 'Edit kategori Berita',
        'category_buy'                  => $category_buy,
        'content'                       => 'admin/category_buy/update_category_buy'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
      //Masuk Database
    } else {
      $data  = [
        'id'                            => $id,
        'category_buy_name'             => $this->input->post('category_buy_name'),                'date_updated'              => time()
      ];
      $this->category_buy_model->update($data);
      $this->session->set_flashdata('message', 'Data telah di Update');
      redirect(base_url('admin/category_buy'), 'refresh');
    }
    //End Masuk Database
  }
  //delete Category
  public function delete($id)
  {
    //Proteksi delete
    is_login();
    $category_buy = $this->category_buy_model->detail_category_buy($id);
    $data = ['id'                         => $category_buy->id];
    $this->category_buy_model->delete($data);
    $this->session->set_flashdata('message', 'Data telah di Hapus');
    redirect(base_url('admin/category_buy'), 'refresh');
  }
}
