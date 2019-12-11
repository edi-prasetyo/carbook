<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('info_model');
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat

  }


  //listing data info
  public function index()
  {
    $info = $this->info_model->listing();
    //$total_info = $this->info_model->total_info();

    $data = array( 'title'    => 'Data Nomor Rekening ('.count($info).')',
                   'info'   => $info,
                   //'total_info' =>$total_info,
                   'isi'      => 'admin/info/list'
                 );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);
  }



  public function tambah()
  {

        //Validasi
        $this->form_validation->set_rules('judul_info','Judul Info','required',
                array (   'required'        => '%s Harus Diisi'));

        $this->form_validation->set_rules('isi_info','Isi Info','required',
                array (   'required'        => '%s Harus Diisi'));



        if($this->form_validation->run() === FALSE){
          //End Validasi


        $data = array(  'title'        => 'Tambah Info',
                       'isi'          => 'admin/info/tambah'
       );
       $this->load->view('admin/layout/wrapper', $data, FALSE);

       }else {
         $i              = $this->input;

         $data  = array(
                           'id_user'          => $this->session->userdata('id_user'),
                           'slug_info'        => url_title($this->input->post('judul_info'), 'dash', TRUE),
                           'judul_info'       => $i->post('judul_info'),
                           'isi_info'         => $i->post('isi_info'),
                           'tanggal_post'     => date('Y-m-d')
                       );
        $this->info_model->tambah($data);
        $this->session->set_flashdata('sukses','Info Berhasil ditambahkan');
        redirect(base_url('admin/info'), 'refresh');
       }
        //End Masuk Database


  }


  public function edit($id_info)
  {
	  $info = $this->info_model->detail($id_info);

        //Validasi
        $this->form_validation->set_rules('nama_bank','Nama Bank','required',
                array (   'required'        => '%s Harus Diisi'));



        if($this->form_validation->run() === FALSE){
          //End Validasi


        $data = array(  'title'        => 'Edit Info',
					  	'info'		=>	$info,
                       'isi'          => 'admin/info/edit'
       );
       $this->load->view('admin/layout/wrapper', $data, FALSE);

       }else {
         $i              = $this->input;

         $data  = array(
                           	'id_user'          	=> $this->session->userdata('id_user'),
			 				'id_info'     		=> $id_info,
                           	'nama_bank'       	=> $i->post('nama_bank'),
                           	'nomor_rek'         => $i->post('nomor_rek'),
			 				'cabang'         	=> $i->post('cabang'),
			 				'atas_nama'         => $i->post('atas_nama'),
			 				'telpon'         	=> $i->post('telpon'),
                           	'tanggal_update'    => date('Y-m-d H:i:s')
                       );
        $this->info_model->edit($data);
        $this->session->set_flashdata('sukses','Info Berhasil di Ubah');
        redirect(base_url('admin/info'), 'refresh');
       }
        //End Masuk Database


  }


        //delete
        public function delete($id_info)
        {
          //Proteksi delete
          $this->check_login->check();

          $info = $this->info_model->detail($id_info);


          $data = array('id_info'   => $info->id_info);
          $this->info_model->delete($data);
          $this->session->set_flashdata('sukses','Data telah di Hapus');
          redirect(base_url('admin/info'), 'refresh');
        }


}


/* end of file Pendaftaran.php */
/* Location /application/controller/admin/Pendaftaran.php */
