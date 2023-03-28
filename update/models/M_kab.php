<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kab extends CI_Model {

    private $_table = 'wilayah_kabupaten';

    // Mengambil data dari database
	public function getKab()
	{
		$view = $this->db->select('wilayah_provinsi.*, wilayah_kabupaten.*');
        $view = $this->db->from('wilayah_provinsi');
        $view = $this->db->join('wilayah_kabupaten', 'wilayah_provinsi.id_provinsi = wilayah_kabupaten.provinsi_id', 'right');
        $view = $this->db->get('');
        return $view->result_array();
	}

	public function entry($data){
        $query = $this->db->insert($this->_table, $data);
        return $query;
    }

	public function update($data, $id_kabupaten){
        $query = $this->db->where('id_kabupaten', $id_kabupaten);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

	public function delete(){
        $query = $this->db->delete($this->_table, ['id_kabupaten' => __uri(2)]);
        return $query;
    }

	

}

/* End of file M_kab.php */
