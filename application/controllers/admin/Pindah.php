<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa', 'siswa');
        $this->load->model('M_pengaturan', 'pengaturan');
        $this->load->model('M_kab','kab');
        $this->load->model('M_provinsi','provinsi');
    }
    

    public function index()
    {
        
		$get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $this->vars['provinsi'] = $get_prov->result();

        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();

        $this->vars['title']    = 'Form Pindah';
        $this->vars['content']  = 'master/master_pindah';
        $this->load->view('backend/main', $this->vars);
    }

    function add_ajax_kab($id_prov)
	{
    	$query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
    	$data = "<option value=''>- Select Kabupaten -</option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_kabupaten."'>".$value->nama_kabupaten."</option>";
    	}
    	echo $data;
	}

	function add_ajax_instansi($id_kab)
	{
    	$query = $this->db->get_where('mt_instansi',array('kabupaten_id'=>$id_kab));
    	$data = "<option value=''> - Pilih Instansi - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_instansi."'>".$value->instansi."</option>";
    	}
    	echo $data;
	}
	

	function add_ajax_sek($id_kab)
	{
    	$query = $this->db->get_where('mt_admin',array('kabupaten_id'=>$id_kab));
    	$data = "<option value=''> - Pilih Sekolah - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_admin."'>".$value->sekolah."</option>";
    	}
    	echo $data;
	}

	function add_ajax_admin($id_admin)
	{
    	$query = $this->db->get_where('dt_siswa',array('admin_id'=>$id_admin));
    	$data = "<option value=''> - Pilih Admin - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->nm_sekolah."'>".$value->nm_sekolah."</option>";
    	}
    	echo $data;
	}

    function add_ajax_siswa($id_admin)
	{
    	$query = $this->db->get_where('dt_siswa',array('admin_id'=>$id_admin));
    	$data = "<option value=''> - Pilih Admin - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->admin_input."'>".$value->admin_input."</option>";
    	}
    	echo $data;
	}

	public function updated()
	{
		$this->form_validation->set_rules('id_siswa', 'null', 'required');
		$this->form_validation->set_rules('provinsi_id', 'null', 'required');
		$this->form_validation->set_rules('kabupaten_id', 'null', 'required');
		$this->form_validation->set_rules('nm_sekolah', 'null', 'required');
		

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$id_siswa 	            = $this->input->post('id_siswa', TRUE);
                $provinsi_id            = $this->input->post('provinsi_id', TRUE);
                $kabupaten_id            = $this->input->post('kabupaten_id', TRUE);
                $nm_sekolah            = $this->input->post('nm_sekolah', TRUE);

				$data = [
					'id_siswa'	        => $id_siswa,
					'provinsi_id'       => $provinsi_id,
                    'kabupaten_id'      => $kabupaten_id,
                    'nm_sekolah'      		=> $nm_sekolah
				];
			}
			$notif = $this->siswa->update($data, $id_siswa);
			if ($notif) {
				$this->session->set_flashdata('notrue', 'Data Berhasil Diupdate.');
			} else {
				$this->session->set_flashdata('nofalse', 'Data Gagal Diupdate.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}

/* End of file Pindah.php */
