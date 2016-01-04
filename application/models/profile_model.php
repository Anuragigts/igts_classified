<?php

class Profile_model extends CI_Model{
	public function prof_data(){
		$mail = $this->session->userdata('login_email');
		$this->db->select("*");
		$this->db->from("signup");
		$this->db->where("email", $mail);
		$res = $this->db->get();
		return $res->row_array();
	}
}

?>