<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Berita
  public function listing()
  {
    $this->db->select('berita.*,
                       kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->order_by('id_berita','DESC');

    $query = $this->db->get();
    return $query->result();
  }

  //listing Berita Home
  public function home()
  {
    $this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_berita'     =>  'publish',
                            'jenis_berita'      =>  'berita'));
    $this->db->order_by('id_berita','DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  public function popularpost()
  {
    $this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_berita'     =>  'publish',
                            'jenis_berita'      =>  'berita'));
    $this->db->order_by('berita_views','DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  //listing Berita Main Page
  public function berita($limit,$start)
  {
    $this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_berita'     =>  'publish'));
    $this->db->order_by('id_berita','DESC');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Berita Main Page
  public function total()
  {
    $this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_berita'     =>  'publish'));
    $this->db->order_by('id_berita','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //listing Kategori Berita
  public function berita_kategori($id_kategori,$limit,$start)
  {
    $this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_berita'           =>  'publish',
                            'berita.id_kategori'      =>  $id_kategori));
    $this->db->order_by('id_berita','DESC');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Kategori Berita
  public function total_kategori($id_kategori)
  {
    $this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_berita'           =>  'publish',
                            'berita.id_kategori'      =>  $id_kategori));
    $this->db->order_by('id_berita','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Read Berita
  public function read($slug_berita)
  {
    $this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori, user.nama, user.foto_user');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_berita'           =>  'publish',
                            'berita.slug_berita'      =>  $slug_berita));
    $this->db->order_by('id_berita','DESC');
    $query = $this->db->get();
    return $query->row();
  }

  //Detail Berita
  public function detail($id_berita)
  {
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->where('id_berita',$id_berita);
    $this->db->order_by('id_berita','DESC');
    $query = $this->db->get();
    return $query->row();
  }
  //Login Berita
  public function login($beritaname,$password)
  {
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->where(array(  'beritaname'    => $beritaname,
                              'password'   => sha1($password)));
    $this->db->order_by('id_berita','DESC');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('berita', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_berita',$data['id_berita']);
      $this->db->update('berita',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_berita',$data['id_berita']);
      $this->db->delete('berita',$data);
    }




    function update_counter($slug_berita) {
    // return current article views
        $this->db->where('slug_berita', urldecode($slug_berita));
        $this->db->select('berita_views');
        $count = $this->db->get('berita')->row();
    // then increase by one
        $this->db->where('slug_berita', urldecode($slug_berita));
        $this->db->set('berita_views', ($count->berita_views + 1));
        $this->db->update('berita');
    }



}

/* end of file Berita_model.php */
/* Location /application/controller/admin/Berita_model.php */
