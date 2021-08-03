<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
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
        $this->load->model('meta_model');
    }
    public function index()
    {
        $meta                   = $this->meta_model->get_meta();
        $data = array(
            'title'             => 'Contact Us',
            'deskripsi'         => 'Berita - ' . $meta->description,
            'keywords'          => 'Berita - ' . $meta->keywords,
            'content'           => 'front/contact/index_contact'
        );
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }
}
