<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_posko', 'posko');
		$this->load->model('M_berkas', 'berkas');
        $this->load->model('M_pengaturan', 'pengaturan');
        $this->load->model('M_pengumuman', 'pengumuman');
        $this->load->model('M_user', 'user');
        
    }
    

    public function index()
    {
        $this->vars['user']		= $this->user->getUser();
        $this->vars['posko']            = $this->posko->getPosko();
        $this->vars['berkas']	        = $this->berkas->getData();
        $this->vars['pengaturan']	    = $this->pengaturan->getPengaturan();
        $this->vars['pengumuman']	= $this->pengumuman->getPengumuman();

        $this->vars['title']    = 'Dashboard';
        $this->vars['content']  = 'backend/dashboard';
        $this->load->view('backend/main', $this->vars);
    }

}

/* End of file Dashboard.php */
