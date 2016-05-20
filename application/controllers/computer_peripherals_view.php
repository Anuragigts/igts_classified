<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Computer_peripherals_view extends CI_Controller{
         public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
                $this->load->library('pagination');
        }
        public function index(){
            $this->session->set_userdata('poto_sub',array());
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
            $config['base_url'] = base_url().'computer_peripherals_view/index';
            $config['total_rows'] = count($this->hotdealsearch_model->count_compoterperiperals_view());
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
                $poto_result = $this->hotdealsearch_model->compoterperiperals_view($search_option);
            foreach ($poto_result as $pview) {
                $loginid = $pview->login_id;
            }
            $public_adview = $this->classifed_model->publicads_ezone();
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid'"), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "computer_peripherals_view",
                         "poto_result" => $poto_result,
                         'log_name' => $log_name,
                         'paging_links' =>$this->pagination->create_links()
                );
                
                /*motor*/
                $data['poto_sub'] = $this->hotdealsearch_model->poto_sub_search();
                $data['potosubcnt'] = $this->hotdealsearch_model->photography_search();
                $data['login_status'] =$login_status;
                    $data['login'] = $login;
                    $data['favourite_list']=$favourite_list;

                /*business and consumer count for pets*/
                $data['busconcount'] = $this->hotdealsearch_model->busconcount_compoterperiperals();
                 /*seller and needed count for pets*/
                $data['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_compoterperiperals();
                 /*packages count*/
                $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_compoterperiperals();
                $data['public_adview'] = $public_adview;
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function search_filters(){
             if($this->input->post()){
                $this->session->unset_userdata('poto_sub');
                $this->session->unset_userdata('seller_deals');
                $this->session->unset_userdata('dealurgent');
                $this->session->unset_userdata('search_bustype');
                $this->session->unset_userdata('dealtitle');
                $this->session->unset_userdata('dealprice');
                $this->session->unset_userdata('recentdays');
                $this->session->unset_userdata('location');
                $this->session->unset_userdata('latt');
                $this->session->unset_userdata('longg');
                if($this->input->post('poto_sub')){
                   // $data['poto_sub'] = $this->input->post('poto_sub');
                       $this->session->set_userdata('poto_sub',$this->input->post('poto_sub'));
                }else{
                     $this->session->set_userdata('poto_sub',array());
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
            $config['base_url'] = base_url().'computer_peripherals_view/search_filters';
            $config['total_rows'] = count($this->hotdealsearch_model->count_compoterperiperals_search());
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
            /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();
             $rs = $this->hotdealsearch_model->compoterperiperals_search($search_option);
             if (!empty($rs)) {
                foreach ($rs as $sview) {
                        $loginid = $sview->login_id;
                    }
             }
              $result   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "computer_peripherals_view");
            $result['poto_result'] = $rs;
            $public_adview = $this->classifed_model->publicads_ezone();
            $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '$loginid' "), 0, 'first_name');
            $result['log_name'] = $log_name;
            $result['public_adview'] = $public_adview;
            $result['loc_list'] = $loc_list;
            $result['login_status'] =$login_status;
            $result['login'] = $login;
            $result['favourite_list']=$favourite_list;
            $result['paging_links'] = $this->pagination->create_links();
              /*motor sub*/
                $result['poto_sub'] = $this->hotdealsearch_model->poto_sub_search();
                $result['potosubcnt'] = $this->hotdealsearch_model->photography_search();
              /*business and consumer count for pets*/
                $result['busconcount'] = $this->hotdealsearch_model->busconcount_compoterperiperals();
                 /*seller and needed count for pets*/
                $result['sellerneededcount'] = $this->hotdealsearch_model->sellerneeded_compoterperiperals();
                 /*packages count*/
                $result['deals_pck'] = $this->hotdealsearch_model->deals_pck_compoterperiperals();
            $this->load->view("classified_layout/inner_template",$result);
        }
        
}

