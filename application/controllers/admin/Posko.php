<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posko extends Admin_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('M_posko', 'posko');
		$this->load->model('M_pengaturan', 'pengaturan');
        ;
        if($this->session->userdata('level') != "Super"){
            redirect(base_url('/'));
        }
	}

    public function index()
    {
        $this->vars['posko']    = $this->posko->getPosko();
		$this->vars['pengaturan']	= $this->pengaturan->getPengaturan();

        $this->vars['title']    = 'Master Posko';
		$this->vars['content']  = 'master/master_posko';
		$this->load->view('backend/main', $this->vars);
    }

    // tambah tim teknis
    public function add()
	{
		if(isset($_POST['submit'])){
			$nama_wilayah 	= $this->input->post('nama_wilayah');
			$nama 			= $this->input->post('nama');
			$telpon 		= $this->input->post('telpon');
			$keterangan 	= $this->input->post('keterangan');
			$email 			= $this->input->post('email');
			$status 		= $this->input->post('status');
            
			
            $data = array(
                'nama_wilayah'  => $nama_wilayah,
                'nama' 			=> $nama,
                'telpon' 		=> $telpon,
                'keterangan' 	=> $keterangan,
                'email' 		=> $email,
                'status' 		=> $status,
                'url_posko' 	=> md5($nama),
                'created_at'	=> date('d F Y')
            );
            
			
			$this->load->model('M_posko');
			$id = $this->posko->register_tim($data);


			// Enkripsi $id
			$encrypted_id = md5($id);

			$this->load->library('email');
				$config = array();
				$config['charset'] 		= 'utf-8';
				$config['useragent'] 	= 'Codeigniter';
				$config['protocol']		= "smtp";
				$config['mailtype']		= "html";
				$config['smtp_host']	= "mail.bebascoding.com"; //pengaturan smtp
				$config['smtp_port']	= "587";
				$config['smtp_timeout']	= "400";
				$config['smtp_user']	= "halo@bebascoding.com"; // isi dengan email kamu
				$config['smtp_pass']	= "@pangestu2212"; // isi dengan password kamu
				$config['crlf']			= "\r\n";
				$config['newline']		= "\r\n";
				$config['wordwrap'] 	= TRUE;
			//memanggil library email dan set konfigurasi untuk pengiriman email

			
			// $htmlContent = '<div><a style="text-decoration: none;" href=' . base_url('login/verification/' . $encrypted_id) . '> Verifikasi</a></div>';


			// $htmlContent2 = '<div> <img src=' . base_url('login.svg') . '> alt="logo" width="180" class="mb-1 mt-2"></div>';


			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			//konfigurasi pengiriman
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject("Tim Teknis Portal Bidang Pembinaan SMK Dinas Pendidikan Aceh");
			// $this->email->message($htmlContent);
			$this->email->message(
			// " $htmlContent2 <br>
			"
			Selamat Bergabung Sebagai Tim Teknis<br>
			Wilayah : $nama_wilayah <br>
			Nama    : $nama <br>
			Email   : $email <br>
			Telepon : $telpon <br>
            Terima Kasih. Tim Portal Pembinaan SMK Dinas Pendidikan Aceh <br>
            <br>
            <br>
            Suport <br>
            #Tim_IT_SMK_Negeri_1_Simpang_Kanan
			"
		);


		if ($this->email->send()) {
			echo $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-check"></i> Sukses!</h4>
		Email Terkirim ke <b Style="text-transform: capitalize;">' . $nama . '</b> email <b">' . $email . '</>.
		</div>');
		} else {
			echo $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible"id="notifications">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-check"></i> Sukses!</h4>
		Email Gagal Terkirim ke <b Style="text-transform: capitalize;">' . $nama . '</b> email <b>' . $email . '</b>.
		</div>');
        }
            redirect('admin/posko');
        }
    }

	// Update data tim teknis
	public function updated()
		{
			$this->form_validation->set_rules('nama_wilayah', 'Nama Wilayah', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('telpon', 'Telpon', 'required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			// $this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$id_posko 				= $this->input->post('id_posko', TRUE);
				$nama_wilayah 			= $this->input->post('nama_wilayah', TRUE);
				$nama 					= $this->input->post('nama', TRUE);
				$telpon 				= $this->input->post('telpon', TRUE);
				$keterangan 			= $this->input->post('keterangan', TRUE);
				$email 					= $this->input->post('email', TRUE);
				$status 				= $this->input->post('status', TRUE);

				$data = [
					'id_posko'			=> $id_posko,
					'nama_wilayah'		=> $nama_wilayah,
					'nama'				=> $nama,
					'telpon'			=> $telpon,
					'keterangan'		=> $keterangan,
					'email'				=> $email,
					'status'			=> $status,
					'url_posko'			=> md5($nama),
					'created_at'		=> date('d F Y')
				];
			}
				$notif = $this->posko->update($data, $id_posko);
				if ($notif) {
					echo $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Diupdate. </div>');
				} else {
					echo $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" id="notifications">Data Gagal Diupdate. </div>');
				}
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

    // hapus posko
    public function deleted()
    {
        $notif = $this->posko->delete();
        if ($notif) {
            echo $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p> Data Berhasil Dihapus</p></div>');
        } else {
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p> Data Gagal Dihapus</p></div>');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}

/* End of file Posko.php */
