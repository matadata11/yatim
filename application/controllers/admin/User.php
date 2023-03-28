<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('M_user', 'user');
		$this->load->model('M_pengaturan', 'pengaturan');
        $this->load->model('M_kab','kab');
        $this->load->model('M_provinsi','provinsi');
	}

	function add_ajax_kab($id_prov)
	{
    	$query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
    	$data = "<option value=''>- Select Kabupaten -</option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_kabupaten."'>".$value->nama_kabupaten."</option>";
    	}
    	echo $data;
	}

	function add_ajax_instansi($id_kab)
	{
    	$query = $this->db->get_where('mt_instansi',array('kabupaten_id'=>$id_kab));
    	$data = "<option value=''> - Pilih Instansi - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_instansi."'>".$value->instansi."</option>";
    	}
    	echo $data;
	}
	

	function add_ajax_sek($id_kab)
	{
    	$query = $this->db->get_where('mt_admin',array('kabupaten_id'=>$id_kab));
    	$data = "<option value=''> - Pilih Sekolah - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_admin."'>".$value->fullname."</option>";
    	}
    	echo $data;
	}

	function add_ajax_siswa($id_admin)
	{
    	$query = $this->db->get_where('dt_siswa',array('admin_id'=>$id_admin));
    	$data = "<option value=''> - Pilih Siswa - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->fullname."'>".$value->fullname."</option>";
    	}
    	echo $data;
	}

	// Menampilkan halaman master user
	public function index()
	{
		$this->vars['user']			= $this->user->getUser();
		$this->vars['user_admin']	= $this->user->getData();
		$this->vars['pengaturan']	= $this->pengaturan->getPengaturan();
		$this->vars['kabupaten']	= $this->kab->getKab();

		$get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $this->vars['provinsi'] = $get_prov->result();

		$this->vars['title']    = 'Master User';
		$this->vars['content']  = 'master/master_user';
		$this->load->view('backend/main', $this->vars);
	}
	// end master user

	// Menampilkan halaman master user
	public function upload()
	{
		$this->vars['user']	= $this->user->getUser();
		$this->vars['wa_belum']	= $this->wa->getWabelum();
		$this->vars['wa_notif']	= $this->wa->getWanotif();

		$this->vars['title']    = 'Master User';
		$this->vars['content']  = 'master/form';
		$this->load->view('backend/main', $this->vars);
	}
	// end master user

     // Menambah data user
	public function created()
	{
		$this->form_validation->set_rules('provinsi_id', 'Fullname', 'required');
		$this->form_validation->set_rules('kabupatren_id', 'Fullname', 'required');
		$this->form_validation->set_rules('instansi_id', 'Fullname', 'required');
		$this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'passwordg', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$provinsi_id           	= $this->input->post('provinsi_id', TRUE);
				$kabupaten_id           = $this->input->post('kabupaten_id', TRUE);
				$instansi_id           	= $this->input->post('instansi_id', TRUE);
				$fullname           	= $this->input->post('fullname', TRUE);
				$email              	= $this->input->post('email', TRUE);
				$password           	= $this->input->post('password', TRUE);

				$data = [
					'provinsi_id'	    => $provinsi_id,
					'kabupaten_id'	    => $kabupaten_id,
					'instansi_id'	    => $instansi_id,
					'fullname'	    	=> $fullname,
					'email'	        	=> $email,
					'password'	    	=> password_hash($password, PASSWORD_DEFAULT),
					'level'	        	=> 'super',
					'active'	    	=> '1',
					'url_user'	    	=> md5($fullname),
					'created_at'		=> date('d-m-Y')
				];
			}
			$notif = $this->user->entry($data);
			if ($notif) {
				$this->session->set_flashdata('notrue', 'Data Berhasil Disimpan.');
			} else {
				$this->session->set_flashdata('nofalse', 'Data Gagal Disimpan.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function register()
	{
		if(isset($_POST['submit'])){
			$provinsi_id    = $this->input->post('provinsi_id', TRUE);
			$kabupaten_id   = $this->input->post('kabupaten_id', TRUE);
			$instansi_id    = $this->input->post('instansi_id', TRUE);
			$fullname 		= $this->input->post('fullname');
			$nip 			= $this->input->post('nip');
			$jabatan 		= $this->input->post('jabatan');
			$email 			= $this->input->post('email');
			$password 		= $this->input->post('password');
			$password2 		= $this->input->post('password2');
			$level 			= $this->input->post('level');
			$sekolah 		= $this->input->post('sekolah');
			$admin 			= $this->input->post('admin');

			if($password != $password2){
				echo "Password Tidak Sama";
			}elseif($password == $password2){
				$data = array(
					'provinsi_id'	=> $provinsi_id,
					'kabupaten_id'	=> $kabupaten_id,
					'instansi_id'	=> $instansi_id,
					'fullname' 		=> $fullname,
					'nip' 			=> $nip,
					'jabatan' 		=> $jabatan,
					'email' 		=> $email,
					'level' 		=> $level,
					'sekolah' 		=> $sekolah,
					'admin' 		=> $admin,
					'password'      => password_hash($password, PASSWORD_DEFAULT),
					'is_active' 	=> 1,
					'created_at'	=> date('Y-m-d')
				);

			$this->load->model('M_user');
			$id = $this->user->register_user($data);


			// Enkripsi $id
			$encrypted_id = md5($id);

			$this->load->library('email');
				$config = array();
				$config['charset'] 		= 'utf-8';
				$config['useragent'] 	= 'Codeigniter';
				$config['protocol']		= "smtp";
				$config['mailtype']		= "html";
				$config['smtp_host']	= "mail.notfound.id"; //pengaturan smtp
				$config['smtp_port']	= "587";
				$config['smtp_timeout']	= "400";
				$config['smtp_user']	= "no-reply@notfound.id"; // isi dengan email kamu
				$config['smtp_pass']	= "@matadata3010"; // isi dengan password kamu
				$config['crlf']			= "\r\n";
				$config['newline']		= "\r\n";
				$config['wordwrap'] 	= TRUE;
			//memanggil library email dan set konfigurasi untuk pengiriman email

			
			// $htmlContent = 'https://sisy.notfound.id';


			// $htmlContent2 = '<div> <img src=' . base_url('login.svg') . '> alt="logo" width="180" class="mb-1 mt-2"></div>';


			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			//konfigurasi pengiriman
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject("Verifikasi Akun Sisy Cloud. Notfound Indonesia");
			// $this->email->message($htmlContent);
			$this->email->message(
			// " $htmlContent2 <br>
			"
			Halo $fullname<br>
			Berikut kami lampirkan data akun anda. <br> <br>
			Nama : $fullname <br>
			Email: $email <br>
			Password: $password <br><br>
			url : https://sisy.notfound.id
			<br><br><br><br>
			Tim Pengembang Sisy Cloud <br>
			#Notfound_Indonesia <br> #Matadata_Technologi"
			// <br> <br> <button class='btn btn-block btn-md btn-primary'>$htmlContent</button>"
			// <br>Untuk Melakukan Login Silahkan Verifikasi Akun Anda Dengan Cara Klik Tautan Dibawah Ini.
		);


		if ($this->email->send()) {
			echo $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>Sukses!</h4>
		Email Terkirim ke <b Style="text-transform: capitalize;">' . $fullname . '</b> email <b">' . $email . '</br>.
		</div>');
		} else {
			echo $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible"id="notifications">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>Sukses!</h4>
		Email Gagal Terkirim ke <b Style="text-transform: capitalize;">' . $fullname . '</b> email <b>' . $email . '</b>.
		</div>');
			}
			redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function update()
    {
        if(isset($_POST['submit'])){
                $id_admin 		= $this->input->post('id_admin', TRUE);
                $fullname    	= $this->input->post('fullname', TRUE);
                $nip    	    = $this->input->post('nip', TRUE);
                $jabatan    	= $this->input->post('jabatan', TRUE);
                $email    		= $this->input->post('email', TRUE);
                $level    		= $this->input->post('level', TRUE);
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
                    'level'         => $level,
                    'password'   	=> password_hash($password, PASSWORD_DEFAULT),
                    'ubah'    		=> date('Y-m-d H:m:s')
                ];
            }
            $save = $this->user->update($data, $id_admin);
            if($save){
                $this->session->set_flashdata('notif_true', 'Data Berhasil Ditambahkan.');
            }else{
                $this->session->set_flashdata('notif_false', 'Data Gagal Ditambahkan.');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

     // hapus user
    public function deleted()
    {
        $notif = $this->user->delete();
        if ($notif) {
            echo $this->session->set_flashdata('notrue', 'Data Berhasil Dihapus.');
        } else {
            echo $this->session->set_flashdata('nofalse', 'Data Gagal Dihapus.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

	public function verification($id_admin)
	{
		$this->user->changeActiveState($id_admin);
		redirect('login');
	}

	public function delete($id_pengawas)
	{
		$this->db->delete('items', array('id_pengawas' => $id_pengawas));
		echo 'Deleted successfully.';
	}

}

/* End of file User.php */
