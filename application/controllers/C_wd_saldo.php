<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class C_transaksi extends CI_Controller{
 
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
    $data['title'] = "Menu Penarikan Saldo";
    $this->load->view('__header');
    $this->load->view('U_user/wd_saldo/index',$data);
    $this->load->view('__footer');
}
}
