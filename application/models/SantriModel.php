<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SantriModel extends CI_Model {

	public function getUser()
	{
		$this->db->select('*,santri.id as id_santri');
		$this->db->join('asrama','asrama.id = santri.asrama');
		$user = $this->db->get('santri')->result();
		return $user;
	}

	public function add()
	{
		$object = array('nis' => $this->input->post('nis'),
			'nama_santri' => $this->input->post('nama_santri'),
			'alamat' => $this->input->post('alamat'),
			'asrama' => $this->input->post('asrama'),
			'total_paket' => $this->input->post('total_paket'));
		$this->db->insert('santri', $object);
	}

	public function getUserById($id)
	{
		$this->db->select('*,santri.id as id_santri');
		$this->db->join('asrama','asrama.id = santri.asrama');
		$this->db->where('santri.id', $id);
		// $this->db->where('level', '2');
		return $this->db->get('santri')->result();
	}

	public function edit($id)
	{
		$object = array('nis' => $this->input->post('nis'),
			'nama_santri' => $this->input->post('nama_santri'),
			'alamat' => $this->input->post('alamat'),
			'asrama' => $this->input->post('asrama'),
			'total_paket' => $this->input->post('total_paket'));
		$this->db->where('id', $id);
		$this->db->update('santri', $object);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('santri');
	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */