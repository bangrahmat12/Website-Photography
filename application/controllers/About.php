<?php  
/**
 * 
 */
class About extends CI_Controller
{
	
	public function index()
	{
		$data['judul'] = 'About';
		$this->load->view('template/header', $data);
		$this->load->view('about/index', $data);
		$this->load->view('template/footer');
	}
}
?>