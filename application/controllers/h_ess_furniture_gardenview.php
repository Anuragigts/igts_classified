<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  H_ess_furniture_gardenview extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
        public function index(){
                $this->session->set_userdata('kitchen_search',array());  
                $this->session->set_userdata('seller_deals',array());
                $this->session->set_userdata('dealurgent',array());
                $this->session->set_userdata('dealtitle','');
                $this->session->set_userdata('dealprice','');
                $this->session->set_userdata('recentdays','');
                $this->session->set_userdata('search_bustype','all');
                $this->session->set_userdata('location');
                $this->session->set_userdata('latt','');
                $this->session->set_userdata('longg','');
            $config = array();
            $config['base_url'] = base_url().'h_ess_furniture_gardenview/index';
            $config['total_rows'] = count($this->classifed_model->count_kitchenhome_view());
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
                $kitchenhome_view = $this->classifed_model->kitchenhome_view($search_option);
                    foreach ($kitchenhome_view as $kview) {
                        $loginid = $kview->login_id;
                    }
                $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
                 $public_adview = $this->classifed_model->publicads_homekitchen();
                $kitchen_view = $this->hotdealsearch_model->kitchen_sub_search();
                $home_view = $this->hotdealsearch_model->home_sub_search();
                $decor_view = $this->hotdealsearch_model->decor_sub_search();
                $brands = $this->hotdealsearch_model->brand_kitchen();
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "home_kitchen_view",
                         "kitchen_result" => $kitchenhome_view,
                         'paging_links' =>$this->pagination->create_links(),
                         'log_name' => $log_name,
                        'kitchen_view' => $kitchen_view,
                        'home_view' => $home_view,
                        'decor_view' => $decor_view,
                        'brands'=>$brands
                );
                /*business and consumer count for kitchen*/
                $data['busconcount'] = $this->hotdealsearch_model->busconcount_kitchen();
                 /*seller and needed count for kitchen*/
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_kitchen1();
                 /*packages count*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_kitchen();
                $data['public_adview'] = $public_adview;
                $data['login_status'] =$login_status;
                $data['login'] = $login;
                $data['favourite_list']=$favourite_list;
                
                $this->load->view("classified_layout/inner_template",$data);
        }

         public function search_filters(){
            if($this->input->post()){
                    $this->session->set_userdata('kitchen_search',array());  
                    $this->session->set_userdata('seller_deals',array());
                    $this->session->set_userdata('dealurgent',array());
                    $this->session->set_userdata('dealtitle','');
                    $this->session->set_userdata('dealprice','');
                    $this->session->set_userdata('recentdays','');
                    $this->session->set_userdata('search_bustype','all');
                    $this->session->set_userdata('location');
                    $this->session->set_userdata('latt','');
                    $this->session->set_userdata('longg','');
                 if($this->input->post('kitchen_search')){
                       $this->session->set_userdata('kitchen_search',$this->input->post('kitchen_search'));
                }else{
                     $this->session->set_userdata('kitchen_search',array());
                }

                if($this->input->post('seller_deals')){
                   // $data['seller_deals'] = $this->input->post('seller_deals');
                       $this->session->set_userdata('seller_deals',$this->input->post('seller_deals'));
                }else{
                     $this->session->set_userdata('seller_deals',array());
                }
                 if($this->input->post('dealurgent')){
                    //$data['dealurgent'] = $this->input->post('dealurgent');
                       $this->session->set_userdata('dealurgent' ,$this->input->post('dealurgent'));
                }else{
                     $this->session->set_userdata('dealurgent',array());
                }
                 if($this->input->post('search_bustype')){
                    //$data['search_bustype'] = $this->input->post('search_bustype');
                       $this->session->set_userdata('search_bustype',$this->input->post('search_bustype'));
                }else{
                     $this->session->set_userdata('search_bustype','all');
                }
                if($this->input->post('dealtitle_sort')){
                       $this->session->set_userdata('dealtitle',$this->input->post('dealtitle_sort'));
                }else{
                     $this->session->set_userdata('dealtitle','Any');
                }
                if($this->input->post('price_sort')){
                       $this->session->set_userdata('dealprice',$this->input->post('price_sort'));
                }else{
                     $this->session->set_userdata('dealprice','Any');
                }
                if($this->input->post('recentdays_sort')){
                       $this->session->set_userdata('recentdays',$this->input->post('recentdays_sort'));
                }else{
                     $this->session->set_userdata('recentdays','Any');
                }
                if($this->input->post('find_loc')){
                    $this->session->set_userdata('location',$this->input->post('find_loc'));
                }else{
                    $this->session->set_userdata('location','');
                }
            }
            $config = array();
            $config['base_url'] = base_url().'home_kitchen_view/search_filters';
            $config['total_rows'] = count($this->hotdealsearch_model->count_kitchenhome_search());
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
             $rs = $this->hotdealsearch_model->kitchenhome_search($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
              $kitchen_view = $this->hotdealsearch_model->kitchen_sub_search();
                $home_view = $this->hotdealsearch_model->home_sub_search();
                $decor_view = $this->hotdealsearch_model->decor_sub_search();
                $brands = $this->hotdealsearch_model->brand_kitchen();
                $result   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "home_kitchen_view",
                         'paging_links' =>$this->pagination->create_links(),
                        'kitchen_view' => $kitchen_view,
                        'home_view' => $home_view,
                        'decor_view' => $decor_view,
                        'brands'=>$brands
                );
            $result['kitchen_result'] = $rs;
            $result['paging_links'] = $this->pagination->create_links();
            $public_adview = $this->classifed_model->publicads_homekitchen();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
             /*business and consumer count for kitchen*/
                $result['busconcount'] = $this->hotdealsearch_model->busconcount_kitchen();
                 /*seller and needed count for kitchen*/
                $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_kitchen1();
                 /*packages count*/
                $result['deals_pck'] = $this->hotdealsearch_model->deals_pck_kitchen();
                $this->load->view("classified_layout/inner_template",$result);
        }
        
}

