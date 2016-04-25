<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Searchview extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
         public function index(){

                if ((time() - $this->session->userdata('saved_time')) > 5 ){
                   $this->session->unset_userdata('saved_time');
                   $this->session->unset_userdata('saved_msg');
                }
             if($this->input->get()){
                $this->session->unset_userdata('miles');
                $this->session->unset_userdata('s_cat_id');
                $this->session->unset_userdata('s_looking_search'); 
                $this->session->unset_userdata('s_search_sub'); 
                $this->session->unset_userdata('s_search_subsub'); 
                $this->session->unset_userdata('s_dealurgent');
                $this->session->set_userdata('s_seller_deals');
                $this->session->unset_userdata('s_search_bustype');
                $this->session->unset_userdata('s_dealtitle');
                $this->session->unset_userdata('s_dealprice');
                $this->session->unset_userdata('s_recentdays');
                $this->session->unset_userdata('s_location');
                $this->session->unset_userdata('s_latt');
                $this->session->unset_userdata('s_longg');
                /*motor point starts*/
                $this->session->unset_userdata('car_van_bus');
                $this->session->unset_userdata('motor_hm');
                $this->session->unset_userdata('bikes_sub');
                $this->session->unset_userdata('plant_farm');
                $this->session->unset_userdata('boats_sub');
                if($this->input->get('car_van_bus')){
                     $this->session->set_userdata('car_van_bus',$this->input->get('car_van_bus'));
                }
                else{
                    $this->session->set_userdata('car_van_bus',array());
                }
                if($this->input->get('motor_hm')){
                     $this->session->set_userdata('motor_hm',$this->input->get('motor_hm'));
                }
                else{
                    $this->session->set_userdata('motor_hm',array());
                }
                if($this->input->get('bikes_sub')){
                     $this->session->set_userdata('bikes_sub',$this->input->get('bikes_sub'));
                }
                else{
                    $this->session->set_userdata('bikes_sub',array());
                }
                if($this->input->get('plant_farm')){
                     $this->session->set_userdata('plant_farm',$this->input->get('plant_farm'));
                }
                else{
                    $this->session->set_userdata('plant_farm',array());
                }
                if($this->input->get('boats_sub')){
                     $this->session->set_userdata('boats_sub',$this->input->get('boats_sub'));
                }
                else{
                    $this->session->set_userdata('boats_sub',array());
                }
                /*motor point ends*/
                if($this->input->get('miles')){
                     $this->session->set_userdata('miles',$this->input->get('miles'));
                }
                if($this->input->get('category_name')){
                     $this->session->set_userdata('s_cat_id',$this->input->get('category_name'));
                }
                if($this->input->get('looking_search')){
                       $this->session->set_userdata('s_looking_search',$this->input->get('looking_search'));
                }else{
                     $this->session->set_userdata('s_looking_search','');
                }
                if($this->input->get('search_sub')){
                     $this->session->set_userdata('s_search_sub',$this->input->get('search_sub'));
                }
                else{
                    $this->session->set_userdata('s_search_sub',array());
                }
                if($this->input->get('search_subsub')){
                     $this->session->set_userdata('s_search_subsub',$this->input->get('search_subsub'));
                }
                else{
                    $this->session->set_userdata('s_search_subsub',array());
                }

                if($this->input->get('seller_deals')){
                     $this->session->set_userdata('s_seller_deals',$this->input->get('seller_deals'));
                }
                else{
                    $this->session->set_userdata('s_seller_deals',array());
                }

                 if($this->input->get('dealurgent')){
                       $this->session->set_userdata('s_dealurgent' ,$this->input->get('dealurgent'));
                }else{
                     $this->session->set_userdata('s_dealurgent',array());
                }
                 if($this->input->get('search_bustype')){
                       $this->session->set_userdata('s_search_bustype',$this->input->get('search_bustype'));
                }else{
                     $this->session->set_userdata('s_search_bustype','all');
                }
                if($this->input->get('dealtitle_sort')){
                       $this->session->set_userdata('s_dealtitle',$this->input->get('dealtitle_sort'));
                }else{
                     $this->session->set_userdata('s_dealtitle','Any');
                }
                if($this->input->get('price_sort')){
                       $this->session->set_userdata('s_dealprice',$this->input->get('price_sort'));
                }else{
                     $this->session->set_userdata('s_dealprice','Any');
                }
                if($this->input->get('recentdays_sort')){
                       $this->session->set_userdata('s_recentdays',$this->input->get('recentdays_sort'));
                }else{
                     $this->session->set_userdata('s_recentdays','Any');
                }
                
                if($this->input->get('list-autocomplete')){
                    $this->session->set_userdata('s_location',$this->input->get('list-autocomplete'));
                }else{
                    $this->session->set_userdata('s_location','');
                }
                if($this->input->get('longg')){
                       $this->session->set_userdata('s_longg',$this->input->get('longg'));
                }else{
                     $this->session->set_userdata('s_longg','');
                }
            }

            $config = array();
            $config['base_url'] = base_url().'searchview/index';
            $config['total_rows'] = count($this->hotdealsearch_model->count_searchviewsearch());
            $config['per_page'] = 30;
             $config['next_link'] = 'Next';
              $config['prev_link'] = 'Previous';
            $config['full_tag_open'] ='<div id="pagination" style="color:red;border:2px solid:blue">';
            $config['full_tag_close'] ='</div>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $search_option = array(
                'limit' =>$config['per_page'],
                'start' =>$page
                );

                if ($this->session->userdata('login_id') == '') {
                    $login_status = 'no';
                    $login = '';
                    $favourite_list = array();
                }
                else{
                    $login_status = 'yes';
                    $login = $this->session->userdata('login_id');
                    $favourite_list = $this->classifed_model->favourite_list();
                }
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
             $rs = $this->hotdealsearch_model->searchviewsearch($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
             $this->session->set_userdata("saved_search", $this->current_url());
              $result   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "searchview");
            $result['searchview_result'] = $rs;
            $public_adview = $this->classifed_model->publicads_ezone();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid' "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            $result['paging_links'] = $this->pagination->create_links();
            $result['show_all'] = $this->classifed_model->show_all();
                /*jobs sub*/
               $result['subcat_cnt'] = $this->hotdealsearch_model->subcat_searchdeals();
               if ($this->session->userdata('s_cat_id') == 1) {
                 $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_jobs();
               }
               else if ($this->session->userdata('s_cat_id') == 2) {
                 $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_services();
               }
               else if ($this->session->userdata('s_cat_id') == 3) {
                 $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_motors();
               }
               else if ($this->session->userdata('s_cat_id') == 4) {
                 $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_property();
               }
               else if ($this->session->userdata('s_cat_id') == 5) {
                 $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_pets();
               }
               else if ($this->session->userdata('s_cat_id') == 6) {
                 $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_clothstyle();
               }
               else if ($this->session->userdata('s_cat_id') == 7) {
                 $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_kitchen();
               }
               else if ($this->session->userdata('s_cat_id') == 8) {
                 $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_ezone();
               }
               /*services sub sub*/
               $result['subcat_prof'] = $this->hotdealsearch_model->subcat_prof_searchdeals();
               $result['subcat_pop'] = $this->hotdealsearch_model->subcat_pop_searchdeals();
               /*find a property sub sub*/
               $result['subcat_resi'] = $this->hotdealsearch_model->subcat_resi_searchdeals();
               $result['subcat_comm'] = $this->hotdealsearch_model->subcat_comm_searchdeals();
               /*pets sub sub*/
               $result['subcat_pets'] = $this->hotdealsearch_model->subcat_pets_searchdeals();
               $result['subcat_bigpets'] = $this->hotdealsearch_model->subcat_bigpets_searchdeals();
               $result['subcat_smallpets'] = $this->hotdealsearch_model->subcat_smallpets_searchdeals();
               $result['subcat_petsaccess'] = $this->hotdealsearch_model->subcat_petsaccess_searchdeals();
               /*cloths and life styles*/
               $result['subcat_women'] = $this->hotdealsearch_model->subcat_women_searchdeals();
               $result['subcat_men'] = $this->hotdealsearch_model->subcat_men_searchdeals();
               $result['subcat_boy'] = $this->hotdealsearch_model->subcat_boy_searchdeals();
               $result['subcat_girl'] = $this->hotdealsearch_model->subcat_girl_searchdeals();
               $result['subcat_bboy'] = $this->hotdealsearch_model->subcat_bboy_searchdeals();
               $result['subcat_bgirl'] = $this->hotdealsearch_model->subcat_bgirl_searchdeals();
               /*home kitchen*/
               $result['subcat_kitchen'] = $this->hotdealsearch_model->subcat_kitchen_searchdeals();
               $result['subcat_home'] = $this->hotdealsearch_model->subcat_home_searchdeals();
               $result['subcat_decor'] = $this->hotdealsearch_model->subcat_decor_searchdeals();
               /*ezone*/
               $result['subcat_phone'] = $this->hotdealsearch_model->subcat_phone_searchdeals();
               $result['subcat_homeapp'] = $this->hotdealsearch_model->subcat_homeapp_searchdeals();
               $result['subcat_smallapp'] = $this->hotdealsearch_model->subcat_smallapp_searchdeals();
               $result['subcat_lappy'] = $this->hotdealsearch_model->subcat_lappy_searchdeals();
               $result['subcat_access'] = $this->hotdealsearch_model->subcat_access_searchdeals();
               $result['subcat_pcare'] = $this->hotdealsearch_model->subcat_pcare_searchdeals();
               $result['subcat_henter'] = $this->hotdealsearch_model->subcat_henter_searchdeals();
               $result['subcat_pgraphy'] = $this->hotdealsearch_model->subcat_pgraphy_searchdeals();


               /*motor sub sub*/
               $result['subcat_cars'] = $this->hotdealsearch_model->subcat_cars_searchdeals();
               $result['subcat_bikes'] = $this->hotdealsearch_model->subcat_bikes_searchdeals();
               $result['subcat_motorhomes'] = $this->hotdealsearch_model->subcat_motorhomes_searchdeals();
               $result['subcat_vans'] = $this->hotdealsearch_model->subcat_vans_searchdeals();
               $result['subcat_buses'] = $this->hotdealsearch_model->subcat_buses_searchdeals();
               $result['subcat_plant'] = $this->hotdealsearch_model->subcat_plant_searchdeals();
               $result['subcat_farming'] = $this->hotdealsearch_model->subcat_farming_searchdeals();
               $result['subcat_boats'] = $this->hotdealsearch_model->subcat_boats_searchdeals();

               /*business and consumer count*/
                $result['busconcount'] = $this->hotdealsearch_model->busconcount_search();
                $result['login_id'] = $this->session->userdata('login_id');
                 /*seller and needed count for pets*/
                // $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_search();
                 /*packages count*/
                $result['deals_pck'] = $this->hotdealsearch_model->deals_pck_search();
            $this->load->view("classified_layout/inner_template",$result);
        }

        public function current_url()
        {
            $CI =& get_instance();

            $url = $CI->config->site_url($CI->uri->uri_string());
            return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
        }

        public function addsave_search(){
            $exist = $this->classifed_model->addexist_search(); 
            if ($exist > 0) {
                $this->session->set_flashdata("err", 'already saved the search');
                echo 0;
            }
            else{
              $save = $this->classifed_model->addsaved_search();
              if ($save == 1) {
                  $this->session->set_userdata('saved_msg', 'Your search is saved');
                  $this->session->set_userdata('saved_time', time());
                  echo 1;
              }
            }

            /*$save = $this->classifed_model->addsaved_search();
            if ($save == 1) {
                $this->session->set_userdata('saved_msg', 'Your search is saved');
                $this->session->set_userdata('saved_time', time());
                echo 1;
            }
            else{
                echo 0;
            }*/
        }

        public function deletesave_search(){
            $delete = $this->classifed_model->deletesave_search();
            if ($delete == 1) {
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function subscribe_news(){
            $emailexist = $this->classifed_model->subscribe_news();
            if ($emailexist == 1) {
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function search_exists(){
          $exist = $this->classifed_model->search_exists();
          if ($exist > 0) {
            echo 1;
          }
          else{
            echo 0;
          }
        }
        
}

