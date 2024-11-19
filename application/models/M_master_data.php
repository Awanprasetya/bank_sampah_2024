<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class M_master_data extends CI_Model{	
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
    function index_jenis(){
        $sql="SELECT  km.krl_id,jsm.id,jsr.deskripsi AS jenis_sampah, jsm.harga, km.krl_nama, jsm.reff_sampah_id FROM jenis_sampah_master jsm 
        LEFT JOIN jenis_sampah_reff jsr on jsr.id = jsm.reff_sampah_id
        LEFT JOIN krl_master km on km.krl_id = jsm.krl_id
        WHERE 1";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_jenis_reff(){
        $sql="SELECT  jsm.id,jsr.deskripsi AS jenis_sampah, jsm.harga, km.krl_nama, jsm.reff_sampah_id FROM jenis_sampah_master jsm 
        LEFT JOIN jenis_sampah_reff jsr on jsr.id = jsm.reff_sampah_id
        LEFT JOIN krl_master km on km.krl_id = jsm.krl_id
        WHERE 1 GROUP BY jsm.reff_sampah_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_jenis_krl(){
        $sql="SELECT  km.krl_id, jsm.id,jsr.deskripsi AS jenis_sampah, jsm.harga, km.krl_nama, jsm.reff_sampah_id FROM jenis_sampah_master jsm 
        LEFT JOIN jenis_sampah_reff jsr on jsr.id = jsm.reff_sampah_id
        LEFT JOIN krl_master km on km.krl_id = jsm.krl_id
        WHERE 1 GROUP BY jsm.krl_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_krl_rw(){
        $sql = "SELECT km.krl_id, km.krl_nama, km.rw_id, r.rw_nama FROM krl_master 
                km LEFT JOIN rw r on r.rw_id = km.rw_id
                WHERE 1";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_desa_kec(){
        $sql = "SELECT d.desa_id,d.desa_nama,d.kecamatan_id, k.kecamatan_nama FROM desa d 
                LEFT JOIN kecamatan k on k.kecamatan_id = d.desa_id
                WHERE 1";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_desa_rw(){
        $sql = "SELECT r.rw_id,r.rw_nama,r.desa_id,d.desa_nama FROM rw r
                LEFT JOIN desa d on d.desa_id = r.desa_id
                WHERE 1";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_rt_rw(){
        $sql = "SELECT w.rw_id,t.rt_id, t.rt_nama, w.rw_nama FROM rt t 
                LEFT JOIN rw w on w.rw_id = t.rw_id
                WHERE 1";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_user(){
        $registrasi_id = $this->session->userdata('registrasi_id');
        if($this->session->userdata('user_level') == 'U_User'){
            $sql = "SELECT r.registrasi_id, r.nama, r.email, r.no_hp,r.status, r.krl_id,r.user_id ,r.user_name, r.password, r.user_level,r.attachement_file, k.krl_nama,k.krl_id FROM registrasi r
            LEFT JOIN user_access u on u.user_id = r.user_id
            LEFT JOIN krl_master k on k.krl_id = r.krl_id
            WHERE r.registrasi_id = $registrasi_id ORDER BY r.status ASC";
            $query = $this->db->query($sql);
        }else{
            $sql = "SELECT r.registrasi_id, r.nama, r.email, r.no_hp,r.status, r.krl_id,r.user_id ,r.user_name, r.password, r.user_level,r.attachement_file, k.krl_nama,k.krl_id FROM registrasi r
            LEFT JOIN user_access u on u.user_id = r.user_id
            LEFT JOIN krl_master k on k.krl_id = r.krl_id
            WHERE  1 ORDER BY r.status ASC";
            $query = $this->db->query($sql);
        }
       
                return $query->result();
    }
    function get_user_detail($registers_id){
        $sql = "SELECT n.nasabah_nama,n.alamat_jl,n.photo_path,r.registrasi_id, r.nama, r.email, r.no_hp,r.status, r.krl_id,r.user_id ,r.user_name, r.password, r.user_level,r.attachement_file, k.krl_nama,k.krl_id FROM registrasi r
                LEFT JOIN user_access u on u.user_id = r.user_id
                LEFT JOIN krl_master k on k.krl_id = r.krl_id
                LEFT JOIN nasabah n on n.registrasi_id = r.registrasi_id
                WHERE r.registrasi_id ='$registers_id'";
                $query = $this->db->query($sql);
                return $query->result();
    }
    function get_ak_all(){
        $sql = "SELECT r.registrasi_id, r.nama, r.email, r.no_hp,r.status, r.krl_id,r.user_id ,r.user_name, r.password, r.user_level,r.attachement_file, k.krl_nama,k.krl_id FROM registrasi r
                LEFT JOIN user_access u on u.user_id = r.user_id
                LEFT JOIN krl_master k on k.krl_id = r.krl_id
                WHERE r.user_level IN ( 'AK_AdminKec','U_User','AB_AdminBank') 
                ORDER BY r.status DESC";
                $query = $this->db->query($sql);
                return $query->result();
    }
    function get_ak_count(){
        $sql="SELECT COUNT(r.registrasi_id) AS jml_regist  FROM registrasi r
                LEFT JOIN user_access u on u.user_id = r.user_id
                LEFT JOIN krl_master k on k.krl_id = r.krl_id
                WHERE r.user_level IN ( 'AK_AdminKec','U_User','AB_AdminBank')";
                $query = $this->db->query($sql);
                return $query->result();
    }
    function get_nasabah(){
        $sql="select n.nasabah_nama,n.nasabah_id,n.alamat_jl,n.alamat_rt_id,n.titik_long,n.titik_lang,n.photo_path,n.registrasi_id,n.nominal_saldo, k.krl_nama, r.attachement_file, r.email, r.user_level from nasabah n
        LEFT JOIN registrasi r on r.registrasi_id = n.registrasi_id
        LEFT JOIN krl_master k on k.krl_id = r.krl_id
        WHERE 1 
        ORDER BY n.nasabah_nama ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function jenis_sampah(){
        $sql="SELECT * FROM `jenis_sampah_master` 
        LEFT JOIN jenis_sampah_reff on jenis_sampah_reff.id = jenis_sampah_master.reff_sampah_id
        WHERE 1
        GROUP BY jenis_sampah_reff.deskripsi";
        $query = $this->db->query($sql);
        return $query->result();
    }
function count_nasabah(){
    $nasabah_id = $this->session->userdata('nasabah_id');
    if($this->session->userdata('U_User')){
    $sql = "SELECT COUNT(n.nasabah_id) AS jml_nasabah, SUM(n.nominal_saldo) AS jml_saldo FROM nasabah n 
            LEFT JOIN registrasi r on r.registrasi_id = n.registrasi_id
            WHERE n.nasabah_id  = '$nasabah_id'";
    $query = $this->db->query($sql);
    }else{
        $sql = "SELECT COUNT(n.nasabah_id) AS jml_nasabah, SUM(n.nominal_saldo) AS jml_saldo FROM nasabah n 
        LEFT JOIN registrasi r on r.registrasi_id = n.registrasi_id
        WHERE 1";
        $query = $this->db->query($sql);
    }
    return $query->result();
}
function count_krl(){
    $sql="SELECT COUNT(k.krl_id) as jml_krl FROM krl_master k";
    $query = $this->db->query($sql);
    return $query->result();
}
function sum_nasabah_saldo_id(){
    $nasabah_id = $this->session->userdata('nasabah_id');
    $sql="SELECT SUM(n.nominal_saldo) as jml_saldo, n.nasabah_id FROM nasabah n where n.nasabah_id = '$nasabah_id'";
    $query = $this->db->query($sql);
    return $query->result();
}
	
}