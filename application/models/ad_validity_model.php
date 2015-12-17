<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ad_validity_model extends CI_Model{
        public function ad_validity(){
                $dt     =   array(
                                    "ad_valid_name"   =>    $this->input->post("ad_name"),
                                    "price"           =>    $this->input->post("price"),
                                    "days"            =>    $this->input->post("days")
                            );
                $this->db->insert("ad_validity_price",$dt);
                if($this->db->insert_id() > 0){
                        return 1;
                }else{
                        return 0;
                } 
        }
        public function vad_validity() {
                $this->db->order_by("ad_valid_id","desc");
                return $this->db->get("ad_validity_price")->result();
        }
        public function ead_validity(){
                $ed     =       $this->db->get_where("ad_validity_price",array("ad_valid_id" => $this->input->post("vid")))->row_array();
                return $ed["ad_valid_name"]."@".$ed["price"]."@".$ed["days"];
        }
        public function uad_validity(){
                $dt     =   array(
                                    "ad_valid_name"   =>    $this->input->post("ad"),
                                    "price"           =>    $this->input->post("pr"),
                                    "days"            =>    $this->input->post("dy")
                            );
                $this->db->update("ad_validity_price",$dt,array("ad_valid_id" => $this->input->post("vid")));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                } 
        }
        public function deletead_validity($uri) {
                $this->db->delete("ad_validity_price",array("ad_valid_id" => $uri));
        }
}
?>