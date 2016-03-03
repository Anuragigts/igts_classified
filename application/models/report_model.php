<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Report_model extends CI_Model{
        /*public function ireport(){
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
        }*/
		public function get_list_ads() {
			$start = $this->session->userdata('start_date');
			$end = $this->session->userdata('end_date');
			$this->db->select();
			if($this->session->userdata('cat_type')>0)
				$this->db->where('p_ad.category_id',$this->session->userdata('cat_type'));
			if($this->session->userdata('pkg_type')>0)
				$this->db->where('p_ad.package_type',$this->session->userdata('pkg_type'));
			
			$this->db->where('p_ad.created_on >=', date( 'd-m-Y H:i:s',strtotime($start)));
$this->db->where('p_ad.created_on <=', date( 'd-m-Y H:i:s',strtotime($end)));
$this->db->join('pkg_duration_list p_list','p_list.pkg_dur_id = p_ad.package_type','inner');
$this->db->join('login log','log.login_id = p_ad.login_id','inner');

			$this->db->from('postad p_ad');
			
			$result = $this->db->get()->result();
                        echo $this->db->last_query();exit;
			return $result;
        }
}
?>