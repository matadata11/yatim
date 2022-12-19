<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_laporan extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa', 'siswa');
        $this->load->model('M_pengaturan', 'pengaturan');
    }
    

    public function index()
    {
        $this->vars['siswa_admin']	= $this->siswa->getSiswaverval();
        $this->vars['siswa_super']	= $this->siswa->getSiswaverval1();
        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();

        $this->vars['title']    = 'Data Laporan';
        $this->vars['content']  = 'master/master_laporan';
        $this->load->view('backend/main', $this->vars);
    }

}

/* End of file Master_laporan.php */
