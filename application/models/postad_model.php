<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Postad_model extends CI_Model{
        public function ad_insert($files1,$files2,$files3,$files4,$files5,$files6,$files7,$files8,$files9){
            //email configure
             $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'ssl://smtp.googlemail.com',
                 'smtp_port' => 465,
                 'smtp_user' => 'c.punnam@googlemail.com',
                 'smtp_pass' => '12chandru12',
                 );

                $s_email = $this->input->post('seller-email');
                 $this->load->library('email', $config);
                 $this->email->set_newline("\r\n");
                $this->email->from('test@igravitas.in', "Admin Team");
                $this->email->to($s_email);
                // $this->email->cc("manasa.s@igravitas.in");
                $this->email->subject("Classifieds");
                $message    =   "<h1 style='color:16A085;'>Thank you for posting Ad</h1>";
                $pid    =       $this->session->userdata("login_id");
                $uid    =       $this->session->userdata("user_type");
                if($this->session->userdata("login_status") == 2){                                
                        $message   .=   "<a href='".base_url()."common/activate/".$this->session->userdata("is_confirm")."'>Click Here To Activate your Account</a>";
                             $this->email->message($message);
                            $this->email->send();
                }
                // else{
                //         $confirm    =   rand(10000,99999);
                //         $con_val    = md5($pid.$confirm);
                //         $this->db->update(
                //                         "login" , array("is_confirm" => $con_val) , array ("login_id" => $pid , "user_type" => $uid )
                //                         );
                //         $message   .=   "<a href='".base_url()."common/deactivate/".$con_val."/".$pid."/".$uid."'>Click Here To Deactivate your Account</a>";
                //          $this->email->message($message);
                //          $this->email->send();                        
                // }   
                //echo $message;exit;
                // $this->email->message($message);
                // $this->email->send();
                // echo $this->email->print_debugger();exit;
                // $pid    =       $this->session->userdata("login_id");
                // $uid    =       $this->session->userdata("user_type");
                $dta    =       date("Y-m-d h:i:s");
                if($this->input->post("checkaddr") != ""){
                        $addr   =   $this->input->post("checkaddr"); 
                }else{
                        $add    =       array(
                                                "login_id"      =>      $pid,
                                                "city"          =>      $this->input->post("city"),
                                                "state"         =>      $this->input->post("state"),
                                                "country"       =>      $this->input->post("cty"),
                                                "zip_code"      =>      $this->input->post("zipcode"),
                                                "is_default"    =>      0,
                                        );
                        $this->db->insert("address",$add);
                        $addr       =       $this->db->insert_id();
                }
                $is_fe      =       0;
                $is_sp      =       0;
                $is_ug      =       0;
                foreach ($this->input->post("pay_check") as $op){
                        $p = strtolower($op);
                        if($p == "featured"){
                                $is_fe      =       1;
                        }
                        if($p == "spotlight"){
                                $is_sp      =       1;
                        }
                        if($p == "urgent"){
                                $is_ug      =       1;
                        }
                } 
                $dt     =       array(
                                        "login_id"              =>      $pid,
                                        "title"                 =>      $this->input->post("ad_title"),
                                        "ad_desc"               =>      $this->input->post("desc"),
                                        "price"                 =>      $this->input->post("price"),
                                        "number"                =>      $this->input->post("seller-number"),
                                        "link"                  =>      $this->input->post("ad_url"),
                                        "addr_id"               =>      $addr,
                                        "category_id"           =>      $this->input->post("cat"),
                                        "sub_cat_id"            =>      $this->input->post("scat"),
                                        "sub_scat_id"           =>      $this->input->post("sscat"),
                                        "is_urgent"             =>      $is_ug,
                                        "is_spotlight"          =>      $is_sp,
                                        "is_featured"           =>      $is_fe,
                                        "created_on"            =>      $dta,
                                        "ad_status"             =>      2
                                );
                $this->db->insert("advertisement",$dt);
                $inbs   =  $this->db->insert_id();
                if($is_ug == 1){
                        $dtf    =   $this->get_days("urgent");
                        $tod    =   date('Y-m-d h:i:s', strtotime($dta. ' +'. $dtf .' days'));
                        $this->insert_ad_type("urgent",$dta,$tod,$inbs);
                }
                if($is_sp == 1){
                        $dtf    =   $this->get_days("spotlight");
                        $tod    =   date('Y-m-d h:i:s', strtotime($dta. ' +'. $dtf .' days'));
                        $this->insert_ad_type("spotlight",$dta,$tod,$inbs);
                }
                if($is_fe == 1){
                        $dtf    =   $this->get_days("featured");
                        $tod    =   date('Y-m-d h:i:s', strtotime($dta. ' +'. $dtf .' days'));
                        $this->insert_ad_type("featured",$dta,$tod,$inbs);
                }
                if($files1 != ""){
                        $this->insert_img($inbs,$files1,$dta);
                }
                if($files2 != ""){
                        $this->insert_img($inbs,$files2,$dta);
                }
                if($files3 != ""){
                        $this->insert_img($inbs,$files3,$dta);
                }
                if($files4 != ""){
                        $this->insert_img($inbs,$files4,$dta);
                }
                if($files5 != ""){
                        $this->insert_img($inbs,$files5,$dta);
                }
                if($files6 != ""){
                        $this->insert_img($inbs,$files6,$dta);
                }
                if($files7 != ""){
                        $this->insert_img($inbs,$files7,$dta);
                }
                if($files8 != ""){
                        $this->insert_img($inbs,$files8,$dta);
                }
                if($files9 != ""){
                        $this->insert_img($inbs,$files9,$dta);
                }
                if($inbs > 0){
                        $this->email->from('test@igravitas.in', "Admin Team");
                        $this->email->to("swetha@igravitas.in");
                        $this->email->subject("Classifieds");
                        $message    =   "<h1 style='color:16A085;'>Thank you for posting Ad</h1>";

                        if($this->session->userdata("login_status") == 2){                                
                                $message   .=   "<a href='".base_url()."common/activate/".$this->session->userdata("is_confirm")."'>Click Here To Activate your Account</a>";
                        }
                        // else{
                        //         $confirm    =   rand(10000,99999);
                        //         $con_val    = md5($pid.$confirm);
                        //         $this->db->update(
                        //                         "login" , array("is_confirm" => $con_val) , array ("login_id" => $pid , "user_type" => $uid )
                        //                 );
                        //         $message   .=   "<a href='".base_url()."common/deactivate/".$con_val."'>Click Here To Deactivate your Account</a>";
                        // }   
                        //echo $message;exit;
                        $this->email->message($message);
                        $this->email->send();
                        return 1;
                }
                else{
                        return 0;
                }
        }    
        public function get_days($fr){
                $dy     =       $this->db->get_where("ad_validity_price",array("ad_valid_name" => $fr))->row_array();
                return  $dy["days"];
        }
        public  function insert_ad_type($tb_name,$dta,$tod,$adid){
                $fet    =   array(
                        "ad_id"              =>      $adid,
                        "ad_fromdate"        =>      $dta,
                        "ad_todate"          =>      $tod,
                        "status"             =>      1
                );
                $this->db->insert($tb_name,$fet);
        }
        public  function insert_img($adid,$files1,$dta){
                $img    =   array(
                                    "ad_id"             =>      $adid,
                                    "img_name"          =>      $files1,
                                    "img_time"          =>      $dta,
                                    "status"            =>      1   
                            );
                $this->db->insert("ad_img",$img);
        }
}
?>