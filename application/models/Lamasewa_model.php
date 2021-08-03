<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamasewa_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_lamasewa()
    {
        $this->db->select('*');
        $this->db->from('lamasewa');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_lamasewa($id)
    {
        $this->db->select('*');
        $this->db->from('lamasewa');
        $this->db->where('id', $id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->row();
    }
    //Read Berita
    public function read($lamasewa_slug)
    {
        $this->db->select('*');
        $this->db->from('lamasewa');
        $this->db->where(array(
            'lamasewa.lamasewa_slug'      =>  $lamasewa_slug
        ));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
    public function create($data)
    {
        $this->db->insert('lamasewa', $data);
    }
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('lamasewa', $data);
    }
    //Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('lamasewa', $data);
    }
}
