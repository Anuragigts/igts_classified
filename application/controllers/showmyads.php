<?php 

class Showmyads extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
        }
        public function index(){
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "showmyads"
                );
                $lid = $this->session->userdata("login_id");
                 $most_list = $this->classifed_model->most_ads_user($lid);  
                  $sig_list = $this->classifed_model->sig_ads_user($lid); 
                   $crucial_list = $this->classifed_model->crucial_ads_user($lid); 
                   $free_list = $this->classifed_model->free_ads_user($lid); 
                 // echo "<pre>"; print_r($free_list);exit; 

                 /*most valued ads for logged on user*/
                 $data['most_list'] = $most_list;
                 /*significant ads for logged on user*/
                 $data['sig_ads'] = $sig_list;
                  /*crucial ads for logged on user*/
                 $data['crucial_ads'] = $crucial_list;
                 /*free ads for logged on user*/
                 $data['free_ads'] = $free_list;
                 $this->load->view("classified_layout/inner_template",$data);
            }
            
        }


 ?>