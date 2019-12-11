<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kontak_model');

  }
  //main page - home page
  public function index()
  {
    $konfigurasi    = $this->konfigurasi_model->listing();

    //Validasi
    $this->form_validation->set_rules('nama','Nama','required',
            array (   'required'        => '%s Harus Diisi'));

    $this->form_validation->set_rules('email','Email','required',
            array (   'required'        => '%s Harus Diisi'));

    $this->form_validation->set_rules('telepon','Nomor Telepon/Hp','required',
            array (   'required'        => '%s Harus Diisi'));

    $this->form_validation->set_rules('pesan','Pesan','required',
            array (   'required'        => '%s Harus Diisi'));



    if($this->form_validation->run() === FALSE){
      //End Validasi


    $data = array(  'title'       => 'Kontak '.$konfigurasi->namaweb,
                    'keywords'    => 'Kontak '.$konfigurasi->namaweb.' - '.$konfigurasi->tagline,
                    'deskripsi'   => 'Kontak '.$konfigurasi->namaweb.' - '.$konfigurasi->tagline,
                    'konfigurasi' => $konfigurasi,
                    'isi'         => 'kontak/list'
   );
   $this->load->view('layout/wrapper', $data, FALSE);

 }else {
   $i              = $this->input;

   $data  = array(
                     'nama'         => $i->post('nama'),
                     'email'           => $i->post('email'),
                     'telepon'         => $i->post('telepon'),
                     'pesan'          => $i->post('pesan'),
                     'tanggal_post'   => date('Y-m-d')
                 );
  $this->kontak_model->tambah($data);
  $this->session->set_flashdata('sukses','Pesan Anda telah Dikirm');
  redirect(base_url('kontak'), 'refresh');
 }
  //End Masuk Database


  }
}

 /* End of file Kontak.php */
 /* Location: ./application/controllers/Kontak.php */
