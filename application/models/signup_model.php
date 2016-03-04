<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Signup_model extends CI_Model{
        public function create(){
            $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'ssl://smtp.googlemail.com',
                 'smtp_port' => 465,
                 'smtp_user' => 'c.punnam@googlemail.com',
                 'smtp_pass' => '12chandru12',
                 );

            if($this->input->post('signup_type') == '7') {
                    $is_confirm = md5(rand(10000,99999));
                    $mail = $this->input->post('con_email');

                    $login_data = array(
                                    'user_type'=>7,
                                    'login_email'=>$this->input->post('con_email'),
                                    'login_password'=> md5($this->input->post('con_password')),
                                    'is_confirm'=>$is_confirm,
                                    'login_status'=>1,
                                    'first_name' => $this->input->post('con_fname'),
                                    'lastname' => $this->input->post('con_lname'));
                    $this->db->insert('login', $login_data);
            }
            else{
                        $is_confirm = md5(rand(10000,99999));
                        $data = array('user_type'=>6,
                                    'login_email'=>$this->input->post('con_email'),
                                    'login_password'=> md5($this->input->post('con_password')),
                                    'is_confirm'=>$is_confirm,
                                    'login_status'=>1,
                                    'first_name' => $this->input->post('bus_fname'),
                                    'lastname' => $this->input->post('bus_lname'),
                                    'mobile'=>$this->input->post('bus_mobile'),
                                    'bus_name'=>$this->input->post('bus_name'),
                                    'bus_addr'=>$this->input->post('bus_address'),
                                    'vat_number'=> $this->input->post('vat_number'));
                        $this->db->insert('login', $data);
            }
             



            $this->load->library('email', $config);
                 $this->email->set_newline("\r\n");
                $this->email->from('test@igravitas.in', "99RightDeals");
                $this->email->to($mail);
                // $this->email->cc("manasa.s@igravitas.in");
                $this->email->subject("99 Right Deals Account Verification");
                $message    =   "<div style='padding: 81px 150px;'>
									<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 10px;background-color: #9FC955;'>
										<h2 style='color: #fff;padding-top: 10px;float:right;'><span>WELCOME </span></h2>
										<img src='http://79deals.igravitas.in/images/maillogo.png'>
									</div>
									<div style='margin-top:20px'></div>
									<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 23px;'>
										<h2>Account Confirmations</h2>
										<h3>Hi ".$this->input->post('con_fname').",</h3>
										<p>Welcome to 99Rightdeals.com</p>
										<p> To complete your registration please confirm that you have received this email by clicking below</p>
										<a href='".base_url()."common/signup_activate/".$is_confirm."' style='color:#fff;text-decoration: none;background-color: rgb(159, 201, 85);padding: 5px 27px;'>Click Here To Activate your Account</a>
										<div style='margin-top:20px'></div>
										<p>Here are all the details you'll need to log on and start find your perfect deal.</p>
										<p>Best Wishes,</p>
										<p>The <a href=''><strong style='color:#9FC955;'>99RightDeals </strong></a>Team</p>
									</div>
								</div>";
                $this->email->message($message);
                $this->email->send();
           
        }

        public function already(){
                if($this->input->post('signup_type') == '7') {
                    $mail = $this->input->post('con_email');
                }
                else{
                    $mail = $this->input->post('bus_email');
                }
           $login_qry = $this->db->query("SELECT COUNT(*) FROM login WHERE login_email = '$mail'");
            $result1 = $login_qry->row_array();
                if($result1['COUNT(*)'] > 0){
                        return 1;
                }
                else{
                        return 0;
                }
        }
}
?>