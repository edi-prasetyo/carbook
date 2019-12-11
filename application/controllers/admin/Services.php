<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('services_model');
  }
  //listing data services
  public function index()
  {
    $services = $this->services_model->listing();
    $data = array( 'title'      => 'Data Services ('.count($services).')',
                   'services'    => $services,
                   'isi'        => 'admin/services/list'
                 );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  //Tambah Services
  public function tambah()
  {
    //Validasi
   $valid = $this->form_validation;

   $valid->set_rules('judul','Judul','required',
                       array( 'required'        => '%s harus diisi'));


   if($valid->run()){

                $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; //Dalam Kilobyte
                $config['max_width']            = 5000; //Lebar (pixel)
                $config['max_height']           = 5000; //tinggi (pixel)
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('gambar')) {

     //End Validasi
    $data = array( 'title'                     => 'Tambah Services',
                   'error_upload'              => $this->upload->display_errors(),
                   'isi'                       => 'admin/services/tambah'
                 );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);

                 //Masuk Database

               }else{

                 //Proses Manipulasi Gambar
                 $upload_data    = array('uploads'  =>$this->upload->data() );
                 //Gambar Asli disimpan di folder assets/upload/image
                 //lalu gambara Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

                  $config['image_library']    = 'gd2';
                  $config['source_image']     = './assets/upload/image/'.$upload_data['uploads']['file_name'];
                  //Gambar Versi Kecil dipindahkan
                  $config['new_image']        = './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
                  $config['create_thumb']     = TRUE;
                  $config['maintain_ratio']   = TRUE;
                  $config['width']            = 200;
                  $config['height']           = 200;
                  $config['thumb_marker']     = '';

                  $this->load->library('image_lib', $config);

                  $this->image_lib->resize();


                 $i     = $this->input;

                 $data  = array(   'id_user'          => $this->session->userdata('id_user'),
                                   'judul'            => $i->post('judul'),
                                   'deskripsi'        => $i->post('deskripsi'),
                                   'gambar'           => $upload_data['uploads']['file_name'],
                                   'tanggal_post'     => date('Y-m-d')
                               );
                $this->services_model->tambah($data);
                $this->session->set_flashdata('sukses','Data telah ditambahkan');
                redirect(base_url('admin/services'), 'refresh');

              }}
               //End Masuk Database
               $data = array( 'title'        => 'Tambah Services',
                              'isi'          => 'admin/services/tambah'
                            );
               $this->load->view('admin/layout/wrapper', $data, FALSE);

  }

  //Edit Services
  public function edit($id_services)
  {
    $services = $this->services_model->detail($id_services);
      //Validasi
     $valid = $this->form_validation;

     $valid->set_rules('judul','Judul Services','required',
                         array( 'required'      => '%s harus diisi'));




     if($valid->run()){
                  //Kalau nggak Ganti gambar
                  if(!empty($_FILES['gambar']['name'])) {

                  $config['upload_path']          = './assets/upload/image/';
                  $config['allowed_types']        = 'gif|jpg|png|jpeg';
                  $config['max_size']             = 5000; //Dalam Kilobyte
                  $config['max_width']            = 5000; //Lebar (pixel)
                  $config['max_height']           = 5000; //tinggi (pixel)
                  $this->load->library('upload', $config);
                  if ( ! $this->upload->do_upload('gambar')) {

       //End Validasi
      $data = array( 'title'        => 'Edit Services',
                     'services'       => $services,
                     'error_upload' => $this->upload->display_errors(),
                     'isi'          => 'admin/services/edit'
                   );
                   $this->load->view('admin/layout/wrapper', $data, FALSE);

                   //Masuk Database

                 }else{

                   //Proses Manipulasi Gambar
                   $upload_data    = array('uploads'  =>$this->upload->data() );
                   //Gambar Asli disimpan di folder assets/upload/image
                   //lalu gambar Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/'.$upload_data['uploads']['file_name'];
                    //Gambar Versi Kecil dipindahkan
                    $config['new_image']        = './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 200;
                    $config['height']           = 200;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();


                   $i     = $this->input;

                   // Hapus Gambar Lama Jika Ada upload gambar baru
                   if($services->gambar != "")
                   {
                     unlink('./assets/upload/image/'.$services->gambar);
                     unlink('./assets/upload/image/thumbs/'.$services->gambar);
                   }
                   //End Hapus Gambar

                   $data  = array(   'id_services'         => $id_services,
                                     'id_user'            => $this->session->userdata('id_user'),
                                     'judul'              => $i->post('judul'),
                                     'deskripsi'          => $i->post('deskripsi'),
                                     'gambar'             => $upload_data['uploads']['file_name'],
                                     'tanggal_update'     => date('Y-m-d H:i:s')
                                 );
                  $this->services_model->edit($data);
                  $this->session->set_flashdata('sukses','Data telah Diedit');
                  redirect(base_url('admin/services'), 'refresh');

                }}else{
                  //Update Services Tanpa Ganti Gambar
                  $i     = $this->input;
                  // Hapus Gambar Lama Jika ada upload gambar baru
                  if($services->gambar != "")
                  $data  = array(
                                    'id_services'        => $id_services,
                                    'id_user'           => $this->session->userdata('id_user'),
                                    'judul'             => $i->post('judul'),
                                    'deskripsi'         => $i->post('deskripsi'),
                                    //'gambar'            => $upload_data['uploads']['file_name'],
                                    'tanggal_update'     => date('Y-m-d H:i:s')
                                );
                 $this->services_model->edit($data);
                 $this->session->set_flashdata('sukses','Data telah Diedit');
                 redirect(base_url('admin/services'), 'refresh');

                }}
                 //End Masuk Database
                 $data = array( 'title'        => 'Edit Services',
                                'services'       => $services,
                                'isi'          => 'admin/services/edit'
                              );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

        //delete
        public function delete($id_services)
        {
          //Proteksi delete
          $this->check_login->check();

          $services = $this->services_model->detail($id_services);
          //Hapus gambar

          if($services->gambar != "")
          {
            unlink('./assets/upload/image/'.$services->gambar);
            unlink('./assets/upload/image/thumbs/'.$services->gambar);
          }
          //End Hapus Gambar
          $data = array('id_services'   => $services->id_services);
          $this->services_model->delete($data);
          $this->session->set_flashdata('sukses','Data telah di Hapus');
          redirect(base_url('admin/services'), 'refresh');
        }


}


/* end of file Services.php */
/* Location /application/controller/admin/Services.php */
