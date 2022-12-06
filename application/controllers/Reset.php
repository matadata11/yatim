<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_reset','reset');
        $this->load->model('M_user','user');
        
    }

    public function hasil()
	{

        $this->vars['cari'] 		= $this->reset->cariemail();
        
        $this->vars['title']    	= 'Reset Akun Sisy';
        
        $this->load->view('reset_master', $this->vars);
    }

    // function get_reset(){
    //     $email=$this->input->post('email');
	// 	$data=$this->reset->get_data_reset($email);
	// 	echo json_encode($data);
    // }

    public function reset()
    {
        if(isset($_POST['submit'])){
                $id_admin 		= $this->input->post('id_admin', TRUE);
                $fullname    	= $this->input->post('fullname', TRUE);
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
                    'jabatan'       => $jabatan,
                    'email'         => $email,
                    'password'   	=> password_hash($password, PASSWORD_DEFAULT),
                    'reset'    		=> date('Y-m-d H:m:s')
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

/* End of file Reset.php */
