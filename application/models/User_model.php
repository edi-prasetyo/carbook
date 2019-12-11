<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing user
  public function listing()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->order_by('id_user');
    $query = $this->db->get();
    return $query->result();
  }


  //Detail user
  public function detail($id_user)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id_user',$id_user);
    $this->db->order_by('id_user');
    $query = $this->db->get();
    return $query->row();
  }
  //Login user
  public function login($email,$password)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where(array(  'email'    => $email,
                             'password'   => sha1($password),
                             'active'     => 1,
                           ));
    $this->db->order_by('id_user');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('user', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_user',$data['id_user']);
      $this->db->update('user',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_user',$data['id_user']);
      $this->db->delete('user',$data);
    }

// Pendaftaran Member

public function getAllUsers(){
		$query = $this->db->get('user');
		return $query->result();
	}

	public function insert($user){
		$this->db->insert('user', $user);
		return $this->db->insert_id();
	}


    public function getUser($id_user){
		$query = $this->db->get_where('user',array('id_user'=>$id_user));
		return $query->row_array();
	}

    public function activate($data, $id_user){
		$this->db->where('user.id_user', $id_user);
		return $this->db->update('user', $data);
	}

}

/* end of file User_model.php */
/* Location /application/controller/admin/User_model.php */
