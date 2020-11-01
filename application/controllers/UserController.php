<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

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
				$this->load->model('User');
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

			$user = $this->User->getUser();

			$data['user'] = $user;

			$this->load->view('user/index',$data);
		}
		else{
			redirect('login','refresh');
		}
	}

	public function add()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$role = $session_data['role'];

			$data['role'] = $role;
			$data['nama'] = $nama;

		    $this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

		    if ($this->form_validation->run()==FALSE)
			{
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('user/add',$data);
			}
			else
			{
				$this->User->add();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('user','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_user = $session_data['id_user'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$email = $session_data['email'];
				$role = $session_data['role'];

				$data['role'] = $role;
				$data['nama'] = $nama;
				$data['user'] = $this->User->getUserById($id);

			    $this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');

			    if ($this->form_validation->run()==FALSE)
				{
					$data['error'] = "Data Harus Lengkap";
					$this->load->view('user/edit',$data);
				}
				else
				{
					$this->User->edit($id);
					echo "<script>alert('Update Data Berhasil')</script>";
					redirect('user','refresh');
				}
		}
		else{
			redirect('login','refresh');
		}# code...
	}

	public function delete($id)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_user = $session_data['id_user'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$email = $session_data['email'];
				$role = $session_data['role'];

					$this->User->delete($id);
					echo "<script>alert('Hapus Data Berhasil')</script>";
					redirect('user','refresh');
		}
		else{
			redirect('login','refresh');
		}
	}
}

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */