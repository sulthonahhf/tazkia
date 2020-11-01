<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password',base64_encode($password));
		$query = $this->db->get('user');
		if($query->num_rows()==1){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function register()
	{
		$object = array('username' => $this->input->post('username'),
		'password' => base64_encode($this->input->post('password')),
		'nama' => $this->input->post('nama'),
		'email' => $this->input->post('email'),
		'level' => '2' );
		$this->db->insert('user', $object);
	}

	public function lupa_password($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		if($query->num_rows()==1){
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function reset_password($id)
	{
		$object = array(
		'password' => base64_encode($this->input->post('password')), );
		$this->db->where('id_user',$id);
		$this->db->update('user', $object);
	}

}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */