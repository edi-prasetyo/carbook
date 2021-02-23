<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rental_mobil extends CI_Controller
{
  //Load Model
  public function __construct()
  {
    parent::__construct();

    $this->load->library('pagination');
    $this->load->model('mobil_model');
    $this->load->model('transaksi_model');
    $this->load->model('bank_model');
    $this->load->model('pengaturan_model');
  }
  //main page - Berita
  public function index()
  {
    $meta                           = $this->meta_model->get_meta();
    $mobil                          = $this->mobil_model->get_mobil();

    $data = array(
      'title'                       => 'Rental Mobil - ' . $meta->title,
      'deskripsi'                   => 'Rental Mobil - ' . $meta->description,
      'keywords'                    => 'Rental mobil - ' . $meta->keywords,
      'paginasi'                    => $this->pagination->create_links(),
      'mobil'                       => $mobil,
      'content'                     => 'front/rental/index_rental'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  public function order($id = NULL)
  {
    //Redirect Jika nggak ada id_mobil nya
    if (empty($id)) {
      redirect(base_url('rental-mobil'));
    } else {
      $mobil          = $this->mobil_model->read($id);
      if ($mobil == NULL) {
        $data = array(
          'user_id'     => $this->session->userdata('id'),
          'title'       => 'Sewa Mobil',
          'deskripsi'   => 'Sewa Mobil',
          'keywords'    => 'Sewa Mobil',
          'mobil'       => $mobil,
          'content'         => 'front/rental/detail_rental'
        );

        $this->load->view('front/layout/wrapp', $data, FALSE);
      } else {
        $listpaket          = $this->mobil_model->listpaket($id);

        $data = array(
          'user_id'     => $this->session->userdata('id'),
          'title'       => $mobil->mobil_name,
          'deskripsi'   => $mobil->mobil_name,
          'keywords'    => $mobil->mobil_keywords,
          'mobil'       => $mobil,
          'listpaket'   => $listpaket,
          'content'         => 'front/rental/detail_rental'
        );
        $this->add_count($id);
        $this->load->view('front/layout/wrapp', $data, FALSE);
      }
    }
  }

  // Update Count Mobil Views

  function add_count($id)
  {
    // load cookie helper
    $this->load->helper('cookie');
    // this line will return the cookie which has slug name
    $check_visitor2 = $this->input->cookie(urldecode($id), FALSE);
    // this line will return the visitor ip address
    $ip = $this->input->ip_address();
    // if the visitor visit this article for first time then //
    //set new cookie and update article_views column  ..
    //you might be notice we used slug for cookie name and ip
    //address for value to distinguish between articles  views
    if ($check_visitor2 == false) {
      $cookie = array(
        "name"                      => urldecode($id),
        "value"                     => "$ip",
        "expire"                    =>  time() + 7200,
        "secure"                    => false
      );
      $this->input->set_cookie($cookie);
      $this->mobil_model->update_counter(urldecode($id));
    }
  }


  // BOOKING PAKET
  public function booking($id)
  {

    $listing              = $this->mobil_model->sidebar();
    $listpaket            = $this->mobil_model->detail_paket($id);


    $this->form_validation->set_rules(
      'user_name',
      'Nama Lengkap',
      'required',
      [
        'required'     => 'Nama harus di isi',
      ]
    );
    $this->form_validation->set_rules(
      'user_email',
      'Email',
      'required|trim|valid_email',
      [
        'required'            => 'Email harus di isi',
        'valid_email'         => 'Format email Tidak sesuai'
      ]
    );
    $this->form_validation->set_rules(
      'user_phone',
      'No Handphone',
      'required',
      [
        'required'     => 'Nomor Handphone harus di isi',
      ]
    );
    $this->form_validation->set_rules(
      'jam_jemput',
      'Jam Jemput',
      'required',
      [
        'required'     => 'Pilih Jam Penjemputan',
      ]
    );
    $this->form_validation->set_rules(
      'lama_sewa',
      'Lama Sewa',
      'required',
      [
        'required'     => 'Pilih Lama Sewa',
      ]
    );
    $this->form_validation->set_rules(
      'alamat_jemput',
      'Alamat Jemput',
      'required',
      [
        'required'     => 'Silahkan Isi Detail alamat Penjemputan',
      ]
    );

    $this->form_validation->set_rules(
      'tipe_pembayaran',
      'Metode Pembayaran',
      'required',
      [
        'required'     => 'Silahkan Pilih metode pembayaran',
      ]
    );


    if ($this->form_validation->run() == false) {

      $data = array(
        'user_id'       => $this->session->userdata('id'),
        'title'         => 'Booking Rental Mobil',
        'deskripsi'     => 'Booking Rental Mobil',
        'keywords'      => 'Booking Rental Mobil',
        // 'mobil'      => $mobil,
        'listpaket'     => $listpaket,
        'listing'       => $listing,
        'tanggal_post'  => date('Y-m-d H:i:s'),
        'content'           => 'front/rental/booking_rental'
      );
      $this->load->view('front/layout/wrapp', $data, FALSE);
    } else {



      $total_harga = $this->input->post('harga_satuan') * $this->input->post('lama_sewa');
      $sub = substr($total_harga, -3);
      $total =  random_string('numeric', 3);
      $hasil =  $total_harga + $total;
      $no = substr($hasil, -3);




      $data  = array(
        'user_id'           => $this->session->userdata('id'),
        'mobil_id'          => $this->input->post('mobil_id'),
        'nama_mobil'        => $this->input->post('nama_mobil'),
        'nama_paket'        => $this->input->post('nama_paket'),
        'kode_transaksi'    => $this->input->post('kode_transaksi'),
        'user_title'        => $this->input->post('user_title'),
        'user_name'         => $this->input->post('user_name'),
        'user_email'        => $this->input->post('user_email'),
        'user_phone'        => $this->input->post('user_phone'),
        'alamat_jemput'     => $this->input->post('alamat_jemput'),
        'tanggal_jemput'    => $this->input->post('tanggal_jemput'),
        'jam_jemput'        => $this->input->post('jam_jemput'),
        'lama_sewa'         => $this->input->post('lama_sewa'),
        'permintaan_khusus' => $this->input->post('permintaan_khusus'),
        'tipe_pembayaran'   => $this->input->post('tipe_pembayaran'),
        'status_bayar'      => 'Pending',
        'ketentuan'         => $this->input->post('ketentuan'),
        'harga_satuan'      => $this->input->post('harga_satuan'),
        'total_harga'       => $hasil,
        'kode_unik'         => $no,
        'date_created'      => time()
        // 'tanggal_bayar'      => date('Y-m-d H:i:s')

      );
      //Proses Masuk Header Transaksi
      // $this->transaksi_model->tambah($data);
      $insert_id = $this->transaksi_model->create($data);
      //Kirim Email
      $this->_sendEmail($insert_id);
      //End Masuk tabel transaksi
      $this->session->set_flashdata('sukses', 'Checkout Berhasil');
      redirect(base_url('rental-mobil/order-success/' . $insert_id), 'refresh');

      //End Masuk Database
    }
  }

  private function _sendEmail($insert_id)

  {

    $email_order = $this->pengaturan_model->email_order();
    $transaksi  = $this->transaksi_model->detail_transaksi($insert_id);

    $config = [

      'protocol'     => "$email_order->protocol",
      'smtp_host'   => "$email_order->smtp_host",
      'smtp_port'   => $email_order->smtp_port,
      'smtp_user'   => "$email_order->smtp_user",
      'smtp_pass'   => "$email_order->smtp_pass",
      'mailtype'     => 'html',
      'charset'     => 'utf-8',


    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->set_newline("\r\n");

    $this->email->from("$email_order->smtp_user", 'Order');
    $this->email->to($this->input->post('email'));


    $this->email->subject('Order');
    $this->email->message('Terima Kasih Atas Order Anda <br> 
                          Kode Transaksi : ' . $transaksi->kode_transaksi . '<br> 
                          Email          : ' . $transaksi->user_email . '<br>
                          Jumlah Tagihan : ' . $transaksi->total_harga . '<br>
                          Tanggal Jemput : ' . $transaksi->tanggal_jemput . '<br>
                          Jam Jemput     : ' . $transaksi->jam_jemput . '<br>
                           ');



    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function order_success($insert_id)
  {
    $bank                               = $this->bank_model->get_allbank();
    $last_transaksi                     = $this->transaksi_model->last_transaksi($insert_id);
    $data = [
      'title'                           => 'Order Sukses',
      'deskripsi'                       => 'Sewa mobil Online',
      'keywords'                        => 'Order Sewa Mobil',
      'last_transaksi'                  => $last_transaksi,
      'bank'                            => $bank,
      'content'                         => 'front/rental/order_success'
    ];
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
}
