<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mobil_model');
    $this->load->model('merek_model');
    $this->load->model('jenismobil_model');
    $this->load->model('ketentuan_model');
    $this->load->model('paket_model');
  }
  //listing data mobil
  public function index()
  {
    $mobil = $this->mobil_model->get_all();
    $data = array(
      'title'     => 'Data mobil (' . count($mobil) . ')',
      'mobil'     => $mobil,
      'content'       => 'admin/mobil/index_mobil'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }


  //Tambah mobil
  public function create()
  {
    $merek = $this->merek_model->get_merek();
    $jenismobil = $this->jenismobil_model->get_jenismobil();
    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'mobil_name',
      'Nama mobil',
      'required',
      array('required'      => '%s harus dicontent')
    );
    $valid->set_rules(
      'mobil_desc',
      'Deskripsi mobil',
      'required',
      array('required'      => '%s harus dicontent')
    );

    if ($valid->run()) {

      $config['upload_path']          = './assets/img/mobil/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5000; //Dalam Kilobyte
      $config['max_width']            = 5000; //Lebar (pixel)
      $config['max_height']           = 5000; //tinggi (pixel)
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('mobil_gambar')) {

        //End Validasi
        $data = array(
          'title'         => 'Tambah mobil',
          'merek'         => $merek,
          'error_upload'  => $this->upload->display_errors(),
          'content'           => 'admin/mobil/create_mobil'
        );
        $this->load->view('admin/layout/wrapp', $data, FALSE);
        //Masuk Database

      } else {

        //Proses Manipulasi Gambar
        $upload_data    = array('uploads'  => $this->upload->data());
        //Gambar Asli dcontentmpan di folder assets/upload/car
        //lalu gambara Asli di copy untuk versi mini size ke folder assets/upload/car/thumbs

        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/img/mobil/' . $upload_data['uploads']['file_name'];
        //Gambar Versi Kecil dipindahkan
        // $config['new_image']        = './assets/upload/car/thumbs/'.$upload_data['uploads']['file_name'];
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 500;
        $config['height']           = 500;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        $i     = $this->input;

        $slugcode = random_string('numeric', 5);
        $mobil_slug  = url_title($this->input->post('mobil_name'), 'dash', TRUE);
        $data  = array(
          'user_id'             => $this->session->userdata('id'),
          'jenismobil_id'       => $i->post('jenismobil_id'),
          'merek_id'            => $i->post('merek_id'),
          'mobil_slug'          => $slugcode . '-' . $mobil_slug,
          'mobil_name'          => $i->post('mobil_name'),
          'mobil_desc'          => $i->post('mobil_desc'),
          'mobil_status'        => $i->post('mobil_status'),
          'mobil_penumpang'     => $i->post('mobil_penumpang'),
          'mobil_bagasi'        => $i->post('mobil_bagasi'),
          'mobil_transmisi'     => $i->post('mobil_transmisi'),
          'mobil_bbm'           => $i->post('mobil_bbm'),
          'mobil_tahun'         => $i->post('mobil_tahun'),
          'mobil_harga'         => $i->post('mobil_harga'),
          'mobil_gambar'        => $upload_data['uploads']['file_name'],
          'mobil_keywords'      => $i->post('mobil_keywords'),
          'date_created'        => time()
        );
        $this->mobil_model->create($data);
        $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
        redirect(base_url('admin/mobil'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'             => 'Tambah mobil',
      'merek'             => $merek,
      'jenismobil'        => $jenismobil,
      'content'           => 'admin/mobil/create_mobil'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  //Edit mobil
  public function update($id)
  {
    $merek        = $this->merek_model->get_merek();
    $jenismobil   = $this->jenismobil_model->get_jenismobil();
    $mobil        = $this->mobil_model->detail_mobil($id);


    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'mobil_name',
      'Nama mobil',
      'required',
      array('required'      => '%s harus di Isi')
    );

    $valid->set_rules(
      'mobil_desc',
      'Deskripsi',
      'required',
      array('required'      => '%s harus di Isi')
    );


    if ($valid->run()) {
      //Kalau nggak Ganti gambar
      if (!empty($_FILES['mobil_gambar']['name'])) {

        $config['upload_path']          = './assets/img/mobil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000; //Dalam Kilobyte
        $config['max_width']            = 5000; //Lebar (pixel)
        $config['max_height']           = 5000; //tinggi (pixel)
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('mobil_gambar')) {

          //End Validasi
          $data = array(
            'title'         => 'Update Data mobil',
            'merek'         => $merek,
            'jenismobil'    => $jenismobil,
            'mobil'         => $mobil,
            'error_upload'  => $this->upload->display_errors(),
            'content'           => 'admin/mobil/update_mobil'
          );
          $this->load->view('admin/layout/wrapp', $data, FALSE);

          //Masuk Database

        } else {

          //Proses Manipulasi Gambar
          $upload_data    = array('uploads'  => $this->upload->data());
          //Gambar Asli dcontentmpan di folder assets/upload/Car
          //lalu gambar Asli di copy untuk versi mini size ke folder assets/upload/car/thumbs

          $config['image_library']    = 'gd2';
          $config['source_image']     = './assets/img/mobil/' . $upload_data['uploads']['file_name'];
          //Gambar Versi Kecil dipindahkan
          // $config['new_image']        = './assets/upload/car/thumbs/'.$upload_data['uploads']['file_name'];
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 500;
          $config['height']           = 500;
          $config['thumb_marker']     = '';

          $this->load->library('image_lib', $config);

          $this->image_lib->resize();


          $i     = $this->input;

          // Hapus Gambar Lama Jika Ada upload gambar baru
          if ($mobil->mobil_gambar != "") {
            unlink('./assets/img/mobil/' . $mobil->mobil_gambar);
          }
          //End Hapus Gambar
          $data  = array(
            'id'                => $id,
            'user_id'           => $this->session->userdata('id'),
            'jenismobil_id'       => $i->post('jenismobil_id'),
            'merek_id'            => $i->post('merek_id'),
            'mobil_name'          => $i->post('mobil_name'),
            'mobil_desc'          => $i->post('mobil_desc'),
            'mobil_status'        => $i->post('mobil_status'),
            'mobil_penumpang'     => $i->post('mobil_penumpang'),
            'mobil_bagasi'        => $i->post('mobil_bagasi'),
            'mobil_transmisi'     => $i->post('mobil_transmisi'),
            'mobil_bbm'           => $i->post('mobil_bbm'),
            'mobil_tahun'         => $i->post('mobil_tahun'),
            'mobil_harga'         => $i->post('mobil_harga'),
            'mobil_gambar'        => $upload_data['uploads']['file_name'],
            'mobil_keywords'      => $i->post('mobil_keywords'),
            'date_updated'        => time()
          );
          $this->mobil_model->update($data);
          $this->session->set_flashdata('sukses', 'Data telah Diedit');
          redirect(base_url('admin/mobil'), 'refresh');
        }
      } else {
        //Update mobil Tanpa Ganti Gambar
        $i     = $this->input;
        // Hapus Gambar Lama Jika ada upload gambar baru
        if ($mobil->mobil_gambar != "")
          $data  = array(
            'id'                => $id,
            'user_id'           => $this->session->userdata('id'),
            'jenismobil_id'       => $i->post('jenismobil_id'),
            'merek_id'            => $i->post('merek_id'),
            'mobil_name'          => $i->post('mobil_name'),
            'mobil_desc'          => $i->post('mobil_desc'),
            'mobil_status'        => $i->post('mobil_status'),
            'mobil_penumpang'     => $i->post('mobil_penumpang'),
            'mobil_bagasi'        => $i->post('mobil_bagasi'),
            'mobil_transmisi'     => $i->post('mobil_transmisi'),
            'mobil_bbm'           => $i->post('mobil_bbm'),
            'mobil_tahun'         => $i->post('mobil_tahun'),
            'mobil_harga'         => $i->post('mobil_harga'),
            'mobil_keywords'      => $i->post('mobil_keywords'),
            'date_updated'        => time()
          );
        $this->mobil_model->update($data);
        $this->session->set_flashdata('sukses', 'Data telah Diedit');
        redirect(base_url('admin/mobil'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'         => 'Edit mobil',
      'merek'         => $merek,
      'jenismobil'    => $jenismobil,
      'mobil'         => $mobil,
      'content'           => 'admin/mobil/update_mobil'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  //delete
  public function delete($mobil_id)
  {
    //Proteksi delete
    is_login();

    $mobil = $this->mobil_model->detail_mobil($mobil_id);
    //Hapus gambar
    if ($mobil->mobil_gambar != "") {
      unlink('./assets/img/mobil/' . $mobil->mobil_gambar);
    }
    //End Hapus Gambar
    $data = array('id'   => $mobil->id);
    $this->mobil_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data telah di Hapus');
    redirect(base_url('admin/mobil'), 'refresh');
  }





  // Fungsi Paket Sewa

  //Paket
  public function paket($mobil_id)
  {
    $mobil      = $this->mobil_model->detail_mobil($mobil_id);
    $paket      = $this->mobil_model->listpaket($mobil_id);
    $ketentuan  = $this->ketentuan_model->get_ketentuan();

    // var_dump($paket);
    // die;

    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'paket_name',
      'Nama mobil',
      'required',
      array('required'      => '%s harus dicontent')
    );

    $valid->set_rules(
      'paket_price',
      'Harga mobil',
      'required',
      array('required'      => '%s harus dicontent')
    );


    if ($valid->run() === FALSE) {
      //End Validasi
      $data = array(
        'title'        => 'Tambah Paket mobil',
        'mobil'        => $mobil,
        'paket'        => $paket,
        'id_mobil'     => $mobil_id,
        'ketentuan'    => $ketentuan,
        'content'      => 'admin/mobil/index_paket'
      );
      $this->load->view('admin/layout/wrapp', $data, FALSE);

      //Masuk Database

    } else {
      $i     = $this->input;
      $data  = array(
        'user_id'          => $this->session->userdata('id'),
        'mobil_id'         => $mobil_id,
        'ketentuan_id'     => $i->post('ketentuan_id'),
        'paket_name'       => $i->post('paket_name'),
        'paket_price'      => $i->post('paket_price'),
        'date_created'     => time()
      );
      $this->mobil_model->create_paket($data);
      $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
      redirect(base_url('admin/mobil/paket/' . $mobil_id), 'refresh');
    }

    //End Masuk Database
    $data = array(
      'title'         => 'Tambah mobil',
      'mobil'         => $mobil,
      'paket'         => $paket,
      'ketentuan'     => $ketentuan,
      'content'           => 'admin/mobil/paket'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  //gambar
  public function update_paket($id)
  {

    $ketentuan  = $this->ketentuan_model->get_ketentuan();
    $paket      = $this->paket_model->detail_paket($id);



    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'paket_name',
      'Nama Paket',
      'required',
      array('required'      => '%s harus dicontent')
    );

    $valid->set_rules(
      'paket_price',
      'Harga Paket',
      'required',
      array('required'      => '%s harus dicontent')
    );


    if ($valid->run() === FALSE) {
      //End Validasi
      $data = array(
        'title'             => 'Edit Paket',
        'paket'             => $paket,
        'ketentuan'         => $ketentuan,
        'content'           => 'admin/mobil/update_paket'
      );
      $this->load->view('admin/layout/wrapp', $data, FALSE);

      //Masuk Database

    } else {
      $i     = $this->input;
      $data  = array(
        'id'                => $id,
        'user_id'          => $this->session->userdata('id'),
        'mobil_id'          => $i->post('mobil_id'),
        'ketentuan_id'      => $i->post('ketentuan_id'),
        'paket_name'        => $i->post('paket_name'),
        'paket_price'       => $i->post('paket_price'),
        'date_created'      => time()
      );
      $this->mobil_model->edit_paket($data);
      $this->session->set_flashdata('sukses', 'Data telah di Update');
      redirect(base_url('admin/mobil'), 'refresh');
    }

    //End Masuk Database
    $data = array(
      'title'         => 'Edit Paket',
      'paket'         => $paket,
      'ketentuan'     => $ketentuan,
      'content'       => 'admin/mobil/update_paket'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }


  //delete Paket
  public function delete_paket($id)
  {
    //Proteksi delete
    is_login();

    $paket = $this->paket_model->detail_paket($id);

    $data = array('id'   => $paket->id);
    $this->paket_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data telah di Hapus');
    redirect($_SERVER['HTTP_REFERER']);
  }
}


    /* end of file mobil.php */
    /* Location /application/controller/admin/mobil.php */
