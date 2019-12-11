<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Pendaftaran
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('info');
    $this->db->order_by('id_info','DESC');
    $query = $this->db->get();
    return $query->result();
  }



  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('info', $data);
  }


  public function detail($id_info)
  {

     

    $this->db->select('*');
    $this->db->from('info');
    $this->db->where('id_info',$id_info);
	$query = $this->db->get();
    return $query->row();
  }


  public function total_info()
  {
    $this->db->select('*');
    $this->db->from('info');
    $this->db->where('status_read',0);
    $query = $this->db->get();
    return $query->result();
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_info',$data['id_info']);
      $this->db->update('info',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_info',$data['id_info']);
      $this->db->delete('info',$data);
    }



}

/* end of file Pendaftaran_model.php */
/* Location /application/controller/admin/Pendaftaran_model.php */
