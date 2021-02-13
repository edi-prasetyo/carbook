<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    //Load Data Konfigurasi
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengaturan_model');
    }
    public function index()
    {
        $email_register                = $this->pengaturan_model->email_register();
        $email_order                   = $this->pengaturan_model->email_order();

        $data    = [
            'title'                   => 'Pengaturan Email',
            'email_register'              => $email_register,
            'email_order'              => $email_order,
            'content'                 => 'admin/pengaturan/index_pengaturan'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    public function update($id)
    {
        $pengaturan = $this->pengaturan_model->detail_pengaturan($id);
        $this->form_validation->set_rules(
            'title',
            'Judul Web',
            'required',
            array('required'            => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                   => 'Update Pengaturan',
                'pengaturan'                    => $pengaturan,
                'content'                 => 'admin/pengaturan/update_pengaturan'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data = [
                'id'                      => $pengaturan->id,
                'user_id'                 => $this->session->userdata('id'),
                'title'                   => $this->input->post('title'),
                'tagline'                 => $this->input->post('tagline'),
                'description'             => $this->input->post('description'),
                'keywords'                => $this->input->post('keywords'),
                'google_pengaturan'             => $this->input->post('google_pengaturan'),
                'bing_pengaturan'               => $this->input->post('bing_pengaturan'),
                'google_analytics'        => $this->input->post('google_analytics'),
                'google_tag'              => $this->input->post('google_tag'),
                'email'                   => $this->input->post('email'),
                'telepon'                 => $this->input->post('telepon'),
                'alamat'                  => $this->input->post('alamat'),
                'link'                    => $this->input->post('link'),
                'map'                     => $this->input->post('map'),
                'facebook'                => $this->input->post('facebook'),
                'instagram'               => $this->input->post('instagram'),
                'youtube'                 => $this->input->post('youtube'),
                'twitter'                 => $this->input->post('twitter'),
                'date_updated'            => time()
            ];
            $this->pengaturan_model->update($data);
            $this->session->set_flashdata('message', 'Data telah di ubah');
            redirect(base_url('admin/pengaturan'), 'refresh');
        }
    }
}
