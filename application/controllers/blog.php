<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Blog extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("settings_model");
                 $this->load->library('pagination');
               }
        public function index(){
            $config = array();
                $config['base_url'] = base_url().'blog/index';
                $config['total_rows'] = count($this->settings_model->count_bloglistview());
                $config['per_page'] = 7;
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
            $bloglistview = $this->settings_model->bloglistview($search_option);
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "blog",
                        'blogslist' =>  $bloglistview,
                        'allcategory' => $this->settings_model->category_count(),
                        'paging_links' =>$this->pagination->create_links()
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        public function blog_view($id){
            if ($this->input->post() && $this->input->post("name") != '') {
                $ins = $this->settings_model->blog_comment();
                if ($ins == 1) {
                    $this->session->set_flashdata("msg",'Comment added successfully');
                }
            }
            $blogview = $this->settings_model->blogdetails($id);
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "blog_view",
                        'blogdetails' =>  $blogview,
                        'allcategory' => $this->settings_model->category_count()
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        public function blogcat(){
             $config = array();
                $config['base_url'] = base_url().'blog/blogcat/'.$this->uri->segment(3).'/';
                $config['total_rows'] = count($this->settings_model->count_bloglistviewcat());
                $config['per_page'] = 7;
                $config['next_link'] = 'Next';
                $config['prev_link'] = 'Previous';
                $config['full_tag_open'] ='<div id="pagination" style="color:red;border:2px solid:blue">';
                $config['full_tag_close'] ='</div>';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $search_option = array(
                    'limit' =>$config['per_page'],
                    'start' =>$page
                    );
            $bloglistview = $this->settings_model->bloglistviewcat($search_option);
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "blog",
                        'blogslist' =>  $bloglistview,
                        'allcategory' => $this->settings_model->category_count(),
                        'paging_links' =>$this->pagination->create_links()
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
}

