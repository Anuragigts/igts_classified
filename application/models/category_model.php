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
            $rs = $this->db->query("SELECT * FROM `sub_category` WHERE `sub_category`.`sub_category_id` NOT IN(SELECT sub_subcategory.`sub_category_id` FROM `sub_category`, `sub_subcategory` WHERE
sub_category.`sub_category_id` = sub_subcategory.`sub_category_id` GROUP BY sub_subcategory.`sub_category_id`) AND sub_category.`category_id` = 5 ");
            return $rs->result_array();
        }

        /*pets big animals*/
         public function pets_big_animal(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 5");
            return $rs->result_array();
        }

         /*pets small animals*/
         public function pets_small_animal(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 6");
            return $rs->result_array();
        }

        /*pets accessories animals*/
         public function pets_accessories(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 7");
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


        /*cloths and life styles*/
        /*women*/
        public function cloths_women(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 20");
            return $rs->result_array();
        }

        /*men*/
        public function cloths_men(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 21");
            return $rs->result_array();
        }

        /*boy*/
        public function cloths_boy(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 22");
            return $rs->result_array();
        }

        /*girls*/
        public function cloths_girls(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 23");
            return $rs->result_array();
        }

        /*baby boy*/
        public function cloths_baby_boy(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 24");
            return $rs->result_array();
        }

        /*baby girls*/
        public function cloths_baby_girls(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 25");
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

        /*motor point for bikes & scooters sub-category*/
         public function bikes_sub_cat_fst(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 13 LIMIT 60");
            return $rs->result_array();
        }

         public function bikes_sub_cat_sec(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 13 LIMIT 60, 94");
            return $rs->result_array();
        }

        /*motor point for motorhomes & caravans sub-category*/
         public function caravans_sub_cat_fst(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 14 ");
            return $rs->result_array();
        }

        /*motor point for vans, trucks, SUV's sub-category*/
         public function vans_sub_cat_fst(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 15 ");
            return $rs->result_array();
        }

        /*motor point for Coaches, buses sub-category*/
         public function coach_sub_cat_fst(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 16 ");
            return $rs->result_array();
        }

        /*motor point for plant machinery sub-category*/
                    /*Tractor Unit */
         public function tractor_sub_cat_fst(){
            $rs = $this->db->query("SELECT sub_subcategory.`sub_category_id`, sub_sub_subcategory.`sub_subcategory_id`,
            sub_sub_subcategory.`sub_sub_subcategory_id`, sub_sub_subcategory.`sub_sub_subcategory_name` FROM `sub_subcategory`, `sub_sub_subcategory` 
            WHERE sub_subcategory.`sub_subcategory_id` = sub_sub_subcategory.`sub_subcategory_id`
            AND sub_sub_subcategory.`sub_subcategory_id` = 315");
            return $rs->result_array();
        }

                    /*Rigid Trucks*/
         public function rigid_sub_cat_fst(){
            $rs = $this->db->query("SELECT sub_subcategory.`sub_category_id`, sub_sub_subcategory.`sub_subcategory_id`,
            sub_sub_subcategory.`sub_sub_subcategory_id`, sub_sub_subcategory.`sub_sub_subcategory_name` FROM `sub_subcategory`, `sub_sub_subcategory` 
            WHERE sub_subcategory.`sub_subcategory_id` = sub_sub_subcategory.`sub_subcategory_id`
            AND sub_sub_subcategory.`sub_subcategory_id` = 316");
            return $rs->result_array();
        }

                  /*Trailers Trucks*/
         public function trailer_sub_cat_fst(){
            $rs = $this->db->query("SELECT sub_subcategory.`sub_category_id`, sub_sub_subcategory.`sub_subcategory_id`,
            sub_sub_subcategory.`sub_sub_subcategory_id`, sub_sub_subcategory.`sub_sub_subcategory_name` FROM `sub_subcategory`, `sub_sub_subcategory` 
            WHERE sub_subcategory.`sub_subcategory_id` = sub_sub_subcategory.`sub_subcategory_id`
            AND sub_sub_subcategory.`sub_subcategory_id` = 317");
            return $rs->result_array();
        }

            /*Plant Equipment*/
         public function equip_sub_cat_fst(){
            $rs = $this->db->query("SELECT sub_subcategory.`sub_category_id`, sub_sub_subcategory.`sub_subcategory_id`,
            sub_sub_subcategory.`sub_sub_subcategory_id`, sub_sub_subcategory.`sub_sub_subcategory_name` FROM `sub_subcategory`, `sub_sub_subcategory` 
            WHERE sub_subcategory.`sub_subcategory_id` = sub_sub_subcategory.`sub_subcategory_id`
            AND sub_sub_subcategory.`sub_subcategory_id` = 318");
            return $rs->result_array();
        }

         /*farming vehicles*/
         public function farm_sub_cat_fst(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 18 ");
            return $rs->result_array();
        }

         /*motor point for boats sub-category*/
         public function boat_sub_cat_fst(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 19 ");
            return $rs->result_array();
        }

        /*package name*/
        public function package_name(){
            $lid = $this->session->userdata("login_id");
    return @mysql_result(mysql_query("SELECT signup_type FROM `signup`, `login` WHERE signup.`sid` = login.`signupid` AND login.`login_id` = '$lid' "), 0, 'signup_type');
        }

        /*property for residential*/
        public function property_residential(){
        $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE sub_category_id = 11 ");
            return $rs->result_array();
        }

        /*property for commercial*/
        public function property_commercial(){
        $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE sub_category_id = 26 ");
            return $rs->result_array();
        }

}
?>