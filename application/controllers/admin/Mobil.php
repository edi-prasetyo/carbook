<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller{
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
    $mobil = $this->mobil_model->listing();
    $data = array(
      'title'     => 'Data mobil ('.count($mobil).')',
      'mobil'     => $mobil,
      'isi'       => 'admin/mobil/list'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  //gambar
  public function paket($id_mobil)
  {
    $mobil      = $this->mobil_model->detail($id_mobil);
    $paket      = $this->mobil_model->paket($id_mobil);
    $ketentuan  = $this->ketentuan_model->listing();


    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules('nama_paket','Nama mobil','required',
    array( 'required'      => '%s harus diisi'));

    $valid->set_rules('harga','Harga mobil','required',
    array( 'required'      => '%s harus diisi'));


    if($valid->run() === FALSE){
      //End Validasi
      $data = array(
        'title'        => 'Tambah Paket mobil',
        'mobil'        => $mobil,
        'paket'        => $paket,
        'id_mobil'     => $id_mobil,
        'ketentuan'     => $ketentuan,
        'isi'          => 'admin/mobil/paket'
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);

      //Masuk Database

    }else{
      $i     = $this->input;
      $data  = array(
        'id_user'          => $this->session->userdata('id_user'),
        'id_mobil'         => $id_mobil,
        'id_ketentuan'     => $i->post('id_ketentuan'),
        'nama_paket'       => $i->post('nama_paket'),
        'harga'            => $i->post('harga'),
        'tanggal_post'     => date('Y-m-d H:i:s')
      );
      $this->mobil_model->tambah_paket($data);
      $this->session->set_flashdata('sukses','Data telah ditambahkan');
      redirect(base_url('admin/mobil/paket/'.$id_mobil), 'refresh');
    }

    //End Masuk Database
    $data = array(
      'title'         => 'Tambah mobil',
      'mobil'         => $mobil,
      'paket'         => $paket,
      'ketentuan'     => $ketentuan,
      'isi'           => 'admin/mobil/paket'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  //gambar
  public function editpaket($id_paket)
  {


    $ketentuan  = $this->ketentuan_model->listing();
    $paket      = $this->paket_model->detail($id_paket);

    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules('nama_paket','Nama mobil','required',
    array( 'required'      => '%s harus diisi'));

    $valid->set_rules('harga','Harga mobil','required',
    array( 'required'      => '%s harus diisi'));


    if($valid->run() === FALSE){
      //End Validasi
      $data = array(
        'title'        => 'Edit Paket',
        'paket'        => $paket,
        'ketentuan'     => $ketentuan,
        'isi'          => 'admin/mobil/editpaket'
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);

      //Masuk Database

    }else{
      $i     = $this->input;
      $data  = array(
        'id_user'          => $this->session->userdata('id_user'),
        'id_paket'          => $id_paket,
        'id_mobil'         => $i->post('id_mobil'),
        'id_ketentuan'     => $i->post('id_ketentuan'),
        'nama_paket'       => $i->post('nama_paket'),
        'harga'            => $i->post('harga'),
        'tanggal_post'     => date('Y-m-d H:i:s')
      );
      $this->mobil_model->edit_paket($data);
      $this->session->set_flashdata('sukses','Data telah ditambahkan');
      redirect(base_url('admin/mobil/'), 'refresh');
    }

    //End Masuk Database
    $data = array(
      'title'         => 'Edit Paket',
      'paket'         => $paket,
      'ketentuan'     => $ketentuan,
      'isi'           => 'admin/mobil/editpaket'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  //Tambah mobil
  public function tambah()
  {
    $merek = $this->merek_model->listing();
    $jenismobil = $this->jenismobil_model->listing();
    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules('nama_mobil','Nama mobil','required',
    array( 'required'      => '%s harus diisi'));
    $valid->set_rules('deskripsi','Deskripsi mobil','required',
    array( 'required'      => '%s harus diisi'));

    if($valid->run()){

      $config['upload_path']          = './assets/upload/car/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5000; //Dalam Kilobyte
      $config['max_width']            = 5000; //Lebar (pixel)
      $config['max_height']           = 5000; //tinggi (pixel)
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('gambar')) {

        //End Validasi
        $data = array(
          'title'         => 'Tambah mobil',
          'mobil'         => $mobil,
          'error_upload'  => $this->upload->display_errors(),
          'isi'           => 'admin/mobil/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk Database

      }else{

        //Proses Manipulasi Gambar
        $upload_data    = array('uploads'  =>$this->upload->data() );
        //Gambar Asli disimpan di folder assets/upload/car
        //lalu gambara Asli di copy untuk versi mini size ke folder assets/upload/car/thumbs

        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/car/'.$upload_data['uploads']['file_name'];
        //Gambar Versi Kecil dipindahkan
        $config['new_image']        = './assets/upload/car/thumbs/'.$upload_data['uploads']['file_name'];
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 200;
        $config['height']           = 200;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();


        $i     = $this->input;

        $data  = array(
          'id_user'          => $this->session->userdata('id_user'),
          'id_jenismobil'    => $i->post('id_jenismobil'),
          'id_merek'         => $i->post('id_merek'),
          'slug_mobil'       => url_title($this->input->post('nama_mobil'), 'dash', TRUE),
          'nama_mobil'       => $i->post('nama_mobil'),
          'deskripsi'        => $i->post('deskripsi'),
          'kap_penumpang'    => $i->post('kap_penumpang'),
          'kap_bagasi'       => $i->post('kap_bagasi'),
          'harga_awal'       => $i->post('harga_awal'),
          'gambar'           => $upload_data['uploads']['file_name'],
          'status_mobil'     => $i->post('status_mobil'),
          'keywords'         => $i->post('keywords'),
          'tanggal_post'     => date('Y-m-d H:i:s')
        );
        $this->mobil_model->tambah($data);
        $this->session->set_flashdata('sukses','Data telah ditambahkan');
        redirect(base_url('admin/mobil'), 'refresh');

      }}
      //End Masuk Database
      $data = array( 'title'        => 'Tambah mobil',
      'merek'     => $merek,
      'jenismobil'  =>$jenismobil,
      'isi'          => 'admin/mobil/tambah'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);

  }

  //Edit mobil
  public function edit($id_mobil)
  {
    $merek = $this->merek_model->listing();
    $jenismobil = $this->jenismobil_model->listing();
    $mobil = $this->mobil_model->detail($id_mobil);


    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules('nama_mobil','Nama mobil','required',
    array( 'required'      => '%s harus diisi'));

    $valid->set_rules('deskripsi','Deskripsi','required',
    array( 'required'      => '%s harus diisi'));


    if($valid->run()){
      //Kalau nggak Ganti gambar
      if(!empty($_FILES['gambar']['name'])) {

        $config['upload_path']          = './assets/upload/car/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000; //Dalam Kilobyte
        $config['max_width']            = 5000; //Lebar (pixel)
        $config['max_height']           = 5000; //tinggi (pixel)
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {

          //End Validasi
          $data = array(
            'title'         => 'Edit mobil',
            'merek'         => $merek,
            'jenismobil'    => $janismobil,
            'mobil'         => $mobil,
            'error_upload'  => $this->upload->display_errors(),
            'isi'           => 'admin/mobil/edit'
          );
          $this->load->view('admin/layout/wrapper', $data, FALSE);

          //Masuk Database

        }else{

          //Proses Manipulasi Gambar
          $upload_data    = array('uploads'  =>$this->upload->data() );
          //Gambar Asli disimpan di folder assets/upload/Car
          //lalu gambar Asli di copy untuk versi mini size ke folder assets/upload/car/thumbs

          $config['image_library']    = 'gd2';
          $config['source_image']     = './assets/upload/car/'.$upload_data['uploads']['file_name'];
          //Gambar Versi Kecil dipindahkan
          $config['new_image']        = './assets/upload/car/thumbs/'.$upload_data['uploads']['file_name'];
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 200;
          $config['height']           = 200;
          $config['thumb_marker']     = '';

          $this->load->library('image_lib', $config);

          $this->image_lib->resize();


          $i     = $this->input;

          // Hapus Gambar Lama Jika Ada upload gambar baru
          if($mobil->gambar != "")
          {
            unlink('./assets/upload/car/'.$mobil->gambar);
            unlink('./assets/upload/car/thumbs/'.$mobil->gambar);
          }
          //End Hapus Gambar
          $data  = array(
            'id_mobil'          => $id_mobil,
            'id_user'           => $this->session->userdata('id_user'),
            'id_jenismobil'     => $i->post('id_jenismobil'),
            'id_merek'          => $i->post('id_merek'),
            'slug_mobil'        => url_title($this->input->post('nama_mobil'), 'dash', TRUE),
            'nama_mobil'        => $i->post('nama_mobil'),
            'deskripsi'         => $i->post('deskripsi'),
            'kap_penumpang'     => $i->post('kap_penumpang'),
            'kap_bagasi'        => $i->post('kap_bagasi'),
            'harga_awal'        => $i->post('harga_awal'),
            'gambar'            => $upload_data['uploads']['file_name'],
            'status_mobil'      => $i->post('status_mobil'),
            'keywords'          => $i->post('keywords'),
            'tanggal_post'      => date('Y-m-d H:i:s')
          );
          $this->mobil_model->edit($data);
          $this->session->set_flashdata('sukses','Data telah Diedit');
          redirect(base_url('admin/mobil'), 'refresh');

        }}else{
          //Update mobil Tanpa Ganti Gambar
          $i     = $this->input;
          // Hapus Gambar Lama Jika ada upload gambar baru
          if($mobil->gambar != "")
          $data  = array(
            'id_mobil'          => $id_mobil,
            'id_user'           => $this->session->userdata('id_user'),
            'id_jenismobil'     => $i->post('id_jenismobil'),
            'id_merek'          => $i->post('id_merek'),
            'slug_mobil'        => url_title($this->input->post('nama_mobil'), 'dash', TRUE),
            'nama_mobil'        => $i->post('nama_mobil'),
            'deskripsi'         => $i->post('deskripsi'),
            'kap_penumpang'     => $i->post('kap_penumpang'),
            'kap_bagasi'        => $i->post('kap_bagasi'),
            'harga_awal'        => $i->post('harga_awal'),
            //'gambar'          => $upload_data['uploads']['file_name'],
            'status_mobil'      => $i->post('status_mobil'),
            'keywords'          => $i->post('keywords'),
            'tanggal_post'      => date('Y-m-d H:i:s')
          );
          $this->mobil_model->edit($data);
          $this->session->set_flashdata('sukses','Data telah Diedit');
          redirect(base_url('admin/mobil'), 'refresh');

        }}
        //End Masuk Database
        $data = array(
          'title'         => 'Edit mobil',
          'merek'         => $merek,
          'jenismobil'    => $jenismobil,
          'mobil'         => $mobil,
          'isi'           => 'admin/mobil/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
      }

      //delete
      public function delete($id_mobil)
      {
        //Proteksi delete
        $this->check_login->check();

        $mobil = $this->mobil_model->detail($id_mobil);
        //Hapus gambar
        if($mobil->gambar != "")
        {
          unlink('./assets/upload/car/'.$mobil->gambar);
          unlink('./assets/upload/car/thumbs/'.$mobil->gambar);
        }
        //End Hapus Gambar
        $data = array('id_mobil'   => $mobil->id_mobil);
        $this->mobil_model->delete($data);
        $this->session->set_flashdata('sukses','Data telah di Hapus');
        redirect(base_url('admin/mobil'), 'refresh');
      }

      //delete Paket
      public function delete_paket($id_paket)
      {
        //Proteksi delete
        $this->check_login->check();

        $paket = $this->paket_model->detail($id_paket);

        $data = array('id_paket'   => $paket->id_paket);
        $this->paket_model->delete($data);
        $this->session->set_flashdata('sukses','Data telah di Hapus');
        redirect(base_url('admin/mobil'), 'refresh');
      }


    }


    /* end of file mobil.php */
    /* Location /application/controller/admin/mobil.php */
