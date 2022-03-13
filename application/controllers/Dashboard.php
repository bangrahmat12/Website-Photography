<?php  
/**
 * 
 */
class Dashboard extends CI_Controller
{
 
	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['register'] = $this->db->get_where('register', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('template/footer');
	}
}
?>