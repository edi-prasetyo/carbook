<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://edikomputer.com
   * https://grahastudio.com
   */
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

  public function create()
  {
    $merek = $this->merek_model->get_merek();
    $jenismobil = $this->jenismobil_model->get_jenismobil();

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
      $config['allowed_types']        = 'gif|jpg|png|jpeg|webp';
      $config['max_size']             = 5000000000000;
      $config['max_width']            = 5000000000000;
      $config['max_height']           = 5000000000000;
      $config['remove_spaces']        = TRUE;
      $config['encrypt_name']         = TRUE;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('mobil_gambar')) {

        $data = array(
          'title'         => 'Tambah mobil',
          'merek'         => $merek,
          'error_upload'  => $this->upload->display_errors(),
          'content'           => 'admin/mobil/create_mobil'
        );
        $this->load->view('admin/layout/wrapp', $data, FALSE);
      } else {
        $upload_data                = array('uploads'  => $this->upload->data());
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/img/mobil/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 300;
        $config['height']           = 300;
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
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
        redirect(base_url('admin/mobil'), 'refresh');
      }
    }

    $data = array(
      'title'             => 'Tambah mobil',
      'merek'             => $merek,
      'jenismobil'        => $jenismobil,
      'content'           => 'admin/mobil/create_mobil'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function update($id)
  {
    $merek        = $this->merek_model->get_merek();
    $jenismobil   = $this->jenismobil_model->get_jenismobil();
    $mobil        = $this->mobil_model->detail_mobil($id);

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
      if (!empty($_FILES['mobil_gambar']['name'])) {

        $config['upload_path']          = './assets/img/mobil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|webp';
        $config['max_size']             = 500000000000;
        $config['max_width']            = 500000000000;
        $config['max_height']           = 500000000000;
        $config['remove_spaces']        = TRUE;
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('mobil_gambar')) {

          $data = array(
            'title'         => 'Update Data mobil',
            'merek'         => $merek,
            'jenismobil'    => $jenismobil,
            'mobil'         => $mobil,
            'error_upload'  => $this->upload->display_errors(),
            'content'           => 'admin/mobil/update_mobil'
          );
          $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

          $upload_data                = array('uploads'  => $this->upload->data());
          $config['image_library']    = 'gd2';
          $config['source_image']     = './assets/img/mobil/' . $upload_data['uploads']['file_name'];
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 300;
          $config['height']           = 300;
          $config['thumb_marker']     = '';

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $i     = $this->input;
          if ($mobil->mobil_gambar != "") {
            unlink('./assets/img/mobil/' . $mobil->mobil_gambar);
          }

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
          $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah Diedit</div>');
          redirect(base_url('admin/mobil'), 'refresh');
        }
      } else {
        $i     = $this->input;
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
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah Diedit</div>');
        redirect(base_url('admin/mobil'), 'refresh');
      }
    }
    $data = array(
      'title'         => 'Edit mobil',
      'merek'         => $merek,
      'jenismobil'    => $jenismobil,
      'mobil'         => $mobil,
      'content'           => 'admin/mobil/update_mobil'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function delete($mobil_id)
  {
    is_login();

    $mobil = $this->mobil_model->detail_mobil($mobil_id);
    if ($mobil->mobil_gambar != "") {
      unlink('./assets/img/mobil/' . $mobil->mobil_gambar);
    }
    $data = array('id'   => $mobil->id);
    $this->mobil_model->delete($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect(base_url('admin/mobil'), 'refresh');
  }

  public function paket($mobil_id)
  {
    $mobil      = $this->mobil_model->detail_mobil($mobil_id);
    $paket      = $this->mobil_model->listpaket($mobil_id);
    $ketentuan  = $this->ketentuan_model->get_ketentuan();

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
      $data = array(
        'title'        => 'Tambah Paket mobil',
        'mobil'        => $mobil,
        'paket'        => $paket,
        'id_mobil'     => $mobil_id,
        'ketentuan'    => $ketentuan,
        'content'      => 'admin/mobil/index_paket'
      );
      $this->load->view('admin/layout/wrapp', $data, FALSE);
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
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
      redirect(base_url('admin/mobil/paket/' . $mobil_id), 'refresh');
    }
    $data = array(
      'title'         => 'Tambah mobil',
      'mobil'         => $mobil,
      'paket'         => $paket,
      'ketentuan'     => $ketentuan,
      'content'           => 'admin/mobil/paket'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function update_paket($id)
  {
    $ketentuan  = $this->ketentuan_model->get_ketentuan();
    $paket      = $this->paket_model->detail_paket($id);

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
      $data = array(
        'title'             => 'Edit Paket',
        'paket'             => $paket,
        'ketentuan'         => $ketentuan,
        'content'           => 'admin/mobil/update_paket'
      );
      $this->load->view('admin/layout/wrapp', $data, FALSE);
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
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
      redirect(base_url('admin/mobil'), 'refresh');
    }

    $data = array(
      'title'         => 'Edit Paket',
      'paket'         => $paket,
      'ketentuan'     => $ketentuan,
      'content'       => 'admin/mobil/update_paket'
    );
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function delete_paket($id)
  {
    is_login();
    $paket = $this->paket_model->detail_paket($id);
    $data = array('id'   => $paket->id);
    $this->paket_model->delete($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect($_SERVER['HTTP_REFERER']);
  }
}
