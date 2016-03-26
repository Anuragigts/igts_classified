<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Searchview extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
         public function index(){
             if($this->input->post()){
                $this->session->unset_userdata('miles');
                $this->session->unset_userdata('s_cat_id');
                $this->session->unset_userdata('s_looking_search'); 
                $this->session->unset_userdata('s_search_sub'); 
                $this->session->unset_userdata('s_dealurgent');
                $this->session->unset_userdata('s_search_bustype');
                $this->session->unset_userdata('s_dealtitle');
                $this->session->unset_userdata('s_dealprice');
                $this->session->unset_userdata('s_recentdays');
                $this->session->unset_userdata('s_location');
                $this->session->unset_userdata('s_latt');
                $this->session->unset_userdata('s_longg');
                if($this->input->post('miles')){
                     $this->session->set_userdata('miles',$this->input->post('miles'));
                }
                if($this->input->post('category_name')){
                     $this->session->set_userdata('s_cat_id',$this->input->post('category_name'));
                }
                if($this->input->post('looking_search')){
                       $this->session->set_userdata('s_looking_search',$this->input->post('looking_search'));
                }else{
                     $this->session->set_userdata('s_looking_search','');
                }
                if($this->input->post('search_sub')){
                     $this->session->set_userdata('s_search_sub',$this->input->post('search_sub'));
                }
                else{
                    $this->session->set_userdata('s_search_sub',array());
                }
                 if($this->input->post('dealurgent')){
                       $this->session->set_userdata('s_dealurgent' ,$this->input->post('dealurgent'));
                }else{
                     $this->session->set_userdata('s_dealurgent',array());
                }
                 if($this->input->post('search_bustype')){
                       $this->session->set_userdata('s_search_bustype',$this->input->post('search_bustype'));
                }else{
                     $this->session->set_userdata('s_search_bustype','all');
                }
                if($this->input->post('dealtitle_sort')){
                       $this->session->set_userdata('s_dealtitle',$this->input->post('dealtitle_sort'));
                }else{
                     $this->session->set_userdata('s_dealtitle','Any');
                }
                if($this->input->post('price_sort')){
                       $this->session->set_userdata('s_dealprice',$this->input->post('price_sort'));
                }else{
                     $this->session->set_userdata('s_dealprice','Any');
                }
                if($this->input->post('recentdays_sort')){
                       $this->session->set_userdata('s_recentdays',$this->input->post('recentdays_sort'));
                }else{
                     $this->session->set_userdata('s_recentdays','Any');
                }
                if($this->input->post('latt')){
                    $this->session->set_userdata('s_location',$this->input->post('find_loc'));
                       $this->session->set_userdata('s_latt',$this->input->post('latt'));
                }else{
                    $this->session->set_userdata('s_location','');
                     $this->session->set_userdata('s_latt','');
                }
                if($this->input->post('longg')){
                       $this->session->set_userdata('s_longg',$this->input->post('longg'));
                }else{
                     $this->session->set_userdata('s_longg','');
                }
            }

            $config = array();
            $config['base_url'] = base_url().'searchview/index';
            $config['total_rows'] = count($this->hotdealsearch_model->count_searchviewsearch());
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
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
             $rs = $this->hotdealsearch_model->searchviewsearch($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
              $result   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "searchview");
            $result['searchview_result'] = $rs;
            $public_adview = $this->classifed_model->publicads_ezone();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid' "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            $result['paging_links'] = $this->pagination->create_links();
            $result['show_all'] = $this->classifed_model->show_all();
              /*business and consumer count for pets*/
               $result['subcat_cnt'] = $this->hotdealsearch_model->subcat_searchdeals();
                $result['busconcount'] = $this->hotdealsearch_model->busconcount_search();
                 /*seller and needed count for pets*/
                // $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_search();
                 /*packages count*/
                $result['deals_pck'] = $this->hotdealsearch_model->deals_pck_search();
            $this->load->view("classified_layout/inner_template",$result);
        }
        
}

