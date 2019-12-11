<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kontak_model');
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat

  }


  //listing data kontak
  public function index()
  {
    $kontak = $this->kontak_model->listing();
    //$total_kontak = $this->kontak_model->total_kontak();

    $data = array( 'title'    => 'Data Pesan Masuk ('.count($kontak).')',
                   'kontak'   => $kontak,
                   //'total_kontak' =>$total_kontak,
                   'isi'      => 'admin/kontak/list'
                 );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  //View Pendaftaran
  public function lihat($id_kontak)
  {
    $kontak = $this->kontak_model->detail($id_kontak);


    $data = array('title'             => 'View Data Pendaftaran',
                  'kontak'       => $kontak,
                  'id_kontak'    => $id_kontak,
                  'isi'               => 'admin/kontak/lihat'
     );
     $this->load->view('admin/layout/wrapper', $data, FALSE);

   }


        //delete
        public function delete($id_kontak)
        {
          //Proteksi delete
          $this->check_login->check();

          $kontak = $this->kontak_model->detail($id_kontak);


          $data = array('id_kontak'   => $kontak->id_kontak);
          $this->kontak_model->delete($data);
          $this->session->set_flashdata('sukses','Data telah di Hapus');
          redirect(base_url('admin/kontak'), 'refresh');
        }


}


/* end of file Pendaftaran.php */
/* Location /application/controller/admin/Pendaftaran.php */
