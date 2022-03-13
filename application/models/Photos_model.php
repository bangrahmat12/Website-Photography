<?php
/**
 * 
 */
class Photos_model extends CI_Model
{
	
	public function getAllUpload()
	{
		return $this->db->get('upload')->result_array();
	}

	public function editDataGambar() 
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"gambar" => $this->input->post('gambar', true),
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('upload', $data);
}
}
?>