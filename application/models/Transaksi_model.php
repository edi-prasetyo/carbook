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
  //get_all Transaksi
  public function get_all()
  {
    $this->db->select('transaksi.*, mobil.nama_mobil');
    $this->db->from('transaksi');
    //join
    $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil', 'left');
    //End Join
    $this->db->order_by('id_transaksi', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }
	
	//get_all Transaksi yang di dahsboard
  public function dashboard()
  {
    $this->db->select('transaksi.*, mobil.nama_mobil');
    $this->db->from('transaksi');
    //join
    $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil', 'left');
    //End Join
    $this->db->order_by('id_transaksi', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }
	
  //get_all Transaksi berdasarkan Header
  public function kode_transaksi($kode_transaksi)
  {
    $this->db->select('transaksi.*, produk.nama_produk, produk.kode_produk, produk.url');
    $this->db->from('transaksi');
    //join
    $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
    //End Join
    $this->db->where('kode_transaksi', $kode_transaksi);
    $this->db->order_by('id_transaksi', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }


  //Detail transaksi
  public function detail($id_transaksi)
  {
    $this->db->select('transaksi.*, mobil.nama_mobil');
    $this->db->from('transaksi');
    //join
    $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil', 'left');
    //End Join
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->order_by('id_transaksi');
    $query = $this->db->get();
    return $query->row();
  }

  //Detail transaksi
  public function detail_transaksi($id_transaksi)
  {
    $this->db->select('transaksi.*, mobil.nama_mobil');
    $this->db->from('transaksi');
    //join
    $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil', 'left');
    //End Join
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->order_by('id_transaksi');
    $query = $this->db->get();
    return $query->row();
  }

  //Detail transaksi
  public function cek_transaksi($kode_transaksi, $email)
  {
    $this->db->select('transaksi.*, mobil.nama_mobil');
    $this->db->from('transaksi');
    //join
    $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil', 'left');
    //End Join
    $this->db->like('kode_transaksi', $kode_transaksi);
    $this->db->like('email', $email);

    // $this->db->where('kode_transaksi',$kode_transaksi);
    $this->db->order_by('id_transaksi');
    $query = $this->db->get();
    return $query->row();
  }

  //Read transaksi
  public function read($slug_transaksi)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->where('slug_transaksi', $slug_transaksi);
    $this->db->order_by('id_transaksi');
    $query = $this->db->get();
    return $query->row();
  }


  //tambah / Insert Data
  public function tambah($data)
  {

    $this->db->select('transaksi.*, mobil.nama_mobil');
    $this->db->from('transaksi');
    //join
    $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil', 'left');
    //End Join

    $this->db->insert('transaksi', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function last_transaksi($id_transaksi)
  {
    $this->db->select('transaksi.*, mobil.nama_mobil');
    $this->db->from('transaksi');
    //join
    $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil', 'left');
    //End Join
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->order_by('id_transaksi');
    $query = $this->db->get();
    return $query->row();
  }

  //Edit Data
  public function edit($data)
  {
    $this->db->where('id_transaksi', $data['id_transaksi']);
    $this->db->update('transaksi', $data);
  }

  //Delete Data
  public function delete($data)
  {
    $this->db->where('id_transaksi', $data['id_transaksi']);
    $this->db->delete('transaksi', $data);
  }
}

/* end of file Transaksi_model.php */
/* Location /application/controller/admin/Transaksi_model.php */
