<?php 
/**
 * 
 */
class Upload extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Photos_model');
	}
	
	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[upload.nama]');
		$this->form_validation->set_rules('gambar', 'Gambar', 'required');

		if($this->form_validation->run() == false){
		$data['judul'] = 'Upload';
		$data['register'] = $this->db->get_where('register', ['email' => $this->session->userdata('email')])->row_array();
		$data['upload']= $this->Photos_model->getAllUpload();
		$this->load->view('template/header', $data);
		$this->load->view('upload/index', $data);
		$this->load->view('template/footer');
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'gambar' => $this->input->post('gambar')
			];
			$this->db->insert('upload', $data);
			redirect('upload');
		}
	}

	public function edit()
	{
		$this->Photos_model->editDataGambar($id);
		redirect('upload');
	}
}
 ?>