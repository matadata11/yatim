<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_siswa extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengaturan', 'pengaturan');
        $this->load->model('M_dbsiswa', 'dbsiswa');
        
    }
    

    public function index()
    {
        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();
        $this->vars['dbsiswa']	    = $this->dbsiswa->getDb();

        $this->vars['title']        = 'Database Kesiswaan';
        $this->vars['content']      = 'database/database_siswa';
        $this->load->view('backend/main', $this->vars);
    }

    public function destroy()
    {
        $save = $this->dbsiswa->delete();
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Dihapus.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Dihapus.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    // import Excel
    public function import_excel()
	{
		$id_db    				    = $this->input->post('id_db', TRUE);
		// $admin_kab    				= $this->input->post('admin_kab', TRUE);
		// $admin_input    			= $this->input->post('admin_input', TRUE);

		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$config['upload_path'] 		= realpath('assets/excel/dbsiswa/');
		$config['allowed_types'] 	= 'xlsx|xls|csv';
		$config['max_size'] 		= 0;
		$config['encrypt_name'] 	= false;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('dataexcel')) {
			$this->session->set_flashdata('notif_false', 'Ditambahkan');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$data_upload       = $this->upload->data();
			$excelreader       = new PHPExcel_Reader_Excel2007();
			$loadexcel         = $excelreader->load('assets/excel/dbsiswa/' . $data_upload['file_name']);
			$sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

			$data = array();
			$numrow = 1;
			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'id_db'   			    => $id_db,
						// 'admin_kab'   		=> $admin_kab,
						// 'admin_input'   		=> $admin_input,
						'nama'				    => $row['A'],
						'nisn'			        => $row['B'],
						// 'provinsi_id'		=> $row['C'],
						// 'kabupaten_id'		=> $row['D'],
						'sekolah'			    => $row['C'],
						'bank'			        => $row['D'],
						'atasnama'			    => $row['E'],
						'no_rek'			    => $row['F'],
						'hp'					=> $row['G'],
						'kelas'					=> $row['H'],
						'created_at'    		=> date('Y')
					));
				}
				$numrow++;
			}
			$notif = $this->db->insert_batch('dbsiswa', $data);
			unlink(realpath('assets/excel/dbsiswa/' . $data_upload['file_name']));
			if ($notif) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p> Data Dbsiswa Berhasil Di Upload</p></div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p> Data Dbsiswa Gagal di Upload</p></div>');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
    {
        if(isset($_POST['submit'])){
            $id_db 				= $this->input->post('id_db', TRUE);
            $nama    			= $this->input->post('nama', TRUE);
            $nisn    			= $this->input->post('nisn', TRUE);
            $sekolah    		= $this->input->post('sekolah', TRUE);
            $bank    			= $this->input->post('bank', TRUE);
            $atasnama    		= $this->input->post('atasnama', TRUE);
            $no_rek    			= $this->input->post('no_rek', TRUE);
            $hp    				= $this->input->post('hp', TRUE);
            $kelas    			= $this->input->post('kelas', TRUE);

            $data = [
                'id_db'      	=> $id_db,
                'nama'    		=> $nama,
                'nisn'    		=> $nisn,
                'sekolah'    	=> $sekolah,
                'bank'    		=> $bank,
                'atasnama'    	=> $atasnama,
                'no_rek'    	=> $no_rek,
                'hp'    		=> $hp,
                'kelas'    		=> $kelas,
                'updated_at'    => date('Y-m-d')
            ];
        }
        $save = $this->dbsiswa->update($data, $id_db);
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Ditambahkan.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Ditambahkan.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function get_nama(){
        $nama=$this->input->post('nama');
        $data=$this->dbsiswa->get_data_nama($nama);
        echo json_encode($data);
    }

}

/* End of file Database_siswa.php */
