<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Residential_com extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
        public function index(){
                $this->session->set_userdata('search_commsub','');
                $this->session->set_userdata('comm_prop',array());
                $this->session->set_userdata('proptype',array());
                $this->session->set_userdata('bed_rooms',array());
                $this->session->set_userdata('bathroom',array());
                $this->session->set_userdata('area_square',array());
                
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
            $config['base_url'] = base_url().'residential_com/index';
            $config['total_rows'] = count($this->classifed_model->count_find_propertycomm_view());
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
                $residential_view = $this->classifed_model->find_propertycomm_view($search_option);
            foreach ($residential_view as $rview) {
                $loginid = $rview->login_id;
            }
            $public_adview = $this->classifed_model->publicads_property();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid' "), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "residential_com",
                         "residential_result" => $residential_view,
                         'paging_links' =>$this->pagination->create_links(),
                         'log_name' => $log_name
                );
                
               $data['login_status'] =$login_status;
                    $data['login'] = $login;
                    $data['favourite_list']=$favourite_list;
                    /*area build count*/
                    $data['areacount'] = $this->hotdealsearch_model->areacount_propertycomm();
                    /*bedrooms count*/
                    $data['bedroomcount'] = $this->hotdealsearch_model->bedroomcount_propertycomm();
                    /*bathrooms count*/
                    $data['bathroomcount'] = $this->hotdealsearch_model->bathroomcount_propertycomm();
                    /*residential and commercial count*/
                    $data['resi_comm_count'] = $this->hotdealsearch_model->resi_comm_count_property();
                /*business and consumer count for findproperty*/
                $data['busconcount'] = $this->hotdealsearch_model->busconcount_propertycomm();
                 /*seller and needed count for findproperty*/
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_property1comm();
                 /*packages count*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_propertycomm();
                $data['public_adview'] = $public_adview;
                $data['subcat_comm'] = $this->hotdealsearch_model->subcat_comm_searchdeals();
                $data['comm_sub'] = $this->hotdealsearch_model->comm_sub();
                
                $this->load->view("classified_layout/inner_template",$data);
        }

         public function search_filters(){
            if($this->input->post()){
                    $this->session->set_userdata('search_commsub','');
                    $this->session->set_userdata('comm_prop',array());
                    $this->session->set_userdata('proptype',array());
                    $this->session->set_userdata('bed_rooms',array());
                    $this->session->set_userdata('bathroom',array());
                    $this->session->set_userdata('area_square',array());

                    $this->session->set_userdata('seller_deals',array());
                    $this->session->set_userdata('dealurgent',array());
                    $this->session->set_userdata('dealtitle','');
                    $this->session->set_userdata('dealprice','');
                    $this->session->set_userdata('recentdays','');
                    $this->session->set_userdata('search_bustype','all');
                    $this->session->set_userdata('location');
                    $this->session->set_userdata('latt','');
                    $this->session->set_userdata('longg','');
                    if($this->input->post('comm_prop')){
                       $this->session->set_userdata('comm_prop',$this->input->post('comm_prop'));
                }else{
                     $this->session->set_userdata('comm_prop',array());
                }
                if($this->input->post('search_commsub')){
                       $this->session->set_userdata('search_commsub',$this->input->post('search_commsub'));
                }else{
                     $this->session->set_userdata('search_commsub','');
                }
                    if($this->input->post('proptype')){
                       $this->session->set_userdata('proptype',$this->input->post('proptype'));
                }else{
                     $this->session->set_userdata('proptype',array());
                }
                if($this->input->post('bed_rooms')){
                       $this->session->set_userdata('bed_rooms',$this->input->post('bed_rooms'));
                }else{
                     $this->session->set_userdata('bed_rooms',array());
                }
                if($this->input->post('bathroom')){
                       $this->session->set_userdata('bathroom',$this->input->post('bathroom'));
                }else{
                     $this->session->set_userdata('bathroom',array());
                }
                if($this->input->post('area_square')){
                       $this->session->set_userdata('area_square',$this->input->post('area_square'));
                }else{
                     $this->session->set_userdata('area_square',array());
                }
                
               if($this->input->post('seller_deals')){
                       $this->session->set_userdata('seller_deals',$this->input->post('seller_deals'));
                }else{
                     $this->session->set_userdata('seller_deals',array());
                }
                 if($this->input->post('dealurgent')){
                       $this->session->set_userdata('dealurgent' ,$this->input->post('dealurgent'));
                }else{
                     $this->session->set_userdata('dealurgent',array());
                }
                 if($this->input->post('search_bustype')){
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
            $config['base_url'] = base_url().'residential_com/search_filters';
            $config['total_rows'] = count($this->hotdealsearch_model->count_propertycomm_search());
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
             $rs = $this->hotdealsearch_model->propertycomm_search($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
              $result   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "residential_com");
            $result['residential_result'] = $rs;
            $result['paging_links'] = $this->pagination->create_links();
            $public_adview = $this->classifed_model->publicads_property();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid'"), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
             /*area build count*/
                $result['areacount'] = $this->hotdealsearch_model->areacount_propertycomm();
                /*bedrooms count*/
                $result['bedroomcount'] = $this->hotdealsearch_model->bedroomcount_propertycomm();
                /*bathrooms count*/
                $result['bathroomcount'] = $this->hotdealsearch_model->bathroomcount_propertycomm();
                /*residential and commercial count*/
                $result['resi_comm_count'] = $this->hotdealsearch_model->resi_comm_count_property();
            /*business and consumer count for findproperty*/
            $result['busconcount'] = $this->hotdealsearch_model->busconcount_propertycomm();
             /*seller and needed count for findproperty*/
            $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_property1comm();
             /*packages count*/
            $result['deals_pck'] = $this->hotdealsearch_model->deals_pck_propertycomm();
            $result['subcat_comm'] = $this->hotdealsearch_model->subcat_comm_searchdeals();
            $result['comm_sub'] = $this->hotdealsearch_model->comm_sub();
             $this->load->view("classified_layout/inner_template",$result);
        }
        
}

