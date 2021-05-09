<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('meta_model');
    $this->load->model('galery_model');
    $this->load->model('mobil_model');
    $this->load->model('berita_model');
    $this->load->model('layanan_model');
  }
  public function index()
  {
    $meta                     = $this->meta_model->get_meta();
    $slider                   = $this->galery_model->slider();
    $mobil_populer            = $this->mobil_model->mobil_populer();
    $berita                   = $this->berita_model->berita_home();
    $layanan                   = $this->layanan_model->get_layanan();
    $data = array(
      'title'                 => $meta->title . ' - ' . $meta->tagline,
      'keywords'              => $meta->title . ' - ' . $meta->tagline . ',' . $meta->keywords,
      'deskripsi'             => $meta->description,
      'slider'                =>  $slider,
      'mobil_populer'         => $mobil_populer,
      'berita'                => $berita,
      'layanan'               => $layanan,
      'content'               => 'front/home/index_home'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
}
