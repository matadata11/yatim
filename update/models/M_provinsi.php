<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_provinsi extends CI_Model {

    private $_table = 'wilayah_provinsi';

    // Mengambil data dari database
	public function getData()
	{
		$this->db->order_by('nama', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}

    public function entry($data){
        $query = $this->db->insert($this->_table, $data);
        return $query;
    }

    public function update($data, $id_provinsi){
        $query = $this->db->where('id_provinsi', $id_provinsi);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    public function delete(){
        $query = $this->db->delete($this->_table, ['id_provinsi' => __uri(2)]);
        return $query;
    }

}

/* End of file M_provinsi.php */
