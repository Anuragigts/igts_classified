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
                'smtp_host' => 'tls://rep.tnphost.com',
                'smtp_port' => 465,
                'smtp_user' => 'admin@99rightdeals.com',
                'smtp_pass' => 'Admin@123',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'

                 /*'protocol' => 'smtp',
                 'smtp_host' => 'ssl://rep.tnphost.com',
                 'smtp_port' => 465,
                 'smtp_user' => 'admin@99rightdeals.com',
                 'smtp_pass' => 'Admin@123',*/
                 );
            $is_confirm = md5(rand(10000,99999));
            if($this->input->post('signup_type') == '7') {
                    $fname = $this->input->post('con_fname');
                    $mail = $this->input->post('con_email');

                    $login_data = array(
                                    'user_type'=>7,
                                    'login_email'=>$this->input->post('con_email'),
                                    'login_password'=> md5($this->input->post('con_password')),
                                    'is_confirm'=>$is_confirm,
                                    'login_status'=>1,
                                    'first_name' => $this->input->post('con_fname'),
                                    'lastname' => $this->input->post('con_lname'),
                                    'mobile'=>$this->input->post('con_mobile'));
                    $this->db->insert('login', $login_data);
            }
            else{
                        $fname = $this->input->post('bus_fname');
                        $mail = $this->input->post('bus_email');
                        $data = array('user_type'=>6,
                                    'login_email'=>$this->input->post('bus_email'),
                                    'login_password'=> md5($this->input->post('bus_password')),
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
                $this->email->from('support@99rightdeals.com', "99RightDeals");
                $this->email->to($mail);
                $this->email->subject("99 Right Deals Account Verification");
                $message    =   "<div style='padding: 81px 150px;'>
									<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 10px;background-color: #9FC955;'>
										<h2 style='color: #fff;padding-top: 10px;float:right;'><span>WELCOME </span></h2>
										<img src='http://99rightdeals.com/img/maillogo.png'>
									</div>
									<div style='margin-top:20px'></div>
									<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 23px;'>
										<h2>Account Confirmations</h2>
										<h3>Hi ".$fname.",</h3>
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
                //$this->email->send();
                if (!$this->email->send()) {
                // Raise error message
                show_error($this->email->print_debugger());
                    }
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

        /*facebook login*/
        public function fb_create(){
             if($this->input->post('signup_type') == '7') {
                    $mail = $this->input->post('con_email');

                    $login_data = array(
                                    'user_type'=>7,
                                    'login_email'=>$this->input->post('con_email'),
                                    'is_confirm'=>'confirm',
                                    'login_status'=>1,
                                    'first_name' => $this->input->post('con_fname'),
                                    'lastname' => $this->input->post('con_lname'),
                                    'mobile'=>$this->input->post('con_mobile'),
                                    'fbid'=>$this->input->post('fbid'));
                    $this->db->insert('login', $login_data);
            }
            else{
                        $data = array('user_type'=>6,
                                    'login_email'=>$this->input->post('con_email'),
                                    'is_confirm'=>'confirm',
                                    'login_status'=>1,
                                    'first_name' => $this->input->post('bus_fname'),
                                    'lastname' => $this->input->post('bus_lname'),
                                    'mobile'=>$this->input->post('bus_mobile'),
                                    'bus_name'=>$this->input->post('bus_name'),
                                    'bus_addr'=>$this->input->post('bus_address'),
                                    'vat_number'=> $this->input->post('vat_number'),
                                    'fbid'=>$this->input->post('fbid'));
                        $this->db->insert('login', $data);
            }
            $this->session->set_userdata('login_id',$this->db->insert_id());
        }

         public function fb_already(){
                $fbid = $this->input->post('fbid');
           $login_qry = $this->db->query("SELECT COUNT(*) FROM login WHERE fbid = '$fbid'");
            $result1 = $login_qry->row_array();
                if($result1['COUNT(*)'] > 0){
                    $this->session->set_userdata('login_id',$result1['login_id']);
                        return 1;
                }
                else{
                        return 0;
                }
        }
        public function onloadfb_already(){
            $fbdata = $this->session->userdata('fb_data');
            $login_qry = $this->db->query("SELECT COUNT(*) FROM login WHERE fbid = '".$fbdata['id']."'");
            $login_qry1 = $this->db->query("SELECT * FROM login WHERE fbid = '".$fbdata['id']."'");
            $result1 = $login_qry->row_array();
            $result2 = $login_qry1->row_array();
            // $this->db->last_query(); exit;
                if($result1['COUNT(*)'] > 0){
                    $this->session->set_userdata('login_id',$result2['login_id']);
                        return 1;
                }
                else{
                        return 0;
                }
        }
}
?>