<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Classified extends CI_Controller{

	public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
        }

        public function index(){
                $data = array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "home"
                );
                $lid = $this->session->userdata('login_id');
                
                                $news = array('Golders Green',
                                                    '1 Bedroom Apartment with Patio in Central London',
                                                    'STOLEN BMW F650 GS',
                                                    'Small kittens',
                                                    'Female African grey');
                                $news1 = array_chunk($news, 2);
                                     // echo "<pre>"; print_r($news1); 
                                     // echo count($news1).$news1[0][1];
                                     // exit;
                                $data['news'] = $news1;
                                                     
                if($lid != ''){
                 
                 $data['most_ads'] = $this->classifed_model->most_ads();
                    // echo "<pre>"; print_r($this->queries()); exit;
                    $data['sig_ads'] = $this->classifed_model->sig_ads();
                    $data['free_ads'] = $this->classifed_model->free_ads();            	
                }
                else{
                	$data['most_ads'] = $this->classifed_model->most_ads();
                    // echo "<pre>"; print_r($this->queries()); exit;
                    $data['sig_ads'] = $this->classifed_model->sig_ads();
                    $data['free_ads'] = $this->classifed_model->free_ads();
                }

                $this->load->view("classified_layout/inner_template",$data);
        }
}
?>