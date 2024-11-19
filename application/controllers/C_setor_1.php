<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class C_setor extends CI_Controller{
 
	function __construct(){
		parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_master_data');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
        
	
		if($this->session->userdata('status') != "Draft"){
			redirect(base_url("Login"));
		}
		
	}
    public function index(){
        $data['title'] = "MENU TRANSAKSI";
        $data['m_sampah'] = $this->m_transaksi->get_data("jenis_sampah_master")->result();
        $data['v_transaksi_setor'] = $this->m_transaksi->get_data("v_transaksi_setor")->result();
        $data['get_nasabah_transaksi'] = $this->m_transaksi->get_nasabah_transaksi();
        $data['get_sampah_all'] = $this->m_master_data->jenis_sampah();
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/transaksi/setor/index',$data);
        $this->load->view('SA_Super_Admin/transaksi/setor/modal_insert',$data);
        $this->load->view('SA_Super_Admin/transaksi/setor/modal_search',$data);
        $this->load->view('__footer');

    }
    public function v_insert($kode_transaksi){
        $data['title'] = "MENU TRANSAKSI";
        $data['nasabah_transaksi_detail'] = $this->m_transaksi->get_transaksi_detail($kode_transaksi);
        $data['v_transaksi_setor'] = $this->m_transaksi->get_data("v_transaksi_setor")->result();
        $data['get_sampah_all'] = $this->m_master_data->jenis_sampah();
        $data['kode_transaksi'] = $kode_transaksi;
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/transaksi/setor/insert',$data);
        $this->load->view('SA_Super_Admin/transaksi/setor/modal_insert',$data);
        $this->load->view('SA_Super_Admin/transaksi/setor/modal_search',$data);
        $this->load->view('__footer');

    }
    public function v_detail($kode_transaksi){
        $data['title'] = "MENU TRANSAKSI";
        $data['nasabah_transaksi_detail'] = $this->m_transaksi->get_transaksi($kode_transaksi);
        $data['v_transaksi_setor'] = $this->m_transaksi->get_data("v_transaksi_setor")->result();
        $data['get_sampah_all'] = $this->m_master_data->jenis_sampah();
        $data['kode_transaksi'] = $kode_transaksi;
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/transaksi/setor/detail',$data);
        $this->load->view('SA_Super_Admin/transaksi/setor/modal_insert',$data);
        $this->load->view('SA_Super_Admin/transaksi/setor/modal_search',$data);
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
    public function updateTransaksi($kode_transaksi){
        $where = array('transaksi_id' => $kode_transaksi);
        $deskripsi = $this->input->post('deskripsi');
        $nominal_masuk = $this->input->post('nominal_masuk');
        $data['kode_transaksi'] = $kode_transaksi;
        $data = array(
            'deskripsi' => $deskripsi,
            'nominal_masuk' => $nominal_masuk,
        );
        $this->m_transaksi->setorSampah_ok();
        $this->m_transaksi->update_data($where,$data,'nasabah_transaksi');
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible">  Setor Sampah Berhasil, Nominal akan masuk pada saat verifikasi selesai.<i class="fa fa-check"></i> </div>');
        redirect(base_url().'c_setor/index');

    }
    public function setorSampah($kode_transaksi)
{
    $data['title'] = "SETOR SAMPAH";
    $data['kode_transaksi'] = $kode_transaksi;
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
    $this->session->set_flashdata('alert_1', '<div class="alert_1">Data Sudah Berhasil Di tambahkan <i class="fa fa-check"></i></div>');
    redirect(base_url().'c_setor/v_insert/'.$kode_transaksi);


}
function setorSampah_ok()
	{
		$this->m_admin->setorSampah_ok();
		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible"> Success! Data Sudah Masuk di Data keluar.
			                                    </div>');
		//redirect
		redirect(base_url().'c_setor/index');
	}
public function get_sampah_id(){
    $reff_sampah_id=$this->input->post('reff_sampah_id');
    $data=$this->m_transaksi->get_sampah($reff_sampah_id);
    echo json_encode($data);
}
public function delete_item($kode_transaksi){
    $where = array('transaksi_id' => $kode_transaksi);
    $this->m_master_data->delete_data($where,'nasabah_transaksi_detail');
    $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Item Berhasil Dihapus <i class="fa fa-check"></i></div>');
    redirect(base_url().'c_setor/v_insert/'.$kode_transaksi);
    
}
// public function delete_transaksi($kode_transaksi){
//     $where = array('transaksi_id' => $kode_transaksi);
//     $this->m_master_data->delete_data($where,'nasabah_transaksi');
//     $this->session->set_flashdata('alert_2', '<div class="alert alert-danger">Transaksi anda dibatalkann <i class="fa fa-times-circle-o" aria-hidden="true"></i></div>');
//     redirect(base_url().'c_setor/v_insert/'.$kode_transaksi);
    
// }

}