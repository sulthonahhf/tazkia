<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketController extends CI_Controller {

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
				$this->load->model('PaketModel');
				$this->load->model('KategoriModel');
				$this->load->model('SantriModel');
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

			$paket = $this->PaketModel->getUser();

			$data['paket'] = $paket;

			$this->load->view('paket/indexpaket',$data);
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

			$kategori = $this->KategoriModel->getKategori();
			$santri = $this->SantriModel->getUser();

			$data['kategori'] = $kategori;
			$data['santri'] = $santri;

		    $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'trim|required');
			/*$this->form_validation->set_rules('nama_santri', 'Nama Santri', 'trim|required');*/
			$this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'trim|required');
			// $this->form_validation->set_rules('kategori_paket', 'Kategori Paket', 'trim|required');
			// $this->form_validation->set_rules('penerima_paket', 'Penerima Paket', 'trim|required');
			$this->form_validation->set_rules('pengirim_paket', 'Pengirim Paket', 'trim|required');
			$this->form_validation->set_rules('isi_paket', 'Isi Paket', 'trim|required');
			$this->form_validation->set_rules('status_paket', 'Status Paket', 'trim|required');

		    if ($this->form_validation->run()==FALSE)
			{
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('paket/addpaket',$data);
			}
			else
			{
				$this->PaketModel->add();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('paket','refresh');
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

				$kategori = $this->KategoriModel->getKategori();
				$santri = $this->SantriModel->getUser();

				$data['kategori'] = $kategori;
				$data['santri'] = $santri;
				$data['paket'] = $this->PaketModel->getUserById($id);

				/*$asrama = $this->AsramaModel->getAsrama();

				$data['asrama'] = $asrama;*/

			    $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'trim|required');
				/*$this->form_validation->set_rules('nama_santri', 'Nama Santri', 'trim|required');*/
				/*$this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'trim|required');
				$this->form_validation->set_rules('kategori_paket', 'Kategori Paket', 'trim|required');*/
				// $this->form_validation->set_rules('penerima_paket', 'Penerima Paket', 'trim|required');
				$this->form_validation->set_rules('pengirim_paket', 'Pengirim Paket', 'trim|required');
				$this->form_validation->set_rules('isi_paket', 'Isi Paket', 'trim|required');
				$this->form_validation->set_rules('status_paket', 'Status Paket', 'trim|required');

			    if ($this->form_validation->run()==FALSE)
				{
					$data['error'] = "Data Harus Lengkap";
					$this->load->view('paket/editpaket',$data);
				}
				else
				{
					$this->PaketModel->edit($id);
					echo "<script>alert('Update Data Berhasil')</script>";
					redirect('paket','refresh');
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

					$this->PaketModel->delete($id);
					echo "<script>alert('Hapus Data Berhasil')</script>";
					redirect('paket','refresh');
		}
		else{
			redirect('login','refresh');
		}
	}

	public function keluar($id)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_user = $session_data['id_user'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$email = $session_data['email'];
				$role = $session_data['role'];

					$this->PaketModel->keluar($id);
					echo "<script>alert('Paket Sudah Dikeluarkan ')</script>";
					redirect('paket','refresh');
		}
		else{
			redirect('login','refresh');
		}
	}

	public function sita($id)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_user = $session_data['id_user'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$email = $session_data['email'];
				$role = $session_data['role'];

					$this->PaketModel->sita($id);
					echo "<script>alert('Paket Sudah Disita ')</script>";
					redirect('paket','refresh');
		}
		else{
			redirect('login','refresh');
		}
	}
}

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */