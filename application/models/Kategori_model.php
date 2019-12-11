<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Kategori
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('kategori');
    $this->db->order_by('nama_kategori','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail kategori
  public function detail($id_kategori)
  {
    $this->db->select('*');
    $this->db->from('kategori');
    $this->db->where('id_kategori',$id_kategori);
    $this->db->order_by('id_kategori');
    $query = $this->db->get();
    return $query->row();
  }

  //Read kategori
  public function read($slug_kategori)
  {
    $this->db->select('*');
    $this->db->from('kategori');
    $this->db->where('slug_kategori',$slug_kategori);
    $this->db->order_by('id_kategori');
    $query = $this->db->get();
    return $query->row();
  }


  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('kategori', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_kategori',$data['id_kategori']);
      $this->db->update('kategori',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_kategori',$data['id_kategori']);
      $this->db->delete('kategori',$data);
    }

}

/* end of file Kategori_model.php */
/* Location /application/controller/admin/Kategori_model.php */
