<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_user = $session_data['id_user'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$email = $session_data['email'];
				$role = $session_data['role'];

				$this->load->helper('url','form','file');
				$this->load->library('form_validation');
				// $this->load->model('Admin_model');
		}
		else{
			redirect('login','refresh');
		}
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');

				$id_user = $session_data['id_user'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$email = $session_data['email'];
				$role = $session_data['role'];

				if ($role == 1) {
					$this->load->view('dashboard');
				}
				elseif ($role == 2) {
					redirect('User','refresh');
				}
		}
		else{
			redirect('login','refresh');
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */