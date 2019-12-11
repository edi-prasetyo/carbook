<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('transaksi_model');
  }
  //Ambil Semua Data Transaksi
  public function index()
  {
    $transaksi    = $this->transaksi_model->get_all();
    $data = array(
      'title'               => 'Data Transaksi',
      'transaksi'           => $transaksi,
      'isi'                 => 'admin/transaksi/list'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  //detail Transaksi
  public function detail($kode_transaksi)
  {
    $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
    $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);

    $data = array(
      'title'             => 'Detail Order',
      'keywords'          => 'Detail Order',
      'header_transaksi'  => $header_transaksi,
      'transaksi'         => $transaksi,
      'isi'               => 'admin/transaksi/detail'
    );
    $this->load->view('member/layout/wrapper', $data, FALSE);
  }

  //detail Transaksi
  public function detail_transaksi($id_transaksi)
  {

    $detail_transaksi        = $this->transaksi_model->detail_transaksi($id_transaksi);

    $data = array(
      'title'             => 'Detail Order',
      'keywords'          => 'Detail Order',
      'detail_transaksi'         => $detail_transaksi,
      'isi'               => 'admin/transaksi/detail_transaksi'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  //Update Status Transaksi
  public function status($kode_transaksi)
  {
    $id_user            = $this->session->userdata('id_user');
    $header_transaksi   = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
    $rekening           = $this->rekening_model->get_all();

    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'status_bayar',
      'Nama Bank',
      'required',
      array('required'      => '%s harus diisi')
    );


    if ($valid->run() === FALSE) {

      //End Validasi

      $data = array(
        'title'             => 'Konfirmasi Pembayaran',
        'keywords'          => 'Halaman Konfirmasi Pembayaran',
        'id_user'           => $id_user,
        'header_transaksi'  => $header_transaksi,
        'rekening'          => $rekening,
        'isi'               => 'admin/transaksi/status'
      );
      $this->load->view('layout/wrapper', $data, FALSE);


      //Masuk Database

    } else {
      //Update Produk Tanpa Ganti Gambar
      $i     = $this->input;

      $data  = array(
        'id_header_transaksi'      => $header_transaksi->id_header_transaksi,
        'status_bayar'             => 'Lunas'
      );
      $this->header_transaksi_model->edit($data);
      $this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
      redirect(base_url('member/transaksi'), 'refresh');
    }
    //End Masuk Database
    $data = array(
      'title'             => 'Konfirmasi Pembayaran',
      'keywords'          => 'Halaman Konfirmasi Pembayaran',
      'id_user'           => $id_user,
      'header_transaksi'  => $header_transaksi,
      'rekening'          => $rekening,
      'isi'               => 'admin/transaksi/status'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

  //delete
  public function delete($id_transaksi)
  {
    //Proteksi delete
    $this->check_login->check();

    $transaksi = $this->transaksi_model->detail($id_transaksi);
    //Hapus gambar
    if($mobil->gambar != "")
    {
      unlink('./assets/upload/struk/'.$mobil->gambar);
      unlink('./assets/upload/struk/thumbs/'.$mobil->gambar);
    }
    //End Hapus Gambar

    $data = array('id_transaksi'   => $transaksi->id_transaksi);
    $this->transaksi_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data telah di Hapus');
    redirect(base_url('admin/transaksi'), 'refresh');
  }

  public function konfirmasi_cash($id_transaksi)
  {
    $data  = array(
      'id_transaksi'          => $id_transaksi,
      'status_read'           => 1,
      'status_bayar'          => 'Pending'
    );
    $this->transaksi_model->edit($data);
    $this->session->set_flashdata('sukses', 'User Sudah di Konfirmasi');
    redirect(base_url('admin/transaksi'), 'refresh');
  }

  public function konfirmasi_transfer($id_transaksi)
  {

    $data  = array(
      'id_transaksi'          => $id_transaksi,
      'status_read'           => 1,
      'status_bayar'          => 'Lunas'
    );
    $this->transaksi_model->edit($data);
    $this->session->set_flashdata('sukses', 'User Sudah di Konfirmasi');
    redirect(base_url('admin/transaksi'), 'refresh');
  }
  public function konfirmasi_cancel($id_transaksi)
  {

    $data  = array(
      'id_transaksi'          => $id_transaksi,
      'status_read'           => 1,
      'status_bayar'          => 'Cancel'
    );
    $this->transaksi_model->edit($data);
    $this->session->set_flashdata('sukses', 'User Sudah di Konfirmasi');
    redirect(base_url('admin/transaksi'), 'refresh');
  }
	
	public function konfirmasi_selesai($id_transaksi)
  {

    $data  = array(
      'id_transaksi'          => $id_transaksi,
      'status_read'           => 1,
      'status_bayar'          => 'Lunas'
    );
    $this->transaksi_model->edit($data);
    $this->session->set_flashdata('sukses', 'User Sudah di Konfirmasi');
    redirect(base_url('admin/transaksi'), 'refresh');
  }
}
