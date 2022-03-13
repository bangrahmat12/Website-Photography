<?php

/**
 * 
 */
class Photos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Photos_model');
		
		if(!$this->session->userdata('email')){
			redirect('admin/login');
		}
	}
	
	public function index()
	{

		
		$data['judul'] = 'Photos';
		$data['register'] = $this->db->get_where('register', ['email' => $this->session->userdata('email')])->row_array();
		$data['upload']= $this->Photos_model->getAllUpload();
		$this->load->view('template/header', $data);
		$this->load->view('photos/index', $data);
		$this->load->view('template/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		redirect('admin/login');
	}
}

	

?>