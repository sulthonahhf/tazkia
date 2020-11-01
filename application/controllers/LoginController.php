<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('LoginModel');
		$this->load->library('encryption');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_tombollogin');

		if ($this->form_validation->run()==FALSE)
		{
			$data['error'] = "Maaf, Username dan Password tidak valid.";
			$this->load->view('login/login',$data);
		}
		else
		{
			redirect('dashboard','refresh');
		}
	}

	public function tombollogin($password)
	{
		$username=$this->input->post('username');
		$test = $this->encryption->encrypt($password);
		$result=$this->LoginModel->login($username, $password);

		// $password=$this->input->post('login_password');
		if ($result=='wrong_user')
		{
			$this->form_validation->set_message('tombollogin', 'Username Salah!');
			echo "control:wrong user";
			echo "<script>alert('Username Salah')</script>";
			return false;
		}
		elseif($result=='wrong_password')
		{
			$this->form_validation->set_message('tombollogin', 'Password Salah!');
			echo "control:wrong password";
			echo "<script>alert('Password Salah')</script>";
			return false;
		}
		elseif($result)
		{
			foreach ($result as $row) {
				$session_variables=array('id_user' =>$row->id_user, 'username' =>$row->username, 'password' =>$row->password, 'nama' =>$row->nama, 'email' =>$row->email, 'role' => $row->role);
			}
			
			$this->session->set_userdata('logged_in', $session_variables);
			return true;
		}
		else
		{
			$this->form_validation->set_message('tombollogin','Username dan Password Salah!');
			echo "<script>alert('Username atau Password Salah.')</script>";
			return false;
		}
	}

	public function logout(){
      $this->session->unset_userdata('logged_in');
      $this->session->sess_destroy();
      redirect('LoginController','refresh');
    }

    public function register()
    {
    	$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		if ($this->form_validation->run()==FALSE)
		{
			$data['error'] = "Data Harus Lengkap";
			$this->load->view('login/register_view',$data);
		}
		else
		{
			$this->LoginModel->register();
			echo "<script>alert('Register berhasil. Silahkan Login')</script>";
			redirect('Login','refresh');
		}
    }

    public function lupa_password()
    {
    	$this->form_validation->set_rules('username', 'Username', 'trim|required');

    	if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('login/lupa_password');
		}
		else
		{
			$lupa = $this->LoginModel->lupa_password($this->input->post('username'));
			if ($lupa) {
				foreach ($lupa as $key) {
					$id = $key->id_user;
				}
				echo "<script>alert('Silahkan masukkan password baru')</script>";
				redirect('reset_password/'.$id,'refresh');
			}else{
				echo "<script>alert('Username Tidak Ditemukan.')</script>";
				$this->load->view('login/lupa_password');
			}
		}
    }


	public function reset_password($id)
	{
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('password_new', 'Ulangi Password', 'trim|required|matches[password]');

    	if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('login/reset');
		}
		else
		{
			$this->LoginModel->reset_password($id);
			echo "<script>alert('Reset Password Berhasil')</script>";
			redirect('login','refresh');
		}
	}

}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */