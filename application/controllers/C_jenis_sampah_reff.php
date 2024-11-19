<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class c_jenis_sampah_reff extends CI_Controller{
 
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
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/master_data/jenis_sampah_reff/index',$data);
        $this->load->view('SA_Super_Admin/master_data/jenis_sampah_reff/modal_insert',$data);
        $this->load->view('SA_Super_Admin/master_data/jenis_sampah_reff/modal_edit',$data);
        $this->load->view('__footer');

    }

    function insert(){
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'id' => '',
            'deskripsi' => $deskripsi,

        );
        $this->m_master_data->insert_data($data,'jenis_sampah_reff');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Jenis Sampah Berhasil Disimpan <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_jenis_sampah_reff/index');

    }
    function edit($id){
        $where=array('id' => $id);
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'deskripsi' => $deskripsi,

        );
        $this->m_master_data->update_data($where,$data,'jenis_sampah_reff');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Jenis Sampah Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_jenis_sampah_reff/index');
    }
    function delete($id)
	{
		$where = array('id' => $id);
		$this->m_master_data->delete_data($where,'jenis_sampah_reff');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data Jenis Sampah Berhasil Dihapus <i class="fa fa-check"></i></div>');
		redirect(base_url().'c_jenis_sampah_reff/index');
	}
   
}