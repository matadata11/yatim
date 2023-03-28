<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perbaharui extends Admin_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('M_pengaturan', 'pengaturan');
        $this->load->model('M_user', 'user');
    }

    public function index()
    {
        $this->vars['user']		        = $this->user->getPerbaharui();
        $this->vars['pengaturan']	    = $this->pengaturan->getPengaturan();

        $this->vars['title']    = 'Dashboard';
        $this->vars['content']  = 'setting/akun';
        $this->load->view('backend/main-perbaharui', $this->vars);
    }

    public function update()
    {
        if(isset($_POST['submit'])){
                $id_admin 		= $this->input->post('id_admin', TRUE);
                $fullname    	= $this->input->post('fullname', TRUE);
                $nip    	    = $this->input->post('nip', TRUE);
                $jabatan    	= $this->input->post('jabatan', TRUE);
                $email    		= $this->input->post('email', TRUE);
                $password    	= $this->input->post('password', TRUE);
                $password2    	= $this->input->post('password2', TRUE);

                if($password != $password2){
                    echo "Password Tidak Sama";
                }elseif($password == $password2){
                $data = [
                    'id_admin'      => $id_admin,
                    'fullname'      => $fullname,
                    'nip'           => $nip,
                    'jabatan'       => $jabatan,
                    'email'         => $email,
                    'status'   		=> 1,
                    'password'   	=> password_hash($password, PASSWORD_DEFAULT),
                    'ubah'          => date('Y-m-d H:m:s')
                ];
            }
            $save = $this->user->update($data, $id_admin);
            if($save){
                $this->session->set_flashdata('notif_true', 'Data Berhasil Ditambahkan.');
            }else{
                $this->session->set_flashdata('notif_false', 'Data Gagal Ditambahkan.');
            }
            redirect('/');
        }
    }

}

/* End of file Perbaharui.php */
