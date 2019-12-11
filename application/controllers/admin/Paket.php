<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mobil_model');
    $this->load->model('merek_model');
    $this->load->model('jenismobil_model');
  }
  //listing data mobil
  public function index()
  {
    $mobil = $this->mobil_model->listing();
    $data = array( 'title'    => 'Data mobil ('.count($mobil).')',
                   'mobil'   => $mobil,
                   'isi'      => 'admin/mobil/list'
                 );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

}
