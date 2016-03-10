<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Deal_page extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("hotdealsearch_model");
               }
        public function index(){
            $cat_id = $this->input->post('category_name');
            $data['result'] = $this->hotdealsearch_model->hotdeal_search();
             $loc_list = $this->hotdealsearch_model->loc_list();
              $category = $this->hotdealsearch_model->category();

                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deal_page",
                          'category' => $category,
                          "loc_list" => $loc_list
                );
                $data['result'] = $this->hotdealsearch_model->hotdeal_search();

          
          
            $this->load->view("classified_layout/inner_template",$data);
        }

/*        public function result_form(){

            $data['result'] = $this->hotdealsearch_model->hotdeal_search();
            echo $this->load->view("classified/deal_page_search", $rs);
        }

        public function search_filters(){
            $rs['result'] = $this->hotdealsearch_model->search_filters();
           echo $this->load->view("classified/deal_page_search", $rs);
        }*/
}

