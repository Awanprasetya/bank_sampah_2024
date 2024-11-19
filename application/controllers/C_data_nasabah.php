<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class c_data_nasabah extends CI_Controller{
 
	function __construct(){
		parent::__construct();
        $this->load->model('m_master_data');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
        
	
		if($this->session->userdata('status') != "Draft"){
			redirect(base_url("Login"));
		}
		
	}
    function index(){
        $data['title'] = "DATA REGISTRASI";
        $data['get_nasabah'] = $this->m_master_data->get_data('v_nasabah')->result();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/data_nasabah/index',$data);
        // $this->load->view('SA_Super_Admin/data_registrasi/krl_master/desa/modal_insert',$data);
        // $this->load->view('SA_Super_Admin/data_registrasi/modal_status',$data);
        $this->load->view('__footer');

    }
    function v_detail($registers_id){
        $data['get_user'] = $this->m_master_data->get_user_detail($registers_id);
        $data['krl_master'] = $this->m_master_data->get_data('krl_master')->result();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/data_nasabah/detail/detail',$data);
        $this->load->view('__footer');
    }
    function edit_nasabah_nama($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $nasabah_nama = $this->input->post('nasabah_nama');
        $data = array(
            'nasabah_nama' => $nasabah_nama,
        );
        $this->m_master_data->update_data($where,$data,'nasabah');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Nama Nasabah Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_data_nasabah/v_detail/'.$registrasi_id);
    }
    function edit_alamat_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $alamat_jl = $this->input->post('alamat_nasabah');
        $data = array(
            'alamat_jl' => $alamat_jl,
        );
        $this->m_master_data->update_data($where,$data,'nasabah');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Alamat Nasabah Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_data_nasabah/v_detail/'.$registrasi_id);
    }
    function edit_krl_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $krl_id = $this->input->post('krl_id');
        $data = array(
            'krl_id' => $krl_id,
        );
        $this->m_master_data->update_data($where,$data,'registrasi');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">KRL Nasabah Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_data_nasabah/v_detail/'.$registrasi_id);
    }
    function edit_email_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        $email = $this->input->post('email');
        $data = array(
            'email' => $email,
        );
        $this->m_master_data->update_data($where,$data,'registrasi');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Email Nasabah Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_data_nasabah/v_detail/'.$registrasi_id);
    }
    function edit_file_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        
        $attachement_file		=$_FILES['attachement_file'];
        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf|mp4';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('attachement_file')){
            echo "Upload Gagal"; die();
            
        }else{
            $attachement_file=$this->upload->data('file_name');
            $data = array(
                'attachement_file' => $attachement_file,
            );
            $this->m_master_data->update_data($where,$data,'registrasi');
            $this->session->set_flashdata('alert_1', '<div class="alert alert-success">File Pendukung Nasabah Berhasil Dirubah <i class="fa fa-check"></i></div>');
            redirect(base_url().'c_data_nasabah/v_detail/'.$registrasi_id);

        }
       
    }
    function edit_photo_nasabah($registrasi_id){
        $where=array('registrasi_id' => $registrasi_id);
        
        $photo_path		=$_FILES['photo_path'];
        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf|mp4';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('photo_path')){
            echo "Upload Gagal"; 
            $this->session->set_flashdata('alert_1', '<div class="alert alert-danger">Photo Nasabah Gagal Dirubah <i class="fa fa-uncheck"></i></div>');
            redirect(base_url().'c_data_nasabah/v_detail/'.$registrasi_id);
            die();
            
        }else{
            $photo_path=$this->upload->data('file_name');
            $data = array(
                'photo_path' => $photo_path,
            );
            $this->m_master_data->update_data($where,$data,'nasabah');
            $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Photo Nasabah Berhasil Dirubah <i class="fa fa-check"></i></div>');
            redirect(base_url().'c_data_nasabah/v_detail/'.$registrasi_id);

        }
       
    }
    function delete($nasabah_id)
	{
		$where = array('nasabah_id' => $nasabah_id);
		$this->m_master_data->delete_data($where,'nasabah');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Nasabah Berhasil Dihapus <i class="fa fa-check"></i></div>');
		redirect(base_url().'c_user/index');
	}
}