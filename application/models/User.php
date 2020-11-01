<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function getUser()
	{
		$user = $this->db->get('user')->result();
		return $user;
	}

	public function add()
	{
		$object = array('username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'role' => '2' );
		$this->db->insert('user', $object);
	}

	public function getUserById($id)
	{
		$this->db->where('id_user', $id);
		// $this->db->where('level', '2');
		return $this->db->get('user')->result();
	}

	public function edit($id_user)
	{
		$object = array('username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'role' => '1' );
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $object);
	}

	public function delete($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */