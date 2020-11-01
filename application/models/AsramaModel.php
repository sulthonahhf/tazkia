<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsramaModel extends CI_Model {

	public function getAsrama()
	{
		return $this->db->get('asrama')->result();
	}

}

/* End of file AsramaModel.php */
/* Location: ./application/models/AsramaModel.php */