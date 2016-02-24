<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Pets_view extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
        public function index(){
            $config = array();
            $config['base_url'] = base_url().'pets_view/index';
            $config['total_rows'] = count($this->classifed_model->count_pets_view());
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
                $pets_view = $this->classifed_model->pets_view($search_option);
            foreach ($pets_view as $pview) {
                $loginid = $pview->login_id;
            }
            $public_adview = $this->classifed_model->publicads();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "pets_view",
                         "pets_result" => $pets_view,
                         'log_name' => $log_name,
                         'paging_links' =>$this->pagination->create_links()
                );
                
                /*pets*/
                $data['pets_sub'] = $this->hotdealsearch_model->pets_sub_search();
                $data['login_status'] =$login_status;
                    $data['login'] = $login;
                    $data['favourite_list']=$favourite_list;

                /*business and consumer count for pets*/
                $data['busconcount'] = $this->hotdealsearch_model->busconcount_pets();
                 /*seller and needed count for pets*/
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_pets();
                 /*packages count*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_pets();
                $data['public_adview'] = $public_adview;
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function search_filters(){
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
             $rs = $this->hotdealsearch_model->pets_search();
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
            $result['pets_result'] = $rs;
            $public_adview = $this->classifed_model->publicads();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '$loginid')  "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            echo $this->load->view("classified/pets_view_search",$result);
        }
        
}

