<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Services_view extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
        public function index(){
             $services_view = $this->classifed_model->count_services_view();
            $config = array();
            $config['base_url'] = base_url().'services_view/index';
            $config['total_rows'] = count($services_view);
            $config['per_page'] = 10;
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

        $services_view = $this->classifed_model->services_view($search_option);


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

           
            foreach ($services_view as $sview) {
                $loginid = $sview->login_id;
            }
            $public_adview = $this->classifed_model->publicads();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "services_view",
                        "service_result" => $services_view,
                        "public_adview" => $public_adview,
                        'log_name' => $log_name,
                        "loc_list" => $loc_list,
                        'login_status' =>$login_status,
                        'login' =>$login,
                        'paging_links' =>$this->pagination->create_links(),
                        'favourite_list'=>$favourite_list
                );

                /*services*/
                $data['services_sub_prof'] = $this->hotdealsearch_model->services_sub_prof();
                $data['services_sub_pop'] = $this->hotdealsearch_model->services_sub_pop();
                /*business and consumer count for services*/
                $data['busconcount'] = $this->hotdealsearch_model->busconcount_services();
                /*service provided / needed for services*/
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_services();
                 /*packages count*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_services();
                // echo "<pre>"; print_r($this);
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function search_filters(){
             $services_view = $this->hotdealsearch_model->count_servicesprof_search();
            $config = array();
            $config['base_url'] = base_url().'services_view/search_filters';
            $config['total_rows'] = count($services_view);
            $config['per_page'] = 10;
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
             $rs = $this->hotdealsearch_model->servicesprof_search($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
            $result['service_result'] = $rs;
            $public_adview = $this->classifed_model->publicads();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            $result['paging_links'] = $this->pagination->create_links();
            echo $this->load->view("classified/services_view_search",$result);
        }
        
}

