<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Girls_view extends CI_Controller{
       public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
        public function index(){
                $this->session->set_userdata('girls_list',array());  
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
            $config['base_url'] = base_url().'girls_view/index';
            $config['total_rows'] = count($this->classifed_model->count_girls_view());
            $config['per_page'] = 1;
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

        $girls_view = $this->classifed_model->girls_view($search_option);


        //$data["paging_links"] =  $this->pagination->create_links();

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

           
            foreach ($girls_view as $sview) {
                $loginid = $sview->login_id;
            }
            $public_adview = $this->classifed_model->publicads_clothing();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
             $girls_list_count = $this->hotdealsearch_model->girls_list_count();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid' "), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "girls_view",
                        'girls_list_count' => $girls_list_count,
                        "girlview_result" => $girls_view,
                        "public_adview" => $public_adview,
                        'log_name' => $log_name,
                        "loc_list" => $loc_list,
                        'login_status' =>$login_status,
                        'login' =>$login,
                        'paging_links' =>$this->pagination->create_links(),
                        'favourite_list'=>$favourite_list
                );

                /*business and consumer count for services*/
                $data['busconcount'] = $this->hotdealsearch_model->busconcount_girlsview();
                /*service provided / needed for services*/
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_girlsview();
                 /*packages count*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_girlsview();
                // echo "<pre>"; print_r($this);
               
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function search_filters(){
            if($this->input->post()){
                    $this->session->set_userdata('girls_list',array());  
                    $this->session->set_userdata('seller_deals',array());
                    $this->session->set_userdata('dealurgent',array());
                    $this->session->set_userdata('dealtitle','');
                    $this->session->set_userdata('dealprice','');
                    $this->session->set_userdata('recentdays','');
                    $this->session->set_userdata('search_bustype','all');
                    $this->session->set_userdata('location');
                    $this->session->set_userdata('latt','');
                    $this->session->set_userdata('longg','');
                 if($this->input->post('girls_list')){
                       $this->session->set_userdata('girls_list',$this->input->post('girls_list'));
                }else{
                     $this->session->set_userdata('girls_list',array());
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
                if($this->input->post('latt')){
                    $this->session->set_userdata('location',$this->input->post('find_loc'));
                       $this->session->set_userdata('latt',$this->input->post('latt'));
                }else{
                    $this->session->set_userdata('location','');
                     $this->session->set_userdata('latt','');
                }
                if($this->input->post('longg')){
                       $this->session->set_userdata('longg',$this->input->post('longg'));
                }else{
                     $this->session->set_userdata('longg','');
                }
            }
             $men_view_search = $this->hotdealsearch_model->count_girls_view_search();
              $girls_list_count = $this->hotdealsearch_model->girls_list_count();
            $config = array();
            $config['base_url'] = base_url().'girls_view/search_filters';
            $config['total_rows'] = count($men_view_search);
            $config['per_page'] = 1;
             $config['next_link'] = 'Next';
              $config['prev_link'] = 'Previous';
            $config['full_tag_open'] ='<div id="pagination" style="color:black; font-weight: bold;">';
            $config['full_tag_close'] ='<div>';
            $this->pagination->initialize($config);
            // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $cur_url = end(explode("/", $this->input->post('curr_url')));
            $search_option = array(
                'limit' =>$config['per_page'],
                'start' =>$cur_url
                );
        // $services_view = $this->classifed_model->services_view($search_option);
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
             $rs = $this->hotdealsearch_model->girls_view_search($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
              $result   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "girls_view",
                        'girls_list_count' => $girls_list_count);
            $result['girlview_result'] = $rs;
            $public_adview = $this->classifed_model->publicads_clothing();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid'"), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            $result['paging_links'] = $this->pagination->create_links();
            /*business and consumer count for services*/
                $result['busconcount'] = $this->hotdealsearch_model->busconcount_girlsview();
                /*service provided / needed for services*/
                $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_girlsview();
                 /*packages count*/
                $result['deals_pck'] = $this->hotdealsearch_model->deals_pck_girlsview();
             $this->load->view("classified_layout/inner_template",$result);
        }
        
}

