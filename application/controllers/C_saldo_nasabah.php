<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class c_saldo_nasabah extends CI_Controller{
 
	function __construct(){
		parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
        
	
		if($this->session->userdata('status') != "Draft"){
			redirect(base_url("Login"));
		}
		
	}
    function index(){
        $data['title'] = "DATA SALDO NASABAH";
        $data['nasabah'] = $this->m_transaksi->get_data('nasabah')->result();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/transaksi/saldo_nasabah/index',$data);
        $this->load->view('__footer');

    }

    function insert(){
        $desa_id = $this->input->post('desa_id');
        $rw_nama = $this->input->post('rw_nama');

        $data = array(
            'rw_id' => '',
            'desa_id' => $desa_id,
            'rw_nama' => $rw_nama,

        );
        $this->m_master_data->insert_data($data,'rw');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data RW Berhasil Disimpan <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_rw/index');

    }
    function edit($rw_id){
        $where=array('rw_id' => $rw_id);
        $desa_id = $this->input->post('desa_id');
        $rw_nama = $this->input->post('rw_nama');

        $data = array(
            'desa_id' => $desa_id,
            'rw_nama' => $rw_nama,

        );
        $this->m_master_data->update_data($where,$data,'rw');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data RW Berhasil Dirubah <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_rw/index');
    }
    function delete($rw_id)
	{
		$where = array('rw_id' => $rw_id);
		$this->m_master_data->delete_data($where,'rw');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Data RW Berhasil Dihapus <i class="fa fa-check"></i></div>');
		redirect(base_url().'c_rw/index');
	}
   
}