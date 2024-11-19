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
        $data['title'] = "MENU TRANSAKSI";
        $data['m_sampah'] = $this->m_transaksi->get_data("jenis_sampah_master")->result();
        $data['ntd'] = $this->m_transaksi->get_data("nasabah_transaksi_detail")->result();
        $this->load->view('__header');
        $this->load->view('AB_AdminBank/transaksi/index',$data);
        $this->load->view('AB_AdminBank/transaksi/modal_insert',$data);
        $this->load->view('AB_AdminBank/transaksi/modal_search',$data);
        $this->load->view('__footer');

    }
    function ins_nasabah_transaksi()
	{
        $date = date('y-m-d');
		$nasabah_id = $this->input->post('nasabah_id');
		$harga 	= $this->input->post('harga');
        $kode_transaksi = $this->m_transaksi->Kode_otomatis(); 
        echo $kode_transaksi;
			$data = array(
                'nasabah_id' => $nasabah_id,
                'transaksi_id' => $kode_transaksi,
                'tanggal' => $date,

				
			);
            // $data2 = array(
            //     'transaksi_id' => $kode_transaksi,

				
			// );
            // $this->m_transaksi->insert_data($data2,'nasabah_transaksi_detail');
			$this->m_transaksi->insert_data($data,'nasabah_transaksi');
            $this->db->insert_id($kode_transaksi);
			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible"> Nomor Transaksi Berhasil Dibuat. <i class="fa fa-check"></i></div>');
			redirect(base_url().'c_setor/v_insert/'.$kode_transaksi);
		
	}
    public function setorSampah()
{
    $data['title'] = "MENU TRANSAKSI";
    $kode_transaksi = $this->m_transaksi->Kode_otomatis(); 
    echo $kode_transaksi;
    $sampah_master_id = $this->input->post("sampah_master_id");
    $jml_kg = $this->input->post("jml_kg");
    $jml_harga = $this->input->post("jml_harga");

    $data = array(
        'id' => " ",
        'transaksi_id' => $kode_transaksi,
        'sampah_master_id' => $sampah_master_id,
        'jml_kg' => $jml_kg,
        'jml_harga' => $jml_harga,
    );
    $this->m_transaksi->insert_data($data,'nasabah_transaksi_detail_temp');
    $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Transaksi Setor Sampah Telah Dibuat <i class="fa fa-check"></i>, Mohon Menunggu Konfirmasi Dari Admin Bank Sampah</div>');
    redirect(base_url().'c_transaksi/index');


}
function get_sampah_id(){
    $reff_sampah_id= $_GET['reff_sampah_id'];
    $data=$this->m_transaksi->get_sampah($reff_sampah_id);
    echo json_encode($data);
}
}