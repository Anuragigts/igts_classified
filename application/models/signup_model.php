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

            if($this->input->post('signup_type') == 'consumer') {
                       $data = array('first_name' => $this->input->post('con_fname'),
                                    'lastname' => $this->input->post('con_lname'),
                                    'email' => $this->input->post('con_email'),
                                    'password' => md5($this->input->post('con_password')),
                                    'mobile'=>$this->input->post('con_mobile'),
                                    'signup_type' => $this->input->post('signup_type'));
                    $this->db->insert('signup', $data);
                    $insert_id = $this->db->insert_id();
                    $is_confirm = md5(rand(10000,99999));
                    $mail = $this->input->post('con_email');

                    $login_data = array(
                                    'user_type'=>3,
                                    'login_email'=>$this->input->post('con_email'),
                                    'login_password'=> md5($this->input->post('con_password')),
                                    'is_confirm'=>$is_confirm,
                                    'login_status'=>2,
                                    'signupid'=>$insert_id);
                    $this->db->insert('login', $login_data);
            }
            else{
                        $data = array('first_name' => $this->input->post('bus_fname'),
                                    'lastname' => $this->input->post('bus_lname'),
                                    'email' => $this->input->post('bus_email'),
                                    'password' => md5($this->input->post('bus_password')),
                                    'mobile'=>$this->input->post('bus_mobile'),
                                    'signup_type' => $this->input->post('signup_type'),
                                    'bus_name'=>$this->input->post('bus_name'),
                                    'bus_addr'=>$this->input->post('bus_address'),
                                    'vat_number'=> $this->input->post('vat_number'));
                        $this->db->insert('signup', $data);
                        $insert_id = $this->db->insert_id();
                        $is_confirm = md5(rand(10000,99999));
                        $mail = $this->input->post('bus_email');

                    $login_data = array(
                                    'user_type'=>3,
                                    'login_email'=>$this->input->post('bus_email'),
                                    'login_password'=> md5($this->input->post('bus_password')),
                                    'is_confirm'=>$is_confirm,
                                    'login_status'=>2,
                                    'signupid'=>$insert_id);
                    $this->db->insert('login', $login_data);
            }
             



            $this->load->library('email', $config);
                 $this->email->set_newline("\r\n");
                $this->email->from('test@igravitas.in', "Admin Team");
                $this->email->to($mail);
                // $this->email->cc("manasa.s@igravitas.in");
                $this->email->subject("Classifieds");
                $message    =   "<h1 style='color:16A085;'>Thank you for Signing Up</h1>";
                 $message   .=   "<a href='".base_url()."common/signup_activate/".$is_confirm."'>Click Here To Activate your Account</a>";
                 $this->email->message($message);
                $this->email->send();
           
        }

        public function already(){
                if($this->input->post('signup_type') == 'consumer') {
                    $mail = $this->input->post('con_email');
                }
                else{
                    $mail = $this->input->post('bus_email');
                }
            $query = $this->db->query("SELECT COUNT(*) FROM signup WHERE email = '$mail'");
            $result = $query->row_array();

            $login_qry = $this->db->query("SELECT COUNT(*) FROM login WHERE login_email = '$mail'");
            $result1 = $login_qry->row_array();
                if($result['COUNT(*)'] > 0 || $result1['COUNT(*)'] > 0){
                        return 1;
                }
                else{
                        return 0;
                }
        }
}
?>