<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Common_model extends CI_Model{
        public function countries(){
                $this->db->order_by("Country_name","Asc");
                return $this->db->get("countries")->result();
        }
        public function states(){
                $cv     =   $this->input->post("cv");
                if($cv == ""){
                        $this->db->order_by("State_name","Asc");
                        return $this->db->get("states")->result();
                }else{
                        $this->db->order_by("State_name","Asc");
                        return $this->db->get_where("states",array("Country_id" => $cv))->result();
                }                
        }
        public function cities(){
                $cv     =   $this->input->post("st");
                if($cv == ""){
                        $this->db->order_by("City_name","Asc");
                        return $this->db->get("cities")->result();
                }else{
                        $this->db->order_by("City_name","Asc");
                        return $this->db->get_where("cities",array("State_id" => $cv))->result();
                }  
        }
        public function checkEmail(){
                $em     =   $this->input->post("email");
                $this->db->select("count(*) as row_count");
                $v = $this->db->get_where("login",array("login_email" => $em))->row_array();
                return $v['row_count'];
        }
        public function getAll(){
                $this->db->select("l.*,a.*,c.City_name,s.State_name,d.Country_name");
                $this->db->from("login as l");
               // $this->db->join("profile as p","l.login_id = p.login_id","inner");
                $this->db->join("address as a","a.login_id = l.login_id","inner");                
                $this->db->join("cities as c","c.City_id = a.city","inner");
                $this->db->join("states as s","s.State_id = a.state","inner");
                $this->db->join("countries as d","d.Country_id = a.country","inner");
                if($this->input->post("cv") != ""){
                        $this->db->where("l.login_status",$this->input->post("cv"));
                }
                $this->db->where("l.user_type",$this->input->post("cust"));
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
        public function custActDea() {
                $dt     =   array(
                        "login_status"  => $this->input->post("status")
                );
                $this->db->update("login",$dt,array("login_id" => $this->input->post("login")));
                if( $this->db->affected_rows() > 0 ){
                        return 1;
                }
                else{
                        return 0;
                }
        }
        public function delete($uri){
                $this->db->delete('profile', array('login_id' => $uri)); 
                $this->db->delete('address', array('login_id' => $uri)); 
                $this->db->delete('login', array('login_id' => $uri)); 
        }
        public function view_cat(){
                $this->db->order_by("category_name","Asc");
                return $this->db->get_where("catergory",array("category_status" => 1))->result();
        }
        public function view_scat(){
                $this->db->order_by("sub_category_name","Asc");
                return $this->db->get_where("sub_category",array("sub_category_status" => 1))->result();
        }        
        public function view_sscat(){
                $this->db->order_by("sub_subcategory_name","Asc");
                return $this->db->get_where("sub_subcategory",array("sub_substatus" => 1))->result();
        }        
        public function getSubcat(){
                $cv     =   $this->input->post("cat");
                $this->db->order_by("sub_category_name","Asc");
                return $this->db->get_where("sub_category",array("category_id" => $cv,"sub_category_status" => 1))->result();
        }
        public function getSsubcat(){
                $cv     =   $this->input->post("cat");
                $this->db->order_by("sub_subcategory_name","Asc");
                return $this->db->get_where("sub_subcategory",array("sub_category_id" => $cv,"sub_substatus" => 1))->result();
        }        
        public function ad_valid(){
                $this->db->order_by("ad_valid_id","asc");
                return $this->db->get("ad_validity_price")->result();
        }
        public function address(){
                $this->db->select("a.*,c.City_name,s.State_name,t.Country_name");
                $this->db->from("address as a");
                $this->db->join("cities as c","c.City_id = a.city","inner");
                $this->db->join("states as s","s.State_id = a.state","inner");
                $this->db->join("countries as t","t.Country_id =  a.country","Inner");
                $this->db->where("a.login_id" ,$this->session->userdata("login_id"));
                $this->db->order_by("a.is_default","DESC");
                $addr     =   $this->db->get();
                return $addr->result();
        }
        public function checkaddr(){
                $p =  $this->db->get_where("address",array("address_id" => $this->input->post("addr")))->row_array();
                return $p["city"]."@@".$p["state"]."@@".$p["country"]."@@".$p["zip_code"];
        }
        public function activate($uri){
                $this->db->select("login_email,is_confirm");
                $v = $this->db->get_where("login",array("is_confirm" => $uri));
                if($this->db->affected_rows() > 0){
                        return $v->row_array();
                }else{
                        return array();
                }
        }
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
        public function  deactivate($uri){
                $confirm    =   rand(10000,99999);
                $con_val    = md5($uri.$confirm);
                $dtr    =   array(
                                    "login_password"    =>  "",
                                    "is_confirm"        =>  $con_val,
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

             $s_email = @mysql_result(mysql_query("SELECT `login_email` FROM `login` WHERE `login_id` = '".$this->uri->segment(4)."' AND `user_type` = '".$this->uri->segment(5)."'"), 0,'login_email');
                 $this->load->library('email', $config);
                 $this->email->set_newline("\r\n");
                $this->email->from('test@igravitas.in', "99RightDeals");
                $this->email->to($s_email);
                // $this->email->cc("manasa.s@igravitas.in");
                $this->email->subject("99RightDeals Classifieds");
                $message    =   "<h1 style='color:16A085;'>Re-Activate Account</h1>";
                $pid    =       $this->session->userdata("login_id");
                $uid    =       $this->session->userdata("user_type");
                
            $message   .=   "<a href='".base_url()."common/re_activate/".$con_val."'>Click Here To Re-Activate your Account</a>";
                    $this->email->message($message);
                     $this->email->send();


                $this->db->update("login",$dtr,array("login_id" => $this->uri->segment(4), "user_type"=>$this->uri->segment(5)));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }        


        public function signup_activate($ui){
            $up = array('is_confirm' => 'confirm');
            $this->db->update("login",$up, array('is_confirm' => $ui ));
            if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }

        public function getsearch(){
                $this->db->select("c.*,m.*,s.*,t.*,a.*,o.*");
                $this->db->from("sub_subcategory as c");
                $this->db->join("advertisement as a","a.sub_scat_id  = c.sub_subcategory_id","LEFT");
                $this->db->join("address as m","a.addr_id  = m.address_id","LEFT");
                $this->db->join("sub_category as s","s.sub_category_id  = c.sub_category_id","LEFT");
                $this->db->join("catergory as t","t.category_id  = s.category_id","LEFT");
                $this->db->join("countries as o","o.Country_id  = m.country","LEFT");
                $this->db->where("a.category_id",$this->input->post("sea"));
                $this->db->where("m.country",$this->input->post("loc"));
                return $this->db->get()->result();
                //return $this->db->last_query();
        }
}
?>