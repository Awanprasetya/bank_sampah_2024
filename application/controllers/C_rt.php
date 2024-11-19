<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class c_rt extends CI_Controller{
 
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
        $data['title'] = "DATA RT";
        $data['get_rt_rw'] = $this->m_master_data->get_rt_rw();
        $data['rt'] = $this->m_master_data->get_data('rt')->result();
        $data['rw'] = $this->m_master_data->get_data('rw')->result();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/master_data/krl_master/rt/index',$data);
        $this->load->view('SA_Super_Admin/master_data/krl_master/rt/modal_insert',$data);
        $this->load->view('SA_Super_Admin/master_data/krl_master/rt/modal_edit',$data);
        $this->load->view('__footer');

    }

    function insert(){
        $rt_nama = $this->input->post('rt_nama');
        $rw_id = $this->input->post('rw_id');

        $data = array(
            'rt_id' => '',
            'rw_id' => $rw_id,
            'rt_nama' => $rt_nama,

        );
        $this->m_master_data->insert_data($data,'rt');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data RT Berhasil Disimpan <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_rt/index');

    }
    function edit($rt_id){
        $where=array('rt_id' => $rt_id);
        $rw_id = $this->input->post('rw_id');
        $rt_nama = $this->input->post('rt_nama');

        $data = array(
            'rw_id' => $rw_id,
            'rt_nama' => $rt_nama,

        );
        $this->m_master_data->update_data($where,$data,'rt');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data RT Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_rt/index');
    }
    function delete($rt_id)
	{
		$where = array('rt_id' => $rt_id);
		$this->m_master_data->delete_data($where,'rt');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data RT Berhasil Dihapus <i class="fa fa-check"></i></div>');
		redirect(base_url().'c_rt/index');
	}
   
}