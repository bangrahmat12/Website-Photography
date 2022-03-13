<?php
/**
 * 
 */
class Videos extends CI_Controller
{
	
	public function index()
	{
		$data['judul'] = 'Videos';
		$this->load->view('template/header', $data);
		$this->load->view('videos/index', $data);
		$this->load->view('template/footer');
	}
}
?>