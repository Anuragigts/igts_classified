<?php

class Profile_model extends CI_Model{
	public function prof_data(){
		$login_id = $this->session->userdata('login_id');
		$this->db->select("*");
		$this->db->from("login");
		$this->db->where("login_id", $login_id);
		$res = $this->db->get();
		return $res->row_array();
	}

	/*update profile*/
	 public function prof_update(){
	 	        $prof =  array(
                        "first_name"   =>  $this->input->post('firstnamepost'),
                        "lastname"   =>  $this->input->post('lastnamepost'),
                        "mobile"   =>  $this->input->post('contactnopost')
                );
                $this->db->where('login_id',$this->session->userdata('login_id'));
                $this->db->update("login",$prof);
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
        	$this->db->from("login");
        	$this->db->where('login_id', $this->session->userdata('login_id'));
        	$this->db->where('login_password', md5($this->input->post('currentpasspost')));
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
            $mail = $this->db->get_Where('login', array('login.login_id'=>$this->session->userdata('login_id')))->row('login_email');
             $config = Array(
                 'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => '99rightdeals@googlemail.com',
                'smtp_pass' => 'S@ibaba2016',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
                 );

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('admin@99rightdeals.com', "99 Right Deals");
                $this->email->to($mail);
                $this->email->subject("99 Right Deals Change Password");
                $message    =   "<div style='padding: 81px 150px;'>
                                    <div style='border: 2px solid #9FC955;border-radius: 20px;padding: 10px;background-color: #9FC955;'>
                                        <h2 style='color: #fff;padding-top: 10px;float:right;'><span>WELCOME </span></h2>
                                        <img src='http://99rightdeals.com/img/maillogo.png'>
                                    </div>
                                    <div style='margin-top:20px'></div>
                                    <div style='border: 2px solid #9FC955;border-radius: 20px;padding: 23px;'>
                                        <h2>Change Password</h2>
                                        <p>Hi, We've changed your password successfully</p>
                                        <p>Best Wishes,</p>
                                        <p>The <a href='".base_url()."'><b style='color:#9FC955;'>99RightDeals </b></a>Team</p>
                                    </div>
                                </div>";
                $this->email->message($message);
                $this->email->send();
	  	         $log_pwd =  array(
                        "login_password"   =>  md5($this->input->post('newpasspost'))
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
                $this->email->from('test@igravitas.in', "99RightDeals");
                $this->email->to($s_email);
                // $this->email->cc("manasa.s@igravitas.in");
                $this->email->subject("Deactivated 99RightDeals Account");
                $message    =   "<div style='padding: 81px 150px;'>
                                    <div style='border: 2px solid #9FC955;border-radius: 20px;padding: 10px;background-color: #9FC955;'>
                                        <h2 style='color: #fff;padding-top: 10px;float:right;'><span>WELCOME </span></h2>
                                        <img src='http://99rightdeals.com/img/maillogo.png'>
                                    </div>
                                    <div style='margin-top:20px'></div>
                                    <div style='border: 2px solid #9FC955;border-radius: 20px;padding: 23px;'>
                                        <h3>Hi ".$this->input->post('fname').",</h3>
                                        <p>Your account successfully Deactivated!!!</p>
                                        <a href='".base_url()."update_profile/re_activate/".$rand_val."/".$login_id."' style='color:#fff;text-decoration: none;background-color: rgb(159, 201, 85);padding: 5px 27px;'>Click Here To Re-Activate your Account</a>
                                        <div style='margin-top:20px'></div>
                                        <p>Best Wishes,</p>
                                        <p>The <a href=''><strong style='color:#9FC955;'>99RightDeals </strong></a>Team</p>
                                    </div>
                                </div>";
                    $this->email->message($message);
                    $this->email->send();
                    $ins = array('login_id' =>  $this->input->post('id'), 
                                'reason_title' => $this->input->post('reasonname'),
                                'msg_url' => $this->input->post('reason_msg'),
                                'deactived_on' => date("Y-m-d H:i:s"));
                    $this->db->insert("deactive_accounts",$ins);

                $this->db->update("login",$dtr,array("login_id" => $this->input->post('id')));
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
                $this->db->where('login_id', $url4);
                $this->db->delete('deactive_accounts');
                return 1;
               }else{
                return 0;
               }
        }

}

?>