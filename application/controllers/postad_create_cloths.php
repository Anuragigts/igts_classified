<?php 

class Postad_create_cloths extends CI_Controller{
        public function __construct(){
                parent::__construct();
                
        }
        public function index(){
        	 $data = array(
                                "title"     =>  "Classifieds",
                                "content"   =>  "postad_create_cloths"
                        );


             if ($this->input->post('contact_screen')) {
                echo "<pre>"; print_r($this->input->post()); 
             }

	            $this->load->view("classified_layout/inner_template",$data);
        }
    }

 ?>