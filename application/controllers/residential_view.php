<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Residential_view extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
        public function index(){
            $config = array();
            $config['base_url'] = base_url().'residential_view/index';
            $config['total_rows'] = count($this->classifed_model->count_find_property_view());
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
                $residential_view = $this->classifed_model->find_property_view($search_option);
            foreach ($residential_view as $rview) {
                $loginid = $rview->login_id;
            }
            $public_adview = $this->classifed_model->publicads();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "residential_view",
                         "residential_result" => $residential_view,
                         'paging_links' =>$this->pagination->create_links(),
                         'log_name' => $log_name
                );
                
               $data['login_status'] =$login_status;
                    $data['login'] = $login;
                    $data['favourite_list']=$favourite_list;
                    /*area build count*/
                    $data['areacount'] = $this->hotdealsearch_model->areacount_property();
                    /*bedrooms count*/
                    $data['bedroomcount'] = $this->hotdealsearch_model->bedroomcount_property();
                    /*bathrooms count*/
                    $data['bathroomcount'] = $this->hotdealsearch_model->bathroomcount_property();
                    /*residential and commercial count*/
                    $data['resi_comm_count'] = $this->hotdealsearch_model->resi_comm_count_property();
                /*business and consumer count for findproperty*/
                $data['busconcount'] = $this->hotdealsearch_model->busconcount_property();
                 /*seller and needed count for findproperty*/
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_property();
                 /*packages count*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_property();
                $data['public_adview'] = $public_adview;
                
                $this->load->view("classified_layout/inner_template",$data);
        }

         public function search_filters(){
             $config = array();
            $config['base_url'] = base_url().'residential_view/search_filters';
            $config['total_rows'] = count($this->hotdealsearch_model->count_residential_search());
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
             $rs = $this->hotdealsearch_model->residential_search($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
            $result['residential_result'] = $rs;
            $result['paging_links'] = $this->pagination->create_links();
            $public_adview = $this->classifed_model->publicads();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            echo $this->load->view("classified/residential_view_search",$result);
        }
        
}

