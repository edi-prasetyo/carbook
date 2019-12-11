<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('string'); //Memanggil Helper String
    //$this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->model('mobil_model');
    $this->load->model('kategori_model');
    $this->load->model('transaksi_model');
    $this->load->model('konfigurasi_model');
    $this->load->model('info_model');
  }

  //main page - Mobil
  public function index()
  {

    $konfigurasi    = $this->konfigurasi_model->listing();
    $listing        = $this->mobil_model->sidebar();

    // Listing Mobil Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('mobil/index/');
    $config['total_rows']     = count($this->mobil_model->total());
    $config['per_page']       = 12;
    $config['uri_segment']    = 3;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $mobil                   = $this->mobil_model->mobil($limit, $start);
    // End Listing Mobil dengan paginasi
    $data = array(
      'title'       => 'Rental Mobil - ' . $konfigurasi->namaweb,
      'deskripsi'   => 'Rental Mobil - ' . $konfigurasi->namaweb,
      'keywords'    => 'Rental Mobil - ' . $konfigurasi->keywords,
      'paginasi'    => $this->pagination->create_links(),
      'mobil'      => $mobil,
      'listing'     => $listing,
      'isi'         => 'mobil/list'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

  // Kategori - Mobil
  public function kategori($slug_kategori)
  {
    $kategori       = $this->kategori_model->read($slug_kategori);
    $id_kategori    = $kategori->id_kategori;
    $konfigurasi    = $this->konfigurasi_model->listing();
    // Listing Mobil Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('mobil/kategori/' . $slug_kategori . '/index/');
    $config['total_rows']     = count($this->mobil_model->total_kategori($id_kategori));
    $config['per_page']       = 3;
    $config['uri_segment']    = 5;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $mobil                   = $this->mobil_model->mobil_kategori($id_kategori, $limit, $start);
    // End Listing Mobil
    $data = array(
      'title'       => 'Kategori Mobil - ' . $kategori->nama_kategori,
      'deskripsi'   => 'Kategori Mobil - ' . $kategori->nama_kategori,
      'keywords'    => 'Kategori Mobil - ' . $kategori->nama_kategori,
      'paginasi'    => $this->pagination->create_links(),
      'mobil'      => $mobil,
      'isi'         => 'mobil/list'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

  //main page - detail Mobil
  public function rent($id_mobil = NULL)
  {
    //Redirect Jika nggak ada id_mobil nya
    if (!empty($id_mobil)) {



      $mobil          = $this->mobil_model->read($id_mobil);
      $listing        = $this->mobil_model->sidebar();
      // $id_paket       = $this->mobil_model->detail_paket('id_paket');
      $listpaket          = $this->mobil_model->listpaket($id_mobil);



      $data = array(
        'id_user'     => $this->session->userdata('id_user'),
        'title'       => $mobil->nama_mobil,
        'deskripsi'   => $mobil->nama_mobil,
        'keywords'    => $mobil->keywords,
        'mobil'       => $mobil,
        'listpaket'   => $listpaket,
        'listing'     => $listing,

        'tanggal_post'   => date('Y-m-d H:i:s'),
        'isi'         => 'mobil/read'
      );
      $this->load->view('layout/wrapper', $data, FALSE);
    } else {
      redirect(base_url('mobil'));
    }
  }

  //main page - detail Mobil
  public function add($id_paket)
  {

    $listing        	    = $this->mobil_model->sidebar();
    $listpaket            = $this->mobil_model->detail_paket($id_paket);
    $info				          = $this->info_model->listing();
    $konfigurasi		      = $this->konfigurasi_model->listing();


    $this->form_validation->set_rules(
      'nama',
      'Nama',
      'required',
      [
        'required' 		=> 'Nama harus di isi',
      ]
    );
    $this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email',
			[
				'required' 		       => 'Email harus di isi',
				'valid_email'    	   => 'Format email Tidak sesuai'
			]
		);
    $this->form_validation->set_rules(
      'telp',
      'No Handphone',
      'required',
      [
        'required' 		=> 'Nomor Handphone harus di isi',
      ]
    );
    $this->form_validation->set_rules(
      'jam_jemput',
      'Jam Jemput',
      'required',
      [
        'required' 		=> 'Pilih Jam Penjemputan',
      ]
    );
    $this->form_validation->set_rules(
      'lama_sewa',
      'Lama Sewa',
      'required',
      [
        'required' 		=> 'Pilih Lama Sewa',
      ]
    );
    $this->form_validation->set_rules(
      'alamat_jemput',
      'Alamat Jemput',
      'required',
      [
        'required' 		=> 'Silahkan Isi Detail alamat Penjemputan',
      ]
    );

    $this->form_validation->set_rules(
      'tipe_pembayaran',
      'Metode Pembayaran',
      'required',
      [
        'required' 		=> 'Silahkan Pilih metode pembayaran',
      ]
    );


    if ($this->form_validation->run() == false) {

      $data = array(
        'id_user'       => $this->session->userdata('id_user'),
        'title'         => 'mobil',
        'deskripsi'     => 'mobil',
        'keywords'      => 'mobil',
        // 'mobil'      => $mobil,
        'listpaket'     => $listpaket,
        'listing'       => $listing,
        'tanggal_post'  => date('Y-m-d H:i:s'),
        'isi'           => 'mobil/order'
      );
      $this->load->view('layout/wrapper', $data, FALSE);

    }else{

      $i     = $this->input;
      $data  = array(
        'kode_transaksi'    => $i->post('kode_transaksi'),
        'id_mobil'          => $i->post('id_mobil'),
        'nama_mobil'        => $i->post('nama_mobil'),
        'harga'             => $i->post('harga'),
        'nama_paket'        => $i->post('nama_paket'),
        'nama'              => $i->post('nama'),
        'email'             => $i->post('email'),
        'telp'              => $i->post('telp'),
        'jam_jemput'        => $i->post('jam_jemput'),
        'lama_sewa'         => $i->post('lama_sewa'),
        'tanggal_jemput'    => $i->post('tanggal_jemput'),
        'alamat_jemput'     => $i->post('alamat_jemput'),
        'permintaan_khusus' => $i->post('permintaan_khusus'),
        'tipe_pembayaran'   => $i->post('tipe_pembayaran'),
        'ketentuan'         => $i->post('ketentuan'),
        'status_bayar'      => 'Belum',
        'tanggal_transaksi' => date('Y-m-d H:i:s'),
        'tanggal_post'      => date('Y-m-d H:i:s')
        // 'tanggal_bayar'      => date('Y-m-d H:i:s')

    );
    //Proses Masuk Header Transaksi
    // $this->transaksi_model->tambah($data);
    $insert_id = $this->transaksi_model->tambah($data);

    //Kirim Ke Email Pelanggan
    $config = array(
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'design.atrans@gmail.com', // change it to yours
      'smtp_pass' => 'atrans88', // change it to yours
      'mailtype'  => 'html',
      'charset'   => 'iso-8859-1',
      'wordwrap'  => TRUE
    );
    foreach ($info as $info):
      $nama_bank = $info->nama_bank;
      $cabang = $info->cabang;
      $atas_nama = $info->atas_nama;
      $nomor_rek = $info->nomor_rek;
    endforeach;



    $message =   "
    <html>
    <head>
    <title>Invoice Order</title>
    <style>
    body{
      font-family:Segoe UI;
    }
    .btn{
      background:#1abc9c;
      padding:10px 35px 10px 35px;
      border-radius:30px;
      color:#fff;
      text-decoration:none;
    }
    .btn a{
      color:#fff;
    }
    .btn a:visited{
      color:#fff;
    }

    </style>
    </head>
    <body>



    <div bgcolor='#e4e4e4' text='#ff6633' link='#666666' vlink='#666666' alink='#ff6633' style='margin:0;font-family:Arial,Helvetica,sans-serif;border-bottom:1'>
    <table background='' bgcolor='#e4e4e4' width='100%' style='padding:20px 0 20px 0' cellspacing='0' border='0' align='center' cellpadding='0'>
    <tbody>
    <tr>
    <td>
    <table width='620' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF' style='border-radius: 5px;'>
    <tbody>

    <tr>
    <td valign='top' style='color:#404041;line-height:16px;padding:25px 20px 0px 20px'>
    <p>
    <section style='text-align: center;'>
    <h3 align='center'>
    <img width='60%' src='". base_url('assets/upload/image/'.$konfigurasi->logo) ."'>
    </h3>
    </section>
    </p>
    </td>
    </tr>

    <tr>
    <td valign='top'>
    <p>
    <section style='position: relative;clear: both;margin: 5px 0;height: 1px;border-top: 1px solid #cbcbcb;margin-bottom: 25px;margin-top: 10px;text-align: center;'>
    <h3 align='center' style='margin-top: -12px;background-color: #FFF;clear: both;width: 180px;margin-right: auto;margin-left: auto;padding-left: 15px;padding-right: 15px; font-family: arial,sans-serif;'>
    <span>INVOICE</span>
    </h3>
    </section>
    </p>
    </td>
    </tr>

    <tr>
    <td valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:25px 20px 0px 20px'>
    <p>
    <span><h2 style='color: #848484; font-family: arial,sans-serif; font-weight: 200;'>Info Transaksi</h2></span>
    </p>
    <p> Kode Transaksi : " . $data['kode_transaksi'] . " <br>
    Email : " . $data['email'] . "<br>
    No. Handphone : " . $data['telp'] . "
    </p>
    </td>
    </tr>

    <tr>
    <td valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:25px 20px 0px 20px'>
    <p>
    <span><h2 style='color: #848484; font-family: arial,sans-serif; font-weight: 200;'>Hello  " . $data['nama'] . ",</h2></span>
    </p>
    <p>
    Terima Kasih Telah Melakukan Pemesanan di " . $konfigurasi->namaweb . "<br>
    Kami telah menerima pesanan Anda dan kami akan memberi tahu Anda segera setelah pesanan anda kami konfirmasi.
    </p>
    </td>
    </tr>

    <tr>
    <td style='color:#404041;font-size:12px;line-height:16px;padding:10px 16px 20px 18px'>
    <table width='100%' border='0' cellpadding='0' cellspacing='0' style='border-radius:5px;border:solid 1px #e5e5e5'>
    <tbody>
    <tr>
    <td>
    <table width='570' border='0' cellspacing='0' cellpadding='0'>
    <tbody>
    <tr>
    <td width='15'>
    </td>
    <td colspan='5' align='left' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 10px 3px 5px;border-bottom:solid 1px #e5e5e5'>
    <strong>Kendaraan</strong>
    </td>
    <td width='0' align='right' style='color:#404041;font-size:12px;line-height:16px;padding:5px 10px 3px 5px;border-bottom:solid 1px #e5e5e5'>
    <strong>Lama Sewa</strong>
    </td>
    <td width='0' align='right' style='color:#404041;font-size:12px;line-height:16px;padding:5px 10px 3px 5px;border-bottom:solid 1px #e5e5e5'>
    <strong>Harga</strong>
    </td>
    <td width='90' align='right' style='color:#404041;font-size:12px;line-height:16px;padding:5px 10px 3px 5px;border-bottom:solid 1px #e5e5e5'>
    <strong>Total</strong>
    </td>
    </tr>
    <tr>
    <td width='15'>
    </td>
    <td colspan='5' align='left' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:dashed 1px #e5e5e5'>
    <strong>" . $data['nama_mobil'] . "</strong><br>
    " . $data['nama_paket'] . "
    </td>
    <td width='120' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:dashed 1px #e5e5e5'>
    " . $data['lama_sewa'] . " Hari
    </td>
    <td width='120' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:dashed 1px #e5e5e5'>
    Rp. " . number_format($data['harga'],'0',',','.') . "
    </td>
    <td width='90' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:dashed 1px #e5e5e5'>
    Rp. " . number_format($data['harga']*$data['lama_sewa'],'0',',','.') . "
    </td>
    </tr>

    <tr>
    <td width='15'>
    </td>
    <td colspan='5' align='left' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>

    </td>
    <td></td>
    <td width='0' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>
    <strong>Sub-total :</strong>
    </td>
    <td width='90' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>
    Rp. " .number_format($data['harga']*$data['lama_sewa'],'0',',','.') . "
    </td>
    </tr>

    <tr>
    <td width='15'>
    </td>
    <td colspan='5' align='left' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>

    </td>
    <td></td>
    <td width='0' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>
    <strong>Diskon :</strong>
    </td>
    <td width='90' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:solid 2px #e5e5e5'>
    Rp. 0
    </td>
    </tr>

    <tr>
    <td width='15'>
    </td>
    <td colspan='5' align='left' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>

    </td>
    <td></td>
    <td width='0' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>
    <strong>Grand Total :</strong>
    </td>
    <td width='90' align='right' valign='top' style='color:#339933;font-size:13px;line-height:16px;;padding:5px 5px 3px 5px;'>
    <strong> Rp. " . number_format($data['harga']*$data['lama_sewa'],'0',',','.') . "</strong>
    </td>
    </tr>



    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>

    <span style='color: #848484;padding-left:20px; font-family: arial,sans-serif;'>Untuk melihat status transaksi anda silahkan cek disini <a href='". base_url('transaksi')."'>". base_url('transaksi')."</a></span>

    <span><h3 style='color: #848484;padding-left:20px; font-family: arial,sans-serif; font-weight: 200;'>Detail Order</h3></span>

    <tr align='left'>
    <td style='color:#404041;font-size:12px;line-height:16px;padding:10px 16px 20px 18px'>
    <table width='100%' border='0' align='left' cellpadding='0' cellspacing='0'>



    <tbody>
    <tr>
    <td width='30%' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:0px 0px 3px 0px'>
    <strong>Alamat Jemput</strong>
    </td>
    <td valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:0px 5px 3px 5px'>
    : " . $data['alamat_jemput'] . "
    </td>
    </tr>

    <tr>
    <td width='30%' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 0px 3px 0px;'>
    <strong>Tanggal Jemput</strong>
    </td>
    <td valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>
    : " . $data['tanggal_jemput'] . "
    </td>
    </tr>
    <tr>
    <td width='30%' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 0px 3px 0px;'>
    <strong>Jam Jemput</strong>
    </td>
    <td valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>
    : " . $data['jam_jemput'] . " WIB
    </td>
    </tr>

    </tbody>
    </table>


    </td>
    </tr>

    <span><h3 style='color: #848484;padding-left:20px; font-family: arial,sans-serif; font-weight: 200;'> Pembayaran</h3></span>


    <tr align='left'>
    <td style='color:#404041;font-size:12px;line-height:16px;padding:10px 16px 20px 18px'>
    <table width='100%' border='0' align='left' cellpadding='0' cellspacing='0'>


    <tbody>

    <tr>
    <td width='30%' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:0px 0px 3px 0px'>
    <strong>Nama Bank</strong>
    </td>

    <td valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:0px 5px 3px 5px'>
    :  " . $nama_bank . "
    </td>
    </tr>

    <tr>
    <td width='30%' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:0px 0px 3px 0px'>
    <strong>Nomor Rekening</strong>
    </td>

    <td valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:0px 5px 3px 5px'>
    :  " . $nomor_rek . "
    </td>
    </tr>

    <tr>
    <td width='30%' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 0px 3px 0px;'>
    <strong>Cabang</strong>
    </td>
    <td valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>
    :  " . $cabang . "
    </td>
    </tr>
    <tr>
    <td width='30%' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 0px 3px 0px;'>
    <strong>Atas Nama</strong>
    </td>
    <td valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;'>
    :  " . $atas_nama . "
    </td>
    </tr>

    </tbody>
    </table>


    </td>
    </tr>


    <tr align='left'>
    <td style='color:#404041;font-size:12px;line-height:16px;padding:10px 16px 20px 18px'>
    <table width='100%' border='0' align='left' cellpadding='0' cellspacing='0'>



    <tbody>
    <span><h3 style='color: #848484; font-family: arial,sans-serif; font-weight: 200;'>Syarat dan Ketentuan Sewa</h3></span>
    <p>" . $data['ketentuan'] . "</p>
    </tbody>
    </table>


    </td>
    </tr>





    <tr>
    <td>
    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
    <tbody>
    <tr>
    <td style='color:#404041;line-height:16px;padding:15px 5px 5px 10px'>
    Untuk informasi lebih lanjut tentang pesanan Anda, silakan hubungi kami<br> " . $konfigurasi->telepon . ", atau whatsapp : " . $konfigurasi->whatsapp . " Email : " . $konfigurasi->email . " <br>
    " . $konfigurasi->alamat . "
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>

    <tr>
    <td>
    <table width='510' border='0' cellspacing='0' cellpadding='0'>
    <tbody>
    <tr>
    <td style='color:#404041;line-height:16px;padding:5px 15px 10px 10px'>
    <p>
    Kind regards,<br>

    </p>
    </td>
    </tr>

    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>

    </div>



    </body>
    </html>
    ";

    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from($config['smtp_user']);
    $this->email->to($data['email']);
    $this->email->cc('ediprasetyo@atrans.co.id');
    $this->email->subject('Pesanan Rentcar');
    $this->email->message($message);

    //sending email
    if ($this->email->send()) {
      $this->session->set_flashdata('sukses', 'Order Anda berhasil di buat silahkan cek email anda untuk detail Order Anda');
      redirect(base_url('mobil/sukses/' . $insert_id), 'refresh');
    } else {
      $this->session->set_flashdata('message', $this->email->print_debugger());
    }

    //End Masuk tabel transaksi
    $this->session->set_flashdata('sukses', 'Checkout Berhasil');
    redirect(base_url('mobil/sukses/' .$insert_id), 'refresh');

    //End Masuk Database
    }
    }



  //Halaman Order Sukses
  public function sukses($insert_id)
  {
    $last_transaksi = $this->transaksi_model->last_transaksi($insert_id);
    $site_info = $this->konfigurasi_model->listing();
    $info = $this->info_model->listing();


    $data   = array(
      'title'        => 'Order Berhasil',
      'deskripsi'    => 'Deskripsi',
      'keywords'     =>  'Order Berhasil di tambahkan',
      'insert_id'    => $insert_id,
      'last_transaksi' => $last_transaksi,
      'site_info'    => $site_info,
      'info'		=> $info,
      'isi'          => 'mobil/sukses'
    );
    $this->load->view('layout/wrapper', $data, FALSE);


    //Update harga Transaksi
    $data  = array(
      'id_transaksi' => $insert_id,
      'harga'     => $last_transaksi->harga
    );
    $this->transaksi_model->edit($data);
    //end Update Harga Transaksi





  }
}

/* End of file mobil.php */
/* Location: ./application/controllers/Mobil.php */
