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

	/*update profile*/
	 public function prof_update(){
	 	        $prof =  array(
                        "first_name"   =>  $this->input->post('fname1'),
                        "lastname"   =>  $this->input->post('lname1'),
                        "mobile"   =>  $this->input->post('mobile1')
                );
                $this->db->where('sid',$this->input->post('prof_id1'));
                $this->db->update("signup",$prof);
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }

        /*change passward exist*/
        public function change_pwd_exist(){

        	/*password is exist or not*/
        	$this->db->select("COUNT(*)");
        	$this->db->from("signup");
        	$this->db->where('sid', $this->input->post('prof_id1'));
        	$this->db->where('password', md5($this->input->post('cur_pwd1')));
        	$res = $this->db->get();
        	$res1 = $res->row_array();
        	if($res1['COUNT(*)'] != 1){
        		return 1;
        	}
        	else{
        		return 0;
        	}
	}

        /*change passward update*/
        public function change_pwd_up(){
	  	 $pwd =  array(
                        "password"   =>  md5($this->input->post('pwd1'))
                        );
                $this->db->where('sid',$this->input->post('prof_id1'));
                $this->db->update("signup",$pwd);

            $log_pwd =  array(
                        "login_password"   =>  md5($this->input->post('pwd1'))
                        );
                $this->db->where('login_id',$this->session->userdata('login_id'));
                $this->db->update("login",$log_pwd);

                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
	}

}

?>