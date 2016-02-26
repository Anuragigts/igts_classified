<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Home_kitchen_view extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
        public function index(){
            $config = array();
            $config['base_url'] = base_url().'home_kitchen_view/index';
            $config['total_rows'] = count($this->classifed_model->count_kitchenhome_view());
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
                 $public_adview = $this->classifed_model->publicads();
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
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_kitchen();
                 /*packages count*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_kitchen();
                $data['public_adview'] = $public_adview;
                $data['login_status'] =$login_status;
                $data['login'] = $login;
                $data['favourite_list']=$favourite_list;
                
                $this->load->view("classified_layout/inner_template",$data);
        }

         public function search_filters(){
            $config = array();
            $config['base_url'] = base_url().'home_kitchen_view/index';
            $config['total_rows'] = count($this->hotdealsearch_model->count_kitchenhome_search());
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
            $result['kitchen_result'] = $rs;
            $result['paging_links'] = $this->pagination->create_links();
            $public_adview = $this->classifed_model->publicads();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            echo $this->load->view("classified/kitchen_view_search",$result);
        }
        
}

