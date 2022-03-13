<?php  
/**
 * 
 */
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function index()
	{

		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() == false){
		$data['judul'] = 'Login';
		$this->load->view('admin/template/admin_header', $data);
		$this->load->view('admin/login', $data);
		$this->load->view('admin/template/admin_footer');
		} else {
			$this->login();
		}

		
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$register = $this->db->get_where('register', ['email' => $email])->row_array();

		if($register){
			if(password_verify($password, $register['password'])){
				$data = [
					'email' => $register['email'],
					'role_id' => $register['role_id']
				];
				$this->session->set_userdata($data);
				if($register['role_id'] == 1){
					redirect('dashboard');
				} else {
					redirect('photos');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('admin/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email benar</div>');
				redirect('admin/login');
		}


	}

	
}

	
?>