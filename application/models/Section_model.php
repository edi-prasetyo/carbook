<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Section
  public function listing()
  {
    $this->db->select('section.*,
                        user.nama');
    $this->db->from('section');
    // Join
    $this->db->join('user', 'user.id_user = section.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id_section');
    $query = $this->db->get();
    return $query->result();
  }


  //Detail Section
  public function detail($id_section)
  {
    $this->db->select('*');
    $this->db->from('section');
    $this->db->where('id_section', $id_section);
    $this->db->order_by('id_section');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('section', $data);
  }

  //Edit Data
  public function edit($data)
  {
    $this->db->where('id_section', $data['id_section']);
    $this->db->update('section', $data);
  }

  //Delete Data
  public function delete($data)
  {
    $this->db->where('id_section', $data['id_section']);
    $this->db->delete('section', $data);
  }


  // Front end

  //Layanan
  public function section($limit, $start)
  {
    $this->db->select('section.*,user.nama');
    $this->db->from('section');
    // Join
    $this->db->join('user', 'user.id_user = section.user_id', 'LEFT');
    //End Join
    $this->db->where('section.posisi_section', 'Section');
    $this->db->order_by('id_section');
    $this->db->limit($limit, $start);
    $this->db->order_by('id_section', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Total Section
  public function total()
  {
    $this->db->select('section.*,user.nama');
    $this->db->from('section');
    // Join
    $this->db->join('user', 'user.id_user = section.user_id', 'LEFT');
    //End Join
    $this->db->where('section.posisi_section', 'Section');
    $this->db->order_by('id_section', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
}

/* end of file Section_model.php */
/* Location /application/controller/admin/Section_model.php */
