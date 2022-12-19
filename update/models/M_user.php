<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    private $_table = 'mt_admin';

    // Mengambil data dari database
	public function getUser()
	{
		$this->db->order_by('id_admin', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}

	public function getData()
	{
		$this->db->where('admin',$this->session->userdata('fullname'));
		$this->db->order_by('id_admin', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}

	public function getPerbaharui()
	{
		$this->db->where('fullname',$this->session->userdata('fullname'));
		$this->db->order_by('id_admin', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}
    
     // Insert data ke database
	public function entry($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	// Updater data di database
	public function update($data, $id_admin){
        $query = $this->db->where('id_admin', $id_admin);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    // Menghapus data dari database
	public function delete()
	{
		$key = $this->uri->segment(2);
		return $this->db->delete($this->_table,['id_admin' => $key]);
	}

	public function getJumlahUser()
    {
        return $this->db->get($this->_table)->num_rows();
    }

	public function changeActiveState($key)
	{
		$this->load->database();
		$data = array(
			'is_active' => 1
		);

		$this->db->where('md5(id_admin)', $key);
		$this->db->update($this->_table, $data);
		return true;
	}

	public function register_user($data){
		$this->load->database();
		$this->db->insert($this->_table,$data);
		$insert_id = $this->db->insert_id();
        return $insert_id;
	}

	

}

/* End of file M_user.php */
