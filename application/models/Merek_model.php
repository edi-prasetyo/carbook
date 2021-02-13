<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merek_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function get_merek()
  {
    $this->db->select('*');
    $this->db->from('merek');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function detail_merek($id)
  {
    $this->db->select('*');
    $this->db->from('merek');
    $this->db->where('id', $id);
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->row();
  }
  //Read Berita
  public function read($merek_slug)
  {
    $this->db->select('*');
    $this->db->from('merek');
    $this->db->where(array(
      'merek.merek_slug'      =>  $merek_slug
    ));
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
  public function create($data)
  {
    $this->db->insert('merek', $data);
  }
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('merek', $data);
  }
  //Delete Data
  public function delete($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->delete('merek', $data);
  }
}
