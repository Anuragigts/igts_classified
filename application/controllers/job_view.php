<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Job_view extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("hotdealsearch_model");
                $this->load->model("classifed_model");
                $this->load->library('pagination');
        }
        public function index(){
             $config = array();
            $config['base_url'] = base_url().'job_view/index';
            $config['total_rows'] = count($this->classifed_model->count_jobs_view());
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
                $jobs_view = $this->classifed_model->jobs_view($search_option);
            foreach ($jobs_view as $jview) {
                $loginid = $jview->login_id;
            }
             $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
            $public_adview = $this->classifed_model->publicads();
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "job_view",
                        'log_name' => $log_name,
                        "jobs_result" => $jobs_view,
                        "public_adview" => $public_adview,
                        'login_status' =>$login_status,
                        'login' =>$login,
                        'paging_links' =>$this->pagination->create_links(),
                        'favourite_list'=>$favourite_list
                );
                
                $data['jobs_sub'] = $this->hotdealsearch_model->jobs_sub_search();
                 /*business and consumer count for jobs*/
                $data['busconcount'] = $this->hotdealsearch_model->busconcount_jobs();
                 /*seller and needed count for jobs*/
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_jobs();
                /*packages count jobs*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_jobs();
                 /*packages count jobs*/
                $data['jobpositioncnt'] = $this->hotdealsearch_model->jobpositioncnt();
                // echo "<pre>"; print_r($this);
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function search_filters(){
             $config = array();
            $config['base_url'] = base_url().'job_view/index';
            $config['total_rows'] = count($this->hotdealsearch_model->count_jobs_search());
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
            $res = $this->hotdealsearch_model->jobs_search($search_option);
            $result['jobs_result'] = $res;
            $public_adview = $this->classifed_model->publicads();
            if (!empty($res)) {
                 foreach ($res as $resview) {
                    $loginid = $resview->login_id;
                }
            }
             
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            $result['paging_links'] = $this->pagination->create_links();
            echo $this->load->view("classified/jobs_view_search",$result);
        }
        
}

