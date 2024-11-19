<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class c_jenis_sampah extends CI_Controller{
 
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
        $data['title'] = "DATA JENIS SAMPAH";
        $data['r_sampah'] = $this->m_master_data->get_data("jenis_sampah_reff")->result();
        $data['krl_master'] = $this->m_master_data->get_data("krl_master")->result();
        $data['index_jenis'] = $this->m_master_data->index_jenis();
        $data['get_jenis_reff'] = $this->m_master_data->get_jenis_reff();
        $data['get_jenis_krl'] = $this->m_master_data->get_jenis_krl();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/master_data/jenis_sampah/index',$data);
        $this->load->view('SA_Super_Admin/master_data/jenis_sampah/modal_insert',$data);
        $this->load->view('SA_Super_Admin/master_data/jenis_sampah/modal_edit',$data);
        $this->load->view('__footer');

    }

    function insert(){
        $reff_sampah_id = $this->input->post('reff_sampah_id');
        $harga = $this->input->post('harga');
        $krl_id = $this->input->post('krl_id');

        $data = array(
            'id' => '',
            'reff_sampah_id' => $reff_sampah_id,
            'krl_id' => $krl_id,
            'harga' => $harga,

        );
        $this->m_master_data->insert_data($data,'jenis_sampah_master');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Sampah Berhasil Disimpan <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_jenis_sampah/index');

    }
    function edit($id){
        $where=array('id' => $id);
        $reff_sampah_id = $this->input->post('reff_sampah_id');
        $krl_id = $this->input->post('krl_id');
        $harga = $this->input->post('harga');

        $data = array(
            'reff_sampah_id' => $reff_sampah_id,
            'krl_id' => $krl_id,
            'harga' => $harga,

        );
        $this->m_master_data->update_data($where,$data,'jenis_sampah_master');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Jenis Sampah Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_jenis_sampah/index');
    }
    function delete($id)
	{
		$where = array('id' => $id);
		$this->m_master_data->delete_data($where,'jenis_sampah_master');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Jenis Sampah Berhasil Dihapus <i class="fa fa-check"></i></div>');
		redirect(base_url().'c_jenis_sampah/index');
	}
   
}