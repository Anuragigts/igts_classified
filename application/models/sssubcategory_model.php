<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Sssubcategory_model extends CI_Model{
        public function create(){
                $dt     =    array(
                                "sub_subcategory_id"           =>      $this->input->post("sscat_name"),
                                "sub_sub_subcategory_name"      =>      strtolower($this->input->post("ssscat_name")),
                                "sub_sub_substatus"             =>      1
                        );
                $this->db->insert("sub_sub_subcategory",$dt);
                if($this->db->insert_id() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function sview_cat(){
                /*$this->db->select("c.*,s.*,t.*");
                $this->db->from("sub_subcategory as s");
                $this->db->join("sub_category as c","c.sub_category_id = s.sub_category_id","inner");
                $this->db->join("catergory as t","c.category_id = t.category_id","inner");
                $this->db->order_by("s.sub_subcategory_id","desc");
                return $this->db->get()->result();*/
                $this->db->select("c.*,s.*,t.*, ss.*");
                $this->db->from("sub_sub_subcategory as ss");
                $this->db->join("sub_subcategory as s","s.sub_subcategory_id = ss.sub_subcategory_id","inner");
                $this->db->join("sub_category as c","c.sub_category_id = s.sub_category_id","inner");
                $this->db->join("catergory as t","c.category_id = t.category_id","inner");
                $this->db->order_by("s.sub_subcategory_id","desc");
                return $this->db->get()->result();
        }
        public function scategoryActDea(){
                $dt     =    array(
                                "sub_sub_substatus"             =>      $this->input->post("status")
                        );
                $this->db->update("sub_sub_subcategory",$dt,array("sub_sub_subcategory_id" => $this->input->post("sssubcat")));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function edcategory(){
               $this->db->select("c.*,s.*,t.*, ss.*");
                $this->db->from("sub_sub_subcategory as ss");
                $this->db->join("sub_subcategory as s","s.sub_subcategory_id = ss.sub_subcategory_id","inner");
                $this->db->join("sub_category as c","c.sub_category_id = s.sub_category_id","inner");
                $this->db->join("catergory as t","c.category_id = t.category_id","inner");
                $this->db->where("ss.sub_sub_subcategory_id",$this->input->post("sssubcat"));
                $qu     =   $this->db->get()->row_array();
                return ucfirst($qu['sub_sub_subcategory_name']);
        }
        public function update(){
                $dt     =    array(
                                "sub_subcategory_id"           =>      $this->input->post("scat_name"),
                                "sub_sub_subcategory_name"      =>      strtolower($this->input->post("sscat_name")),
                        );
                $this->db->update("sub_sub_subcategory",$dt,array("sub_sub_subcategory_id" => $this->input->post("scat")));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function  delete($uri){
                $this->db->delete("sub_sub_subcategory",array("sub_sub_subcategory_id" => $uri));
        }
}
?>