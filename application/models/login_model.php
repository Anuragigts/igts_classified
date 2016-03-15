<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login_model extends CI_Model{
        public function check(){
                $pa  =  $this->input->post("password");
                $this->db->select("*");
                $this->db->from("login");
                $this->db->where("login_email",$this->input->post("email"));
                if($pa){
                         $this->session->set_userdata("pass","1");
                         $this->db->where("login_password",md5($pa));
                         $this->db->where("is_confirm",'confirm');
                }                
                $uq     =       $this->db->get();

                if($this->db->affected_rows() > 0) {                 
                        $pq     =       $uq->row_array();
                        $this->session->set_userdata($pq);
                        return $pq['login_id'];    
                }
        }


        public function mailexist(){
            $this->db->select("*");
            $this->db->from("login");
            $this->db->where("login_email", $this->input->post("email"));
            $row = $this->db->get();
            // echo $row->num_rows();
            if($row->num_rows() > 0){
            $row1 = $row->row_array();
            if($row1['is_confirm'] == 'confirm'){
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }

    /*forgot password */
    public function forgot($mail){
         $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'ssl://smtp.googlemail.com',
                 'smtp_port' => 465,
                 'smtp_user' => 'c.punnam@googlemail.com',
                 'smtp_pass' => '12chandru12',
                 );

         $this->db->select("*");
            $this->db->from("login");
            $this->db->where("login_email", $mail);
            $row = $this->db->get();
            // echo $row->num_rows();
            if($row->num_rows() > 0){
                  $random_code = md5(rand(10000,99999));
                $data = array(
               'is_confirm' => $random_code
                     );
                $this->db->where('login_email', $mail);
                $this->db->update('login', $data); 

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('test@igravitas.in', "99 Right Deals");
                $this->email->to($mail);
                // $this->email->cc("manasa.s@igravitas.in");
                $this->email->subject("99 Right Deals Forgotten Password");
                $message    =   "<div style='padding: 81px 150px;'>
									<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 10px;background-color: #9FC955;'>
										<h2 style='color: #fff;padding-top: 10px;float:right;'><span>WELCOME </span></h2>
										<img src='http://108right.igravitas.com/img/maillogo.png'>
									</div>
									<div style='margin-top:20px'></div>
									<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 23px;'>
										<h2>Forget Password</h2>
										<p>Hi, We've received a request to reset your 99rightdeal password.</p>
										<p> To initiate the process, please click the following link</p>
										<a href='".base_url()."common/forgot/".$random_code."' style='color:#fff;text-decoration: none;background-color: rgb(159, 201, 85);padding: 5px 27px;'>Click Here To Reset Your Password</a>
										<div style='margin-top:20px'></div>
										<p>If clicking the link above does not work, copy and paste the URL in a new browser window. The URL will expire in 24 hours for security reasons. If you did not make this request, simply ignore this message.</p>
										<p>Best Wishes,</p>
										<p>The <a href=''><b style='color:#9FC955;'>99RightDeals </b></a>Team</p>
									</div>
								</div>";
                $this->email->message($message);
                $this->email->send();
                return 0;

                }
            else{

                return 1;              
                }
     }

     public function forgot_update($pwd, $rcode){
         $data = array(
               'login_password' => $pwd,
               'is_confirm' => 'confirm'
                     );
                $this->db->where('is_confirm', $rcode);
                $this->db->update('login', $data); 
     }

}
?>