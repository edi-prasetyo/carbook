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
  public function get_ketentuan()
  {
    $this->db->select('*');
    $this->db->from('ketentuan');
    $this->db->order_by('id','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail ketentuan
  public function detail_ketentuan($ketentuan_id)
  {
    $this->db->select('*');
    $this->db->from('ketentuan');
    $this->db->where('id',$ketentuan_id);
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->row();
  }
  //tambah / Insert Data
  public function create($data)
  {
    $this->db->insert('ketentuan', $data);
  }

    //Edit Data
    public function update($data)
    {
      $this->db->where('id',$data['id']);
      $this->db->update('ketentuan',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id',$data['id']);
      $this->db->delete('ketentuan',$data);
    }

}

/* end of file Ketentuan_model.php */
/* Location /application/controller/admin/Ketentuan_model.php */
