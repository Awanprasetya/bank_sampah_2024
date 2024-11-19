<?php 
 
class Dashboard extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('m_master_data');
	
		if($this->session->userdata('status') != "Draft"){
			redirect(base_url("Login"));
		}
		
	}
 
	function index(){
		$this->load->view('__header');
		$data['get_count_nasabah']= $this->m_master_data->count_nasabah();
		$data['get_count_krl']= $this->m_master_data->count_krl();
		$data['sum_nasabah_saldo_id']= $this->m_master_data->sum_nasabah_saldo_id();
		
		if ($this->session->userdata('user_level') == "SA_SuperAdmin") 
		{
			
			$this->load->view('dashboard_sas',$data);
			
		}elseif($this->session->userdata('user_level') == "AK_AdminKec") {
			$this->load->view('dashboard_aka',$data);
		}elseif($this->session->userdata('user_level') == "AB_AdminBank") {
			$this->load->view('dashboard_aba',$data);
		}else{
			
			$this->load->view('dashboard_u',$data);
			
		}
		$this->load->view('__footer');
	}

}