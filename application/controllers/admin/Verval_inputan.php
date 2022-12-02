<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Verval_inputan extends Admin_Controller {

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
        $this->vars['siswa']	= $this->siswa->getSiswanull();
        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();

		$this->vars['title']    = 'Verval Form Inputan';
        $this->vars['content']  = 'master/verval_siswa';
        $this->load->view('backend/main', $this->vars);
    }

    public function hasil()
	{

        $this->vars['cari'] 		= $this->siswa->cariOrang();
        
        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();

        $this->vars['title']    	= 'Verval Form Inputan';
        $this->vars['content']  	= 'master/cari_siswa';
        $this->load->view('backend/main', $this->vars);
    }

}

/* End of file Verval_inputan.php */
