<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('transaksi_model');
  }
  public function index()
  {
    $user_member                  = $this->user_model->user_member();
    $transaksi                    = $this->transaksi_model->get_alltransaksi();
    $new_transaksi                = $this->transaksi_model->new_transaksi();
    $list_user                    = $this->user_model->listUser();
    $count_user                    = $this->user_model->listUser();
    $data = [
      'title'                     => 'Dashboard',
      'list_user'                 => $list_user,
      'user_member'               => $user_member,
      'transaksi'                 => $transaksi,
      'new_transaksi'             => $new_transaksi,
      'count_user'                => $count_user,
      'content'                   => 'admin/dashboard/dashboard'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }
}
