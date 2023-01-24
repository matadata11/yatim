<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_provinsi', 'provinsi');
        $this->load->model('M_pengaturan', 'pengaturan');
        ;
    }

    public function index()
    {
        $this->vars['title']    = 'Master Provinsi';
        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();
        $this->vars['wilayah']	= $this->provinsi->getdata();

        $this->vars['content']  = 'master/wilayah';
        $this->load->view('backend/main', $this->vars);
    }

    public function store()
    {
        if(isset($_POST['submit'])){
            $nama = $this->input->post('nama', TRUE);

            $data = [
                'nama'           => $nama,
                'created_at'    => date('Y-m-d')
            ];
        }
        $save = $this->provinsi->entry($data);
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Ditambahkan.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Ditambahkan.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update()
    {
        if(isset($_POST['submit'])){
            $id_provinsi = $this->input->post('id_provinsi', TRUE);
            $nama    = $this->input->post('nama', TRUE);

            $data = [
                'id_provinsi'   => $id_provinsi,
                'nama'          => $nama,
                'updated_at'    => date('Y-m-d')
            ];
        }
        $save = $this->provinsi->update($data, $id_provinsi);
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Ditambahkan.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Ditambahkan.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function destroy()
    {
        $save = $this->provinsi->delete();
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Dihapus.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Dihapus.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}

/* End of file Provinsi.php */
