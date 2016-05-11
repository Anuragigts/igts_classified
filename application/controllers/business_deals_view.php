<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Business_deals_view extends CI_Controller{
         public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->library('pagination');
               }
        public function index(){
                $this->session->set_userdata('dealtitle','');
                $this->session->set_userdata('dealprice','');
                $this->session->set_userdata('recentdays','');
                $config = array();
                $config['base_url'] = base_url().'business_deals_view/index';
                $config['total_rows'] = count($this->classifed_model->count_viewallbusiness());
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
                $viewall_business = $this->classifed_model->viewall_business($search_option);
                foreach ($viewall_business as $sview) {
                    $loginid = $sview->login_id;
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

                $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid'"), 0, 'first_name');
                $public_adview = $this->classifed_model->publicads_service();
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "business_deals_view",
                        'log_name' => $log_name,
                        'login' =>$login,
                        "viewall_business" => $viewall_business,
                        "public_adview" => $public_adview,
                        'favourite_list'=>$favourite_list,
                        'paging_links' =>$this->pagination->create_links()
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        public function search_filters(){
             if($this->input->post()){
                $this->session->unset_userdata('dealtitle');
                $this->session->unset_userdata('dealprice');
                $this->session->unset_userdata('recentdays');
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
             }
             $config = array();
            $config['base_url'] = base_url().'business_deals_view/search_filters';
            $config['total_rows'] = count($this->classifed_model->count_viewall_business1());
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
            $viewall_business = $this->classifed_model->viewall_business1($search_option);
                foreach ($viewall_business as $sview) {
                    $loginid = $sview->login_id;
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
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid'"), 0, 'first_name');
            $public_adview = $this->classifed_model->publicads_service();
             $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "business_deals_view",
                        "public_adview" => $public_adview,
                        'log_name' => $log_name,
                        'login' =>$login,
                        'favourite_list'=>$favourite_list,
                        'paging_links' =>$this->pagination->create_links(),
                        "viewall_business" => $viewall_business
                );
              $this->load->view("classified_layout/inner_template",$data);
        }
}

