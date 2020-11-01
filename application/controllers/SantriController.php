<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SantriController extends CI_Controller {

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
				$this->load->model('SantriModel');
				$this->load->model('AsramaModel');
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

			$santri = $this->SantriModel->getUser();

			$data['santri'] = $santri;

			$this->load->view('santri/indexsantri',$data);
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

			$asrama = $this->AsramaModel->getAsrama();

			$data['asrama'] = $asrama;

		    $this->form_validation->set_rules('nis', 'NIS', 'trim|required');
			$this->form_validation->set_rules('nama_santri', 'Nama Santri', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('asrama', 'Asrama', 'trim|required');
			$this->form_validation->set_rules('total_paket', 'Total Paket', 'trim|required');

		    if ($this->form_validation->run()==FALSE)
			{
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('santri/addsantri',$data);
			}
			else
			{
				$this->SantriModel->add();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('santri','refresh');
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
				$data['santri'] = $this->SantriModel->getUserById($id);

				$asrama = $this->AsramaModel->getAsrama();

				$data['asrama'] = $asrama;

			    $this->form_validation->set_rules('nis', 'NIS', 'trim|required');
				$this->form_validation->set_rules('nama_santri', 'Nama Santri', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('asrama', 'Asrama', 'trim|required');
				$this->form_validation->set_rules('total_paket', 'Total Paket', 'trim|required');

			    if ($this->form_validation->run()==FALSE)
				{
					$data['error'] = "Data Harus Lengkap";
					$this->load->view('santri/editsantri',$data);
				}
				else
				{
					$this->SantriModel->edit($id);
					echo "<script>alert('Update Data Berhasil')</script>";
					redirect('santri','refresh');
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

					$this->SantriModel->delete($id);
					echo "<script>alert('Hapus Data Berhasil')</script>";
					redirect('santri','refresh');
		}
		else{
			redirect('login','refresh');
		}
	}
}

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */