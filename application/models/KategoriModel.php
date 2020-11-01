<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {

	public function getKategori()
	{
		return $this->db->get('kategori')->result();
	}

}

/* End of file AsramaModel.php */
/* Location: ./application/models/AsramaModel.php */