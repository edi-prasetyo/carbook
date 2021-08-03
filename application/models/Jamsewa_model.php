<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jamsewa_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_jamsewa()
    {
        $this->db->select('*');
        $this->db->from('jamsewa');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_jamsewa($id)
    {
        $this->db->select('*');
        $this->db->from('jamsewa');
        $this->db->where('id', $id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->row();
    }
    //Read Berita
    public function read($jamsewa_slug)
    {
        $this->db->select('*');
        $this->db->from('jamsewa');
        $this->db->where(array(
            'jamsewa.jamsewa_slug'      =>  $jamsewa_slug
        ));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
    public function create($data)
    {
        $this->db->insert('jamsewa', $data);
    }
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('jamsewa', $data);
    }
    //Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('jamsewa', $data);
    }
}
