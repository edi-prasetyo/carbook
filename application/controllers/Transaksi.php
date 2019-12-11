<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('transaksi_model');
    $this->load->model('konfigurasi_model');
	  $this->load->model('info_model');
  }
  //listing data transaksi
  public function index()
  {
    $transaksi = $this->transaksi_model->get_all();
    $data = array(
      'title'       => 'Cek Pesanan',
      'deskripsi'   => 'Cek Pesanan Rental Mobil',
      'keywords'    => 'Transaksi',
      'transaksi'   => $transaksi,
      'isi'         => 'transaksi/list'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

  public function detail()
  {
    $site_info 	= $this->konfigurasi_model->listing();
	$info		= $this->info_model->listing();
    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'kode_transaksi',
      'Kode Transaksi',
      'required|trim',
      array('required'      => '%s harus diisi')
    );

    $valid->set_rules(
      'email',
      'Email',
      'required',
      array('required'      => '%s harus diisi')
    );


    if ($valid->run() === FALSE) {
      //End Validasi

      $data = array(
        'title'           => 'Transaksi',
        'deskripsi'       => 'Deskripsi',
        'keywords'        => 'Transaksi Angelita Rentcar',
        // 'detail_transaksi'        => $detail_transaksi,
        'site_info'       => $site_info,
		  'info' 		=> $info,
        'isi'             => 'transaksi/detail'
      );
      $this->load->view('layout/wrapper', $data, FALSE);
      //Masuk Database
    } else {
      $kode_transaksi             = $this->input->post('kode_transaksi');
      $email                      = $this->input->post('email');
      $detail_transaksi           = $this->transaksi_model->cek_transaksi($kode_transaksi, $email);

      $data = array(
        'title'           => 'Transaksi',
        'deskripsi'       => 'Deskripsi',
        'keywords'        => 'Transaksi Angelita Rentcar',
        'detail_transaksi'        => $detail_transaksi,
        'site_info'       => $site_info,
		  'info'		=> $info,
        'isi'             => 'transaksi/detail'
      );
      $this->load->view('layout/wrapper', $data, FALSE);
    }
  }

  //Tambah transaksi
  public function konfirmasi($id_transaksi)
  {
    $transaksi = $this->transaksi_model->detail($id_transaksi);
    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'rek_pembayaran',
      'Rek Pembayaran',
      'required',
      array('required'      => '%s harus diisi')
    );

    $valid->set_rules(
      'nama_bank',
      'Nama Bank',
      'required',
      array('required'      => '%s harus diisi')
    );

    $valid->set_rules(
      'rek_pelanggan',
      'Nomor Rekening',
      'required',
      array('required'      => '%s harus diisi')
    );

    $valid->set_rules(
      'nama_pemilik',
      'Nama Pemilik',
      'required',
      array('required'      => '%s harus diisi')
    );

    $valid->set_rules(
      'tanggal_bayar',
      'Tanggal Bayar',
      'required',
      array('required'      => '%s harus diisi')
    );

    $valid->set_rules(
      'jumlah_bayar',
      'Jumlah Bayar',
      'required',
      array('required'      => '%s harus diisi')
    );




    if ($valid->run()) {

      $config['upload_path']          = './assets/upload/struk/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5000; //Dalam Kilobyte
      $config['max_width']            = 5000; //Lebar (pixel)
      $config['max_height']           = 5000; //tinggi (pixel)
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('bukti_bayar')) {

        //End Validasi
        $data = array(
          'title'         => 'Update transaksi',
          'deskripsi'   => 'Deskripsi',
          'keywords'    => 'Transaksi Angelita Rentcar',
          'transaksi'     => $transaksi,
          'error_upload'  => $this->upload->display_errors(),
          'isi'           => 'transaksi/konfirmasi'
        );
        $this->load->view('layout/wrapper', $data, FALSE);

        //Masuk Database

      } else {

        //Proses Manipulasi Gambar
        $upload_data    = array('uploads'  => $this->upload->data());
        //Gambar Asli disimpan di folder assets/upload/Struk
        //lalu gambara Asli di copy untuk versi mini size ke folder assets/upload/struk/thumbs

        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/struk/' . $upload_data['uploads']['file_name'];
        //Gambar Versi Kecil dipindahkan
        $config['new_image']        = './assets/upload/struk/thumbs/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 200;
        $config['height']           = 200;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();


        $i     = $this->input;

        $data  = array(
          'id_transaksi'          => $id_transaksi,
          'rek_pembayaran'        => $i->post('rek_pembayaran'),
          'nama_bank'             => $i->post('nama_bank'),
          'rek_pelanggan'         => $i->post('rek_pelanggan'),
          'nama_pemilik'          => $i->post('nama_pemilik'),
          'tanggal_bayar'         => $i->post('tanggal_bayar'),
          'jumlah_bayar'          => $i->post('jumlah_bayar'),
          'bukti_bayar'           => $upload_data['uploads']['file_name'],
          'status_bayar'          => 'Pending',
          'tanggal_post'          => date('Y-m-d H:i:s')
        );
        $this->transaksi_model->edit($data);
        $this->session->set_flashdata('sukses', 'Terima Kasih Atas konfirmasi anda pesanan anda akan segera kami proses');
        redirect(base_url('transaksi'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'         => 'Update transaksi',
      'deskripsi'   => 'Deskripsi',
      'keywords'    => 'Transaksi Angelita Rentcar',
      'transaksi'       => $transaksi,
      'isi'             => 'transaksi/konfirmasi'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }
  public function sukses()
  {
    $data = array(
      'title'           => 'Konfirmasi transaksi',
      'isi'             => 'transaksi/sukses'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }
}


/* end of file transaksi.php */
/* Location /application/controller/admin/transaksi.php */
