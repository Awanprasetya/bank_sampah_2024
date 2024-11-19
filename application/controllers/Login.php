<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('M_login');
		$this->load->model('m_master_data');
	}

	function index(){
		$this->load->view('landing');
	}
	function v_login(){
		$data['krl_master'] = $this->m_master_data->get_data('krl_master')->result();
		$this->load->view('login',$data);
	}
	function i_registrasi(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');
		$user_level = $this->input->post('user_level');
		$status = $this->input->post('status');
		$no_hp = $this->input->post('no_hp');
		$user_id = $this->input->post('user_id');
		$krl_id = $this->input->post('krl_id');
		
		$data = array(
            'registrasi_id' => '',
            'nama' => $nama,
            'email' => $email,
			'user_name' => $user_name,
			'password' => md5($password),
            'user_level' => $user_level,
            'status' => $status,
            'no_hp' => $no_hp,
			'user_id' => $user_id,
			'krl_id' => $krl_id
		);
		$cek = $this->db->query("SELECT * FROM registrasi where email='".$email."' and user_name='".$user_name."' and no_hp='".$no_hp."'");
		if($cek->num_rows()>=1){
			$this->session->set_flashdata('alert_2', '<div class="alert alert-danger">Mohon maaf data akun sudah terdaftar, gunakan data yang berbeda untuk mendaftar <i class="fa fa-times"></i></div>');
            redirect(base_url().'Login/v_login');
		
		}else{
			
		$this->m_master_data->insert_data($data,'registrasi');
		$this->session->set_flashdata('alert_2', '<div class="alert alert-success">Registrasi Berhasil, Status verifikasi akan dikirim ke email, Mohon selalu cek email secara berkala. Terima kasih. <i class="fa fa-check"></i></div>');
            redirect(base_url().'Login/v_login');
		}
	}
 
	function masuk(){
		$username = $this->input->post('user_name');
		$password = $this->input->post('password');
		$nasabah = $this->session->userdata('nama');
		$where = array(
			'user_name' => $username,
			'password' => md5($password),
			'status' => 'Aktif'
			);
		$lihat = $this->M_login->status("v_login",$where);
		if($lihat->num_rows() > 0){
			foreach ($lihat->result() as $xx) {
					$sess_data['nama'] = $xx->nama;
                    $sess_data['user_name'] = $xx->user_name;
                    $sess_data['user_level'] = $xx->user_level;
					$sess_data['registrasi_id'] = $xx->registrasi_id;
					$sess_data['nasabah_id'] = $xx->nasabah_id;
					$sess_data['nasabah_nama'] = $xx->nasabah_nama;
					$sess_data['photo_path'] = $xx->photo_path;
					$sess_data['status'] = "Draft"; 
                    $this->session->set_userdata($sess_data);
                }
			$this->session->set_flashdata('alert_1', '<div class="alert alert-success">Selamat <b>'.$xx->nama.'</b>, Anda Berhasil Masuk Kedalam Sistem Bank Sampah <i class="fa fa-check"></i></div>');
			redirect(base_url("dashboard"));
 
		}else{
			$this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Username dan Password Salah atau Belum Teregistrasi</div>');
			redirect(base_url("Login/v_login"));
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}
