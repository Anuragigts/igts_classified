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

                if ((time() - $this->session->userdata('saved_time')) > 5 ){
                   $this->session->unset_userdata('saved_time');
                   $this->session->unset_userdata('saved_msg');
                }
             if($this->input->get()){
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
                if($this->input->get('miles')){
                     $this->session->set_userdata('miles',$this->input->get('miles'));
                }
                if($this->input->get('category_name')){
                     $this->session->set_userdata('s_cat_id',$this->input->get('category_name'));
                }
                if($this->input->get('looking_search')){
                       $this->session->set_userdata('s_looking_search',$this->input->get('looking_search'));
                }else{
                     $this->session->set_userdata('s_looking_search','');
                }
                if($this->input->get('search_sub')){
                     $this->session->set_userdata('s_search_sub',$this->input->get('search_sub'));
                }
                else{
                    $this->session->set_userdata('s_search_sub',array());
                }
                 if($this->input->get('dealurgent')){
                       $this->session->set_userdata('s_dealurgent' ,$this->input->get('dealurgent'));
                }else{
                     $this->session->set_userdata('s_dealurgent',array());
                }
                 if($this->input->get('search_bustype')){
                       $this->session->set_userdata('s_search_bustype',$this->input->get('search_bustype'));
                }else{
                     $this->session->set_userdata('s_search_bustype','all');
                }
                if($this->input->get('dealtitle_sort')){
                       $this->session->set_userdata('s_dealtitle',$this->input->get('dealtitle_sort'));
                }else{
                     $this->session->set_userdata('s_dealtitle','Any');
                }
                if($this->input->get('price_sort')){
                       $this->session->set_userdata('s_dealprice',$this->input->get('price_sort'));
                }else{
                     $this->session->set_userdata('s_dealprice','Any');
                }
                if($this->input->get('recentdays_sort')){
                       $this->session->set_userdata('s_recentdays',$this->input->get('recentdays_sort'));
                }else{
                     $this->session->set_userdata('s_recentdays','Any');
                }
                if($this->input->get('latt')){
                    $this->session->set_userdata('s_location',$this->input->get('find_loc'));
                       $this->session->set_userdata('s_latt',$this->input->get('latt'));
                }else{
                    $this->session->set_userdata('s_location','');
                     $this->session->set_userdata('s_latt','');
                }
                if($this->input->get('longg')){
                       $this->session->set_userdata('s_longg',$this->input->get('longg'));
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
             $this->session->set_userdata("saved_search", $this->current_url());
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
                $result['login_id'] = $this->session->userdata('login_id');
                 /*seller and needed count for pets*/
                // $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_search();
                 /*packages count*/
                $result['deals_pck'] = $this->hotdealsearch_model->deals_pck_search();
            $this->load->view("classified_layout/inner_template",$result);
        }

        public function current_url()
        {
            $CI =& get_instance();

            $url = $CI->config->site_url($CI->uri->uri_string());
            return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
        }

        public function addsave_search(){
            $save = $this->classifed_model->addsaved_search();
            if ($save == 1) {
                $this->session->set_userdata('saved_msg', 'Your search is saved');
                $this->session->set_userdata('saved_time', time());
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function deletesave_search(){
            $delete = $this->classifed_model->deletesave_search();
            if ($delete == 1) {
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function subscribe_news(){
            $emailexist = $this->classifed_model->subscribe_news();
            if ($emailexist == 1) {
                echo 1;
            }
            else{
                echo 0;
            }
        }
        
}

