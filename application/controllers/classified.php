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
                
                               /* $news = array('Golders Green',
                                            '1 Bedroom Apartment with Patio in Central London',
                                            'STOLEN BMW F650 GS',
                                            'Small kittens',
                                            'Female African grey');*/
                            /*marquee title*/
                            $news = $this->classifed_model->marquee();
                           
                                $data['news'] = $news;
                                $data['show_all'] = $this->classifed_model->show_all();

                                /*sig value show all ads*/
                                $data['sig_show_all'] = $this->classifed_model->sig_show_all();
                                /*sig value for motor point*/
                                $data['sig_ads_motor'] = $this->classifed_model->sig_ads_motor();
                                /*sig value for cloths and lifestyles*/
                                $data['sig_ads_cloths'] = $this->classifed_model->sig_ads_cloths();
                                /*sig value for find a property*/
                                $data['sig_ads_property'] = $this->classifed_model->sig_ads_property();
                                /*sig value for home and kitchen*/
                                $data['sig_ads_khome'] = $this->classifed_model->sig_ads_khome();
                                /*over all ads for sig value ads(displayed for jobs only)*/
                                 $data['sig_ads_jobs'] = $this->classifed_model->sig_ads_jobs();
                                /*sig value ads for services */
                                $data['sig_ads_services'] = $this->classifed_model->sig_ads_services();
                                /*sig value ads for pets */
                                $data['sig_ads_pets'] = $this->classifed_model->sig_ads_pets();
                                /*sig value ads for ezone */
                               $data['sig_ads_ezone'] = $this->classifed_model->sig_ads_ezone();
                                /*platinum ads*/
                                $data['hot_deals'] = $this->classifed_model->hot_deals();
                                 /*mostvalued ads in home*/  
                                $data['mostvalued_ads'] = $this->classifed_model->mostvalued_ads(); 
                               /*free ads*/
                                $data['free_ads'] = $this->classifed_model->free_ads();  
                                /*business ads in home*/  
                                $data['business_ads'] = $this->classifed_model->business_ads();  

                                $data['business_logos'] = $this->classifed_model->business_logos();  

                $this->load->view("classified_layout/inner_template",$data);
        }


        public function feedback_site(){
            $feedbackads_insert = $this->classifed_model->feedbacksite_insert();
                if ($feedbackads_insert == 1) {
                    $this->session->set_flashdata('feedbackmsg', 'feedback Sent Successfully!!');
                    redirect($this->input->post('curr_url'));
                }
                else{
                   $this->session->set_flashdata('err', 'Internal error occured'); 
                    redirect($this->input->post('curr_url'));
                }
        }
}
?>