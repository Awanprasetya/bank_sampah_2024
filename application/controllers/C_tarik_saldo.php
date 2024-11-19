<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class c_tarik_saldo extends CI_Controller{
 
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
    function index(){
        $data['title'] = "MENU TRANSAKSI";
        $nasabah_id = $this->session->userdata('nasabah_id');
        $data['m_sampah'] = $this->m_transaksi->get_data("jenis_sampah_master")->result();
        $data['nasabah'] = $this->m_transaksi->get_data("nasabah")->result();
        $data['v_transaksi_setor'] = $this->m_transaksi->get_data("v_transaksi_setor")->result();
        $data['get_nasabah_tarik'] = $this->m_transaksi->get_nasabah_tarik($nasabah_id);
        $data['get_sampah_all'] = $this->m_master_data->jenis_sampah();
        $kode_transaksi = $this->m_transaksi->Kode_otomatis(); 
        $this->load->view('__header');
        $this->load->view('SA_Super_Admin/transaksi/tarik/index',$data);
        $this->load->view('SA_Super_Admin/transaksi/tarik/modal_insert',$data);
        $this->load->view('SA_Super_Admin/transaksi/tarik/modal_status',$data);
        $this->load->view('__footer');

    }

    function insert(){
        $nasabah_id = $this->input->post('nasabah_id');
        $date = date('y-m-d');
        $nominal_keluar = $this->input->post('nominal_keluar');
        $kode_transaksi = $this->m_transaksi->Kode_otomatis(); 
        $kode_sekarang = $kode_transaksi  + 1;

        $data = array(
            'transaksi_id' => $kode_sekarang,
            'nasabah_id' => $nasabah_id,
            'tanggal' => $date,
            'nominal_keluar' => $nominal_keluar,
            'status' => 'D_Draft',

        );
        $this->m_master_data->insert_data($data,'nasabah_transaksi');
        $this->session->set_flashdata('alert_1', '<div class="alert alert-success">Transkasi penarikan saldo berhasil dibuat, Saldo akan berkurang setelah verifikasi selesai.  <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_tarik_saldo/index');

    }
    public function edit_status($kode_transaksi,$nasabah_id){
        $nominal_saldo = $this->input->post('nominal_saldo');
        $sisa_saldo = $this->input->post('sisa_saldo');
        $status = $this->input->post('status');
        $data['kode_transaksi'] = $kode_transaksi;
        $data['nasabah_id'] = $nasabah_id;
        $kode = array('transaksi_id' => $kode_transaksi);
        $nasabah = array('nasabah_id' => $nasabah_id);
        
        if($status == 'A_Aktif'){
            if ($sisa_saldo <= $nominal_saldo){
                $this->session->set_flashdata('alert_2', '<div class="alert alert-danger">Jumlah Saldo = '.$sisa_saldo.', Status Transaksi Gagal diperbaharui!</div>');
                redirect(base_url().'c_tarik_saldo/index');
            }else{
            $data = array(
                'status' => $status
            );
            $data2 = array(
                'nominal_saldo' => $sisa_saldo - $nominal_saldo
            );
            $this->m_transaksi->update_data($nasabah,$data2,'nasabah');
            $this->m_transaksi->update_data($kode,$data,'nasabah_transaksi');
        }
        }else{
            $data = array(
                'status' => $status
            );
            $data2 = array(
                    'nominal_saldo' => $sisa_saldo + $nominal_saldo,
                
            );
            $this->m_transaksi->update_data($nasabah,$data2,'nasabah');
            $this->m_transaksi->update_data($kode,$data,'nasabah_transaksi');
        }
       
        $this->session->set_flashdata('alert_2', '<div class="alert alert-success">Status Transaksi Berhasil Diubah, Saldo sudah di verifikasi! <i class="fa fa-check"></i></div>');
        redirect(base_url().'c_tarik_saldo/index');
     }
     public function delete_transaksi($kode_transaksi){
        $where = array('transaksi_id' => $kode_transaksi);
        $this->m_master_data->delete_data($where,'nasabah_transaksi_detail');
        $this->m_master_data->delete_data($where,'nasabah_transaksi');
        $this->session->set_flashdata('alert_2', '<div class="alert alert-success">Data Transaksi Berhasil Dihapus <i class="fa fa-check" aria-hidden="true"></i></div>');
        redirect(base_url().'c_tarik_saldo/index');
       
    }
    }