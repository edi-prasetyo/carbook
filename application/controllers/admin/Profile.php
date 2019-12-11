<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  //load model
   public function __construct()
    {
      parent::__construct();
      $this->load->model('user_model');
    }
   //Update Profil
  public function index()
  {
    $id_user  =  $this->session->userdata('id_user');
    $user     =  $this->user_model->detail($id_user);

    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules('nama','Nama','required',
                        array( 'required'      => '%s harus diisi'));

    $valid->set_rules('email','Email','required|valid_email',
                        array( 'required'      => '%s harus diisi',
                               'valid_email'   => 'Format %s Tidak Valid'));

    $valid->set_rules('password','Password','required',
                        array( 'required'      => '%s harus diisi'));

    if($valid->run()){

      //Kalau nggak Ganti foto
      if(!empty($_FILES['foto_user']['name'])) {

      $config['upload_path']          = './assets/upload/image/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5000; //Dalam Kilobyte
      $config['max_width']            = 5000; //Lebar (pixel)
      $config['max_height']           = 5000; //tinggi (pixel)
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('foto_user')) {

     //End Validasi
    $data = array( 'title'  => 'Update Profile: ' .$user->nama,
                   'user'   => $user,
                   'isi'    => 'admin/profile/list'
                 );
                 $this->load->view('admin/layout/wrapper', $data, FALSE);

                 //Masuk Database

               }else{

                 //Proses Manipulasi Gambar
                 $upload_data    = array('uploads'  =>$this->upload->data() );
                 //Gambar Asli disimpan di folder assets/upload/image
                 //lalu foto Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

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


                 // Hapus Gambar Lama Jika Ada upload foto baru
                 if($user->foto_user != "")
                 {
                   unlink('./assets/upload/image/'.$user->foto_user);
                   unlink('./assets/upload/image/thumbs/'.$user->foto_user);
                 }
                 //End Hapus Gambar

                 $data  = array(   'id_user'       => $id_user,
                                   'nama'           => $i->post('nama'),
                                   'email'          => $i->post('email'),
                                   'telp'       => $i->post('telp'),
                                   'username'       => $i->post('username'),
                                   'password'       => sha1($i->post('password')),
                                    'foto_user'         => $upload_data['uploads']['file_name'],
                                    'tanggal'   => date('Y-m-d H:i:s'),
                                   'akses_level'    => $i->post('akses_level')
                               );
                $this->user_model->edit($data);
                $this->session->set_flashdata('sukses','Profile telah di Update');
                redirect(base_url('admin/profile'), 'refresh');

               }}else{

                 //Update Siswa Tanpa Ganti Gambar
                 $i     = $this->input;
                 // Hapus Gambar Lama Jika ada upload foto baru
                 if($user->foto_user != "")
                 $data  = array(   'id_user'       => $id_user,
                                   'nama'           => $i->post('nama'),
                                   'email'          => $i->post('email'),
                                   'telp'       => $i->post('telp'),
                                   'username'       => $i->post('username'),
                                   'password'       => sha1($i->post('password')),
                                   'akses_level'    => $i->post('akses_level'),
                                   //'foto_user'         => $upload_data['uploads']['file_name'],
                                   'tanggal'   => date('Y-m-d H:i:s')
                               );
                $this->user_model->edit($data);
                $this->session->set_flashdata('sukses','Data telah Diedit');
                redirect(base_url('admin/profile'), 'refresh');

               }}

               //End Masuk Database

               $data = array( 'title'  => 'Profile ',
                              'user'   => $user,
                              'isi'    => 'admin/profile/list'
                            );
               $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
}

/* end of file Profile.php */
/* Location /application/controller/admin/Profile.php */
