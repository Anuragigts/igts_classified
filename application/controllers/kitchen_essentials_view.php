<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Kitchen_essentials_view extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
                $this->load->model("hotdealsearch_model");
        }
        public function index(){
                $kitchen_view = $this->hotdealsearch_model->kitchen_sub_search();
                $home_view = $this->hotdealsearch_model->home_sub_search();
                $decor_view = $this->hotdealsearch_model->decor_sub_search();
                $brands = $this->hotdealsearch_model->brand_kitchen();
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "kitchen_essentials_view",
                        'kitchen_view' => $kitchen_view,
                        'home_view' => $home_view,
                        'decor_view' => $decor_view,
                        'brands'=>$brands
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        
}

