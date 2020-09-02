<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buyback_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  // List semua Data Buyback
  public function get_allbuyback()
  {
    $this->db->select('*');
    $this->db->from('buyback');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function new_buyback()
  {
    $this->db->select('buyback.*, user.user_name');
    $this->db->from('buyback');
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }
  public function buy_home()
  {
    $this->db->select('buyback.*, user.user_name');
    $this->db->from('buyback');
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(4);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_buyback($limit, $start)
  {
    $this->db->select('buyback.*,
    category_buy.category_buy_name, user.user_name');
    $this->db->from('buyback');
    // Join
    $this->db->join('category_buy', 'category_buy.id = buyback.category_buy_id', 'LEFT');
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_mybuyback($id, $limit, $start)
  {
    $this->db->select('buyback.*,
    category_buy.category_buy_name, user.user_name');
    $this->db->from('buyback');
    // Join
    $this->db->join('category_buy', 'category_buy.id = buyback.category_buy_id', 'LEFT');
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
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
    $this->db->select('buyback.*,category_buy.category_buy_name, user.user_name');
    $this->db->from('buyback');
    // Join
    $this->db->join('category_buy', 'category_buy.id = buyback.category_buy_id', 'LEFT');
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    //End Join
    $this->db->where(['buyback_status'     =>  'Aktif']);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function buy_detail($id)
  {
    $this->db->select('*');
    $this->db->from('buyback');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function mybuy_detail($id)
  {
    $this->db->select('*');
    $this->db->from('buyback');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  //Kirim Data Berita ke database
  public function create($data)
  {
    $this->db->insert('buyback', $data);
  }
  //Update Data
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('buyback', $data);
  }
  //Hapus Data Dari Database
  public function delete($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->delete('buyback', $data);
  }
  // Data Berita yang di tampilkan di Front End
  //listing Berita Main Page
  public function buyback($limit, $start)
  {
    $this->db->select('buyback.*,category_buy.category_buy_name, user.user_name');
    $this->db->from('buyback');
    // Join
    $this->db->join('category_buy', 'category_buy.id = buyback.category_id', 'LEFT');
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    //End Join
    $this->db->where(['buyback_status'     =>  'Aktif']);
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Berita Main Page
  public function total()
  {
    $this->db->select('buyback.*,category_buy.category_buy_name, user.user_name');
    $this->db->from('buyback');
    // Join
    $this->db->join('category_buy', 'category_buy.id = buyback.category_buy_id', 'LEFT');
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    //End Join
    $this->db->where(['buyback_status'     =>  'Aktif']);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  //Total Product Vendor
  public function total_mybuy()
  {
    $this->db->select('buyback.*,category_buy.category_buy_name, user.user_name');
    $this->db->from('buyback');
    // Join
    $this->db->join('category_buy', 'category_buy.id = buyback.category_buy_id', 'LEFT');
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    //End Join
    $this->db->where(['buyback_status'     =>  'Aktif']);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  //Read Berita
  public function read($buyback_slug)
  {
    $this->db->select('buyback.*,category_buy.category_buy_name, user.user_name, user.user_phone, user.user_image');
    $this->db->from('buyback');
    // Join
    $this->db->join('category_buy', 'category_buy.id = buyback.category_buy_id', 'LEFT');
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'buyback_status'           =>  'Aktif',
      'buyback.buyback_slug'      =>  $buyback_slug
    ));
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
  function update_counter($buyback_slug)
  {
    // return current article views
    $this->db->where('buyback_slug', urldecode($buyback_slug));
    $this->db->select('buyback_views');
    $count = $this->db->get('buyback')->row();
    // then increase by one
    $this->db->where('buyback_slug', urldecode($buyback_slug));
    $this->db->set('buyback_views', ($count->buyback_views + 1));
    $this->db->update('buyback');
  }
  // User Product
  //listing Product User
  public function buy_user($user_id, $limit, $start)
  {
    $this->db->select('buyback.*,user.user_name, user.id');
    $this->db->from('buyback');
    // Join
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'buyback_status'           =>  'Aktif',
      'buyback.user_id'      =>  $user_id
    ));
    $this->db->order_by('buyback.id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Produk User
  public function total_user($user_id)
  {
    $this->db->select('buyback.*,user.user_name, user.id');
    $this->db->from('buyback');
    // Join
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'buyback_status'           =>  'Aktif',
      'buyback.user_id'      =>  $user_id
    ));
    $this->db->order_by('user.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  // Listting Category Product
  public function buy_category($category_buy_id, $limit, $start)
  {
    $this->db->select('buyback.*,category_buy.category_buy_name, category_buy.id');
    $this->db->from('buyback');
    // Join
    $this->db->join('category_buy', 'category_buy.id = buyback.category_buy_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'buyback_status'           =>  'Aktif',
      'buyback.category_buy_id'      =>  $category_buy_id
    ));
    $this->db->order_by('buyback.id', 'ASC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Produk User
  public function total_category_buy($category_buy_id)
  {
    $this->db->select('buyback.*,category_buy.category_buy_name, category_buy.id');
    $this->db->from('buyback');
    // Join
    $this->db->join('category_buy', 'category_buy.id = buyback.category_buy_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'buyback_status'                    =>  'Aktif',
      'buyback.category_buy_id'      =>  $category_buy_id
    ));
    $this->db->order_by('category_buy.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  // Related Produk
  public function related_buy($user_id)
  {
    $this->db->select('buyback.*,user.user_name, user.id');
    $this->db->from('buyback');
    // Join
    $this->db->join('user', 'user.id = buyback.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'buyback_status'           =>  'Aktif',
      'buyback.user_id'      =>  $user_id
    ));
    $this->db->order_by('rand()');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }
}
