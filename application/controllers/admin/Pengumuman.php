<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends Admin_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengumuman', 'pengumuman');
		$this->load->model('M_pengaturan', 'pengaturan');
	}

    public function index()
    {
        $this->vars['pengumuman']	= $this->pengumuman->getPengumuman();
        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();

        $this->vars['title']    = 'Master Berkas';
        $this->vars['content']  = 'master/master_pengumuman';
        $this->load->view('backend/main', $this->vars);
    }

    // Menambah data Pengumuman
	public function created()
	{
		$this->form_validation->set_rules('pengumuman', 'admin', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('type', 'Tipe', 'required');
		$this->form_validation->set_rules('text', 'Isi', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$pengumuman  			= $this->input->post('pengumuman', TRUE);
				$judul  				= $this->input->post('judul', TRUE);
				$type     	            = $this->input->post('type', TRUE);
				$text     	            = $this->input->post('text', TRUE);

				$data = [
					'pengumuman'		=> $pengumuman,
					'judul'			    => $judul,
					'type'	            => $type,
					'text'	            => $text,
					'date'    			=> date('Y-m-d H:i:s'),
					'url_pengumuman'	=> md5($judul)
				];
			}
			$notif = $this->pengumuman->entry($data);
			if ($notif) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p> Pengumuman Berhasil Ditambah</p></div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p> Pengumuman Gagal Ditambah</p></div>');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

    // hapus pengumuman
    public function deleted()
	{
		$notif = $this->pengumuman->delete();
		if ($notif) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p> Pengumuman Berhasil Dihapus</p></div>');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p> Pengumuman Gagal Dihapus</p></div>');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

}

/* End of file Pengumuman.php */
