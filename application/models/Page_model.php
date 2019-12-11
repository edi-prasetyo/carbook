<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Page
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('page');
    $this->db->order_by('id_page','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Page
  public function page($limit,$start)
  {
    $this->db->select('*');
    $this->db->from('page');
    $this->db->order_by('id_page');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Page
  public function total()
  {
    $this->db->select('*');
    $this->db->from('page');
    $this->db->order_by('id_page');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail page
  public function detail($id_page)
  {
    $this->db->select('*');
    $this->db->from('page');
    $this->db->where('id_page',$id_page);
    $this->db->order_by('id_page');
    $query = $this->db->get();
    return $query->row();
  }

  //Read page
  public function read($slug_page)
  {
    $this->db->select('*');
    $this->db->from('page');
    $this->db->where('slug_page',$slug_page);
    $this->db->order_by('id_page');
    $query = $this->db->get();
    return $query->row();
  }


  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('page', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_page',$data['id_page']);
      $this->db->update('page',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_page',$data['id_page']);
      $this->db->delete('page',$data);
    }

}

/* end of file Page_model.php */
/* Location /application/controller/admin/Page_model.php */
