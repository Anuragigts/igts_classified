<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_model extends CI_Model{
        public function login(){
                $this->db->select("l.*,p.*");
                $this->db->from("login as l");
                $this->db->join("profile as p","l.login_id = p.login_id","inner");
                $this->db->where("l.login_email",$this->input->post("email"));
                $this->db->where("l.login_password",md5($this->input->post("password")));
                $uq     =     $this->db->get();
                //echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                        $this->session->set_userdata($uq->row_array());
                        return 1;                        
                }
                else{
                        return 0;
                }
        }
        public function insert_user(){
                $login      =   array(
                                        "user_type"         =>      2,
                                        "login_email"       =>      $this->input->post("email"),
                                        "login_password"    =>      md5($this->input->post("password")),
                                        "is_confirm"        =>      'confirm',
                                        "login_status"      =>      1
                                );
                $this->db->insert("login",$login);
                $login_id   =   $this->db->insert_id();
                $profile    =   array(
                                        "login_id"          =>      $login_id,
                                        "first_name"        =>      strtolower($this->input->post("first_name")),
                                        "last_name"         =>      strtolower($this->input->post("last_name")),
                                        "mobile"            =>      $this->input->post("mobile"),
                                        "phone"             =>      $this->input->post("phone")?$this->input->post("phone"):"N/A",
                                        "profile_img"       =>      "avatar.jpg"
                                ); 
                $this->db->insert("profile",$profile);                
                $addr       =   array(
                                        "login_id"          =>      $login_id,
                                        "house_no"          =>      $this->input->post("houseno")?$this->input->post("houseno"):"N/A",
                                        "street"            =>      $this->input->post("street")?$this->input->post("street"):"N/A",
                                        "landmark"          =>      $this->input->post("landmark")?$this->input->post("landmark"):"N/A",
                                        "city"              =>      $this->input->post("city"),
                                        "state"             =>      $this->input->post("state"),
                                        "country"           =>      $this->input->post("cty"),
                                        "zip_code"          =>      $this->input->post("zipcode"),
                                        "is_default"        =>      1,
                                ); 
                $this->db->insert("address",$addr);
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function getCustomers(){
                $this->db->select("l.*,p.*,a.*,c.City_name,s.State_name,d.Country_name");
                $this->db->from("login as l");
                $this->db->join("profile as p","l.login_id = p.login_id","inner");
                $this->db->join("address as a","a.login_id = l.login_id","inner");                
                $this->db->join("cities as c","c.City_id = a.city","inner");
                $this->db->join("states as s","s.State_id = a.state","inner");
                $this->db->join("countries as d","d.Country_id = a.country","inner");
                $this->db->where("l.user_type","2");
                $this->db->order_by("l.login_id","desc");
                $uq     =     $this->db->get();
                //echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                        return $uq->result();                        
                }
                else{
                        return array();
                }
        }
        public function getCustomerid($uri){
                $this->db->select("l.*,p.*,a.*");
                $this->db->from("login as l");
                $this->db->join("profile as p","l.login_id = p.login_id","inner");
                $this->db->join("address as a","a.login_id = l.login_id","inner");                
                $this->db->where("l.login_id",$uri);
                $uq     =     $this->db->get();
                //echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                        return $uq->row_array();                        
                }
                else{
                        return array();
                }
        }
        public function update_user($uri){
                $login_id   =  array("login_id" => $uri);
                $profile    =   array(
                                        "first_name"        =>      strtolower($this->input->post("first_name")),
                                        "last_name"         =>      strtolower($this->input->post("last_name")),
                                        "mobile"            =>      $this->input->post("mobile"),
                                        "phone"             =>      $this->input->post("phone")
                                ); 
                $this->db->update("profile",$profile,$login_id);     
                $vp     =   $this->db->affected_rows();
                $addr       =   array(
                                        "house_no"          =>      $this->input->post("houseno"),
                                        "street"            =>      $this->input->post("street"),
                                        "landmark"          =>      $this->input->post("landmark"),
                                        "city"              =>      $this->input->post("city"),
                                        "state"             =>      $this->input->post("state"),
                                        "country"           =>      $this->input->post("cty"),
                                        "zip_code"          =>      $this->input->post("zipcode"),
                                        "is_default"        =>      1,
                                ); 
                $this->db->update("address",$addr,$login_id);
                if($vp > 0 || $this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                } 
        }
}
?>
