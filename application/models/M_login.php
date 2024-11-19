<?php 
 
class M_login extends CI_Model{	
	function status($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	function get_nasabah(){
		$sql = "SELECT r.status, n.nasabah_id,n.nasabah_nama, r.registrasi_id,r.nama,r.email,r.user_id, r.user_level,r.user_name FROM nasabah n 
		LEFT JOIN registrasi r on r.registrasi_id = n.registrasi_id
		WHERE 1";
		$query = $this->db->query($sql);
		return $query->result();
	}
}