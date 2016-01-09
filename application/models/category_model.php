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


        /*pet category*/
        public function pets_sub_cat(){
            $rs = $this->db->query("SELECT * FROM `sub_category` WHERE `sub_category`.`sub_category_id` NOT IN(SELECT sub_category.`sub_category_id` FROM `sub_category`, `sub_subcategory` WHERE
sub_category.`sub_category_id` = sub_subcategory.`sub_category_id` AND sub_category.`category_id` = 5
GROUP BY sub_subcategory.`sub_category_id`) ");
            return $rs->result_array();
        }

        /*pets big animals*/
         public function pets_big_animal(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 5");
            return $rs->result_array();
        }

        /*services professional sub-category*/
         public function services_sub_prof(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 9");
            return $rs->result_array();
        }

         /*services popular sub-category*/
         public function services_sub_pop(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 10");
            return $rs->result_array();
        }

         /*motor point for cars sub-category*/
         public function cars_sub_cat_fst(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 12 LIMIT 60");
            return $rs->result_array();
        }

         public function cars_sub_cat_sec(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 12 LIMIT 60, 118");
            return $rs->result_array();
        }



}
?>