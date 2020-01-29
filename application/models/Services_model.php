<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Services
  public function listing()
  {
    $this->db->select('services.*,
                        user.nama');
    $this->db->from('services');
    // Join
    $this->db->join('user', 'user.id_user = services.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id_services');
    $query = $this->db->get();
    return $query->result();
  }


  //Detail Services
  public function detail($id_services)
  {
    $this->db->select('*');
    $this->db->from('services');
    $this->db->where('id_services', $id_services);
    $this->db->order_by('id_services');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('services', $data);
  }

  //Edit Data
  public function edit($data)
  {
    $this->db->where('id_services', $data['id_services']);
    $this->db->update('services', $data);
  }

  //Delete Data
  public function delete($data)
  {
    $this->db->where('id_services', $data['id_services']);
    $this->db->delete('services', $data);
  }


  // Front end

  //Layanan
  public function services($limit, $start)
  {
    $this->db->select('services.*,user.nama');
    $this->db->from('services');
    // Join
    $this->db->join('user', 'user.id_user = services.user_id', 'LEFT');
    //End Join
    $this->db->where('services.posisi_services', 'Services');
    $this->db->order_by('id_services');
    $this->db->limit($limit, $start);
    $this->db->order_by('id_services', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Total Services
  public function total()
  {
    $this->db->select('services.*,user.nama');
    $this->db->from('services');
    // Join
    $this->db->join('user', 'user.id_user = services.user_id', 'LEFT');
    //End Join
    $this->db->where('services.posisi_services', 'Services');
    $this->db->order_by('id_services', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
}

/* end of file Services_model.php */
/* Location /application/controller/admin/Services_model.php */
