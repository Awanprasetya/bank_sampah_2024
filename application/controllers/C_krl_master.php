<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class c_krl_master extends CI_Controller{
 
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
        $data['title'] = "DATA KRL";
        $data['krl_master'] = $this->m_master_data->get_krl_rw();
        $data['rw'] = $this->m_master_data->get_data('rw')->result();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/master_data/krl_master/index',$data);
        $this->load->view('SA_Super_Admin/master_data/krl_master/modal_insert',$data);
        $this->load->view('SA_Super_Admin/master_data/krl_master/modal_edit',$data);
        $this->load->view('__footer');

    }

    function insert(){
        $rw_id = $this->input->post('rw_id');
        $krl_nama = $this->input->post('krl_nama');

        $data = array(
            'krl_id' => '',
            'krl_nama' => $krl_nama,
            'rw_id' => $rw_id,

        );
        $this->m_master_data->insert_data($data,'krl_master');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data KRL Berhasil Disimpan <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_krl_master/index');

    }
    function edit($krl_id){
        $where=array('krl_id' => $krl_id);
        $krl_nama = $this->input->post('krl_nama');
        $rw_id = $this->input->post('rw_id');

        $data = array(
            'krl_nama' => $krl_nama,
            'rw_id' => $rw_id,

        );
        $this->m_master_data->update_data($where,$data,'krl_master');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data KRL Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_krl_master/index');
    }
    function delete($krl_id)
	{
		$where = array('krl_id' => $krl_id);
		$this->m_master_data->delete_data($where,'krl_master');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data KRL Berhasil Dihapus <i class="fa fa-check"></i></div>');
		redirect(base_url().'c_krl_master/index');
	}
   
}