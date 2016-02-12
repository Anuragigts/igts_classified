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
            /*ezone sub categories*/
            $ezone_sub = $this->hotdealsearch_model->ezone_sub();

            /*motor point sub categories*/
             $motor_sub = $this->hotdealsearch_model->motor_sub();
            /*cloths and life styles sub categories*/
            $cloths_sub = $this->hotdealsearch_model->cloths_sub();
            /*services sub categories*/
            $services_sub = $this->hotdealsearch_model->services_sub();
            /*find a property sub categories*/
             $property_sub = $this->hotdealsearch_model->property_sub();
            /*home and kitchen sub categories*/
             $hkitchen_sub = $this->hotdealsearch_model->hkitchen_sub();
            /*pets sub categories*/
             $pets_sub = $this->hotdealsearch_model->pets_sub();
            /*jobs sub categories*/
             $jobs_sub = $this->hotdealsearch_model->jobs_sub();
             /*location list*/
             $loc_list = $this->hotdealsearch_model->loc_list();

                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deal_page",
                        "ezone_sub" => $ezone_sub,
                        "motor_sub" => $motor_sub,
                        "cloths_sub" => $cloths_sub,
                        "services_sub" => $services_sub,
                        "property_sub" => $property_sub,
                        "hkitchen_sub" => $hkitchen_sub,
                        "pets_sub" => $pets_sub,
                        "jobs_sub" => $jobs_sub,
                        "loc_list" => $loc_list
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function result_form(){

            $rs['result'] = $this->hotdealsearch_model->hotdeal_search();
            echo $this->load->view("classified/deal_page_search", $rs);
        }

        public function search_filters(){
            $rs['result'] = $this->hotdealsearch_model->search_filters();
            // echo "<pre>"; print_r($this);
           echo $this->load->view("classified/deal_page_search", $rs);
        }
}

