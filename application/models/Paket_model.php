<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Paket
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('paket');
    $this->db->order_by('nama_paket','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail paket
  public function detail($id_paket)
  {
    $this->db->select('*');
    $this->db->from('paket');
    $this->db->where('id_paket',$id_paket);
    $this->db->order_by('id_paket');
    $query = $this->db->get();
    return $query->row();
  }

  //Read paket
  public function read($slug_paket)
  {
    $this->db->select('*');
    $this->db->from('paket');
    $this->db->where('slug_paket',$slug_paket);
    $this->db->order_by('id_paket');
    $query = $this->db->get();
    return $query->row();
  }


  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('paket', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_paket',$data['id_paket']);
      $this->db->update('paket',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_paket',$data['id_paket']);
      $this->db->delete('paket',$data);
    }

}

/* end of file Paket_model.php */
/* Location /application/controller/admin/Paket_model.php */
