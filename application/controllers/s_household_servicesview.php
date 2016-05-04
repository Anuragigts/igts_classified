<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  S_household_servicesview extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->model("postad_model");
                $this->load->library('pagination');
        }
        public function index(){
               $this->session->set_userdata('prof_service',array());
                $this->session->set_userdata('pop_service',array());
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
                $config['base_url'] = base_url().'s_household_servicesview/index';
                $config['total_rows'] = count($this->postad_model->count_pophousehold_view());
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

        $services_view = $this->postad_model->pophousehold_view($search_option);


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
            $public_adview = $this->classifed_model->publicads_service();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid'"), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "s_household_servicesview",
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
                $data['busconcount'] = $this->postad_model->busconcount_pophousehold();
                /*service provided / needed for services*/
                $data['sellerneededcount'] = $this->postad_model->sellerneeded_pophousehold();
                 /*packages count*/
                $data['deals_pck'] = $this->postad_model->deals_pck_pophousehold();
                // echo "<pre>"; print_r($this);
                

                $this->load->view("classified_layout/inner_template",$data);
        }
        public function search_filters(){
            if($this->input->post()){
                $this->session->unset_userdata('prof_service');
                $this->session->unset_userdata('pop_service');
                $this->session->unset_userdata('seller_deals');
                $this->session->unset_userdata('dealurgent');
                $this->session->unset_userdata('search_bustype');
                $this->session->unset_userdata('dealtitle');
                $this->session->unset_userdata('dealprice');
                $this->session->unset_userdata('recentdays');
                $this->session->unset_userdata('location');
                $this->session->unset_userdata('latt');
                $this->session->unset_userdata('longg');

                if($this->input->post('prof_service')){
                    //$data['prof_service'] = $this->input->post('prof_service');
                    $this->session->set_userdata('prof_service', $this->input->post('prof_service'));
                }else{
                     $this->session->set_userdata('prof_service',array());
                }
                 if($this->input->post('pop_service')){
                    //$data['pop_service'] = $this->input->post('pop_service');
                       $this->session->set_userdata('pop_service',$this->input->post('pop_service'));
                }else{
                     $this->session->set_userdata('pop_service',array());
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
            $config['base_url'] = base_url().'s_household_servicesview/search_filters';
            $config['total_rows'] = count($this->postad_model->count_pophousehold_search());
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

        $services_view = $this->postad_model->pophousehold_search($search_option);

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
            $public_adview = $this->classifed_model->publicads_service();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid' "), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "s_household_servicesview",
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
                $data['busconcount'] = $this->postad_model->busconcount_pophousehold();
                /*service provided / needed for services*/
                $data['sellerneededcount'] = $this->postad_model->sellerneeded_pophousehold();
                 /*packages count*/
                $data['deals_pck'] = $this->postad_model->deals_pck_pophousehold();
                // echo "<pre>"; print_r($this);
                

                $this->load->view("classified_layout/inner_template",$data);
                

}
        
}

