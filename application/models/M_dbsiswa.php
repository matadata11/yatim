<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dbsiswa extends CI_Model {

    private $_table = 'dbsiswa';

    // Mengambil data dari database
	public function getDb()
	{
		$this->db->order_by('sekolah', 'ASC');
		return $this->db->get($this->_table)->result_array();
	}

<<<<<<< HEAD
=======
    public function get_ajax()
    {
        $hasil=$this->db->query("SELECT * FROM dbsiswa");
        return $hasil->result();
    }

>>>>>>> caa87468d03a6d53c4274490b323ef3bba4b0426
    public function update($data, $id_db){
        $query = $this->db->where('id_db', $id_db);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    public function delete(){
        $query = $this->db->delete($this->_table, ['id_db' => __uri(2)]);
        return $query;
    }

    function get_data_nama($nama){
        $hsl=$this->db->query("SELECT * FROM dbsiswa WHERE nama='$nama'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'nama' => $data->nama,
                    'nisn' => $data->nisn,
                    'kelas' => $data->kelas,
                    'bank' => $data->bank,
                    'atasnama' => $data->atasnama,
                    'no_rek' => $data->no_rek,
                    'hp' => $data->hp,
                    );
            }
        }
        return $hasil;
    }
}

/* End of file M_dbsiswa.php */
