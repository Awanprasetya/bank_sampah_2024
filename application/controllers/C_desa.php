<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class c_desa extends CI_Controller{
 
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
        $data['title'] = "DATA DESA";
        $data['desa'] = $this->m_master_data->get_desa_kec();
        $data['kecamatan'] = $this->m_master_data->get_data('kecamatan')->result();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/master_data/krl_master/desa/index',$data);
        $this->load->view('SA_Super_Admin/master_data/krl_master/desa/modal_insert',$data);
        $this->load->view('SA_Super_Admin/master_data/krl_master/desa/modal_edit',$data);
        $this->load->view('__footer');

    }

    function insert(){
        $kecamatan_id = $this->input->post('kecamatan_id');
        $desa_nama = $this->input->post('desa_nama');

        $data = array(
            'desa_id' => '',
            'kecamatan_id' => $kecamatan_id,
            'desa_nama' => $desa_nama,

        );
        $this->m_master_data->insert_data($data,'desa');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Kelurahan/Desa Berhasil Disimpan <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_desa/index');

    }
    function edit($desa_id){
        $where=array('desa_id' => $desa_id);
        $kecamatan_id = $this->input->post('kecamatan_id');
        $desa_nama = $this->input->post('desa_nama');

        $data = array(
            'kecamatan_id' => $kecamatan_id,
            'desa_nama' => $desa_nama,

        );
        $this->m_master_data->update_data($where,$data,'desa');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Kelurahan/Desa Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_desa/index');
    }
    function delete($desa_id)
	{
		$where = array('desa_id' => $desa_id);
		$this->m_master_data->delete_data($where,'desa');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Kelurahan/Desa Berhasil Dihapus <i class="fa fa-check"></i></div>');
		redirect(base_url().'c_desa/index');
	}
   
}