<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Category_model extends CI_Model{
        public function create(){
                $dt     =   array(
                        "category_name"    => strtolower($this->input->post("cat_name")),
                        "category_status"  =>  1
                );
                $this->db->insert("catergory",$dt);
                if($this->db->insert_id() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function view(){
                $this->db->order_by("category_id","desc");
                return $this->db->get("catergory")->result();
        }
        public function categoryActDea(){
                $adt =  array(
                        "category_status"   =>  $this->input->post("status")
                );
                $this->db->update("catergory",$adt,array("category_id" => $this->input->post("category")));
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function edcategory(){
                $vp = $this->db->get_where("catergory",array("category_id" => $this->input->post("category")))->row_array();
                return  ucfirst($vp["category_name"]);
        }
        public function update(){
            $ct     =   array(
                                "category_name" => strtolower($this->input->post("ct"))
                        );
            $this->db->update("catergory",$ct,array("category_id" => $this->input->post("category")));
            if($this->db->affected_rows() > 0){
                    return 1;
            }else{
                    return 0;
            }
        }
        public function delete($uri){
                $this->db->delete('sub_category', array('category_id' => $uri)); 
                $this->db->delete('catergory', array('category_id' => $uri)); 
        }
}
?>