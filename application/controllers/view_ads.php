<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class View_ads extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("view_ads_model");
                $this->load->model("common_model");
        }
        public function index(){
                $data = array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "view_ads"
                );
                $uri3               =       $this->uri->segment(3);
                $uri4               =       $this->uri->segment(4);
                $uri5               =       $this->uri->segment(5);
                if($this->input->post("go") != ""){
                        $this->session->set_userdata("minPrice",$this->input->post('minPrice'));
                        $this->session->set_userdata("maxPrice",$this->input->post('maxPrice'));
                }  
                $min                =       $this->session->userdata("minPrice")?$this->session->userdata("minPrice"):"";
                $max                =       $this->session->userdata("maxPrice")?$this->session->userdata("maxPrice"):"";
                $data["cat"]        =       $this->view_ads_model->get_cat($uri3,$min,$max);
                $data["sscat"]      =       $this->view_ads_model->get_subcat($uri3,$uri4,$min,$max);
                $data["scat"]       =       $this->view_ads_model->get_ssubcat($uri3,$uri4,$uri5,$min,$max);
                $data["cty"]        =       $this->common_model->countries();
                $this->load->view("classified_layout/inner_template",$data);
        }
        public function ad_details(){
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "ad_details"
                );
                $uri                =       $this->uri->segment(3);
                $data["img_view"]   =       $this->view_ads_model->img_details($uri);
                $data["det_view"]   =       $this->view_ads_model->ad_details($uri);
                $this->load->view("classified_layout/inner_template",$data);
        }
}
?>