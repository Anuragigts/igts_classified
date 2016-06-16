<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Deal_page extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("hotdealsearch_model");
                $this->load->model("classifed_model");
                $this->load->library('pagination');
               }
        public function index(){
          if ($this->session->userdata('login_id')) {
            $saved_searchexist = $this->classifed_model->saved_searchexist($this->session->userdata('login_id'));
          }
          else{
            $saved_searchexist = array();
          }
         
           if ((time() - $this->session->userdata('saved_time1')) > 5 ){
                   $this->session->unset_userdata('saved_time1');
                   $this->session->unset_userdata('saved_msg1');
                }
          if ($this->input->get()) {
            $this->session->unset_userdata('search_subsubsub');
            $this->session->unset_userdata('access_sub');
            $this->session->unset_userdata('hotlaptop_sub');
            $this->session->unset_userdata('accessories');
            $this->session->unset_userdata('search_proptype');
            $this->session->unset_userdata('search_resisub');
            $this->session->unset_userdata('search_commsub');
            $this->session->unset_userdata('resi_prop');
            $this->session->unset_userdata('comm_prop');
            $this->session->unset_userdata('search_acctype');

          $this->session->unset_userdata('cat_id');
          $this->session->unset_userdata('seller_id');
          $this->session->unset_userdata('bus_id'); 
          $this->session->unset_userdata('search_sub'); 
          $this->session->unset_userdata('search_subsub'); 
          $this->session->unset_userdata('search_bustype');
          $this->session->unset_userdata('dealurgent');
          $this->session->unset_userdata('dealtitle');
          $this->session->unset_userdata('dealprice');
          $this->session->unset_userdata('recentdays');
          $this->session->unset_userdata('location');
          $this->session->unset_userdata('latt');
          $this->session->unset_userdata('longg');

          /*motor point starts*/
            $this->session->unset_userdata('car_van_bus');
            $this->session->unset_userdata('motor_hm');
            $this->session->unset_userdata('bikes_sub');
            $this->session->unset_userdata('plant_farm');
            $this->session->unset_userdata('boats_sub');
            if($this->input->get('search_subsubsub')){
                       $this->session->set_userdata('search_subsubsub',$this->input->get('search_subsubsub'));
                }else{
                     $this->session->set_userdata('search_subsubsub',array());
                }
            if($this->input->get('access_sub')){
                       $this->session->set_userdata('access_sub',$this->input->get('access_sub'));
                }else{
                     $this->session->set_userdata('access_sub',array());
                }
            if($this->input->get('search_acctype')){
                       $this->session->set_userdata('search_acctype',$this->input->get('search_acctype'));
                }else{
                     $this->session->set_userdata('search_acctype','all');
                }
            if($this->input->get('resi_prop')){
                       $this->session->set_userdata('resi_prop',$this->input->get('resi_prop'));
                }else{
                     $this->session->set_userdata('resi_prop',array());
                }
                if($this->input->get('comm_prop')){
                       $this->session->set_userdata('comm_prop',$this->input->get('comm_prop'));
                }else{
                     $this->session->set_userdata('comm_prop',array());
                }
                if($this->input->get('search_resisub')){
                       $this->session->set_userdata('search_resisub',$this->input->get('search_resisub'));
                }else{
                     $this->session->set_userdata('search_resisub','');
                }
                if($this->input->get('search_commsub')){
                       $this->session->set_userdata('search_commsub',$this->input->get('search_commsub'));
                }else{
                     $this->session->set_userdata('search_commsub','');
                }
                if($this->input->get('search_proptype')){
                       $this->session->set_userdata('search_proptype',$this->input->get('search_proptype'));
                }else{
                     $this->session->set_userdata('search_proptype','all');
                }
                if($this->input->get('accessories')){
                       $this->session->set_userdata('accessories',$this->input->get('accessories'));
                }else{
                     $this->session->set_userdata('accessories','');
                }

                if($this->input->get('hotlaptop_sub')){
                       $this->session->set_userdata('hotlaptop_sub',$this->input->get('hotlaptop_sub'));
                }else{
                     $this->session->set_userdata('hotlaptop_sub','');
                }


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
                    $this->session->set_userdata('boats_sub','');
                }
                /*motor point ends*/



            if($this->input->get('category_name')){
                 $this->session->set_userdata('cat_id',$this->input->get('category_name'));
            }
            else{
                $this->session->set_userdata('cat_id','all'); 
            }
            if($this->input->get('seller_deals')){
                 $this->session->set_userdata('seller_id',$this->input->get('seller_deals'));
            }
             else{
                $this->session->set_userdata('seller_id',array());
            }
            if($this->input->get('business_type')){
                 $this->session->set_userdata('bus_id',$this->input->get('business_type'));
            }else{
                $this->session->set_userdata('bus_id','all');
            }

            if($this->input->get('search_sub')){
                 $this->session->set_userdata('search_sub',$this->input->get('search_sub'));
            }
            else{
                $this->session->set_userdata('search_sub',array());
            }
             if($this->input->get('search_subsub')){
                   $this->session->set_userdata('search_subsub',$this->input->get('search_subsub'));
              }
              else{
                  $this->session->set_userdata('search_subsub',array());
              }

            if($this->input->get('dealtitle_sort')){
                       $this->session->set_userdata('dealtitle',$this->input->get('dealtitle_sort'));
              }else{
                   $this->session->set_userdata('dealtitle','Any');
              }
              if($this->input->get('dealurgent')){
                       $this->session->set_userdata('dealurgent' ,$this->input->get('dealurgent'));
                }else{
                     $this->session->set_userdata('dealurgent',array());
                }
              if($this->input->get('price_sort')){
                     $this->session->set_userdata('dealprice',$this->input->get('price_sort'));
              }else{
                   $this->session->set_userdata('dealprice','Any');
              }
              if($this->input->get('recentdays_sort')){
                     $this->session->set_userdata('recentdays',$this->input->get('recentdays_sort'));
              }else{
                   $this->session->set_userdata('recentdays','Any');
              }
              if ($this->input->get('list-autocomplete') != '' || $this->input->get('list-autocomplete') != '0'){
                   $this->session->set_userdata('location',$this->input->get('list-autocomplete'));
              }
              else{
                $this->session->set_userdata('location','');
              }
              
          }

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

          $config = array();
            $config['base_url'] = base_url().'deal_page/index';
            $config['total_rows'] = count($this->hotdealsearch_model->count_hotdeal_search());
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
              $result = $this->hotdealsearch_model->hotdeal_search($search_option);
              $category = $this->hotdealsearch_model->category();
              $public_adview = $this->classifed_model->publicads_service();
              $this->session->set_userdata("saved_search1", $this->current_url());
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deal_page",
                          'category' => $category,
                          'dealsresult' => $result,
                          'login_status' =>$login_status,
                        'login' =>$login,
                        'paging_links' =>$this->pagination->create_links(),
                        'favourite_list'=>$favourite_list,
                        "public_adview" => $public_adview,
                        "saved_searchexist"=>$saved_searchexist,
                        "onhotdeal" =>$this->session->userdata('onhotdeal')
                );
           /*business and consumer count for hot deals*/
          $data['busconcount'] = $this->hotdealsearch_model->busconcount_hotdeals();
          $data['sellercount'] = $this->hotdealsearch_model->sellercount_hotdeals();
          if ($this->session->userdata('cat_id') == 1) {
             $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneededhot_jobs();
           }
           else if ($this->session->userdata('cat_id') == 2) {
             $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneededhot_services();
           }
           else if ($this->session->userdata('cat_id') == 3) {
             $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneededhot_motors();
           }
           else if ($this->session->userdata('cat_id') == 4) {
             $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneededhot_property();
           }
           else if ($this->session->userdata('cat_id') == 5) {
             $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneededhot_pets();
           }
           else if ($this->session->userdata('cat_id') == 6) {
             $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneededhot_clothstyle();
           }
           else if ($this->session->userdata('cat_id') == 7) {
             $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneededhot_kitchen();
           }
           else if ($this->session->userdata('cat_id') == 8) {
             $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneededhot_ezone();
           }
           /*services sub sub*/
           $data['subcat_prof'] = $this->hotdealsearch_model->subcat_prof_hotdeals();
           $data['subcat_pop'] = $this->hotdealsearch_model->subcat_pop_hotdeals();

           /*jobs*/
          $data['subcat_cnt'] = $this->hotdealsearch_model->jobs_hotdeals();

          /*motor sub sub*/
         $data['subcat_cars'] = $this->hotdealsearch_model->subcat_cars_hotdeals();
         $data['subcat_bikes'] = $this->hotdealsearch_model->subcat_bikes_hotdeals();
         $data['subcat_motorhomes'] = $this->hotdealsearch_model->subcat_motorhomes_hotdeals();
         $data['subcat_vans'] = $this->hotdealsearch_model->subcat_vans_hotdeals();
         $data['subcat_buses'] = $this->hotdealsearch_model->subcat_buses_hotdeals();
         $data['subcat_plant'] = $this->hotdealsearch_model->subcat_plant_hotdeals();
         $data['subcat_farming'] = $this->hotdealsearch_model->subcat_farming_hotdeals();
         $data['subcat_boats'] = $this->hotdealsearch_model->subcat_boatscnt_hotdeals();
         $data['subcat_motoraccess'] = $this->hotdealsearch_model->subcat_motoraccess_hotdeals();
           /*find a property sub sub*/
         $data['cnt_findpropery'] = $this->hotdealsearch_model->cnt_findpropery_hotdeal();
         $data['subcat_resi'] = $this->hotdealsearch_model->subcat_resi_hotdeals();
         $data['subcat_comm'] = $this->hotdealsearch_model->subcat_comm_hotdeals();
         $data['resi_sub'] = $this->hotdealsearch_model->resi_sub_hotdeals();
         $data['comm_sub'] = $this->hotdealsearch_model->comm_sub_hotdeals();
          /*pets sub sub*/
         $data['subcat_pets'] = $this->hotdealsearch_model->subcat_pets_hotdeals();
         $data['subcat_bigpets'] = $this->hotdealsearch_model->subcat_bigpets_hotdeals();
         $data['subcat_smallpets'] = $this->hotdealsearch_model->subcat_smallpets_hotdeals();
         $data['subcat_petsaccess'] = $this->hotdealsearch_model->subcat_petsaccess_hotdeals();
          /*cloths and life styles*/
         $data['subcat_women'] = $this->hotdealsearch_model->subcat_women_hotdeals();
         $data['subcat_men'] = $this->hotdealsearch_model->subcat_men_hotdeals();
         $data['subcat_boy'] = $this->hotdealsearch_model->subcat_boy_hotdeals();
         $data['subcat_girl'] = $this->hotdealsearch_model->subcat_girl_hotdeals();
         $data['subcat_bboy'] = $this->hotdealsearch_model->subcat_bboy_hotdeals();
         $data['subcat_bgirl'] = $this->hotdealsearch_model->subcat_bgirl_hotdeals();
         /*home kitchen*/
         $data['subcat_kitchen'] = $this->hotdealsearch_model->subcat_kitchen_hotdeals();
         $data['subcat_home'] = $this->hotdealsearch_model->subcat_home_hotdeals();
         $data['subcat_decor'] = $this->hotdealsearch_model->subcat_decor_hotdeals();
         /*ezone*/
         $data['cnt_accessories'] = $this->hotdealsearch_model->cnt_accessories_hotdeals();
         // $data['cnt_ezone'] = $this->hotdealsearch_model->cnt_ezone_hotdeals();
         $data['subcat_phone'] = $this->hotdealsearch_model->subcat_phone_hotdeals();
         $data['subcat_homeapp'] = $this->hotdealsearch_model->subcat_homeapp_hotdeals();
         $data['subcat_smallapp'] = $this->hotdealsearch_model->subcat_smallapp_hotdeals();
         $data['subcat_lappy'] = $this->hotdealsearch_model->subcat_lappy_hotdeals();
         $data['subcat_access'] = $this->hotdealsearch_model->subcat_access_hotdeals();
         $data['accesories_mtablets'] = $this->hotdealsearch_model->accesories_mtablets_hotdeals();
         $data['accesories_computers'] = $this->hotdealsearch_model->accesories_computers_hotdeals();
         $data['accesories_headphone'] = $this->hotdealsearch_model->accesories_headphone_hotdeals();
         $data['accesories_audiovideo'] = $this->hotdealsearch_model->accesories_audiovideo_hotdeals();
         $data['accesories_camera'] = $this->hotdealsearch_model->accesories_camera_hotdeals();

         $data['subcat_pcare'] = $this->hotdealsearch_model->subcat_pcare_hotdeals();
         $data['subcat_henter'] = $this->hotdealsearch_model->subcat_henter_hotdeals();
         $data['subcat_gaming'] = $this->hotdealsearch_model->subcat_gaming_hotdeals();
         $data['subcat_pgraphy'] = $this->hotdealsearch_model->subcat_pgraphy_hotdeals();
         $data['subcat_computers'] = $this->hotdealsearch_model->subcat_computers_hotdeals();
         $data['subcat_networks'] = $this->hotdealsearch_model->subcat_networks_hotdeals();
         $data['subcat_softwares'] = $this->hotdealsearch_model->subcat_softwares_hotdeals();
         $data['hotlaptops_cnt'] = $this->hotdealsearch_model->hotlaptops_cnt();
           /*packages count*/
          $data['deals_pck'] = $this->hotdealsearch_model->hotdeals_pck_hotdeals();
            $this->load->view("classified_layout/inner_template",$data);
        }

        public function getcityname(){
                $latt = $this->input->post('latt');
                $longg = $this->input->post('longg');
                $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$latt.",".$longg."&sensor=true";
                $ch = curl_init();
                // Disable SSL verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                // Will return the response, if false it print the response
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set the url
                curl_setopt($ch, CURLOPT_URL,$url);
                // Execute
                $result=curl_exec($ch);
                // Closing
                curl_close($ch);
                $json_response = json_decode($result, true);
                $res_array = array(
                        'cityname'=>$json_response['results'][0]['address_components'][1]['short_name']
                        );
                echo json_encode($res_array);
        }

        public function current_url()
        {
            $CI =& get_instance();

            $url = $CI->config->site_url($CI->uri->uri_string());
            return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
        }

        public function addsave_search(){
            $save = $this->classifed_model->addsaved_hotdeals();
            if ($save == 1) {
                $this->session->set_userdata('saved_msg1', 'Your search is saved');
                $this->session->set_userdata('saved_time1', time());
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function search_exists(){
          $exist = $this->classifed_model->hotsearch_exists();
          if ($exist > 0) {
            echo 1;
          }
          else{
            echo 0;
          }
        }
}

