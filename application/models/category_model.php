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

        public function free_pkg_list(){
            $this->db->select("*");
            $this->db->from("pkg_duration_list");
            $this->db->where("is_top", 1);
            $this->db->where("pkg_dur_id", 1);
            return $this->db->get()->result();
        }

        public function free_pkg_list_low(){
            $this->db->select("*");
            $this->db->from("pkg_duration_list");
            $this->db->where("is_top", 0);
            $this->db->where("pkg_dur_id", 4);
            return $this->db->get()->result();
        }

        public function gold_pkg_list(){
            $this->db->select("*");
            $this->db->from("pkg_duration_list");
            $this->db->where("is_top", 1);
            $this->db->where("pkg_dur_id", 2);
            return $this->db->get()->result();
        }
        public function gold_pkg_list_low(){
            $this->db->select("*");
            $this->db->from("pkg_duration_list");
            $this->db->where("is_top", 0);
            $this->db->where("pkg_dur_id", 5);
            return $this->db->get()->result();
        }
        public function ptm_pkg_list(){
            $this->db->select("*");
            $this->db->from("pkg_duration_list");
            $this->db->where("is_top", 1);
            $this->db->where("pkg_dur_id", 3);
            return $this->db->get()->result();
        }
        public function ptm_pkg_list_low(){
            $this->db->select("*");
            $this->db->from("pkg_duration_list");
            $this->db->where("is_top", 0);
            $this->db->where("pkg_dur_id", 6);
            return $this->db->get()->result();
        }

        /*urgent-label list*/
         public function urgentlabel1(){
            $this->db->select("*");
            $this->db->from("urgent_pkg_label");
            $this->db->where("is_top_cat", 1);
            $this->db->where("u_pkg_id", 1);
            return $this->db->get()->result();
        }

        public function urgentlabel_low1(){
            $this->db->select("*");
            $this->db->from("urgent_pkg_label");
            $this->db->where("is_top_cat",0);
            $this->db->where("u_pkg_id", 4);
            return $this->db->get()->result();
        }
        public function urgentlabel2(){
            $this->db->select("*");
            $this->db->from("urgent_pkg_label");
            $this->db->where("is_top_cat", 1);
            $this->db->where("u_pkg_id", 2);
            return $this->db->get()->result();
        }
        public function urgentlabel_low2(){
            $this->db->select("*");
            $this->db->from("urgent_pkg_label");
            $this->db->where("is_top_cat", 0);
            $this->db->where("u_pkg_id", 5);
            return $this->db->get()->result();
        }
        public function urgentlabel3(){
            $this->db->select("*");
            $this->db->from("urgent_pkg_label");
            $this->db->where("is_top_cat", 1);
            $this->db->where("u_pkg_id", 3);
            return $this->db->get()->result();
        }
        public function urgentlabel_low3(){
            $this->db->select("*");
            $this->db->from("urgent_pkg_label");
            $this->db->where("is_top_cat", 0);
            $this->db->where("u_pkg_id", 6);
            return $this->db->get()->result();
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

        public function jobs_details(){
            $rs = $this->db->query("SELECT * FROM `sub_category` WHERE `category_id` = 1");
            return $rs->result_array();
        }

        /*ezone category*/
        /*phone and tablets*/
        public function ezone_phones(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 59");
            return $rs->result_array();
        }

        /*home appliances*/
        public function ezone_home(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 60");
            return $rs->result_array();
        }

        /*small appliances*/
        public function ezone_small(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 61");
            return $rs->result_array();
        }

        /*small appliances*/
        public function ezone_laptops(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 62");
            return $rs->result_array();
        }

        /*accessories*/
        public function ezone_accesories(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 63");
            return $rs->result_array();
        }

        /*person care*/
        public function ezone_pcare(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 64");
            return $rs->result_array();
        }

        /*person care*/
        public function ezone_entertainment(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 65");
            return $rs->result_array();
        }

        /*person care*/
        public function ezone_photo(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 66");
            return $rs->result_array();
        }

        /*kitchen and home*/
        /*kitchen essentials*/
        public function kitchen_essentials(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 67");
            return $rs->result_array();
        }

        /*home essentials*/
        public function kitchen_home(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 68");
            return $rs->result_array();
        }

        /*kitchen decor*/
        public function kitchen_decor(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 69");
            return $rs->result_array();
        }
		public function get_packages_details(){
            $rs = $this->db->query("SELECT * FROM pkg_duration_list where pkg_dur_id != 0");
            return $rs->result();
        }
		public function get_pkg($pkg_id){
            $rs = $this->db->query("SELECT * FROM pkg_duration_list where pkg_dur_id = '".$pkg_id."'");
            return $rs->row();
        }
		public function insert_new_pkg_details(){
			if($this->input->post('is_top_cat')==1)
				$is_cat = 1;
			else
				$is_cat = 0;
			
			$info=array(
					'pkg_dur_name'		=>	$this->input->post('pkg_name'),
					'dur_days'			=>	$this->input->post('pkg_dur'),
					'img_count'			=>	$this->input->post('img_count'),
					'bump_home'			=>	$this->input->post('bump_home'),
					'bump_search'		=>	$this->input->post('bump_search'),
					// 'cost_euro'			=>	$this->input->post('euro_price'),
					'cost_pound'		=>	$this->input->post('pound_price'),
					'is_top'			=>	$is_cat,
					'added_by'			=>	$this->session->userdata('login_id'),
					'created_on'		=>	date("Y-m-d H:i:s"),
					'status'			=>	1
					);
					//echo "<pre>";print_r($info );echo "</pre>";
			$ins_status = $this->db->insert('pkg_duration_list',$info);
			//echo $this->db->last_query();exit;
			return $ins_status;
        }
		public function update_pkg_details(){
			if($this->input->post('is_top_cat')==1)
				$is_cat = 1;
			else
				$is_cat = 0;
			
			$info=array(
					'pkg_dur_name'		=>	$this->input->post('pkg_name'),
					'dur_days'			=>	$this->input->post('pkg_dur'),
					'img_count'			=>	$this->input->post('img_count'),
					'bump_home'			=>	$this->input->post('bump_home'),
					'bump_search'		=>	$this->input->post('bump_search'),
					// 'cost_euro'			=>	$this->input->post('euro_price'),
					'cost_pound'		=>	$this->input->post('pound_price'),
					'likes_count'		=>	$this->input->post('like_count'),
					'is_top'			=>	$is_cat,
					'added_by'			=>	$this->session->userdata('login_id'),
					'last_update_on'	=>	date("Y-m-d H:i:s"),
					'status'			=>	$this->input->post('pkg_status')
			);
					$this->db->where('pkg_dur_id',$this->input->post('pkg_dur_id'));
				$update_status = $this->db->update('pkg_duration_list',$info);
			//echo $this->db->last_query();exit;
			return $update_status;
        }
		public function get_urg_label(){
            $rs = $this->db->query("SELECT * FROM urgent_pkg_label");
            return $rs->result();
        }
		public function insert_urg_label_details(){
			if($this->input->post('is_top_cat')==1)
				$is_top = 1;
			else
				$is_top = 0;
			
			$info=array(
					'u_pkg_name'		=>	$this->input->post('urg_name'),
					'u_pkg_days'			=>	$this->input->post('urg_dur'),
					'u_pkg_euro_cost'			=>	$this->input->post('euro_price'),
					'u_pkg__pound_cost'		=>	$this->input->post('pound_price'),
					'is_top_cat'			=>	$is_top,
					'added_by'			=>	$this->session->userdata('login_id'),
					'added_on'			=>	date("Y-m-d H:i:s"),
					'status'			=>	1
					);
			$ins_status = $this->db->insert('urgent_pkg_label',$info);
			return $ins_status;
        }
		public function get_urgLabel($urg_id){
            $rs = $this->db->query("SELECT * FROM urgent_pkg_label where u_pkg_id = '".$urg_id."'");
            return $rs->row();
        }
		
		public function update_urg_label_details(){
			if($this->input->post('is_top_cat')==1)
				$is_top = 1;
			else
				$is_top = 0;
			
			$info=array(
					'u_pkg_name'			=>	$this->input->post('urg_name'),
					'u_pkg_days'			=>	$this->input->post('urg_dur'),
					'u_pkg_euro_cost'		=>	$this->input->post('euro_price'),
					'u_pkg__pound_cost'		=>	$this->input->post('pound_price'),
					'is_top_cat'			=>	$is_top,
					'updated_by'			=>	$this->session->userdata('login_id'),
					'updated_on'			=>	date("Y-m-d H:i:s"),
					'status'				=>	$this->input->post('urg_status')
			);
			$this->db->where('u_pkg_id',$this->input->post('u_pkg_id'));
			$update_status = $this->db->update('urgent_pkg_label',$info);
			// echo $this->db->last_query();exit;
			return $update_status;
        }
		public function get_managed_modules(){
			$staff_id = $this->uri->segment(3);
            $rs = $this->db->query("SELECT * FROM manage_module where staff_id = '".$staff_id."'");
			return $rs->row();
        }
		function update_manage_modules($sel_cats){
			if($this->input->post('m_manage_id')){
				$m_manage_id = $this->input->post('m_manage_id');
				$update_module	= array(
						'cat_ids'		=>		$sel_cats,
						'update_by'		=>		$this->session->userdata('login_id'),
						'updated_on'	=>		date("Y-m-d H:i:s"),
						'status'		=>		$this->input->post('status')
				);
				$this->db->where('m_manage_id',$m_manage_id);
				$update_status = $this->db->update('manage_module',$update_module);
				if($update_status)
					return $update_status;
				else return false;
			}
			else{
				$ins	= array(
							'staff_id'		=>		$this->input->post('staff_id'),
							'cat_ids'		=>		$sel_cats,
							'added_by'		=>		$this->session->userdata('login_id'),
							'added_on'		=>		date("Y-m-d H:i:s"),
							'status'		=>		$this->input->post('status'),
				);
				$ins_status	=	$this->db->insert('manage_module',$ins);
				if($ins_status)
					return $ins_status;
				else return false;
			}

		}

        public function cars_sub_cat_list(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = '".$this->input->post('motor_sub')."'");
            return $rs->result_array();
        }

        public function bikes_sub_cat_list(){
            $rs = $this->db->query("SELECT * FROM `sub_subcategory` WHERE `sub_category_id` = 13");
            return $rs->result_array();
        }

        /*news ads count*/
        public function newads_cnt(){
            $this->db->select();
            $this->db->from("postad");
            $this->db->where("ad_status", 0);
            $this->db->where("payment_status", 1);
            return $this->db->count_all_results();
        }
        /*pending ads count*/
        public function pendingads_cnt(){
            $this->db->select();
            $this->db->from("postad");
            $this->db->where("ad_status", 2);
            $this->db->where("payment_status", 1);
            return $this->db->count_all_results();
        }
        /*rejecting ads count*/
        public function rejectads_cnt(){
            $this->db->select();
            $this->db->from("postad");
            $this->db->where("ad_status", 4);
            $this->db->where("payment_status", 1);
            return $this->db->count_all_results();
        }
        /*onhold ads count*/
        public function onhold_cnt(){
            $this->db->select();
            $this->db->from("postad");
            $this->db->where("ad_status", 3);
            $this->db->where("payment_status", 1);
            return $this->db->count_all_results();
        }
        /*approved ads count*/
        public function active_cnt(){
            $this->db->select();
            $this->db->from("postad");
            $this->db->where("ad_status", 1);
            $this->db->where("payment_status", 1);
            return $this->db->count_all_results();
        }
        /*feedback ads*/
        public function fdkads(){
            $this->db->select();
            $this->db->from("feedbackforads");
            $this->db->where("status", 1);
            return $this->db->count_all_results();
        }
         /*report ads*/
        public function rptads(){
            $this->db->select();
            $this->db->from("reportforads");
            $this->db->where("status", 1);
            return $this->db->count_all_results();
        }
}
?>



















