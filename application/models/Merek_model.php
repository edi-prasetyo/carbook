<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Merek
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('merek');
    $this->db->order_by('nama_merek','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail merek
  public function detail($id_merek)
  {
    $this->db->select('*');
    $this->db->from('merek');
    $this->db->where('id_merek',$id_merek);
    $this->db->order_by('id_merek');
    $query = $this->db->get();
    return $query->row();
  }

  //Read merek
  public function read($slug_merek)
  {
    $this->db->select('*');
    $this->db->from('merek');
    $this->db->where('slug_merek',$slug_merek);
    $this->db->order_by('id_merek');
    $query = $this->db->get();
    return $query->row();
  }


  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('merek', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_merek',$data['id_merek']);
      $this->db->update('merek',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_merek',$data['id_merek']);
      $this->db->delete('merek',$data);
    }

}

/* end of file Merek_model.php */
/* Location /application/controller/admin/Merek_model.php */
