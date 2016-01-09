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
                                     // echo "<pre>"; print_r($show_all); 
                                     // echo count($news1).$news1[0][1];
                                     // exit;
                                $data['news'] = $news1;
                                $data['show_all'] = $this->classifed_model->show_all();
                                                     
                if($lid != ''){
                 /*over all ads for most value ads(displayed for jobs only)*/
                 $data['most_ads'] = $this->classifed_model->most_ads();
                    /*dammy for most value ads for services */
                    $data['most_ads_services'] = $this->classifed_model->most_ads_services();
                    /*dammy for most value ads for pets */
                    $data['most_ads_pets'] = $this->classifed_model->most_ads_pets();
                    /*dammy for most value ads for deals */
                    $data['most_ads_deals'] = $this->classifed_model->most_ads_deals();
                    /*dammy for most value ads for ezone */
                    $data['most_ads_ezone'] = $this->classifed_model->most_ads_ezone();

                    $data['sig_ads'] = $this->classifed_model->sig_ads();
                   
                    $data['free_ads'] = $this->classifed_model->free_ads();  

                    /*business ads in home*/  
                    $data['business_ads'] = $this->classifed_model->business_ads();  

                }
                else{
                    /*over all ads for most value ads(displayed for jobs only)*/
                	$data['most_ads'] = $this->classifed_model->most_ads();
                    
                     /*dammy for most value ads for services */
                    $data['most_ads_services'] = $this->classifed_model->most_ads_services();
                    /*dammy for most value ads for pets */
                    $data['most_ads_pets'] = $this->classifed_model->most_ads_pets();
                    /*dammy for most value ads for deals */
                    $data['most_ads_deals'] = $this->classifed_model->most_ads_deals();
                    /*dammy for most value ads for ezone */
                    $data['most_ads_ezone'] = $this->classifed_model->most_ads_ezone();

                    $data['sig_ads'] = $this->classifed_model->sig_ads();
                    $data['free_ads'] = $this->classifed_model->free_ads();

                    /*business ads in home*/ 
                    $data['business_ads'] = $this->classifed_model->business_ads();             

                }

                $this->load->view("classified_layout/inner_template",$data);
        }
}
?>