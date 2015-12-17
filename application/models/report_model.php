<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Report_model extends CI_Model{
        public function ireport(){
                $dt  =  array(
                                "report_type"   =>  $this->input->post("rtype")
                        );
                $this->db->insert("report_type",$dt);
                if($this->db->insert_id() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }    
        public function vreport(){
                $this->db->order_by("report_type_id","desc");
                return $this->db->get("report_type")->result();
        }
        public function ereport_category(){
                $ed     =       $this->db->get_where("report_type",array("report_type_id" => $this->input->post("ci")))->row_array();
                return $ed["report_type"]."@".$ed["report_type_id"];
        }
        public function uareport_category($rir){
                $datp  = array(
                                "report_type"   =>  $this->input->post("stype")
                        );
                $this->db->update("report_type",$datp,array("report_type_id" => $rir));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                } 
        }
        public function delete($param) {
                $this->db->delete("report_type",array("report_type_id" => $param));
        }
}
?>