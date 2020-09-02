<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function get_allproducts()
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function new_products()
  {
    $this->db->select('products.*, user.user_name');
    $this->db->from('products');
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }
  public function product_home()
  {
    $this->db->select('products.*, user.user_name');
    $this->db->from('products');
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(4);
    $query = $this->db->get();
    return $query->result();
  }
  public function product_minigold()
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where(['category_product_id'     =>  3]);
    $this->db->order_by('id', 'ASC');
    $this->db->limit(4);
    $query = $this->db->get();
    return $query->result();
  }
  public function product_antam()
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where(['category_product_id'     =>  4, 'product_status' => 'Aktif']);
    $this->db->order_by('id', 'ASC');
    $this->db->limit(8);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_products($limit, $start)
  {
    $this->db->select('products.*,
    category_products.category_product_name, user.user_name');
    $this->db->from('products');
    // Join
    $this->db->join('category_products', 'category_products.id = products.category_product_id', 'LEFT');
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_myproducts($id, $limit, $start)
  {
    $this->db->select('products.*,
    category_products.category_product_name, user.user_name');
    $this->db->from('products');
    // Join
    $this->db->join('category_products', 'category_products.id = products.category_product_id', 'LEFT');
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
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
    $this->db->select('products.*,category_products.category_product_name, user.user_name');
    $this->db->from('products');
    // Join
    $this->db->join('category_products', 'category_products.id = products.category_product_id', 'LEFT');
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    //End Join
    $this->db->where(['product_status'     =>  'Aktif']);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function product_detail($id)
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function myproduct_detail($id)
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  //Kirim Data Berita ke database
  public function create($data)
  {
    $this->db->insert('products', $data);
  }
  //Update Data
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('products', $data);
  }
  //Hapus Data Dari Database
  public function delete($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->delete('products', $data);
  }
  // Data Berita yang di tampilkan di Front End
  //listing Berita Main Page
  public function products($limit, $start)
  {
    $this->db->select('products.*,category_products.category_product_name, user.user_name');
    $this->db->from('products');
    // Join
    $this->db->join('category_products', 'category_products.id = products.category_id', 'LEFT');
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    //End Join
    $this->db->where(['products_status'     =>  'Aktif']);
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Berita Main Page
  public function total()
  {
    $this->db->select('products.*,category_products.category_product_name, user.user_name');
    $this->db->from('products');
    // Join
    $this->db->join('category_products', 'category_products.id = products.category_product_id', 'LEFT');
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    //End Join
    $this->db->where(['product_status'     =>  'Aktif']);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  //Total Product Vendor
  public function total_myproduct()
  {
    $this->db->select('products.*,category_products.category_product_name, user.user_name');
    $this->db->from('products');
    // Join
    $this->db->join('category_products', 'category_products.id = products.category_product_id', 'LEFT');
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    //End Join
    $this->db->where(['product_status'     =>  'Aktif']);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  //Read Berita
  public function read($product_slug)
  {
    $this->db->select('products.*,category_products.category_product_name, user.user_name, user.user_phone, user.user_image');
    $this->db->from('products');
    // Join
    $this->db->join('category_products', 'category_products.id = products.category_product_id', 'LEFT');
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'product_status'           =>  'Aktif',
      'products.product_slug'      =>  $product_slug
    ));
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
  function update_counter($product_slug)
  {
    // return current article views
    $this->db->where('product_slug', urldecode($product_slug));
    $this->db->select('product_views');
    $count = $this->db->get('products')->row();
    // then increase by one
    $this->db->where('product_slug', urldecode($product_slug));
    $this->db->set('product_views', ($count->product_views + 1));
    $this->db->update('products');
  }
  // User Product
  //listing Product User
  public function product_user($user_id, $limit, $start)
  {
    $this->db->select('products.*,user.user_name, user.id');
    $this->db->from('products');
    // Join
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'product_status'           =>  'Aktif',
      'products.user_id'      =>  $user_id
    ));
    $this->db->order_by('products.id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Produk User
  public function total_user($user_id)
  {
    $this->db->select('products.*,user.user_name, user.id');
    $this->db->from('products');
    // Join
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'product_status'           =>  'Aktif',
      'products.user_id'      =>  $user_id
    ));
    $this->db->order_by('user.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  // Listting Category Product
  public function product_category($category_product_id, $limit, $start)
  {
    $this->db->select('products.*,category_products.category_product_name, category_products.id');
    $this->db->from('products');
    // Join
    $this->db->join('category_products', 'category_products.id = products.category_product_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'product_status'           =>  'Aktif',
      'products.category_product_id'      =>  $category_product_id
    ));
    $this->db->order_by('products.id', 'ASC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Produk User
  public function total_category_products($category_product_id)
  {
    $this->db->select('products.*,category_products.category_product_name, category_products.id');
    $this->db->from('products');
    // Join
    $this->db->join('category_products', 'category_products.id = products.category_product_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'product_status'                    =>  'Aktif',
      'products.category_product_id'      =>  $category_product_id
    ));
    $this->db->order_by('category_products.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  // Related Produk
  public function related_product($user_id)
  {
    $this->db->select('products.*,user.user_name, user.id');
    $this->db->from('products');
    // Join
    $this->db->join('user', 'user.id = products.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'product_status'           =>  'Aktif',
      'products.user_id'      =>  $user_id
    ));
    $this->db->order_by('rand()');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }
}
