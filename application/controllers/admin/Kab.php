<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kab extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengaturan', 'pengaturan');
        $this->load->model('M_kab','kab');
        $this->load->model('M_provinsi', 'provinsi');
    }
    

    public function index()
    {
        $this->vars['pengaturan']	= $this->pengaturan->getPengaturan();
        $this->vars['kabupaten']	    = $this->kab->getKab();
        $this->vars['wilayah']	= $this->provinsi->getdata();

        $this->vars['title']    = 'PDSSA CLOUD | Kabupaten Kota';
        $this->vars['content']  = 'master/master_kab';
        $this->load->view('backend/main', $this->vars);
    }

    public function store()
    {
        if(isset($_POST['submit'])){
            $provinsi_id = $this->input->post('provinsi_id', TRUE);
            $nama_kabupaten = $this->input->post('nama_kabupaten', TRUE);

            $data = [
                'provinsi_id'   =>$provinsi_id,
                'nama_kabupaten'=> $nama_kabupaten,
                'created_at'    => date('Y-m-d')
            ];
        }
        $save = $this->kab->entry($data);
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
            $id_kabupaten = $this->input->post('id_kabupaten', TRUE);
            $nama_kabupaten    = $this->input->post('nama_kabupaten', TRUE);

            $data = [
                'id_kabupaten'        => $id_kabupaten,
                'nama_kabupaten'        => $nama_kabupaten,
                'updated_at'    => date('Y-m-d')
            ];
        }
        $save = $this->kab->update($data, $id_kabupaten);
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Ditambahkan.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Ditambahkan.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function destroy()
    {
        $save = $this->kab->delete();
        if($save){
            $this->session->set_flashdata('notif_true', 'Data Berhasil Dihapus.');
        }else{
            $this->session->set_flashdata('notif_false', 'Data Gagal Dihapus.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}

/* End of file Kab_kota.php */
