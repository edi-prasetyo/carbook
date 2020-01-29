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
  public function listing()
  {
    $this->db->select('mobil.*,
                       merek.nama_merek, merek.slug_merek, jenismobil.nama_jenismobil, user.nama');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id_merek = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id_jenismobil = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id_user = mobil.user_id', 'LEFT');
    //End Join
    $this->db->order_by('id_mobil', 'DESC');

    $query = $this->db->get();
    return $query->result();
  }


  //listing Mobil Home
  public function home()
  {
    $this->db->select(
      'mobil.*,
                      merek.nama_merek,
                      merek.slug_merek,
                      jenismobil.nama_jenismobil,
                      user.nama'
    );
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id_merek = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id_jenismobil = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id_user = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array('status_mobil'     =>  'Aktif'));
    $this->db->order_by('harga_awal', 'ASC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  //listing Mobil Sidebar
  public function sidebar()
  {
    $this->db->select(
      'mobil.*,
                      merek.nama_merek,
                      merek.slug_merek,
                      jenismobil.nama_jenismobil,
                      user.nama'
    );
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id_merek = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id_jenismobil = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id_user = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array('status_mobil'     =>  'Aktif'));
    $this->db->order_by('harga_awal', 'ASC');
    $this->db->limit(12);
    $query = $this->db->get();
    return $query->result();
  }

  //listing Mobil Main Page
  public function mobil($limit, $start)
  {
    $this->db->select(
      'mobil.*,
                        merek.nama_merek,
                        merek.slug_merek,
                        jenismobil.nama_jenismobil,
                        user.nama'
    );
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id_merek = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id_jenismobil = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id_user = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array('status_mobil'     =>  'Aktif'));
    $this->db->order_by('harga_awal', 'ASC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Mobil Main Page
  public function total()
  {
    $this->db->select(
      'mobil.*,
                      merek.nama_merek,
                      merek.slug_merek,
                      jenismobil.nama_jenismobil,
                      user.nama'
    );
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id_merek = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id_jenismobil = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id_user = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array('status_mobil'     =>  'Aktif'));
    $this->db->order_by('id_mobil', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //listing Kategori Mobil
  public function mobil_kategori($id_kategori, $limit, $start)
  {
    $this->db->select('mobil.*,
                      merek.nama_merek,
                      merek.slug_merek,
                      jenismobil.nama_jenismobil,
                      user.nama');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id_merek = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id_jenismobil = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id_user = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'status_mobil'           =>  'publish',
      'mobil.id_kategori'      =>  $id_kategori
    ));
    $this->db->order_by('id_mobil', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Kategori Mobil
  public function total_kategori($id_kategori)
  {
    $this->db->select('mobil.*,
                        merek.nama_merek,
                        merek.slug_merek,
                        jenismobil.nama_jenismobil,
                        user.nama');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id_merek = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id_jenismobil = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id_user = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'status_mobil'           =>  'Aktif',
      'mobil.id_kategori'      =>  $id_kategori
    ));
    $this->db->order_by('id_mobil', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Read Mobil
  public function read($id_mobil)
  {
    $this->db->select('mobil.*,
                      merek.nama_merek,
                      merek.slug_merek,
                      jenismobil.nama_jenismobil,
                      user.nama');
    $this->db->from('mobil');
    // Join
    $this->db->join('merek', 'merek.id_merek = mobil.merek_id', 'LEFT');
    $this->db->join('jenismobil', 'jenismobil.id_jenismobil = mobil.jenismobil_id', 'LEFT');
    $this->db->join('user', 'user.id_user = mobil.user_id', 'LEFT');
    //End Join
    $this->db->where(array(
      'status_mobil'           =>  'Aktif',
      'mobil.id_mobil'        =>  $id_mobil
    ));
    $this->db->order_by('id_mobil', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
  //Paket
  public function listpaket($id_mobil)
  {
    $this->db->select('*');
    $this->db->from('paket');
    $this->db->where('mobil_id', $id_mobil);
    $this->db->order_by('mobil_id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail Mobil
  public function detail($id_mobil)
  {
    $this->db->select('*');
    $this->db->from('mobil');
    $this->db->where('id_mobil', $id_mobil);
    $this->db->order_by('id_mobil', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
  public function detail_paket($id_paket)
  {
    $this->db->select('paket.*, ketentuan.isi_ketentuan, ketentuan.nama_ketentuan, mobil.nama_mobil, mobil.kap_penumpang, mobil.kap_bagasi, mobil.gambar, user.nama');
    $this->db->from('paket');
    $this->db->join('ketentuan', 'ketentuan.id_ketentuan = paket.ketentuan_id', 'LEFT');
    $this->db->join('mobil', 'mobil.id_mobil = paket.mobil_id', 'LEFT');
    $this->db->join('user', 'user.id_user = mobil.user_id', 'LEFT');
    $this->db->where('id_paket', $id_paket);
    $this->db->order_by('id_paket', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
  //Paket
  public function paket($id_mobil)
  {
    $this->db->select('*');
    $this->db->from('paket');
    $this->db->where('id_mobil', $id_mobil);
    $this->db->order_by('id_mobil', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  //tambah / Insert Gambar
  public function tambah_paket($data)
  {
    $this->db->insert('paket', $data);
  }
  public function paket_detail($id_paket)
  {
    $this->db->select('*');
    $this->db->from('paket');

    $this->db->where('id_paket', $id_paket);
    $this->db->order_by('id_paket', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Edit Data
  public function edit_paket($data)
  {
    $this->db->where('id_paket', $data['id_paket']);
    $this->db->update('paket', $data);
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('mobil', $data);
  }

  //Edit Data
  public function edit($data)
  {
    $this->db->where('id_mobil', $data['id_mobil']);
    $this->db->update('mobil', $data);
  }

  //Delete Data
  public function delete($data)
  {
    $this->db->where('id_mobil', $data['id_mobil']);
    $this->db->delete('mobil', $data);
  }
  //Delete Data Paket
  public function delete_paket($data)
  {
    $this->db->where('id_paket', $data['id_paket']);
    $this->db->delete('paket', $data);
  }
}

/* end of file Mobil_model.php */
/* Location /application/controller/admin/Mobil_model.php */
