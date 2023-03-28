<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengaturan', 'pengaturan');
        $this->load->model('M_berkas', 'berkas');
    }
    

    public function index()
    {
        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();
        $this->vars['berkas']	    = $this->berkas->getdata();

        $this->vars['title']         = "PDSA CLOUD | Berkas";
        $this->vars['content']       = 'master/master_berkas';
        $this->load->view('backend/main', $this->vars);
    }

    // Menambah data berkas
	public function store()
	{
        if(isset($_POST['submit'])){
			$admin           	= $this->input->post('admin');
			$tentang         = $this->input->post('tentang');
			$type         		= $this->input->post('type');
            $berkas     		= $_FILES['berkas']['name'];


            $config['upload_path']      = './assets/berkas/';
            $config['allowed_types']    = 'docx|doc|pdf|rar|zip|pptx|xls|xlsx';
            $config['max_size']         = 0;
            $config['encrypt_name']     = FALSE;


            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload('berkas')){
                echo "Informasi Gagal Di Upload Ke Database";
            }else{
                $berkas = $this->upload->data('file_name');
            }

            $data = array(
                'admin'         => $admin,
                'tentang'       => $tentang,
                'type'          => $type,
                'berkas'        => $berkas,
				'url_berkas'	=> md5($admin),
				'created_at'	=> date('Y-m-d')
            );

            $this->db->insert('mt_berkas', $data);
            $hasil = $this->berkas->file($data, 'mt_berkas');

            if($hasil){
                $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success alert-dismissible" id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Diupload. </div>');
            }else{
                $this->session->set_flashdata('msg_hapus', 
                    '<div class="alert bg-red">
                        <h4><i class="fa fa-times"></i> Informasi Gagal Di Tambah</h4>
                    </div> ');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function destroy()
	{
		$notif = $this->berkas->delete();
		if ($notif) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p> Data Berhasil Dihapus</p></div>');
		} else {
			$this->session->set_flashdata('msg', 'Data Gagal Dihapus.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

}

/* End of file Berkas.php */
