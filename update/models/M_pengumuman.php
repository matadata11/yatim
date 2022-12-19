<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengumuman extends CI_Model {

    private $_table = 'mt_pengumuman';

    // Mengambil data dari database
	public function getPengumuman()
	{
		$this->db->order_by('id_pengumuman', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}

     // Insert data ke database
	public function entry($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	// Updater data di database
	public function update($data, $id_pengumuman)
	{
		$this->db->where('id_pengumuman', $id_pengumuman);
		return $this->db->update($this->_table, $data);
	}

    // Menghapus data dari database
	public function delete()
	{
		$key = $this->uri->segment(2);
		return $this->db->delete($this->_table,['id_pengumuman' => $key]);
	}

}

/* End of file M_pengumuman.php */
