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
                        if($this->input->post("w_login") == "1"){
                                $this->session->set_userdata("chebox",$this->input->post("w_login"));
                        }
                        $this->session->set_userdata($pq);
                        return $pq['login_id'];    
                }
                else{
                        $pasd    =   "";
                        if($this->input->post("w_login") == "1"){
                                        $vaop    =   md5(rand(10000,99999));
                                        $this->session->set_userdata("chebox",$this->input->post("w_login"));
                        }else{
                                        $vaop   =   "";
                        }   
                        if($this->input->post("w_login") == "1"){
                                $login      =   array(
                                        "user_type"         =>      3,
                                        "login_email"       =>      $this->input->post("email"),
                                        "login_password"    =>      $pasd,
                                        "is_confirm"        =>      $vaop,
                                        "login_status"      =>      2
                                );                        
                                $this->db->insert("login",$login);
                                $login_id   =   $this->db->insert_id();
                                $profile    =   array(
                                                        "login_id"          =>      $login_id,
                                                        "profile_img"       =>      "avatar.jpg"
                                                ); 
                                $this->db->insert("profile",$profile);  
                                if($this->db->affected_rows() > 0){
                                        $this->session->set_userdata($login);
                                        $this->session->set_userdata($profile);
                                        return $login_id;
                                }else{
                                        return 0;
                                }
                        }
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
}
?>