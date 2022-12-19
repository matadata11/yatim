<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_instansi', 'instansi');
        $this->load->model('M_pengaturan', 'pengaturan');
        ;
        if($this->session->userdata('level') != "Super"){
            redirect(base_url('/'));
        }
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

	function add_ajax_kec($id_kab)
	{
    	$query = $this->db->get_where('wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
    	$data = "<option value=''> - Pilih Kecamatan - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_kecamatan."'>".$value->nama_kecamatan."</option>";
    	}
    	echo $data;
	}
    
    public function index()
    {
        $this->vars['instansi']    = $this->instansi->getData();
		$this->vars['pengaturan']	= $this->pengaturan->getPengaturan();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $this->vars['provinsi'] = $get_prov->result();

        $this->vars['title']    = 'Master Instansi';
		$this->vars['content']  = 'master/master_instansi';
		$this->load->view('backend/main', $this->vars);
    }

    function get_instansi(){
        $instansi=$this->input->post('instansi');
		$data=$this->instansi->get_data_instansi($instansi);
		echo json_encode($data);
    }

	public function store()
    {
        if(isset($_POST['submit'])){
            $provinsi_id 				= $this->input->post('provinsi_id', TRUE);
            $kabupaten_id 				= $this->input->post('kabupaten_id', TRUE);
            $instansi 				    = $this->input->post('instansi', TRUE);
            $lat_kantor 				= $this->input->post('lat_kantor', TRUE);
            $long_kantor 				= $this->input->post('long_kantor', TRUE);

            $data = [
                'provinsi_id'            => $provinsi_id,
                'kabupaten_id'           => $kabupaten_id,
                'instansi'               => $instansi,
                'lat_kantor'             => $lat_kantor,
                'long_kantor'            => $long_kantor,
                'created_at'    		 => date('Y-m-d')
            ];
        }
        $save = $this->instansi->entry($data);
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Ditambahkan.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Ditambahkan.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

	public function update()
    {
        if(isset($_POST['submit'])){
            $id_instansi 			= $this->input->post('id_instansi', TRUE);
            $instansi    			= $this->input->post('instansi', TRUE);
			$lat_kantor 				= $this->input->post('lat_kantor', TRUE);
            $long_kantor 				= $this->input->post('long_kantor', TRUE);

            $data = [
                'id_instansi'   		=> $id_instansi,
                'instansi'          	=> $instansi,
				'lat_kantor'           => $lat_kantor,
                'long_kantor'           => $long_kantor,
                'updated_at'    		=> date('Y-m-d')
            ];
        }
        $save = $this->instansi->update($data, $id_instansi);
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Ditambahkan.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Ditambahkan.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

	public function destroy()
    {
        $save = $this->instansi->delete();
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Dihapus.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Dihapus.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}

/* End of file Instansi.php */
