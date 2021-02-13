<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenismobil_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function get_jenismobil()
  {
    $this->db->select('*');
    $this->db->from('jenismobil');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function detail_jenismobil($id)
  {
    $this->db->select('*');
    $this->db->from('jenismobil');
    $this->db->where('id', $id);
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->row();
  }
  //Read Berita
  public function read($jenismobil_slug)
  {
    $this->db->select('*');
    $this->db->from('jenismobil');
    $this->db->where(array(
      'jenismobil.jenismobil_slug'      =>  $jenismobil_slug
    ));
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
  public function create($data)
  {
    $this->db->insert('jenismobil', $data);
  }
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('jenismobil', $data);
  }
  //Delete Data
  public function delete($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->delete('jenismobil', $data);
  }
}
