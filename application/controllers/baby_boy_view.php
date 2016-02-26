<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Baby_boy_view extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
        public function index(){
                $config = array();
            $config['base_url'] = base_url().'baby_boy_view/index';
            $config['total_rows'] = count($this->classifed_model->count_baby_boy_view());
            $config['per_page'] = 2;
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

        $baby_boy_view = $this->classifed_model->baby_boy_view($search_option);


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

           
            foreach ($baby_boy_view as $sview) {
                $loginid = $sview->login_id;
            }
            $public_adview = $this->classifed_model->publicads();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
             $babyboy_list_count = $this->hotdealsearch_model->babyboy_list_count();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "baby_boy_view",
                        'babyboy_list_count' => $babyboy_list_count,
                        "babyboyview_result" => $baby_boy_view,
                        "public_adview" => $public_adview,
                        'log_name' => $log_name,
                        "loc_list" => $loc_list,
                        'login_status' =>$login_status,
                        'login' =>$login,
                        'paging_links' =>$this->pagination->create_links(),
                        'favourite_list'=>$favourite_list
                );

                /*business and consumer count for services*/
                $data['busconcount'] = $this->hotdealsearch_model->busconcount_babyboyview();
                /*service provided / needed for services*/
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_babyboyview();
                 /*packages count*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_babyboyview();
                // echo "<pre>"; print_r($this);
               
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function search_filters(){
             $men_view_search = $this->hotdealsearch_model->count_babyboy_view_search();
            $config = array();
            $config['base_url'] = base_url().'baby_boy_view/search_filters';
            $config['total_rows'] = count($men_view_search);
            $config['per_page'] = 2;
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
             $rs = $this->hotdealsearch_model->babyboy_view_search($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
            $result['babyboyview_result'] = $rs;
            $public_adview = $this->classifed_model->publicads();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            $result['paging_links'] = $this->pagination->create_links();
            echo $this->load->view("classified/baby_boy_view_search",$result);
        }
        
}

