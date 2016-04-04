<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Deals_administrator extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->library('pagination');
        }
        public function index(){
             if ($this->input->post()) {
            $this->session->unset_userdata('dealtitle');
            $this->session->unset_userdata('dealprice');

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
            }
            $config = array();
            $config['base_url'] = base_url().'deals_administrator/index';
            $config['total_rows'] = count($this->classifed_model->count_my_ads());
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
                   redirect('login');
                }

                $my_ads = $this->classifed_model->my_ads($search_option);
                $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '".$this->session->userdata('login_id')."' "), 0, 'first_name');
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deals_administrator",
                        'my_ads_details'=> $my_ads,
                        'log_name'=>$log_name,
                         'paging_links' =>$this->pagination->create_links()
                );
                // echo "<pre>"; print_r($this);
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function my_ads_search(){
             if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }

                $my_ads = $this->classifed_model->my_ads_search();
                $log_name = @mysql_result(mysql_query("SELECT first_name FROM `login` WHERE `login_id` = '".$this->session->userdata('login_id')."' "), 0, 'first_name');
                $result   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deals_administrator",
                        'my_ads_details'=> $my_ads,
                        'log_name'=>$log_name
                );

                echo $this->load->view("classified/deals_administrator_search", $result);

        }
        
}

