<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Settings_model extends CI_Model{
        public function change(){
                $login  =   $this->session->userdata("login_id");
                $dtr    =   array(
                                "login_password"    =>  md5($this->input->post("password"))
                        );
                $this->db->update("login",$dtr,array("login_id" => $login));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
}
?>