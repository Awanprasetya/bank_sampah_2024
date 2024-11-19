<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
class M_transaksi extends CI_Model{	
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
	public function Kode_otomatis(){
		$query = $this->db->query("SELECT MAX(transaksi_id) as kodetransaksi from nasabah_transaksi");
        $hasil = $query->row();
        return $hasil->kodetransaksi; //
	}
	function get_sampah($reff_sampah_id){
		$sql=$this->db->query("SELECT * FROM `jenis_sampah_master` 
        LEFT JOIN jenis_sampah_reff on jenis_sampah_reff.id = jenis_sampah_master.reff_sampah_id
        WHERE jenis_sampah_master.reff_sampah_id = $reff_sampah_id
        GROUP BY jenis_sampah_reff.deskripsi");
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_transaksi_detail($kode_transaksi){
		$sql = "SELECT  n.nominal_saldo, nt.nasabah_id, ntd.id, ntd.transaksi_id, ntd.sampah_master_id, jsr.deskripsi, nt.deskripsi as keterangan, ntd.jml_kg, ntd.jml_harga FROM nasabah_transaksi_detail ntd
				LEFT JOIN jenis_sampah_master jsm on jsm.id = ntd.sampah_master_id
				LEFT JOIN jenis_sampah_reff jsr on jsr.id = ntd.sampah_master_id
                LEFT JOIN nasabah_transaksi nt on nt.transaksi_id = ntd.transaksi_id
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				WHERE ntd.transaksi_id = $kode_transaksi";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_transaksi($kode_transaksi){
		$sql = "SELECT ntd.id, ntd.transaksi_id, ntd.sampah_master_id, jsr.deskripsi, nt.deskripsi as keterangan, ntd.jml_kg, ntd.jml_harga FROM nasabah_transaksi_detail ntd
				LEFT JOIN jenis_sampah_master jsm on jsm.id = ntd.sampah_master_id
				LEFT JOIN jenis_sampah_reff jsr on jsr.id = ntd.sampah_master_id
                LEFT JOIN nasabah_transaksi nt on nt.transaksi_id = ntd.transaksi_id
				WHERE ntd.transaksi_id = $kode_transaksi";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function get_nasabah_transaksi($registrasi_id){
		if($this->session->userdata('user_level') == 'U_User'){
			$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama, nt.deskripsi, nt.nominal_masuk, nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE n.registrasi_id = '$registrasi_id' AND nt.nominal_masuk > 0 
				group by nt.transaksi_id";
		$query = $this->db->query($sql);
		}else{
			$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama, nt.deskripsi, nt.nominal_masuk, nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE 1 and nt.nominal_masuk > 0
				group by nt.transaksi_id";
		$query = $this->db->query($sql);
		}
		
		return $query->result();
	}
	function get_nasabah_tarik($nasabah_id){
		if($this->session->userdata('user_level') == 'U_User'){
		$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama, nt.deskripsi, nt.nominal_masuk,nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE nominal_keluar > 0 and nt.nasabah_id = '$nasabah_id'
				group by nt.transaksi_id";
		$query = $this->db->query($sql);
		}else{
			$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama,nt.nominal_masuk, nt.deskripsi, nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE nominal_keluar > 0 
				group by nt.transaksi_id";
		$query = $this->db->query($sql);
		}
		return $query->result();
	}
	function setorSampah_ok()
		{
			$sql = $this->db->get('nasabah_transaksi_detail_temp')->result();
			foreach ($sql as $a) {
				$query=$this->db->insert('nasabah_transaksi_detail',$a);
			}
			if($query){
				$query=$this->db->truncate('nasabah_transaksi_detail_temp');
			}else{
				return false;
			}
		}

	function check_registrasi_id($registrasi_id){
		$this->db->select('registrasi_id');
		$this->db->where('registrasi_id',$registrasi_id);
		$query =$this->db->get('nasabah');
		$row = $query->row();
		if ($query->num_rows > 0){
				return $row->registrasi_id;
		}else{
				return "";
		}
		}

	function get_laporan_tarik($nasabah_id){
		if($this->session->userdata('user_level') == 'U_User'){
		$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama, nt.deskripsi, nt.nominal_masuk,nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE nominal_keluar > 0 and nt.nasabah_id = '$nasabah_id' and nt.status = 'A_Aktif'
				group by nt.transaksi_id order by nt.tanggal desc";
		$query = $this->db->query($sql);
		}else{
			$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama,nt.nominal_masuk, nt.deskripsi, nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE nominal_keluar > 0 and nt.status = 'A_Aktif'
				group by nt.transaksi_id order by nt.tanggal desc";
		$query = $this->db->query($sql);
		}
		return $query->result();
	}
	function get_laporan_setor($nasabah_id){
		if($this->session->userdata('user_level') == 'U_User'){
		$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama, nt.deskripsi, nt.nominal_masuk,nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE nominal_masuk > 0 and nt.nasabah_id = '$nasabah_id' and nt.status = 'A_Aktif'
				group by nt.transaksi_id order by nt.tanggal desc";
		$query = $this->db->query($sql);
		}else{
			$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama,nt.nominal_masuk, nt.deskripsi, nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE nominal_masuk > 0 and nt.status = 'A_Aktif'
				group by nt.transaksi_id order by nt.tanggal desc";
		$query = $this->db->query($sql);
		}
		return $query->result();
	}
	
	public function get_data_by_date_tarik($start_date, $end_date, $nasabah_id) {
		if($this->session->userdata('user_level') == 'U_User'){
			$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama, nt.deskripsi, nt.nominal_masuk,nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
					LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
					LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
					WHERE nominal_keluar > 0 and nt.nasabah_id = '$nasabah_id' and nt.status = 'A_Aktif' and tanggal between  '$start_date' and   '$end_date'
					group by nt.transaksi_id order by nt.tanggal desc ";
			$query = $this->db->query($sql);
		}else{
			$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama,nt.nominal_masuk, nt.deskripsi, nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE nominal_keluar > 0 and nt.status = 'A_Aktif' and tanggal between  '$start_date' and   '$end_date'
				group by nt.transaksi_id order by nt.tanggal desc";
		$query = $this->db->query($sql);
		}
		
        $query = $this->db->query($sql);
        return $query->result();
    }
	public function get_data_by_date_setor($start_date, $end_date, $nasabah_id) {
		if($this->session->userdata('user_level') == 'U_User'){
			$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama, nt.deskripsi, nt.nominal_masuk, nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE nt.nasabah_id = '$nasabah_id' and nt.nasabah_id = '$nasabah_id' AND nt.nominal_masuk > 0 and nt.status = 'A_Aktif' and tanggal between  '$start_date' and   '$end_date'
				group by nt.transaksi_id";
		$query = $this->db->query($sql);
		}else{
			$sql = "SELECT nt.tanggal,nt.transaksi_id, nt.nasabah_id,n.nasabah_nama, nt.deskripsi, nt.nominal_masuk, nt.nominal_keluar, nt.status, n.nominal_saldo FROM nasabah_transaksi nt
				LEFT JOIN nasabah n on n.nasabah_id = nt.nasabah_id
				LEFT JOIN nasabah_transaksi_detail ntd on ntd.transaksi_id = nt.transaksi_id
				WHERE 1 and nt.nominal_masuk > 0 and nt.status = 'A_Aktif' and tanggal between  '$start_date' and   '$end_date'
				group by nt.transaksi_id";
		$query = $this->db->query($sql);
		}
		$query = $this->db->query($sql);
		return $query->result();
	
    }
}