<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oops extends CI_Controller{
  //main page - home page
  public function index()
  {
    $data = array('title' => 'Oops! Halaman tidak di temukan',
                  'deskripsi' => 'error 404',
                  'keywords' => 'keywords',
                   'isi'  => 'oops/list'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }
}

 /* End of file Kontak.php */
 /* Location: ./application/controllers/Kontak.php */
