<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenismobil_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Jenismobil
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('jenismobil');
    $this->db->order_by('nama_jenismobil','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail jenismobil
  public function detail($id_jenismobil)
  {
    $this->db->select('*');
    $this->db->from('jenismobil');
    $this->db->where('id_jenismobil',$id_jenismobil);
    $this->db->order_by('id_jenismobil');
    $query = $this->db->get();
    return $query->row();
  }

  //Read jenismobil
  public function read($slug_jenismobil)
  {
    $this->db->select('*');
    $this->db->from('jenismobil');
    $this->db->where('slug_jenismobil',$slug_jenismobil);
    $this->db->order_by('id_jenismobil');
    $query = $this->db->get();
    return $query->row();
  }


  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('jenismobil', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_jenismobil',$data['id_jenismobil']);
      $this->db->update('jenismobil',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_jenismobil',$data['id_jenismobil']);
      $this->db->delete('jenismobil',$data);
    }

}

/* end of file Jenismobil_model.php */
/* Location /application/controller/admin/Jenismobil_model.php */
