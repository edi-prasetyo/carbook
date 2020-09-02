<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('products_model');
    $this->load->model('transaksi_model');
    $this->load->model('category_products_model');
  }
  public function index()
  {
    $user_seller                  = $this->user_model->user_seller();
    $products                     = $this->products_model->get_allproducts();
    $transaksi                    = $this->transaksi_model->get_alltransaksi();
    $new_transaksi                = $this->transaksi_model->new_transaksi();
    $new_products                 = $this->products_model->new_products();
    $category_products            = $this->category_products_model->get_category_products();
    $list_user                    = $this->user_model->listUser();
    $data = [
      'title'                     => 'Dashboard',
      'list_user'                 => $list_user,
      'user_seller'               => $user_seller,
      'products'                  => $products,
      'transaksi'                 => $transaksi,
      'new_transaksi'             => $new_transaksi,
      'new_products'              => $new_products,
      'category_products'         => $category_products,
      'content'                   => 'admin/dashboard/dashboard'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }
}
