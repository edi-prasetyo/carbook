<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketentuan_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Ketentuan
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('ketentuan');
    $this->db->order_by('id_ketentuan','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail ketentuan
  public function detail($id_ketentuan)
  {
    $this->db->select('*');
    $this->db->from('ketentuan');
    $this->db->where('id_ketentuan',$id_ketentuan);
    $this->db->order_by('id_ketentuan');
    $query = $this->db->get();
    return $query->row();
  }
  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('ketentuan', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_ketentuan',$data['id_ketentuan']);
      $this->db->update('ketentuan',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_ketentuan',$data['id_ketentuan']);
      $this->db->delete('ketentuan',$data);
    }

}

/* end of file Ketentuan_model.php */
/* Location /application/controller/admin/Ketentuan_model.php */
