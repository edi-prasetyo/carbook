<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Layanan
  public function listing()
  {
    $this->db->select('layanan.*,
                        user.nama');
    $this->db->from('layanan');
    // Join
    $this->db->join('user', 'user.id_user = layanan.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id_layanan');
    $query = $this->db->get();
    return $query->result();
  }

  //Home Layanan
  public function home()
  {
    $this->db->select('layanan.*,user.nama');
    $this->db->from('layanan');
    // Join
    $this->db->join('user', 'user.id_user = layanan.user_id', 'LEFT');
    //End Join
    $this->db->where('layanan.status_layanan', 'Publish');
    $this->db->order_by('id_layanan');
    $this->db->limit(6);
    $query = $this->db->get();
    return $query->result();
  }

  //Layanan
  public function layanan($limit, $start)
  {
    $this->db->select('layanan.*,user.nama');
    $this->db->from('layanan');
    // Join
    $this->db->join('user', 'user.id_user = layanan.user_id', 'LEFT');
    //End Join
    $this->db->where('layanan.status_layanan', 'Publish');
    $this->db->order_by('id_layanan');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Layanan
  public function total()
  {
    $this->db->select('layanan.*,user.nama');
    $this->db->from('layanan');
    // Join
    $this->db->join('user', 'user.id_user = layanan.user_id', 'LEFT');
    //End Join
    $this->db->where('layanan.status_layanan', 'Publish');
    $this->db->order_by('id_layanan');
    $query = $this->db->get();
    return $query->result();
  }

  //Read Layanan
  public function read($slug_layanan)
  {
    $this->db->select('layanan.*,user.nama');
    $this->db->from('layanan');
    // Join
    $this->db->join('user', 'user.id_user = layanan.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'layanan.status_layanan'    => 'Publish',
      'layanan.slug_layanan'     =>  $slug_layanan
    ));
    $this->db->order_by('id_layanan');
    $query = $this->db->get();
    return $query->row();
  }

  //Detail Layanan
  public function detail($id_layanan)
  {
    $this->db->select('*');
    $this->db->from('layanan');
    $this->db->where('id_layanan', $id_layanan);
    $this->db->order_by('id_layanan');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('layanan', $data);
  }

  //Edit Data
  public function edit($data)
  {
    $this->db->where('id_layanan', $data['id_layanan']);
    $this->db->update('layanan', $data);
  }

  //Delete Data
  public function delete($data)
  {
    $this->db->where('id_layanan', $data['id_layanan']);
    $this->db->delete('layanan', $data);
  }
}

/* end of file Layanan_model.php */
/* Location /application/controller/admin/Layanan_model.php */
/* Create By Edi Prasetyo */
