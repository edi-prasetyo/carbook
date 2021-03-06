<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    //load data
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('bank_model');
    }
    //listing data transaksi
    // public function index()
    // {

    //     $data = array(
    //         'title'       => 'Cek Pesanan',
    //         'deskripsi'   => 'Cek Pesanan Rental Mobil',
    //         'keywords'    => 'Transaksi',
    //         'content'         => 'front/transaksi/index_transaksi'
    //     );
    //     $this->load->view('front/layout/wrapp', $data, FALSE);
    // }

    public function index()
    {

        if ($this->session->userdata('id')) {
            redirect(base_url('myaccount/transaksi'), 'refresh');
        } else {

            $this->form_validation->set_rules(
                'email',
                'Email',
                'required|trim|valid_email',
                [
                    'required'         => 'Email harus di isi',
                    'valid_email'     => 'Format email Tidak sesuai'
                ]
            );
            $this->form_validation->set_rules(
                'kode_transaksi',
                'Kode Transaksi',
                'required',
                [
                    'required'         => 'Kode Transaksi',
                ]
            );
            if ($this->form_validation->run() == false) {
                $data = [
                    'title'       => 'Cek Pesanan',
                    'deskripsi'   => 'Cek Pesanan Rental Mobil',
                    'keywords'    => 'Transaksi',
                    'content'         => 'front/transaksi/index_transaksi'
                ];
                $this->load->view('front/layout/wrapp', $data, FALSE);
            } else {
                //Validasi Berhasil
                $this->detail();
            }
        }
    }

    public function detail()
    {

        $kode_transaksi             = $this->input->post('kode_transaksi');
        $email                      = $this->input->post('email');
        $detail_transaksi           = $this->transaksi_model->cek_transaksi($kode_transaksi, $email);
        $bank                       = $this->bank_model->get_allbank();

        $transaksi = $this->db->get_where('transaksi', ['kode_transaksi' => $kode_transaksi])->row_array();
        $transakai_email = $this->db->get_where('transaksi', ['user_email' => $email])->row_array();

        if (empty($transaksi)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Kode Transaksi Tidak ada</div> ');
            redirect('transaksi');
        } elseif (empty($transakai_email)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Email Tidak ada</div> ');
            redirect('transaksi');
        } else {


            $data = array(
                'title'                     => 'Transaksi',
                'deskripsi'                 => 'Deskripsi',
                'keywords'                  => 'Transaksi Angelita Rentcar',
                'detail_transaksi'          => $detail_transaksi,
                'bank'                      => $bank,
                'content'                   => 'front/transaksi/detail_transaksi'
            );
            $this->load->view('front/layout/wrapp', $data, FALSE);
        }
    }

    //Tambah transaksi
    public function konfirmasi($id)
    {
        $transaksi                  = $this->transaksi_model->detail($id);
        $bank                       = $this->bank_model->get_allbank();


        $config['upload_path']          = './assets/img/struk/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000; //Dalam Kilobyte
        $config['max_width']            = 5000; //Lebar (pixel)
        $config['max_height']           = 5000; //tinggi (pixel)
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_bayar')) {

            //End Validasi
            $data = array(
                'title'         => 'Update transaksi',
                'deskripsi'   => 'Deskripsi',
                'keywords'    => 'Transaksi',
                'transaksi'     => $transaksi,
                'bank'          => $bank,
                'error_upload'  => $this->upload->display_errors(),
                'content'           => 'front/transaksi/konfirmasi_transaksi'
            );
            $this->load->view('front/layout/wrapp', $data, FALSE);

            //Masuk Database

        } else {

            //Proses Manipulasi Gambar
            $upload_data    = array('uploads'  => $this->upload->data());
            //Gambar Asli dcontentmpan di folder assets/upload/Struk
            //lalu gambara Asli di copy untuk versi mini size ke folder assets/upload/struk/thumbs

            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/img/struk/' . $upload_data['uploads']['file_name'];
            //Gambar Versi Kecil dipindahkan
            $config['new_image']        = './assets/img/struk/thumbs/' . $upload_data['uploads']['file_name'];
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 200;
            $config['height']           = 200;
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();


            $i     = $this->input;

            $data  = array(
                'id'                    => $id,
                'bukti_bayar'           => $upload_data['uploads']['file_name'],
                'status_bayar'          => 'Process',
                'date_updated'          => date('Y-m-d H:i:s')
            );
            $this->transaksi_model->update($data);
            $this->session->set_flashdata('sukses', 'Terima Kasih Atas konfirmasi anda pesanan anda akan segera kami proses');
            redirect(base_url('transaksi/sukses'), 'refresh');
        }
    }
    public function sukses()
    {
        $data = array(
            'title'           => 'Konfirmasi transaksi',
            'deskripsi'   => 'Deskripsi',
            'keywords'    => 'Transaksi',
            'content'             => 'front/transaksi/transaksi_sukses'
        );
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }
}


/* end of file transaksi.php */
/* Location /application/controller/admin/transaksi.php */
