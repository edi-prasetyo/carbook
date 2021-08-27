<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rental_mobil extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://edikomputer.com
   * https://grahastudio.com
   */

  public function __construct()
  {
    parent::__construct();
    $this->output->enable_profiler(FALSE);
    $this->load->library('pagination');
    $this->load->model('mobil_model');
    $this->load->model('transaksi_model');
    $this->load->model('bank_model');
    $this->load->model('pengaturan_model');
    $this->load->model('pembayaran_model');
    $this->load->model('lamasewa_model');
    $this->load->model('jamsewa_model');
  }

  public function index()
  {
    $meta                           = $this->meta_model->get_meta();
    $mobil                          = $this->mobil_model->get_mobil();

    if (!$this->agent->is_mobile()) {
      // Desktop View
      $data = array(
        'title'                       => 'Rental Mobil - ' . $meta->title,
        'deskripsi'                   => 'Rental Mobil - ' . $meta->description,
        'keywords'                    => 'Rental mobil - ' . $meta->keywords,
        'paginasi'                    => $this->pagination->create_links(),
        'mobil'                       => $mobil,
        'content'                     => 'front/rental/index_rental'
      );
      $this->load->view('front/layout/wrapp', $data, FALSE);
    } else {
      // Mobile View
      $data = array(
        'title'                       => 'Rental Mobil - ' . $meta->title,
        'deskripsi'                   => 'Rental Mobil - ' . $meta->description,
        'keywords'                    => 'Rental mobil - ' . $meta->keywords,
        'paginasi'                    => $this->pagination->create_links(),
        'mobil'                       => $mobil,
        'content'                     => 'mobile/rental/index'
      );
      $this->load->view('mobile/layout/wrapp', $data, FALSE);
    }
  }

  public function order($mobil_slug = NULL)
  {
    if (empty($mobil_slug)) {
      redirect(base_url('rental-mobil'));
    } else {
      $mobil          = $this->mobil_model->read($mobil_slug);

      if ($mobil == NULL) {
        if (!$this->agent->is_mobile()) {
          // Desktop View
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
          // Mobile View
          $data = array(
            'user_id'     => $this->session->userdata('id'),
            'title'       => 'Sewa Mobil',
            'deskripsi'   => 'Sewa Mobil',
            'keywords'    => 'Sewa Mobil',
            'mobil'       => $mobil,
            'content'         => 'mobile/rental/detail'
          );
          $this->load->view('mobile/layout/wrapp', $data, FALSE);
        }
      } else {

        $id = $mobil->id;
        $listpaket          = $this->mobil_model->listpaket_front($id);

        if (!$this->agent->is_mobile()) {
          // Desktop View
          $data = array(
            'user_id'     => $this->session->userdata('id'),
            'title'       => $mobil->mobil_name,
            'deskripsi'   => $mobil->mobil_name,
            'keywords'    => $mobil->mobil_keywords,
            'mobil'       => $mobil,
            'listpaket'   => $listpaket,
            'content'         => 'front/rental/detail_rental'
          );
          $this->add_count($mobil_slug);
          $this->load->view('front/layout/wrapp', $data, FALSE);
        } else {
          // Mobile View
          $data = array(
            'user_id'     => $this->session->userdata('id'),
            'title'       => $mobil->mobil_name,
            'deskripsi'   => $mobil->mobil_name,
            'keywords'    => $mobil->mobil_keywords,
            'mobil'       => $mobil,
            'listpaket'   => $listpaket,
            'content'         => 'mobile/rental/detail'
          );
          $this->add_count($mobil_slug);
          $this->load->view('mobile/layout/wrapp', $data, FALSE);
        }
      }
    }
  }

  function add_count($mobil_slug)
  {
    // load cookie helper
    $this->load->helper('cookie');
    // this line will return the cookie which has slug name
    $check_visitor2 = $this->input->cookie(urldecode($mobil_slug), FALSE);
    // this line will return the visitor ip address
    $ip = $this->input->ip_address();
    // if the visitor visit this article for first time then //
    //set new cookie and update article_views column  ..
    //you might be notice we used slug for cookie name and ip
    //address for value to distinguish between articles  views
    if ($check_visitor2 == false) {
      $cookie = array(
        "name"                      => urldecode($mobil_slug),
        "value"                     => "$ip",
        "expire"                    =>  time() + 7200,
        "secure"                    => false
      );
      $this->input->set_cookie($cookie);
      $this->mobil_model->update_counter(urldecode($mobil_slug));
    }
  }

  public function booking($id = NULL)
  {
    if (!empty($id)) {
      $id;
    } else {
      redirect(base_url('rental-mobil'));
    }

    $listing              = $this->mobil_model->sidebar();
    $listpaket            = $this->mobil_model->detail_paket($id);
    $pembayaran           = $this->pembayaran_model->get_pembayaran_active();
    $lamasewa             = $this->lamasewa_model->get_lamasewa();
    $jamsewa              = $this->jamsewa_model->get_jamsewa();
    // $send_email_order  = $this->pengaturan_model->sendemail_status_order();

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

      if (!$this->agent->is_mobile()) {
        // Desktop View
        $data = array(
          'user_id'       => $this->session->userdata('id'),
          'title'         => 'Booking Rental Mobil',
          'deskripsi'     => 'Booking Rental Mobil',
          'keywords'      => 'Booking Rental Mobil',
          'listpaket'     => $listpaket,
          'listing'       => $listing,
          'pembayaran'    => $pembayaran,
          'lamasewa'      => $lamasewa,
          'jamsewa'       => $jamsewa,
          'tanggal_post'  => date('Y-m-d H:i:s'),
          'content'           => 'front/rental/booking_rental'
        );
        $this->load->view('front/layout/wrapp', $data, FALSE);
      } else {
        // Mobile View
        $data = array(
          'user_id'       => $this->session->userdata('id'),
          'title'         => 'Booking Rental Mobil',
          'deskripsi'     => 'Booking Rental Mobil',
          'keywords'      => 'Booking Rental Mobil',
          'listpaket'     => $listpaket,
          'listing'       => $listing,
          'pembayaran'    => $pembayaran,
          'lamasewa'      => $lamasewa,
          'jamsewa'       => $jamsewa,
          'tanggal_post'  => date('Y-m-d H:i:s'),
          'content'           => 'mobile/rental/booking'
        );
        $this->load->view('mobile/layout/wrapp', $data, FALSE);
      }
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
        'date_created'      => date('Y-m-d H:i:s')
      );

      if ($this->input->post('email') == "") {
        $insert_id = $this->transaksi_model->create($data);
      }


      $this->_sendEmail($insert_id);
      $this->session->set_flashdata('sukses', 'Checkout Berhasil');
      redirect(base_url('rental-mobil/order-success/' . md5($insert_id)), 'refresh');
    }
  }

  private function _sendEmail($insert_id)
  {
    $email_order = $this->pengaturan_model->email_order();
    $transaksi  = $this->transaksi_model->detail_transaksi($insert_id);
    $meta = $this->meta_model->get_meta();

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
    $this->email->to($this->input->post('user_email'));

    $this->email->subject('Order ' . $transaksi->kode_transaksi . '');
    $this->email->message('
                         
                           
                      
                          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=320, initial-scale=1" />
  <title>Airmail Invoice</title>
  <style type="text/css">

 
    #outlook a {
      padding: 0;
    }


    .ReadMsgBody {
      width: 100%;
    }

    .ExternalClass {
      width: 100%;
    }


    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }



    body, table, td, p, a, li, blockquote {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }


    table, td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }


    img {
      -ms-interpolation-mode: bicubic;
    }



    html,
    body,
    .body-wrap,
    .body-wrap-cell {
      margin: 0;
      padding: 0;
      background: #ffffff;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #464646;
      text-align: left;
    }

    img {
      border: 0;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    td, th {
      text-align: left;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #464646;
      line-height:1.5em;
    }

    b a,
    .footer a {
      text-decoration: none;
      color: #464646;
    }

    a.blue-link {
      color: blue;
      text-decoration: underline;
    }

 

    td.center {
      text-align: center;
    }

    .left {
      text-align: left;
    }

    .body-padding {
      padding: 24px 40px 40px;
    }

    .border-bottom {
      border-bottom: 1px solid #D8D8D8;
    }

    table.full-width-gmail-android {
      width: 100% !important;
    }


    .header {
      font-weight: bold;
      font-size: 16px;
      line-height: 16px;
      height: 16px;
      padding-top: 19px;
      padding-bottom: 7px;
    }

    .header a {
      color: #464646;
      text-decoration: none;
    }


    .footer a {
      font-size: 12px;
    }
  </style>

  <style type="text/css" media="only screen and (max-width: 650px)">
    @media only screen and (max-width: 650px) {
      * {
        font-size: 16px !important;
      }

      table[class*="w320"] {
        width: 320px !important;
      }

      td[class="mobile-center"],
      div[class="mobile-center"] {
        text-align: center !important;
      }

      td[class*="body-padding"] {
        padding: 20px !important;
      }

      td[class="mobile"] {
        text-align: right;
        vertical-align: top;
      }
    }
  </style>

</head>
<body style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
 <td valign="top" align="left" width="100%" style="background: #ffffff;">
 <center>
   <table class="w320 full-width-gmail-android" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td width="100%" height="48" valign="top">           
              <table class="full-width-gmail-android" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                  <td class="header center" width="100%" >
                    <a href="' . $meta->link . '" style="color:#ffffff;">
                    <img class="left" width="auto" height="30" src="' . base_url('assets/img/logo/' . $meta->logo) . '" alt="Sewamobiloka">
                    </a>
                  </td>
                </tr>
              </table>
        </td>
      </tr>
    </table>

    <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
      <tr>
        <td align="center">
          <center>
            <table class="w320" cellspacing="0" cellpadding="0" width="600">
              <tr>
                <td class="body-padding mobile-padding">

                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td class="left" style="padding-bottom:20px; text-align:left;">
                      <b>Invoice:</b> ' . $transaksi->kode_transaksi . '
                    </td>
                  </tr>
                  <tr>
                    <td class="left" style="padding-bottom:40px; text-align:left;">
                    <span style="font-size:20px;"> Hi <b>' . $transaksi->user_title . ' ' . $transaksi->user_name . '</b>,</span>
                    <br>
                    Terima kasih Telah menggunakan layanan ' . $meta->link . ' . Order Anda Telah Kami Terima, Kami Akan Segera Menghubungi Anda
                    </td>
                  </tr>
                </table>

                <br>

                <div style="border:1px solid #ddd;border-radius:4px">
                <div style="background:#0279d6;color:#ffff;padding:5px 0 5px 20px;border-radius:4px 4px 0 0">
                <b>Informasi Order</b>
                </div>
                <div style="padding:10px;">
                <table cellspacing="0" cellpadding="0" width="100%">
                
                
                  <tr>
                  <td>Mobil </td> 
                  <td>: ' . $transaksi->nama_mobil . ' <br> ' . $transaksi->nama_paket . ' </td>
                  </tr>

                  <tr>
                  <td>Harga / hari </td> 
                  <td>: Rp. ' . number_format($transaksi->harga_satuan, 0, ",", ".") . '</td>
                  </tr>

                  <tr>
                  <td>Lama Sewa </td> 
                  <td>: ' . $transaksi->lama_sewa . ' Hari</td>
                  </tr>

                  <tr>
                  <td>Total Harga </td> 
                  <td style="font-size:18px;color:#0070ee;">: <b>Rp. ' . number_format($transaksi->total_harga, 0, ",", ".") . '</b></td>
                  </tr>
                         
                  </table>
                  
                  </div>
                  </div>
                  <br>
            

                <div style="border:1px solid #ddd;border-radius:4px">
                <div style="background:#0279d6;color:#ffff;padding:5px 0 5px 20px;border-radius:4px 4px 0 0">
                <b>Informasi Pelanggan</b>
                </div>
                <div style="padding:10px;">
                <table cellspacing="0" cellpadding="0" width="100%">
                
                
                
                  <tr>
                  <td>Nama </td> 
                  <td>: ' . $transaksi->user_title . ' ' . $transaksi->user_name . '</td>
                  </tr>

                  <tr>
                  <td>Nomor Hp. </td> 
                  <td>: ' . $transaksi->user_phone . '</td>
                  </tr>

                  <tr>
                  <td>Mobil </td> 
                  <td>: ' . $transaksi->nama_mobil . '</td>
                  </tr>

                  <tr>
                  <td>Tanggal Jemput </td> 
                  <td>: ' . $transaksi->tanggal_jemput . '</td>
                  </tr>

                  <tr>
                  <td>Jam Jemput </td> 
                  <td>:' . $transaksi->jam_jemput . '</td>
                  </tr>

                 

                  <tr>
                  <td>Alamat Jemput </td> 
                  <td>: ' . $transaksi->alamat_jemput . '</td>
                  </tr>

                  <tr>
                  <td>Permintaan Khusus </td> 
                  <td>: ' . $transaksi->permintaan_khusus . '</td>
                  
                  
                          </tr>
                          
                  </table>
                  
                  </div>
                  </div>
                  <br>


                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td class="left" style="text-align:left;">
                      Terima Kasih,
                    </td>
                  </tr>
                  <tr>
                    <td class="left" width="auto" height="20" style="padding-top:10px; text-align:left;">
                      
                    </td>
                  </tr>
                </table>



                <table cellspacing="0" cellpadding="0" width="100%">

                ' . $transaksi->ketentuan . '

                </table>







                </td>
              </tr>
            </table>

          </center>
        </td>
      </tr>
    </table>

    


    <table class="w320" bgcolor="#2f383f" cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td align="center">
          <center>
            <table class="w320" cellspacing="0" cellpadding="0" width="500" bgcolor="#2f383f">
              <tr>
                <td>
                  <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#2f383f">
                    <tr>
                      <td class="center" style="padding:25px; text-align:center;color:#ffffff">
                       Silahkan Hubungi  <b> ' . $meta->telepon . '</b> Untuk informasi lebih lanjut
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
      <tr>
        
      </tr>
    </table>
    

  </center>
  </td>
</tr>
</table>
</body>
</html>
        ');

    if ($this->email->send()) {
      return true;
    } 
  }

  public function order_success($insert_id)
  {
    $bank                               = $this->bank_model->get_allbank();
    $last_transaksi                     = $this->transaksi_model->last_transaksi($insert_id);

    if (!$this->agent->is_mobile()) {
      // Desktop View
      $data = [
        'title'                           => 'Order Sukses',
        'deskripsi'                       => 'Sewa mobil Online',
        'keywords'                        => 'Order Sewa Mobil',
        'last_transaksi'                  => $last_transaksi,
        'bank'                            => $bank,
        'content'                         => 'front/rental/order_success'
      ];
      $this->load->view('front/layout/wrapp', $data, FALSE);
    } else {
      // Mobile View
      $data = [
        'title'                           => 'Order Sukses',
        'deskripsi'                       => 'Sewa mobil Online',
        'keywords'                        => 'Order Sewa Mobil',
        'last_transaksi'                  => $last_transaksi,
        'bank'                            => $bank,
        'content'                         => 'mobile/rental/success'
      ];
      $this->load->view('mobile/layout/wrapp', $data, FALSE);
    }
  }
}
