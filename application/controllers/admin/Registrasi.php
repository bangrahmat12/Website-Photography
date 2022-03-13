<?php
/**
 * 
 */
class Registrasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function index()
	{

		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[register.email]');
		$this->form_validation->set_rules('password1','Password','required|trim|matches[password2]');
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]|is_unique[register.password]');

		if($this->form_validation->run() == false){
		$data['judul'] = 'Registrasi';
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/registrasi', $data);
		$this->load->view('admin/template/admin_footer');
		} else {
			$data = [
				'name' => $this->input->post('name', true),
				'email' => $this->input->post('email', true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2
			];

			$this->db->insert('register', $data);
			redirect('admin/login');
		}

	}

}
?>