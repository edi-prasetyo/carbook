<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('section_model');
  }
  //listing data section
  public function index()
  {
    $section = $this->section_model->listing();
    $data = array( 'title'      => 'Data Section ('.count($section).')',
                   'section'    => $section,
                   'isi'        => 'admin/section/list'
                 );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  //Tambah Section
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
    $data = array( 'title'                     => 'Tambah Section',
                   'error_upload'              => $this->upload->display_errors(),
                   'isi'                       => 'admin/section/tambah'
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
                                   'url'              => $i->post('url'),
                                   'gambar'           => $upload_data['uploads']['file_name'],
                                   'tanggal_post'     => date('Y-m-d')
                               );
                $this->section_model->tambah($data);
                $this->session->set_flashdata('sukses','Data telah ditambahkan');
                redirect(base_url('admin/section'), 'refresh');

              }}
               //End Masuk Database
               $data = array( 'title'        => 'Tambah Section',
                              'isi'          => 'admin/section/tambah'
                            );
               $this->load->view('admin/layout/wrapper', $data, FALSE);

  }

  //Edit Section
  public function edit($id_section)
  {
    $section = $this->section_model->detail($id_section);
      //Validasi
     $valid = $this->form_validation;

     $valid->set_rules('judul','Judul Section','required',
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
      $data = array( 'title'        => 'Edit Section',
                     'section'       => $section,
                     'error_upload' => $this->upload->display_errors(),
                     'isi'          => 'admin/section/edit'
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
                   if($section->gambar != "")
                   {
                     unlink('./assets/upload/image/'.$section->gambar);
                     unlink('./assets/upload/image/thumbs/'.$section->gambar);
                   }
                   //End Hapus Gambar

                   $data  = array(   'id_section'         => $id_section,
                                     'id_user'            => $this->session->userdata('id_user'),
                                     'judul'              => $i->post('judul'),
                                     'deskripsi'          => $i->post('deskripsi'),
                                     'url'                => $i->post('url'),
                                     'gambar'             => $upload_data['uploads']['file_name'],
                                     'tanggal_update'     => date('Y-m-d H:i:s')
                                 );
                  $this->section_model->edit($data);
                  $this->session->set_flashdata('sukses','Data telah Diedit');
                  redirect(base_url('admin/section'), 'refresh');

                }}else{
                  //Update Section Tanpa Ganti Gambar
                  $i     = $this->input;
                  // Hapus Gambar Lama Jika ada upload gambar baru
                  if($section->gambar != "")
                  $data  = array(
                                    'id_section'        => $id_section,
                                    'id_user'           => $this->session->userdata('id_user'),
                                    'judul'             => $i->post('judul'),
                                    'deskripsi'         => $i->post('deskripsi'),
                                    'url'               => $i->post('url'),
                                    //'gambar'            => $upload_data['uploads']['file_name'],
                                    'tanggal_update'     => date('Y-m-d H:i:s')
                                );
                 $this->section_model->edit($data);
                 $this->session->set_flashdata('sukses','Data telah Diedit');
                 redirect(base_url('admin/section'), 'refresh');

                }}
                 //End Masuk Database
                 $data = array( 'title'        => 'Edit Section',
                                'section'       => $section,
                                'isi'          => 'admin/section/edit'
                              );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

        //delete
        public function delete($id_section)
        {
          //Proteksi delete
          $this->check_login->check();

          $section = $this->section_model->detail($id_section);
          //Hapus gambar

          if($section->gambar != "")
          {
            unlink('./assets/upload/image/'.$section->gambar);
            unlink('./assets/upload/image/thumbs/'.$section->gambar);
          }
          //End Hapus Gambar
          $data = array('id_section'   => $section->id_section);
          $this->section_model->delete($data);
          $this->session->set_flashdata('sukses','Data telah di Hapus');
          redirect(base_url('admin/section'), 'refresh');
        }


}


/* end of file Section.php */
/* Location /application/controller/admin/Section.php */
