<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketModel extends CI_Model {

	public function getUser()
	{
		$this->db->select('*,santri.id as id_santri');
		$this->db->join('santri','santri.id = paket.penerima_paket');
		$this->db->join('asrama','asrama.id = santri.asrama');
		$this->db->join('kategori','kategori.id_kategori = paket.kategori_paket');
		$user = $this->db->get('paket')->result();
		return $user;
	}

	public function add()
	{
		$object = array('nama_paket' => $this->input->post('nama_paket'),
			'tanggal_diterima' => $this->input->post('tanggal_diterima'),
			'kategori_paket' => $this->input->post('kategori_paket'),
			'penerima_paket' => $this->input->post('penerima_paket'),
			'pengirim_paket' => $this->input->post('pengirim_paket'),
			'isi_paket' => $this->input->post('isi_paket'),
			'status_paket' => $this->input->post('status_paket'));
		$this->db->insert('paket', $object);
	}

	public function getUserById($id)
	{
		$this->db->select('*,santri.id as id_santri');
		$this->db->join('santri','santri.id = paket.penerima_paket');
		$this->db->join('asrama','asrama.id = santri.asrama');
		$this->db->join('kategori','kategori.id_kategori = paket.kategori_paket');
		$this->db->where('paket.id_paket', $id);
		// $this->db->where('level', '2');
		return $this->db->get('paket')->result();
	}

	public function edit($id)
	{
		$object = array('nama_paket' => $this->input->post('nama_paket'),
			'tanggal_diterima' => $this->input->post('tanggal_diterima'),
			'kategori_paket' => $this->input->post('kategori_paket'),
			'penerima_paket' => $this->input->post('penerima_paket'),
			'pengirim_paket' => $this->input->post('pengirim_paket'),
			'isi_paket' => $this->input->post('isi_paket'),
			'status_paket' => $this->input->post('status_paket'));
		$this->db->where('id_paket', $id);
		$this->db->update('paket', $object);
	}

	public function delete($id)
	{
		$this->db->where('id_paket', $id);
		$this->db->delete('paket');
	}

	public function keluar($id)
	{
		$object = array(
			'status_paket' => 'Keluar');
		$this->db->where('id_paket', $id);
		$this->db->update('paket',$object);
	}

	public function sita($id)
	{
		$object = array(
			'status_paket' => 'Sita');
		$this->db->where('id_paket', $id);
		$this->db->update('paket',$object);
	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */