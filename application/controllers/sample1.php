<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Sample1 extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("login_model");
        }
        public function index(){
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "json_demo"
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function json_demo(){
                $vrm = $this->input->post('vrm');
                // $url = "https://api.vehicleis.uk/vehicle-search/?vrm=".$vrm."&api_key=2139ed51b08fe88dab91aff8dd2c3be0";
                $url = "http://phpmail.local/json_view.php";
                $ch = curl_init();
                // Disable SSL verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                // Will return the response, if false it print the response
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set the url
                curl_setopt($ch, CURLOPT_URL,$url);
                // Execute
                $result=curl_exec($ch);
                // Closing
                curl_close($ch);
                $json_response = json_decode($result, true);
                $res_array = array(
                        'make'=>$json_response['data']['vehicle_information']['make'],
                        'model'=>$json_response['data']['vehicle_information']['model'],
                        'colour'=>$json_response['data']['vehicle_information']['colour'],
                        'manufacture_year'=>$json_response['data']['vehicle_information']['manufacture_year'],
                        'fuel_type'=>$json_response['data']['vehicle_information']['fuel_type'],
                        'engine_size'=>$json_response['data']['vehicle_information']['engine_size']/*,
                        'no_miles'=>$json_response['data']['mot_history']['odometer_reading'],
                        'status'=>$json_response['data']['mot_history']['test_result']*/
                        );
                echo json_encode($res_array);
        }
        
}

