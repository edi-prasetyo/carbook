<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Galeri
  public function listing()
  {
    $this->db->select('galeri.*,
                        user.nama');
    $this->db->from('galeri');
    // Join
    $this->db->join('user', 'user.id_user = galeri.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id_galeri');
    $query = $this->db->get();
    return $query->result();
  }

  //listing Slider
  public function slider()
  {
    $this->db->select('galeri.*,
                        user.nama');
    $this->db->from('galeri');
    // Join
    $this->db->join('user', 'user.id_user = galeri.user_id', 'LEFT');
    //End Join
    $this->db->where('posisi_galeri', 'Homepage');
    $this->db->order_by('id_galeri');
    $this->db->limit(5);
    $query = $this->db->get();
    return $query->result();
  }

  //Detail Galeri
  public function detail($id_galeri)
  {
    $this->db->select('*');
    $this->db->from('galeri');
    $this->db->where('id_galeri', $id_galeri);
    $this->db->order_by('id_galeri');
    $query = $this->db->get();
    return $query->row();
  }
  //Login Galeri
  public function login($galeriname, $password)
  {
    $this->db->select('*');
    $this->db->from('galeri');
    $this->db->where(array(
      'galeriname'    => $galeriname,
      'password'   => sha1($password)
    ));
    $this->db->order_by('id_galeri');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('galeri', $data);
  }

  //Edit Data
  public function edit($data)
  {
    $this->db->where('id_galeri', $data['id_galeri']);
    $this->db->update('galeri', $data);
  }

  //Delete Data
  public function delete($data)
  {
    $this->db->where('id_galeri', $data['id_galeri']);
    $this->db->delete('galeri', $data);
  }


  // Front end

  //Layanan
  public function galeri($limit, $start)
  {
    $this->db->select('galeri.*,user.nama');
    $this->db->from('galeri');
    // Join
    $this->db->join('user', 'user.id_user = galeri.user_id', 'LEFT');
    //End Join
    $this->db->where('galeri.posisi_galeri', 'Galeri');
    $this->db->order_by('id_galeri');
    $this->db->limit($limit, $start);
    $this->db->order_by('id_galeri', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Total Galeri
  public function total()
  {
    $this->db->select('galeri.*,user.nama');
    $this->db->from('galeri');
    // Join
    $this->db->join('user', 'user.id_user = galeri.user_id', 'LEFT');
    //End Join
    $this->db->where('galeri.posisi_galeri', 'Galeri');
    $this->db->order_by('id_galeri', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
}

/* end of file Galeri_model.php */
/* Location /application/controller/admin/Galeri_model.php */
