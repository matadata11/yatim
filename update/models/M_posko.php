<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posko extends CI_Model {
    
    private $_table = 'mt_posko';

    // / Mengambil data dari database
	public function getPosko()
	{
		$this->db->order_by('id_posko', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}
    
     // Insert data ke database
	public function entry($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	// Updater data di database
	public function update($data, $id_posko)
	{
		$this->db->where('id_posko', $id_posko);
		return $this->db->update($this->_table, $data);
	}

    // Menghapus data dari database
	public function delete()
	{
		$key = $this->uri->segment(2);
		return $this->db->delete($this->_table,['id_posko' => $key]);
	}

	public function register_tim($data){
		$this->load->database();
		$this->db->insert($this->_table,$data);
		$insert_id = $this->db->insert_id();
        return $insert_id;
	}


}

/* End of file M_posko.php */
