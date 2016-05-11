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

        public function mailtest(){
                $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => '99rightdeals@googlemail.com',
                'smtp_pass' => 'S@ibaba2016',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
                 );
                $this->load->library('email', $config);
                $msg = "<span id='body_style' style='font-family: arial, sans-serif; color: #313a42;display:block;margin: 0; padding: 0; background: #ffffff; font-size: 14px; color: #313a42;'>
                        <table border='0' cellspacing='0' cellpadding='0' width='100%' summary=''>
                                <tr>
                                        <td>
                                                <table border='0' cellspacing='0' cellpadding='0' style='background: #EF530D;' width='640' align='center' summary=''>
                                                        <tr>
                                                                <td class='logoContainer' align='left' style='padding: 0; width: 320px;'>
                                                                        <a href='http://99rightdeals.com' target='_blank' title='Lorem logo' style='color: #ffffff;'>
                                                                                <img class='logo' src='http://99rightdeals.com/img/maillogo.png' width='200' style='border: none; text-decoration: none;padding-left: 10px;' alt='Lorem logo' />
                                                                        </a>
                                                                </td>
                                                                <td class='webversion' align='right' style='width: 200px; text-align: right;padding-top: 0px;'>
                                                                        <h3 style='color: #fff !important; font-size: 24px;padding-right: 10px;'>WELCOME</h3>
                                                                </td>
                                                        </tr>
                                                </table>
                                        </td>
                                </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' summary=''>
                                <tr>
                                        <td>
                                                <table border='0' cellpadding='0' cellspacing='0' width='640' align='center' summary=''>
                                                        <tr>
                                                                <td class='bigHeader'><img src='http://99rightdeals.com/img/slide/template.jpg' width='100%' height='250' /></td>
                                                        </tr>
                                                </table>
                                        </td>
                                </tr>
                        </table>
                        <table style='table-layout: auto' id='table' align='center' border='0' cellpadding='0' cellspacing='0' >
                                <tbody>
                                        <tr>
                                                <td style='background-color: rgb(255, 255, 255)' id='subcell' bgcolor='#ffffff' >
                                                        <table style='table-layout: auto' id='table' border='0' cellpadding='0' cellspacing='0' >
                                                                <tbody>
                                                                        <tr>
                                                                                <td style='padding-top: 20px; padding-right: 15px; padding-bottom: 20px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/home-page' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Home</a></td>
                                                                                <td style='padding-right: 15px;padding-left: 15px' align='center' ><a href='http://99rightdeals.com/about-us' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none' >About Us</a></td>
                                                                                <td style='padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/safety-tips' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Assistence</a></td>
                                                                                <td style='padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/terms-conditions' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Terms & Conditions </a></td>
                                                                                <td style='padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/contact-us' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Contact Us</a></td>
                                                                        </tr>
                                                                </tbody>
                                                        </table>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                        
                        <table border='0' cellpadding='0' cellspacing='0' width='640' align='center' summary=''>
                                <tr>
                                        <td class='introTitle' style='color: #f26c4f;font-size: 18px; line-height: 1.2; text-align: center; padding: 20px 0px 5px 0px;'>Your Deal Status</td>
                                </tr>
                                <tr>
                                        <td style='font-family: 0px; line-height: 0px;' height='20'>&nbsp;</td>
                                </tr>
                        </table>";
                        
                        $msg .= "<table class='deal' width='640' align='center' style='border: 1px solid black;
                                            border-collapse: collapse;
                                        padding: 15px;margin-bottom:30px ;'>
                                  <tr>
                                    <th align='left' style='border: 1px solid black;
                                            border-collapse: collapse;
                                        padding: 15px;'>Deal ID</th>
                                    <th align='left' style='border: 1px solid black;
                                            border-collapse: collapse;
                                        padding: 15px;'>Deal Title</th>              
                                    <th align='left' style='border: 1px solid black;
                                            border-collapse: collapse;
                                        padding: 15px;'>Status</th>
                                  </tr>
                                  <tr>
                                    <td style='border: 1px solid black;
                                            border-collapse: collapse;
                                        padding: 15px;'><a href='#'>201605665</a></td>
                                    <td style='border: 1px solid black;
                                            border-collapse: collapse;
                                        padding: 15px;word-break: break-all;'>DoeDoeDoeDoeDoeDoeDoeDoeDoeDoeDoeDoe</td>                
                                    <td style='border: 1px solid black;
                                            border-collapse: collapse;
                                        padding: 15px;'>Pending</td>
                                  </tr>
                                </table>";
                                if ($this->input->post('ad_status') == '4') {
                                /*rejected message*/
                                        $msg .="<table class='deal' width='640' align='center' style='border: 1px solid black;
                                                    border-collapse: collapse;
                                                padding: 15px;margin-bottom:30px ;'>
                                          <tr>
                                            <th style='border: 1px solid black;
                                                    border-collapse: collapse;
                                                padding: 15px;' align='left'>Comment</th>
                                            
                                          </tr>
                                          <tr>
                                            <td style='border: 1px solid black;
                                                    border-collapse: collapse;
                                                padding: 15px;word-break: break-all;'>dfgddsfdsfdfgddsfdsfdfgddsfdsfdfgddsfdsfdfgddsfdsfdfgddsfdsfdfgddsfdsfdfgddsfdsfdfgddsfdsfdfgddsfdsf</td>
                                          </tr>
                                        </table>";
                                }
                          $msg .= "<table border='0' cellspacing='0' cellpadding='0' width='100%' align='center' summary='' style='background-color: #E9F2F9;' class='footer'>
                                        <tr>
                                                <td style='font-family: 0px; line-height: 0px;' height='10'>&nbsp;</td>
                                        </tr>
                                        <tr>
                                                <td class='footNotes' align='center'>
                                                        Copyright @ 2016.All Right Reserved to <strong> <a href='http://99rightdeals.com/' style='color: #f26c4f;' target='_blanks'>99 Right Deals</a> </strong>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td style='font-family: 0px; line-height: 0px;' height='10'>&nbsp;</td>
                                        </tr>
                                </table>
                </span>";
                        /*$this->email->set_newline("\r\n");
                        $this->email->from('admin@99rightdeals.com', "99RightDeals");
                        $this->email->to('punnam.c@igravitas.in');
                        $this->email->subject("Deal Status Changed ");
                        $this->email->message($msg);
                        $this->email->send();*/
        }
        
}

