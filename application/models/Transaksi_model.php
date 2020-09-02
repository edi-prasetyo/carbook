<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function get_alltransaksi()
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function new_transaksi()
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    // $this->db->join('user', 'user.id = transaksi.user_id', 'LEFT');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }
  public function product_home()
  {
    $this->db->select('transaksi.*, user.user_name');
    $this->db->from('transaksi');
    $this->db->join('user', 'user.id = transaksi.user_id', 'LEFT');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(4);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_transaksi($limit, $start)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_mytransaksi($id, $limit, $start)
  {
    $this->db->select('transaksi.*, user.user_name');
    $this->db->from('transaksi');
    // Join
    $this->db->join('user', 'user.id = transaksi.user_id', 'LEFT');
    //End Join
    $this->db->where('user_id', $id);
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Berita Main Page
  public function total_row()
  {
    $this->db->select('transaksi.*, user.user_name');
    $this->db->from('transaksi');
    // Join
    $this->db->join('user', 'user.id = transaksi.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function detail($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function product_detail($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function myproduct_detail($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  //Kirim Data Berita ke database
  public function create($data)
  {
    $this->db->insert('transaksi', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
  public function last_transaksi($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    //join
    // $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil', 'left');
    //End Join
    $this->db->where('id', $id);
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->row();
  }
  //Update Data
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('transaksi', $data);
  }
  //Hapus Data Dari Database
  public function delete($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->delete('transaksi', $data);
  }
  // Data Berita yang di tampilkan di Front End
  //listing Berita Main Page
  public function transaksi($limit, $start)
  {
    $this->db->select('transaksi.*, user.user_name');
    $this->db->from('transaksi');
    // Join
    $this->db->join('user', 'user.id = transaksi.user_id', 'LEFT');
    //End Join
    $this->db->where(['transaksi_status'     =>  'Aktif']);
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Berita Main Page
  public function total()
  {
    $this->db->select('transaksi.*, user.user_name');
    $this->db->from('transaksi');
    // Join
    $this->db->join('user', 'user.id = transaksi.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  //Total Product Vendor
  public function total_myproduct()
  {
    $this->db->select('transaksi.*, user.user_name');
    $this->db->from('transaksi');
    // Join
    $this->db->join('user', 'user.id = transaksi.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
}
