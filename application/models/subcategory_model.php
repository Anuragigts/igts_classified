<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Subcategory_model extends CI_Model{
        public function create(){
                $dt     =    array(
                                "category_id"           =>      $this->input->post("cat_name"),
                                "sub_category_name"     =>      strtolower($this->input->post("scat_name")),
                                "sub_category_status"   =>      1
                        );
                $this->db->insert("sub_category",$dt);
                if($this->db->insert_id() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function sview_cat(){
                $this->db->select("c.*,s.*");
                $this->db->from("sub_category as s");
                $this->db->join("catergory as c","c.category_id = s.category_id","inner");
                $this->db->order_by("s.sub_category_id","desc");
                return $this->db->get()->result();
        }
        public function edcategory(){
                $this->db->select("c.*,s.*");
                $this->db->from("sub_category as s");
                $this->db->join("catergory as c","c.category_id = s.category_id","inner");
                $this->db->where("s.sub_category_id",  $this->input->post("category"));
                $vp = $this->db->get()->row_array();
                return  ucfirst($vp["sub_category_name"]);
        }
        public function update(){
                $dt     =    array(
                                "category_id"           =>      $this->input->post("cat"),
                                "sub_category_name"     =>      strtolower($this->input->post("ct"))
                        );
                $this->db->update("sub_category",$dt,array("sub_category_id" => $this->input->post("category")));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function scategoryActDea(){
                $dt     =   array(
                                "sub_category_status"   =>      $this->input->post("status")
                        );
                $this->db->update("sub_category",$dt,array("sub_category_id" => $this->input->post("scategory")));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function delete($uri){
                $this->db->delete('sub_subcategory', array('sub_category_id' => $uri)); 
                $this->db->delete('sub_category', array('sub_category_id' => $uri)); 
        }
}
?>