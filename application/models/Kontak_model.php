<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model{
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
    $this->db->from('kontak');
    $this->db->order_by('id_kontak','DESC');
    $query = $this->db->get();
    return $query->result();
  }



  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('kontak', $data);
  }


  public function detail($id_kontak)
  {

     $statusread = 1;

    $this->db->select('*');
    $this->db->from('kontak');
    $this->db->set('status_read',$statusread);
    $this->db->where('id_kontak',$id_kontak);
    $this->db->update('kontak');
    $this->db->where('id_kontak',$id_kontak);

    $query = $this->db->get('kontak');
    return $query->row();
  }


  public function total_kontak()
  {
    $this->db->select('*');
    $this->db->from('kontak');
    $this->db->where('status_read',0);
    $query = $this->db->get();
    return $query->result();
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_kontak',$data['id_kontak']);
      $this->db->update('kontak',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_kontak',$data['id_kontak']);
      $this->db->delete('kontak',$data);
    }



}

/* end of file Pendaftaran_model.php */
/* Location /application/controller/admin/Pendaftaran_model.php */
