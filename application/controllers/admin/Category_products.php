<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_products extends CI_Controller
{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('category_products_model');
  }
  //Index Category
  public function index()
  {
    $category_products                  = $this->category_products_model->get_category_products();
    //Validasi
    $this->form_validation->set_rules(
      'category_product_name',
      'Nama Kategori',
      'required|is_unique[category_products.category_product_name]',
      array(
        'required'                      => '%s Harus Diisi',
        'is_unque'                      => '%s <strong>' . $this->input->post('category_product_name') .
        '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
      )
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                         => 'Category Produk',
        'category_products'             => $category_products,
        'content'                       => 'admin/category_products/index_category_product'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $category_product_slug  = url_title($this->input->post('category_name'), 'dash', TRUE);
      $data  = [
        'category_product_slug'         => $category_product_slug,
        'category_product_name'         => $this->input->post('category_product_name'),
        'date_created'                  => time()
      ];
      $this->category_products_model->create($data);
      $this->session->set_flashdata('message', 'Data telah ditambahkan');
      redirect(base_url('admin/category_products'), 'refresh');
    }
  }
  //Update
  public function update($id)
  {
    $category_products = $this->category_products_model->detail_category_product($id);
    //Validasi
    $this->form_validation->set_rules(
      'category_product_name',
      'Nama Kategori',
      'required',
      array('required'         => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi
      $data = [
        'title'                         => 'Edit kategori Berita',
        'category_products'             => $category_products,
        'content'                       => 'admin/category_product/update_category'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
      //Masuk Database
    } else {
      $data  = [
        'id'                            => $id,
        'category_product_name'         => $this->input->post('category_product_name'),
        'date_updated'                  => time()
      ];
      $this->category_products_model->update($data);
      $this->session->set_flashdata('message', 'Data telah di Update');
      redirect(base_url('admin/category_products'), 'refresh');
    }
    //End Masuk Database
  }
  //delete Category
  public function delete($id)
  {
    //Proteksi delete
    is_login();
    $category_products = $this->category_products_model->detail_category_product($id);
    $data = ['id'                       => $category_products->id];
    $this->category_products_model->delete($data);
    $this->session->set_flashdata('message', 'Data telah di Hapus');
    redirect(base_url('admin/category_products'), 'refresh');
  }
}
