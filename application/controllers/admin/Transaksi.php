<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
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
        $this->load->model('transaksi_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url']         = base_url('admin/transaksi/index/');
        $config['total_rows']       = count($this->transaksi_model->total_row());
        $config['per_page']         = 10;
        $config['uri_segment']      = 4;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $limit                      = $config['per_page'];
        $start                      = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;

        $this->pagination->initialize($config);
        $transaksi = $this->transaksi_model->get_transaksi($limit, $start);
        $data = [
            'title'                 => 'Data Transaksi',
            'transaksi'             => $transaksi,
            'pagination'            => $this->pagination->create_links(),
            'content'               => 'admin/transaksi/index'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    public function detail($id)
    {
        $transaksi = $this->transaksi_model->detail($id);
        $data = [
            'title'                 => 'Detail Transaksi',
            'transaksi'             => $transaksi,
            'content'               => 'admin/transaksi/view'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    public function confirm($id)
    {
        is_login();
        $data = [
            'id'                    => $id,
            'status_bayar'             => 'Done',
        ];
        $this->transaksi_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show"><button class="close" data-dismiss="alert" aria-label="Close">×</button>Transaksi Telah di Konfirmasi</div>');
        redirect(base_url('admin/transaksi'), 'refresh');
    }
    public function process($id)
    {
        is_login();
        $data = [
            'id'                        => $id,
            'status_bayar'             => 'Process',
        ];
        $this->transaksi_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show"><button class="close" data-dismiss="alert" aria-label="Close">×</button>Transaksi Telah di Konfirmasi</div>');
        redirect(base_url('admin/transaksi'), 'refresh');
    }
    public function cancel($id)
    {
        is_login();
        $data = [
            'id'                    => $id,
            'status_bayar'             => 'Cancel',
        ];
        $this->transaksi_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable fade show"><button class="close" data-dismiss="alert" aria-label="Close">×</button> Transaksi Telah di Batalkan</div>');
        redirect(base_url('admin/transaksi'), 'refresh');
    }
}
