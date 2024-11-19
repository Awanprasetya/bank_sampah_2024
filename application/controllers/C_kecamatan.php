<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class c_kecamatan extends CI_Controller{
 
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
        $data['title'] = "DATA KECAMATAN";
        $data['kecamatan'] = $this->m_master_data->get_data('kecamatan')->result();
        $data['rw'] = $this->m_master_data->get_data('rw')->result();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/master_data/krl_master/kecamatan/index',$data);
        $this->load->view('SA_Super_Admin/master_data/krl_master/kecamatan/modal_insert',$data);
        $this->load->view('SA_Super_Admin/master_data/krl_master/kecamatan/modal_edit',$data);
        $this->load->view('__footer');

    }

    function insert(){
        $kecamatan_nama = $this->input->post('kecamatan_nama');

        $data = array(
            'kecamatan_id' => '',
            'kecamatan_nama' => $kecamatan_nama,

        );
        $this->m_master_data->insert_data($data,'kecamatan');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Kecamatan Berhasil Disimpan <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_kecamatan/index');

    }
    function edit($kecamatan_id){
        $where=array('kecamatan_id' => $kecamatan_id);
        $kecamatan_nama = $this->input->post('kecamatan_nama');

        $data = array(
            'kecamatan_nama' => $kecamatan_nama,

        );
        $this->m_master_data->update_data($where,$data,'kecamatan');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Kecamatan Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_kecamatan/index');
    }
    function delete($kecamatan_id)
	{
		$where = array('kecamatan_id' => $kecamatan_id);
		$this->m_master_data->delete_data($where,'kecamatan');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Kecamatan Berhasil Dihapus <i class="fa fa-check"></i></div>');
		redirect(base_url().'c_kecamatan/index');
	}
   
}