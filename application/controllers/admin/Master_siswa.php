<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_siswa extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa', 'siswa');
        $this->load->model('M_pengaturan', 'pengaturan');
        $this->load->model('M_kab','kab');
        $this->load->model('M_provinsi','provinsi');
        
    }

    public function add_ajax_kab($id_provinsi)
	{
    	$query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_provinsi));
    	$data = "<option value=''>- Select Kabupaten -</option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_kabupaten."'>".$value->nm_kabupaten."</option>";
    	}
    	echo $data;
	}

    public function add_ajax_kab1($id_provinsi)
	{
    	$query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_provinsi));
    	$data = "<option value=''>- Select Kabupaten -</option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_kabupaten."'>".$value->nm_kabupaten."</option>";
    	}
    	echo $data;
	}
	
    

    public function index()
    {
        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $this->vars['provinsi'] = $get_prov->result();

        $this->vars['siswa']			= $this->siswa->getSiswa(); 
        $this->vars['siswa_super']		= $this->siswa->getSiswaSuper(); 
        $this->vars['siswa_admin']		= $this->siswa->getSiswaAdmin(); 

		$this->vars['pengaturan']	= $this->pengaturan->getPengaturan();

        $this->vars['title']    = 'Form Inputan';
        $this->vars['content']  = 'master/master_siswa';
        $this->load->view('backend/main', $this->vars);
    }


	


    // tambah siswa
    public function store()
    {
        if(isset($_POST['submit'])){
            $admin_kab            	= $this->input->post('admin_kab', TRUE);
            $admin_input            = $this->input->post('admin_input', TRUE);
            $admin_id            	= $this->input->post('admin_id', TRUE);
            $provinsi_id            = $this->input->post('provinsi_id', TRUE);
            $kabupaten_id           = $this->input->post('kabupaten_id', TRUE);
            $nm_sekolah             = $this->input->post('nm_sekolah', TRUE);
            $nm_siswa               = $this->input->post('nm_siswa', TRUE);
            $kelas                  = $this->input->post('kelas', TRUE);
            $nisn                   = $this->input->post('nisn', TRUE);
            $nm_bank                = $this->input->post('nm_bank', TRUE);
            $atas_nama              = $this->input->post('atas_nama', TRUE);
            $no_rek                 = $this->input->post('no_rek', TRUE);
            $no_hp                  = $this->input->post('no_hp', TRUE);

			$config['upload_path']      = './assets/images/buku/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg|webp';
            $config['max_size']         = 0;
            $config['encrypt_name']     = TRUE;

			$this->load->library('upload', $config);
            if (!empty($_FILES['photo']['name'])) {
                if ($this->upload->do_upload('photo')) {
                    $thumbs = $this->upload->data();
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/images/buku/' . $thumbs['file_name'];
                    $config['create_thumb']     = FALSE;
                    $config['maintain_ratio']   = TRUE;
                    $config['quality']          = '100%';
                    $config['width']            = 420;
                    $config['height']           = 230;
                    $config['thumb_marker']     = '_test';
                    $config['new_image']        = './assets/images/buku/' . $thumbs['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
            }

            if ($thumbs == null) {
                $photo = 'default.webp';
            } else {
                $photo = $thumbs['file_name'];
            }

            $data = [
                'admin_kab'       	=> $admin_kab,
                'admin_input'       => $admin_input,
                'admin_id'       	=> $admin_id,
                'provinsi_id'       => $provinsi_id,
                'kabupaten_id'      => $kabupaten_id,
                'nm_sekolah'        => $nm_sekolah,
                'nm_siswa'          => $nm_siswa,
                'kelas'             => $kelas,
                'nisn'              => $nisn,
                'nm_bank'           => $nm_bank,
                'atas_nama'         => $atas_nama,
                'no_rek'            => $no_rek,
				'photo_buku'        => $photo,
				'no_hp'             => $no_hp,
                'locks'              => 'Nlock',
                'lock_admin'        => 'Nlock',
                'lock_super'        => 'Nlock',
                'nominal'       	=> 600000,
                'created_at'        => date('Y-m-d')
            ];
        }
        $save = $this->db->get_where('dt_siswa', ['nisn' => $nisn])->row_array();
        if($save){
            $this->session->set_flashdata('notif_false', 'Anda Hanya Boleh Melakukan Absensi Satu Kali.');
        }else{
            $flashdata  = $this->siswa->entry($data);
            
        }
        if($flashdata){
            $this->session->set_flashdata('notif_true', 'Terima Kasih');
            $this->session->set_flashdata('audio', site_url('public/audio/terimakasih.mp3'));
            
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    // lock siswa
    public function lock()
	{
		$this->form_validation->set_rules('locks', 'LOCK', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$id_siswa 	    	= $this->input->post('id_siswa', TRUE);
				$locks 				= $this->input->post('locks', TRUE);

				$data = [
					'id_siswa'		=> $id_siswa,
					'locks'			=> $locks
				];
			}
			$notif = $this->siswa->lock($data, $id_siswa);
			if ($notif) {
				$this->session->set_flashdata('notrue', 'Data Berhasil Diupdate.');
			} else {
				$this->session->set_flashdata('nofalse', 'Data Gagal Diupdate.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function locka()
	{
		$this->form_validation->set_rules('lock_admin', 'LOCK', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$id_siswa 	    	= $this->input->post('id_siswa', TRUE);
				$lock_admin 				= $this->input->post('lock_admin', TRUE);

				$data = [
					'id_siswa'		=> $id_siswa,
					'lock_admin'	=> $lock_admin
				];
			}
			$notif = $this->siswa->lock($data, $id_siswa);
			if ($notif) {
				$this->session->set_flashdata('notrue', 'Data Berhasil Diupdate.');
			} else {
				$this->session->set_flashdata('nofalse', 'Data Gagal Diupdate.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

    // ubah data
    public function updated()
	{
		$this->form_validation->set_rules('nm_sekolah', 'null', 'required');
		$this->form_validation->set_rules('nm_siswa', 'null', 'required');
		$this->form_validation->set_rules('kelas', 'null', 'required');
		$this->form_validation->set_rules('nisn', 'null', 'required');
		$this->form_validation->set_rules('atas_nama', 'null', 'required');
		$this->form_validation->set_rules('no_rek', 'null', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$id_siswa 	            = $this->input->post('id_siswa', TRUE);
                $nm_sekolah             = $this->input->post('nm_sekolah', TRUE);
                $nm_siswa               = $this->input->post('nm_siswa', TRUE);
                $kelas                  = $this->input->post('kelas', TRUE);
                $nisn                   = $this->input->post('nisn', TRUE);
                $atas_nama              = $this->input->post('atas_nama', TRUE);
                $no_rek                 = $this->input->post('no_rek', TRUE);

				$data = [
					'id_siswa'	        => $id_siswa,
					'nm_sekolah'        => $nm_sekolah,
                    'nm_siswa'          => $nm_siswa,
                    'kelas'             => $kelas,
                    'nisn'              => $nisn,
                    'atas_nama'         => $atas_nama,
                    'no_rek'            => $no_rek,
					'updated_at'	    => date('Y-m-d')
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

    // Hapus data jurusan
	public function deleted()
	{
		$notif = $this->siswa->delete();
		if ($notif) {
			$this->session->set_flashdata('notrue', 'Data Berhasil Dihapus.');
		} else {
			$this->session->set_flashdata('nofalse', 'Data Gagal Dihapus.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

    // import Excel
    public function import_excel()
	{
		$id_siswa    				= $this->input->post('id_siswa', TRUE);
		$admin_kab    				= $this->input->post('admin_kab', TRUE);
		$admin_input    			= $this->input->post('admin_input', TRUE);

		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$config['upload_path'] 		= realpath('assets/excel/');
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
			$loadexcel         = $excelreader->load('assets/excel/' . $data_upload['file_name']);
			$sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

			$data = array();
			$numrow = 1;
			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'id_siswa'   			=> $id_siswa,
						'admin_kab'   			=> $admin_kab,
						'admin_input'   		=> $admin_input,
						'nm_siswa'				=> $row['A'],
						'nisn'			        => $row['B'],
						'provinsi_id'			=> $row['C'],
						'kabupaten_id'			=> $row['D'],
						'nm_sekolah'			=> $row['E'],
						'nm_bank'			    => $row['F'],
						'atas_nama'			    => $row['G'],
						'no_rek'			    => $row['H'],
						'no_hp'					=> $row['I'],
						'kelas'					=> $row['J'],
                        'locks'                 => 'Nlock',
                        'lock_admin'            => 'Nlock',
                        'lock_super'            => 'Nlock',
						'nominal'       		=> 600000,
						'created_at'    		=> date('Y-m-d H:m:s')
					));
				}
				$numrow++;
			}
			$notif = $this->db->insert_batch('dt_siswa', $data);
			unlink(realpath('assets/excel/' . $data_upload['file_name']));
			if ($notif) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p> Data GTK Berhasil Di Upload</p></div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p> Data GTK Gagal di Upload</p></div>');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}


	// verifikasi
	public function verifikasi()
	{
		$this->form_validation->set_rules('nisn', 'null', 'required');
		$this->form_validation->set_rules('atas_nama', 'null', 'required');
		$this->form_validation->set_rules('no_rek', 'null', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$id_siswa 	            = $this->input->post('id_siswa', TRUE);
                $nisn                   = $this->input->post('nisn', TRUE);
                $atas_nama              = $this->input->post('atas_nama', TRUE);
                $no_rek                 = $this->input->post('no_rek', TRUE);

				$data = [
					'id_siswa'	        => $id_siswa,
                    'nisn'              => $nisn,
                    'atas_nama'         => $atas_nama,
                    'no_rek'            => $no_rek,
                    'status'            => 'verifikasi'
				];
			}
			$notif = $this->siswa->update($data, $id_siswa);
			if ($notif) {
				$this->session->set_flashdata('notrue', 'Data Berhasil Diupdate.');
			} else {
				$this->session->set_flashdata('nofalse', 'Data Gagal Diupdate.');
			}
			redirect('verval_inputan');
		}
	}

}

/* End of file Master_siswa.php */
