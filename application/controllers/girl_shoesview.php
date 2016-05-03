<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Girl_shoesview extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->model("postad_cloths_model");
                $this->load->library('pagination');
        }
        public function index(){
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
                $config['base_url'] = base_url().'girl_shoesview/index';
                $config['total_rows'] = count($this->postad_cloths_model->count_gshoes_view());
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

        $clothstyle_view = $this->postad_cloths_model->gshoes_view($search_option);
        $clothstyle_list = $this->hotdealsearch_model->clothstyle_list();


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

           
            foreach ($clothstyle_view as $sview) {
                $loginid = $sview->login_id;
            }
            $public_adview = $this->classifed_model->publicads_clothing();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid' "), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "girl_shoesview",
                        "clothstyle_result" => $clothstyle_view,
                        "clothstyle_list" => $clothstyle_list,
                        "public_adview" => $public_adview,
                        'log_name' => $log_name,
                        "loc_list" => $loc_list,
                        'login_status' =>$login_status,
                        'login' =>$login,
                        'paging_links' =>$this->pagination->create_links(),
                        'favourite_list'=>$favourite_list
                );

                /*business and consumer count for services*/
                $data['busconcount'] = $this->postad_cloths_model->busconcount_gshoes();
                /*service provided / needed for services*/
                $data['sellerneededcount'] = $this->postad_cloths_model->sellerneeded_gshoes();
                 /*packages count*/
                $data['deals_pck'] = $this->postad_cloths_model->deals_pck_gshoes();
                // echo "<pre>"; print_r($this);
               
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function search_filters(){
            if($this->input->post()){
                $this->session->unset_userdata('seller_deals');
                $this->session->unset_userdata('dealurgent');
                $this->session->unset_userdata('search_bustype');
                $this->session->unset_userdata('dealtitle');
                $this->session->unset_userdata('dealprice');
                $this->session->unset_userdata('recentdays');
                $this->session->unset_userdata('location');
                $this->session->unset_userdata('latt');
                $this->session->unset_userdata('longg');

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
             $services_view = $this->postad_cloths_model->count_gshoes_search();
             // echo count($services_view);
            $config = array();
            $config['base_url'] = base_url().'girl_shoesview/search_filters';
            $config['total_rows'] = count($services_view);
            $config['per_page'] = 30;
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';
            $config['full_tag_open'] ='<div id="pagination" style="color:black; font-weight: bold;">';
            $config['full_tag_close'] ='<div>';
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
             $rs = $this->postad_cloths_model->gshoes_search($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
             $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "girl_shoesview");
            $data['clothstyle_result'] = $rs;
            $public_adview = $this->classifed_model->publicads_clothing();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid' "), 0, 'first_name');
            $data['log_name'] = $log_name;
            $data['public_adview'] = $public_adview;
            $data['loc_list'] = $loc_list;
            $data['login_status'] =$login_status;
            $data['login'] = $login;
            $data['favourite_list']=$favourite_list;
            $data['paging_links'] = $this->pagination->create_links();
            $data['clothstyle_list'] = $this->hotdealsearch_model->clothstyle_list();
           /*business and consumer count for services*/
                $data['busconcount'] = $this->postad_cloths_model->busconcount_gshoes();
                /*service provided / needed for services*/
                $data['sellerneededcount'] = $this->postad_cloths_model->sellerneeded_gshoes();
                 /*packages count*/
                $data['deals_pck'] = $this->postad_cloths_model->deals_pck_gshoes();
                // echo "<pre>"; print_r($this);
               
                $this->load->view("classified_layout/inner_template",$data);
        }
        
}

