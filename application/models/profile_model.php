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

    /*deactivate account*/
    public function  deactivate($rand_val){
                $dtr    =   array(
                                    "is_confirm"        =>  $rand_val,
                                    "login_status"      =>  "2"
                            );

                 //email configure
             $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'ssl://smtp.googlemail.com',
                 'smtp_port' => 465,
                 'smtp_user' => 'c.punnam@googlemail.com',
                 'smtp_pass' => '12chandru12',
                 );

             $s_email = $this->input->post('mail');
             $login_id = $this->session->userdata('login_id');
                 $this->load->library('email', $config);
                 $this->email->set_newline("\r\n");
                $this->email->from('test@igravitas.in', "Admin Team");
                $this->email->to($s_email);
                // $this->email->cc("manasa.s@igravitas.in");
                $this->email->subject("Classifieds");
                $message    =   "
                <p>Your account successfully Deactivated!!!</p>
                <h1 style='color:16A085;'>Re-Activate Account</h1>";
                $pid    =       $this->session->userdata("login_id");
                $uid    =       $this->session->userdata("user_type");
                
            $message   .=   "<a href='".base_url()."update_profile/re_activate/".$rand_val."/".$login_id."'>Click Here To Re-Activate your Account</a>";
                    $this->email->message($message);
                     $this->email->send();


                $this->db->update("login",$dtr,array("login_email" => $s_email));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }


        /*re activate account*/
        public function  add_password($uri){
                $dtr    =   array(
                                "login_password"    =>  md5($this->input->post("password")),
                                "is_confirm"        =>  "confirm",
                                "login_status"      =>  "1"
                        );
                $this->db->update("login",$dtr,array("is_confirm" => $uri));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }

        /*mail while activating*/
        public function activate($uri3, $url4){
                $whr = array('login_id' => $url4, 'is_confirm' => $uri3);
                $this->db->where($whr);
               $this->db->update('login', array('is_confirm' => 'confirm'));
               if($this->db->affected_rows() > 0){
                return 1;
               }else{
                return 0;
               }
        }

}

?>