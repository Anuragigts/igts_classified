<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Deals_administrator_box extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->library('pagination');
        }
        public function index(){
            $config = array();
            $config['base_url'] = base_url().'deals_administrator_box/index';
            $config['total_rows'] = count($this->classifed_model->count_my_ads());
            $config['per_page'] = 15;
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
				$my_ads = $this->classifed_model->my_ads_box($search_option);
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deals_administrator_box",
                        'my_ads_details'=> $my_ads,
                        'paging_links' =>$this->pagination->create_links()
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }

         public function my_ads_box_search(){
             if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }

                $my_ads = $this->classifed_model->my_ads_box_search();
                $result   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deals_administrator",
                        'my_ads_details'=> $my_ads
                );

                echo $this->load->view("classified/deals_administrator_box_search", $result);

        }
        
}

