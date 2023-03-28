<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends Admin_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengaturan', 'pengaturan');
		
	}

    public function index()
    {
        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();

        $this->vars['title']    = 'Pengaturan';
        $this->vars['content']  = 'master/master_pengaturan';
        $this->load->view('backend/main', $this->vars);
    }


    // tambah data
    public function updated()
	{
			if (isset($_POST['submit'])) {
				$id_pengaturan                  = $this->input->post('id_pengaturan', TRUE);
				$nama_apps                      = $this->input->post('nama_apps', TRUE);
				$nama_instansi                  = $this->input->post('nama_instansi', TRUE);
				$nm_jalan                       = $this->input->post('nm_jalan', TRUE);
				$nm_desa                        = $this->input->post('nm_desa', TRUE);
				$nm_kec                         = $this->input->post('nm_kec', TRUE);
				$nm_kab                         = $this->input->post('nm_kab', TRUE);
				$nm_prov                        = $this->input->post('nm_prov', TRUE);
				$telp                           = $this->input->post('telp', TRUE);
				$fax                            = $this->input->post('fax', TRUE);
				$email                          = $this->input->post('email', TRUE);
				$header                     	= $this->input->post('header', TRUE);

                $config['upload_path']      = './assets/images/pengatuan/';
				$config['allowed_types']    = 'gif|jpg|png|jpeg|webp';
				$config['max_size']         = 0;
				$config['encrypt_name']     = TRUE;

			$this->load->library('upload', $config);
            if (!empty($_FILES['photo']['name'])) {
                if ($this->upload->do_upload('photo')) {
                    $thumbs = $this->upload->data();
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/images/pengaturan/' . $thumbs['file_name'];
                    $config['create_thumb']     = FALSE;
                    $config['maintain_ratio']   = TRUE;
                    $config['quality']          = '100%';
                    $config['width']            = 420;
                    $config['height']           = 230;
                    $config['thumb_marker']     = '_test';
                    $config['new_image']        = './assets/images/pengaturan/' . $thumbs['file_name'];
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
					'id_pengaturan'	    => $id_pengaturan,
					'nama_apps'	        => $nama_apps,
					'nama_instansi'	    => $nama_instansi,
					'nm_jalan'	        => $nm_jalan,
					'nm_desa'	        => $nm_desa,
					'nm_kec'	        => $nm_kec,
					'nm_kab'	        => $nm_kab,
					'nm_prov'	        => $nm_prov,
					'telp'	            => $telp,
					'fax'	            => $fax,
					'email'	            => $email,
					'header'	        => $header,
                    'picture'           => $photo,
					'url_pengaturan'    => md5($nama_apps),
					'created_at'	    => date('d F Y')
				];
			}
			$notif = $this->pengaturan->update($data, $id_pengaturan);
			if($notif){
                $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success alert-dismissible" id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Diupdate. </div>');
            }else{
                $this->session->set_flashdata('msg_hapus', 
                    '<div class="alert bg-red">
                        <h4><i class="fa fa-times"></i> Informasi Gagal Di Tambah</h4>
                    </div> ');
            }
			redirect($_SERVER['HTTP_REFERER']);
	}

}

/* End of file Pengaturan.php */
