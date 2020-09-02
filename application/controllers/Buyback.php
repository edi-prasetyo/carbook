
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buyback extends CI_Controller
{
  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
    $this->load->model('meta_model');
    $this->load->model('buyback_model');
    $this->load->model('category_buy_model');
    $this->load->model('transaksi_model');
    $this->load->helper('string'); //Memanggil Helper String
  }
  //main page - Berita
  public function index()
  {
    $meta                             = $this->meta_model->get_meta();
    $config['base_url']               = base_url('admin/buyback/index/');
    $config['total_rows']             = count($this->buyback_model->total_row());
    $config['per_page']               = 6;
    $config['uri_segment']            = 4;
    //Membuat Style pagination untuk BootStrap v4
    $config['first_link']             = 'First';
    $config['last_link']              = 'Last';
    $config['next_link']              = 'Next';
    $config['prev_link']              = 'Prev';
    $config['full_tag_open']          = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']         = '</ul></nav></div>';
    $config['num_tag_open']           = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']          = '</span></li>';
    $config['cur_tag_open']           = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']          = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']          = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']        = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']          = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']        = '</span>Next</li>';
    $config['first_tag_open']         = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close']       = '</span></li>';
    $config['last_tag_open']          = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']        = '</span></li>';
    //Limit dan Start
    $limit                            = $config['per_page'];
    $start                            = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);
    $buyback = $this->buyback_model->get_buyback($limit, $start);
    $listcategory_buy = $this->category_buy_model->get_category_buy();
    // End Listing Product dengan paginasi
    $data = array(
      'title'                         => 'buyback',
      'deskripsi'                     => 'buyback - ' . $meta->description,
      'keywords'                      => 'buyback - ' . $meta->keywords,
      'buyback'                       => $buyback,
      'listcategory_products'         => $listcategory_buy,
      'pagination'                    => $this->pagination->create_links(),
      'content'                       => 'front/buyback/index_buyback'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  // Produk - User
  public function user($id)
  {
    $user                             = $this->user_model->read($id);
    $user_id                          = $user->id;
    $listcategory_products            = $this->category_products_model->get_category_products();
    $config['base_url']               = base_url('products/user/' . $id . '/index/');
    $config['total_rows']             = count($this->products_model->total_user($user_id));
    $config['per_page']               = 5;
    $config['uri_segment']            = 5;
    //Membuat Style pagination untuk BootStrap v4
    $config['first_link']             = 'First';
    $config['last_link']              = 'Last';
    $config['next_link']              = 'Next';
    $config['prev_link']              = 'Prev';
    $config['full_tag_open']          = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']         = '</ul></nav></div>';
    $config['num_tag_open']           = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']          = '</span></li>';
    $config['cur_tag_open']           = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']          = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']          = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']        = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']          = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']        = '</span>Next</li>';
    $config['first_tag_open']         = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close']       = '</span></li>';
    $config['last_tag_open']          = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']        = '</span></li>';
    //Limit dan Start
    $limit                            = $config['per_page'];
    $start                            = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);
    $products = $this->products_model->product_user($user_id, $limit, $start);
    // End Listing Product
    $data = array(
      'title'                         => 'Product User',
      'deskripsi'                     => 'Buyback ',
      'keywords'                      => 'Buyback ',
      'pagination'                    => $this->pagination->create_links(),
      'products'                      => $products,
      'listcategory_products'         => $listcategory_products,
      'user'                          => $user,
      'content'                       => 'front/product/user_product'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  // Produk - User
  public function category_buyback($id)
  {
    $category_buy                     = $this->category_buy_model->read($id);
    // var_dump($category_buy);die;
    $category_buy_id                  = $category_buy->id;
    $listcategory_buy                 = $this->category_buy_model->get_category_buy();
    // Listing Berita Dengan Pagination
    $this->load->library('pagination');
    $config['base_url']               = base_url('buyback/category_buyback/' . $id . '/index/');
    $config['total_rows']             = count($this->buyback_model->total_category_buy($category_buy_id));
    $config['per_page']               = 6;
    $config['uri_segment']            = 5;
    //Membuat Style pagination untuk BootStrap v4
    $config['first_link']             = 'First';
    $config['last_link']              = 'Last';
    $config['next_link']              = 'Next';
    $config['prev_link']              = 'Prev';
    $config['full_tag_open']          = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']         = '</ul></nav></div>';
    $config['num_tag_open']           = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']          = '</span></li>';
    $config['cur_tag_open']           = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']          = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']          = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']        = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']          = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']        = '</span>Next</li>';
    $config['first_tag_open']         = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close']       = '</span></li>';
    $config['last_tag_open']          = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']        = '</span></li>';
    //Limit dan Start
    $limit                            = $config['per_page'];
    $start                            = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);
    $buyback                          = $this->buyback_model->buy_category($category_buy_id, $limit, $start);
    // End Listing Berita
    $data = array(
      'title'                         => 'Buyback : ' . $category_buy->category_buy_name,
      'deskripsi'                     => 'Buyback',
      'keywords'                      => 'Buyback',
      'pagination'                    => $this->pagination->create_links(),
      'buyback'                       => $buyback,
      'listcategory_buy'              => $listcategory_buy,
      'category_buy_id'               => $category_buy_id,
      'content'                       => 'front/buyback/index_buyback'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  //main page - detail Produk
  public function detail($buyback_slug = NULL)
  {
    if (!empty($buyback_slug)) {
      $buyback_slug;
    } else {
      redirect(base_url('products'));
    }
    $meta                             = $this->meta_model->get_meta();
    $buyback                          = $this->buyback_model->read($buyback_slug);
    $listcategory_buy                 = $this->category_buy_model->get_category_buy();
    $user_id                          = $buyback->user_id;
    $related_buyback                  = $this->buyback_model->related_buy($user_id);
    $data = array(
      'title'                         => 'Produk',
      'deskripsi'                     => 'Berita - ' . $meta->description,
      'keywords'                      => 'Berita - ' . $meta->keywords,
      'buyback'                       => $buyback,
      'related_buyback'               => $related_buyback,
      'listcategory_buy'              => $listcategory_buy,
      'content'                       => 'front/buyback/detail_buyback'
    );
    $this->add_count($buyback_slug);
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  // This is the counter function..
  function add_count($buyback_slug)
  {
    // load cookie helper
    $this->load->helper('cookie');
    // this line will return the cookie which has slug name
    $check_visitor2 = $this->input->cookie(urldecode($buyback_slug), FALSE);
    // this line will return the visitor ip address
    $ip2 = $this->input->ip_address();
    // if the visitor visit this article for first time then //
    //set new cookie and update article_views column  ..
    //you might be notice we used slug for cookie name and ip
    //address for value to distinguish between articles  views
    if ($check_visitor2 == false) {
      $cookie = array(
        "name"                        => urldecode($buyback_slug),
        "value"                       => "$ip2",
        "expire"                      =>  time() + 7200,
        "secure"                      => false
      );
      $this->input->set_cookie($cookie);
      $this->buyback_model->update_counter(urldecode($buyback_slug));
    }
  }
  //   Data Transaksi Jual
  public function jual($id)
  {
    $buyback                          = $this->buyback_model->buy_detail($id);
    //Validasi
    $this->form_validation->set_rules(
      'user_name','Nama Lengkap','required',
      array(
        'required'                    => '%s Harus Diisi',
      )
    );
    $this->form_validation->set_rules(
      'user_email','Email','required',
      array(
        'required'                    => '%s Harus Diisi',
      )
    );
    $this->form_validation->set_rules(
      'user_phone','No. Handphone','required',
      array(
        'required'                    => '%s Harus Diisi',
      )
    );
    $this->form_validation->set_rules(
      'user_address','Alamat','required',
      array(
        'required'                    => '%s Harus Diisi',
      )
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                       => 'Order Emas',
        'deskripsi'                   => 'Beli Emas Online',
        'buyback'                     => $buyback,
        'content'                     => 'front/buyback/jual'
      ];
      $this->load->view('front/layout/wrapp', $data, FALSE);
    }else{
      $data  = [
        'user_id'                     => $this->input->post('user_id'),
        'kode_transaksi'              => $this->input->post('kode_transaksi'),
        'product_name'                => $this->input->post('product_name'),
        'product_size'                => $this->input->post('product_size'),
        'product_price'               => $this->input->post('buyback_price'),
        'product_qty'                 => $this->input->post('product_qty'),
        'user_name'                   => $this->input->post('user_name'),
        'user_email'                  => $this->input->post('user_email'),
        'user_phone'                  => $this->input->post('user_phone'),
        'user_address'                => $this->input->post('user_address'),
        'type_transaksi'              => 'buyback',
        'status_read'                 => 0,
        'date_created'                => time()
      ];
      $this->transaksi_model->create($data);
      //Kirim Email
      // $this->_sendEmail($data, 'order');
      $this->session->set_flashdata('message', 'Pesanan Anda telah Terkirim');
      redirect(base_url('buyback/buy_success/'), 'refresh');
    }
  }

// private function _sendEmail($data, $type)
  // {
  // 	$config = [

  // 		'protocol' 		=> 'smtp',
  // 		'smtp_host' 	=> 'ssl://mail.sitemail.com',
  // 		'smtp_port' 	=> 465,
  // 		'smtp_user' 	=> 'mail@sitemail.com',
  // 		'smtp_pass' 	=> 'password',
  // 		'mailtype' 		=> 'html',
  // 		'charset' 		=> 'utf-8',
  // 	];
  // 	$this->load->library('email', $config);
  // 	$this->email->initialize($config);
  // 	$this->email->set_newline("\r\n");
  //     $this->email->from('mail@sitemail.com', 'Order - ' .$data['kode_transaksi'] );
  //     // $this->email->cc('');
  // 	$this->email->to('mail@sitemail.com');
  // 	if ($type == 'order') {
  // 		$this->email->subject('Order LM Mini Gold');
  // 		$this->email->message(
  //             ' Order Baru, Silahkan Cek Detail pesanan melalui Dashboard tokominigold '
  //         );
  // 	} elseif ($type == 'forgot') {
  // 		$this->email->subject('Reset Password');
  // 		$this->email->message('Silahkan Klik Link ini untuk Mereset Password');
  // 	}
  // 	if ($this->email->send()) {
  // 		return true;
  // 	} else {
  // 		echo $this->email->print_debugger();
  // 		die;
  // 	}
  // }


  public function buy_success()
  {
    $data = [
      'title'                         => 'Buyback Sukses',
      'deskripsi'                     => 'Jual Emas Online',
      'content'                       => 'front/buyback/buy_success'
    ];
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
}
/* End of file Buyback.php */
/* Location: ./application/controllers/Buyback.php */
