<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

    private $_table = 'dt_siswa';

    // Mengambil data dari database
    // tampilan super
    public function getSiswaSuper()
    {
        $this->db->select('*');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi = dt_siswa.provinsi_id');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten = dt_siswa.kabupaten_id');
            // $this->db->where('status', 'null');
            $this->db->where('locks', 'Ylock');
            $this->db->where('lock_admin', 'Ylock');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function getSiswaAdmin()
    {
        $this->db->select('*');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi = dt_siswa.provinsi_id');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten = dt_siswa.kabupaten_id');
            // $this->db->where('status', 'null');
            $this->db->where('locks', 'Ylock');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    // tampilan ops
    public function getSiswa()
    {

        $this->db->where('admin_input', $this->session->userdata('fullname'));
        $this->db->select('*');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi = dt_siswa.provinsi_id');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten = dt_siswa.kabupaten_id');
            // $this->db->where('status', 'null');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get($this->_table)->result_array();

    }

    // tampilan admin
    public function getSiswanull()
    {
        $this->db->where('kabupaten_id', $this->session->userdata('kabupaten_id'));
        $this->db->select('*');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi = dt_siswa.provinsi_id');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten = dt_siswa.kabupaten_id');
        $this->db->where('status', 'null');
        $this->db->where('locks', 'Ylock');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    // tampilan siswa verval admin
    public function getSiswaverval()
    {
        $this->db->where('kabupaten_id', $this->session->userdata('kabupaten_id'));
        $this->db->select('*');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi = dt_siswa.provinsi_id');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten = dt_siswa.kabupaten_id');
        $this->db->where('status', 'verifikasi');
        $this->db->where('locks', 'Ylock');
        $this->db->where('lock_admin', 'Ylock');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    // tamnpilan siswa verval super
    public function getSiswaverval1()
    {
        $this->db->select('*');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi = dt_siswa.provinsi_id');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten = dt_siswa.kabupaten_id');
        $this->db->where('status', 'verifikasi');
        $this->db->where('locks', 'Ylock');
        $this->db->where('lock_admin', 'Ylock');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    // report
    public function view(){
        $query = $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi = dt_siswa.provinsi_id');
		$query = $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten = dt_siswa.kabupaten_id');
        $query = $this->db->where('status', 'verifikasi');
        $query = $this->db->where('locks', 'Ylock');
        $query = $this->db->where('lock_admin', 'Ylock');
        $query = $this->db->order_by('id_siswa', 'DESC');
        $view = $this->db->get($this->_table);
        return $view->result();
        
	}

      // Insert data ke database
	public function entry($data)
	{
		return $this->db->insert($this->_table, $data);
	}

    // ubah data
    public function lock($data, $id_siswa){
        $query = $this->db->where('id_siswa', $id_siswa);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    public function update($data, $id_siswa){
        $query = $this->db->where('id_siswa', $id_siswa);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    // Menghapus data dari database
	public function delete()
	{
		$key = $this->uri->segment(2);
		return $this->db->delete($this->_table,['id_siswa' => $key]);
	}

    // cari data
    public function cariOrang()
    {
        $this->db->where('nisn', $this->input->post('nisn'));
        $this->db->where('atas_nama', $this->input->post('atas_nama'));
        $this->db->where('no_rek', $this->input->post('no_rek'));
        $this->db->select('*');
		$this->db->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi = dt_siswa.provinsi_id');
		$this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten = dt_siswa.kabupaten_id');
        return $this->db->get($this->_table)->result();
    }

}

/* End of file M_siswa.php */
