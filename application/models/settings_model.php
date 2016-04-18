<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Settings_model extends CI_Model{
	public function change(){
		$login  =   $this->session->userdata("login_id");
		$chk_pw = md5($this->input->post("old_password"));
		
		$this->db->select();
		$this->db->where('login_password',$chk_pw);
		$this->db->where('login_id',$login);
		$this->db->from('login');
		$l_details = $this->db->get()->row();
		//echo '<pre>';print_r($l_details);echo '</pre>';
		//echo $this->db->last_query();exit;
		if(count($l_details) == 1){			
			$dtr    =   array(
							"login_password"    =>  md5($this->input->post("password"))
					);
			$this->db->update("login",$dtr,array("login_id" => $login));
			if($this->db->affected_rows() > 0){
					return 1;
			}else{
					return 0;
			}
		}else{
			return 'wrong';
		}
	}
		
	public function get_banners(){
		$this->db->select();
		$this->db->from('publicads_searchview as p_v');
		$this->db->join('catergory as cat', "cat.category_id = p_v.cat_id", 'join');
		$banners = $this->db->get()->result();
		return $banners;	
	}
	public function get_banners_details($b_id){
		$this->db->select();
		$this->db->from('publicads_searchview');
		$this->db->where('id',$b_id);
		$banners = $this->db->get()->row();
		return $banners;	
	}	
	public function update_banner(){
		$update=array(
			'sidead_one'=>htmlspecialchars($this->input->post('banner_side')),
			'topad'=>htmlspecialchars($this->input->post('banner_top')),
			'mid_ad'=>htmlspecialchars($this->input->post('banner_mid'))
			);
			$this->db->where('id',$this->input->post('b_id'));
			$up_status = $this->db->update('publicads_searchview', $update);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
			// return $up_status;
	}

	public function get_newletters(){
		$this->db->select();
		$this->db->from("newsletter");
		$this->db->where("status",1);
		$rs = $this->db->get()->result();
		return $rs;
	}

	public function get_deactivatedacnts(){
		$this->db->select();
		$this->db->from("deactive_accounts AS dact");
		$this->db->join("login lg","lg.login_id= dact.login_id");
		$this->db->where("lg.is_confirm !=","confirm");
		$rs = $this->db->get()->result();
		return $rs;
	}

	public function get_contact_details(){
		$this->db->select();
		$this->db->from("contactus");
		$this->db->order_by("posted_on", "DESC");
		$rs = $this->db->get()->result();
		return $rs;
	}
}
?>