<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Mobil
  public function get_all()
  {
    $this->db->select('mobil.*,
                       merek.merek_name, merek.merek_slug, jenismobil.jenismobil_name, user.user_name');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join

    $this->db->order_by('mobil.mobil_harga', 'ASC');

    $query = $this->db->get();
    return $query->result();
  }
  //listing Mobil
  public function get_mobil()
  {
    $this->db->select('mobil.*,
                       merek.merek_name, merek.merek_slug, jenismobil.jenismobil_name, user.user_name');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(['mobil_status' => 'Aktif']);
    $this->db->order_by('mobil.mobil_harga', 'ASC');

    $query = $this->db->get();
    return $query->result();
  }
  //Mobil Populer
  public function mobil_populer()
  {
    $this->db->select('mobil.*,
                       merek.merek_name, merek.merek_slug, jenismobil.jenismobil_name, user.user_name');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(['mobil_status' => 'Aktif']);
    $this->db->order_by('mobil.mobil_views', 'DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }


  //listing Mobil Home
  public function home()
  {
    $this->db->select(
      'mobil.*,
                      merek.merek_name,
                      merek.merek_slug,
                      jenismobil.jenismobil_name,
                      user.user_name'
    );
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array('mobil_status'     =>  'Aktif'));
    $this->db->order_by('mobil_harga', 'ASC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  //listing Mobil Sidebar
  public function sidebar()
  {
    $this->db->select(
      'mobil.*,
                      merek.merek_name,
                      merek.merek_slug,
                      jenismobil.jenismobil_name,
                      user.user_name'
    );
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array('mobil_status'     =>  'Aktif'));
    $this->db->order_by('mobil_harga', 'ASC');
    $this->db->limit(12);
    $query = $this->db->get();
    return $query->result();
  }

  //listing Mobil Main Page
  public function mobil($limit, $start)
  {
    $this->db->select(
      'mobil.*,
                        merek.merek_name,
                        merek.merek_slug,
                        jenismobil.jenismobil_name,
                        user.user_name'
    );
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array('mobil_status'     =>  'Aktif'));
    $this->db->order_by('mobil_harga', 'ASC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Mobil Main Page
  public function total()
  {
    $this->db->select(
      'mobil.*,
                      merek.merek_name,
                      merek.merek_slug,
                      jenismobil.jenismobil_name,
                      user.user_name'
    );
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array('mobil_status'     =>  'Aktif'));
    $this->db->order_by('mobil.is', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //listing Kategori Mobil
  public function mobil_kategori($id_kategori, $limit, $start)
  {
    $this->db->select('mobil.*,
                      merek.merek_name,
                      merek.merek_slug,
                      jenismobil.jenismobil_name,
                      user.user_name');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'mobil_status'           =>  'publish',
      'mobil.id_kategori'      =>  $id_kategori
    ));
    $this->db->order_by('mobil.id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Kategori Mobil
  public function total_kategori($id_kategori)
  {
    $this->db->select('mobil.*,
                        merek.merek_name,
                        merek.merek_slug,
                        jenismobil.jenismobil_name,
                        user.user_name');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'mobil_status'           =>  'Aktif',
      'mobil.id_kategori'      =>  $id_kategori
    ));
    $this->db->order_by('mobil.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Read Mobil
  public function read($id)
  {
    $this->db->select('mobil.*,
                      merek.merek_name,
                      merek.merek_slug,
                      jenismobil.jenismobil_name,
                      user.user_name');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'mobil_status'           =>  'Aktif',
      'mobil.id'        =>  $id
    ));
    $query = $this->db->get();
    return $query->row();
  }
  //Paket
  public function listpaket($id)
  {
    $this->db->select('*');
    $this->db->from('paket');
    $this->db->where('mobil_id', $id);
    $this->db->order_by('paket.paket_price', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail Mobil
  public function detail_mobil($mobil_id)
  {
    $this->db->select('mobil.*, merek.merek_name');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id = mobil.merek_id', 'LEFT');
    // End Join
    $this->db->where('mobil.id', $mobil_id);
    $this->db->order_by('mobil.id', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
  public function detail_paket($id)
  {
    $this->db->select('paket.*, ketentuan.ketentuan_desc, ketentuan.ketentuan_name, mobil.mobil_name, mobil.mobil_penumpang, mobil.mobil_bagasi, mobil.mobil_gambar');
    $this->db->from('paket');
    $this->db->join('ketentuan', 'ketentuan.id = paket.ketentuan_id', 'LEFT');
    $this->db->join('mobil', 'mobil.id = paket.mobil_id', 'LEFT');
    $this->db->where('paket.id', $id);
    $query = $this->db->get();
    return $query->row();
  }

  //Paket
  public function paket($mobil_id)
  {
    $this->db->select('*');
    $this->db->from('paket');
    $this->db->where('id', $mobil_id);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  //tambah / Insert Gambar
  public function create_paket($data)
  {
    $this->db->insert('paket', $data);
  }
  public function paket_detail($id)
  {
    $this->db->select('*');
    $this->db->from('paket');

    $this->db->where('id', $id);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Edit Data
  public function edit_paket($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('paket', $data);
  }

  //tambah / Insert Data
  public function create($data)
  {
    $this->db->insert('mobil', $data);
  }

  //Edit Data
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('mobil', $data);
  }

  //Delete Data
  public function delete($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->delete('mobil', $data);
  }
  //Delete Data Paket

  // Update Counter Mobil Views
  function update_counter($id)
  {
    // return current article views
    $this->db->where('id', urldecode($id));
    $this->db->select('mobil_views');
    $count = $this->db->get('mobil')->row();
    // then increase by one
    $this->db->where('id', urldecode($id));
    $this->db->set('mobil_views', ($count->mobil_views + 1));
    $this->db->update('mobil');
  }
}

/* end of file Mobil_model.php */
/* Location /application/controller/admin/Mobil_model.php */
