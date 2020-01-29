<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myaccount extends CI_Controller
{

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->check_login->check();
        $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
        $this->load->model('user_model');
        $this->load->model('transaksi_model');
    }

    //main page - Page
    public function index()
    {
        $id_user  =  $this->session->userdata('id_user');
        $user     =  $this->user_model->detail($id_user);

        $data = array(
            'title'       => 'Halaman Pelanggan',
            'deskripsi'   => 'Hamalaman Order',
            'keywords'    => 'Member',
            'user'        => $user,
            'isi'         => 'myaccount/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    //Order page
    public function order()
    {
        $id_user  =  $this->session->userdata('id_user');
        $user_id  =  $this->session->userdata('id_user');
        $user     =  $this->user_model->detail($id_user);
        $transaksi = $this->transaksi_model->transaksi_user($user_id);

        $data = array(
            'title'       => 'Halaman Order',
            'deskripsi'   => 'Hamalaman Order',
            'keywords'    => 'Member',
            'user'        => $user,
            'transaksi'   => $transaksi,
            'isi'         => 'myaccount/order'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    public function seting()
    {
        $id_user  =  $this->session->userdata('id_user');
        $user     =  $this->user_model->detail($id_user);

        $data = array(
            'title'       => 'Halaman Order',
            'deskripsi'   => 'Hamalaman Order',
            'keywords'    => 'Member',
            'user'        => $user,
            'isi'         => 'myaccount/seting'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

 /* End of file page.php */
 /* Location: ./application/controllers/Page.php */
