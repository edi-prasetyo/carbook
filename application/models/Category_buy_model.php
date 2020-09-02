<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_buy_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function get_category_buy()
  {
    $this->db->select('*');
    $this->db->from('category_buy');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function detail_category_buy($id)
  {
    $this->db->select('*');
    $this->db->from('category_buy');
    $this->db->where('id', $id);
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->row();
  }
  //Read Berita
  public function read($id)
  {
    $this->db->select('*');
    $this->db->from('category_buy');
    $this->db->where(array(
      'category_buy.id'      =>  $id
    ));
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
  public function create($data)
  {
    $this->db->insert('category_buy', $data);
  }
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('category_buy', $data);
  }
  //Delete Data
  public function delete($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->delete('category_buy', $data);
  }
}
