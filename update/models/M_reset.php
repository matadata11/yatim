<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reset extends CI_Model {

    private $_table = 'mt_admin';

    public function cariemail()
    {
        $this->db->where('email', $this->input->post('email'));
        return $this->db->get($this->_table)->result();
    }

    function get_data_reset($email){
		$hsl=$this->db->query("SELECT * FROM mt_admin WHERE email='$email'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'email' 			=> $data->email,
					'id_admin' 			=> $data->id_admin,
					'fullname' 			=> $data->fullname,
					// 'harga_jual'	=> $data->harga_jual,
					// 'stok' 			=> $data->stok,
				);
			}
		}
		return $hasil;
	}

}

/* End of file M_reset.php */
