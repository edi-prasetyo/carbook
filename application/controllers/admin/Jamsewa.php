<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jamsewa extends CI_Controller
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
        $this->load->model('jamsewa_model');
    }

    public function index()
    {
        $jamsewa = $this->jamsewa_model->get_jamsewa();

        $this->form_validation->set_rules(
            'jam',
            'Jam Sewa',
            'required|is_unique[jamsewa.jam]',
            array(
                'required'                        => '%s Harus Diisi',
                'is_unque'                        => '%s <strong>' . $this->input->post('jam') .
                    '</strong>Jam ini Sudah Ada. Buat Nama yang lain!'
            )
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                             => 'Jam sewa',
                'jamsewa'                           => $jamsewa,
                'content'                           => 'admin/jamsewa/index'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data  = [
                'jam'                               => $this->input->post('jam'),
                'status'                            => $this->input->post('status'),
                'date_created'                      => date('Y-m-d H:i:s')
            ];
            $this->jamsewa_model->create($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
            redirect(base_url('admin/jamsewa'), 'refresh');
        }
    }

    public function update($id)
    {
        $jamsewa = $this->jamsewa_model->detail_jamsewa($id);

        $this->form_validation->set_rules(
            'jam',
            'Jam Sewa',
            'required',
            array('required'                  => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {

            $data = [
                'title'                         => 'Edit Jam Sewa',
                'jamsewa'                       => $jamsewa,
                'content'                       => 'admin/jamsewa/update'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data  = [
                'id'                                => $id,
                'jam'                               => $this->input->post('jam'),
                'status'                            => $this->input->post('status'),
                'date_updated'                      => date('Y-m-d H:i:s')
            ];
            $this->jamsewa_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
            redirect(base_url('admin/jamsewa'), 'refresh');
        }
    }

    public function delete($id)
    {
        is_login();
        $jamsewa = $this->jamsewa_model->detail_jamsewa($id);
        $data = ['id'   => $jamsewa->id];
        $this->jamsewa_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect(base_url('admin/jamsewa'), 'refresh');
    }
}
