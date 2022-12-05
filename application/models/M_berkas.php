<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berkas extends CI_Model {

    private $_table = 'mt_berkas';

    // Mengambil data dari database
	public function getData()
	{
		$this->db->order_by('id_berkas', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}

    // Insert data ke database
	public function entry($data)
	{
		return $this->db->insert($this->_table, $data);
	}

    function file()
    {
        $file = $this->db->get($this->_table);
        return $file->result();
    }

    // Menghapus data dari database
    public function delete()
    {
        $key = $this->uri->segment(2);
        $this->db->where('id_berkas',$key);
        $query = $this->db->get('mt_berkas');
        $row = $query->row();
        
        unlink("./assets/berkas/$row->berkas");
        return $this->db->delete($this->_table, ['id_berkas' => $key]);
    }
    

}

/* End of file M_berkas.php */
