<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connect extends CI_Controller{
  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  //Load Login Page
  public function auth()
  {

    if ($this->session->userdata('email')) {
      redirect(base_url('admin/dashboard'),'refresh');
     }

    //Validasi
     $valid = $this->form_validation;

     $valid->set_rules('email','Email','required|trim',
                         array( 'required'      => '%s harus diisi'));

     $valid->set_rules('password','Password','required',
                         array( 'required'      => '%s harus diisi'));

     if($valid->run()){
       $email     = $this->input->post('email');
       $password      = $this->input->post('password');
       //Compare dengan data di database
       $check_login   = $this->user_model->login($email,$password);
       //Kalau ada data yang cocok maka Create SESSION ada 4 (id_user, username, Akses_Level dan Nama)
       if($check_login){
         $this->session->set_userdata('id_user',$check_login->id_user);
         $this->session->set_userdata('email',$check_login->email);
         $this->session->set_userdata('nama',$check_login->nama);
         $this->session->set_userdata('akses_level',$check_login->akses_level);
         $this->session->set_flashdata('sukses', 'Anda Berhasil Login');
         redirect(base_url('admin/dashboard'),'refresh');
       }else{
         //Kalau tidak Cocok maka error dan redirect ke halaman login lagi
         $this->session->set_flashdata('sukses', 'Email Atau Password Salah');
         redirect(base_url('login'),'refresh');
       }
     }
    //end Validasi

    $data = array('title' => 'Login Administrator' );
    $this->load->view('admin/login/list', $data, FALSE);
  }

  //logout
  public function logout()
  {
    $this->check_login->logout();
  }
}
