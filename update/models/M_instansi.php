<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_instansi extends CI_Model {

	private $_table = 'mt_instansi';

	// Mengambil data dari database
	public function getData()
	{
		$this->db->select('*');
		$this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten = mt_instansi.kabupaten_id');
		$this->db->order_by('id_instansi', 'DESC');
		return $this->db->get($this->_table)->result_array();
	}


	public function entry($data){
        $query = $this->db->insert($this->_table, $data);
        return $query;
    }

	public function update($data, $id_instansi){
        $query = $this->db->where('id_instansi', $id_instansi);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

	public function delete(){
        $query = $this->db->delete($this->_table, ['id_instansi' => __uri(2)]);
        return $query;
    }

	function get_data_instansi($instansi){
		$hsl=$this->db->query("SELECT * FROM mt_instansi WHERE instansi='$instansi'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'instansi' 			=> $data->instansi,
					'lat_kantor' 			=> $data->lat_kantor,
					'long_kantor' 			=> $data->long_kantor,
					// 'harga_jual'	=> $data->harga_jual,
					// 'stok' 			=> $data->stok,
				);
			}
		}
		return $hasil;
	}

}

/* End of file M_instansi.php */
