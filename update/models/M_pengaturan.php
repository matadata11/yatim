<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengaturan extends CI_Model {

    private $_table = 'mt_pengaturan';

    // Mengambil data dari database
	public function getPengaturan()
	{
		$this->db->order_by('id_pengaturan', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}

     // Insert data ke database
	public function entry($data)
	{
		return $this->db->insert($this->_table, $data);
	}

    // Updater data di database
	public function update($data, $id_pengaturan)
	{
		$this->db->where('id_pengaturan', $id_pengaturan);
		return $this->db->update($this->_table, $data);
	}

}

/* End of file M_pengaturan.php */
