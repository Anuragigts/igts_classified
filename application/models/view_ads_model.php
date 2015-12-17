<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class View_ads_model extends CI_Model{
        public function  get_cat($uri,$min,$max){
                $this->db->select("c.*,count(`a`.`category_id`) as coun_ant");
                $this->db->from("catergory as c");
                $this->db->join("advertisement as a","a.category_id  = c.category_id","LEFT");
                if($min != ""){
                        $this->db->where("a.price >",$min);
                }if($max != ""){
                        $this->db->where("a.price <",$max);
                }
                //$this->db->where("a.ad_status","1");
                if($uri == ""){
                        $this->db->group_by("a.category_id");
                        $qu = $this->db->get()->result();
                }else{
                        $this->db->where("a.category_id",$uri);
                        $qu = $this->db->get()->row_array();
                }
                
                //echo $this->db->last_query();exit;
                return $qu;                
        }
        public function  get_subcat($uri,$uri4,$min,$max){
                $this->db->select("c.*,s.category_name,count(`a`.`sub_cat_id`) as coun_ants");
                $this->db->from("sub_category as c");
                $this->db->join("advertisement as a","a.sub_cat_id  = c.sub_category_id","LEFT");
                $this->db->join("catergory as s","s.category_id  = c.category_id","LEFT");
                $this->db->where("s.category_id",$uri);
                if($min != ""){
                        $this->db->where("a.price >",$min);
                }if($max != ""){
                        $this->db->where("a.price <",$max);
                }
                //$this->db->where("a.ad_status","1");
                if($uri4 == ""){
                        $this->db->group_by("a.sub_cat_id");
                        $qu = $this->db->get()->result();
                }else{
                        $this->db->where("c.sub_category_id",$uri4);
                        $qu = $this->db->get()->row_array();
                }
                //echo $this->db->last_query();exit;
                return $qu;                
        }
        public function  get_ssubcat($uri3,$uri4,$uri5,$min,$max){
                $this->db->select("c.*,s.sub_category_name,count(`a`.`sub_scat_id`) as coun_ants2");
                $this->db->from("sub_subcategory as c");
                $this->db->join("advertisement as a","a.sub_scat_id  = c.sub_subcategory_id","LEFT");
                $this->db->join("sub_category as s","s.sub_category_id  = c.sub_category_id","LEFT");
                $this->db->join("catergory as t","t.category_id  = s.category_id","LEFT");
                $this->db->where("a.category_id",$uri3);
                $this->db->where("a.sub_cat_id",$uri4);
                if($min != ""){
                        $this->db->where("a.price >",$min);
                }if($max != ""){
                        $this->db->where("a.price <",$max);
                }
                //$this->db->where("a.ad_status","1");
                if($uri5 == ""){
                        $this->db->group_by("a.sub_scat_id");
                        $qu = $this->db->get()->result();
                }else{
                        $this->db->where("c.sub_subcategory_id",$uri5);
                        $qu = $this->db->get()->row_array();
                }
                //echo $this->db->last_query();exit;
                return $qu;                
        }
        public function img_details($uri){
                $im     =   $this->db->get_where("ad_img",array("status"    =>  1,  "ad_id" =>  $uri));
                //echo $this->db->last_query();exit;
                return $im->result();
        }
        public function ad_details($uri){
                $this->db->select("c.*,m.*,s.*,t.*,a.*,o.*,l.*,p.*");
                $this->db->from("sub_subcategory as c");
                $this->db->join("advertisement as a","a.sub_scat_id  = c.sub_subcategory_id","LEFT");
                $this->db->join("address as m","a.addr_id  = m.address_id","LEFT");
                $this->db->join("sub_category as s","s.sub_category_id  = c.sub_category_id","LEFT");
                $this->db->join("catergory as t","t.category_id  = s.category_id","LEFT");
                $this->db->join("countries as o","o.Country_id  = m.country","LEFT");
                $this->db->join("login  as l","l.login_id  = a.login_id","INNER");
                $this->db->join("profile as p","p.login_id  = a.login_id","LEFT");
                $this->db->where("a.ad_id",$uri);
                return $this->db->get()->row_array();
        }
}
?>