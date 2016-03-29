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
                $this->load->model("classifed_model");
                $this->load->library('pagination');
               }
        public function index(){
          if ($this->input->post()) {
          $this->session->unset_userdata('cat_id');
          $this->session->unset_userdata('seller_id');
          $this->session->unset_userdata('bus_id'); 
          $this->session->unset_userdata('search_sub'); 
          $this->session->unset_userdata('search_bustype');
          $this->session->unset_userdata('dealurgent');
          $this->session->unset_userdata('dealtitle');
          $this->session->unset_userdata('dealprice');
          $this->session->unset_userdata('recentdays');
          $this->session->unset_userdata('location');
          $this->session->unset_userdata('latt');
          $this->session->unset_userdata('longg');
            if($this->input->post('category_name')){
                 $this->session->set_userdata('cat_id',$this->input->post('category_name'));
            }
            if($this->input->post('seller_id')){
                 $this->session->set_userdata('seller_id',$this->input->post('seller_id'));
            }
             else{
                $this->session->set_userdata('seller_id',array());
            }
            if($this->input->post('business_type')){
                 $this->session->set_userdata('bus_id',$this->input->post('business_type'));
            }

            if($this->input->post('search_sub')){
                 $this->session->set_userdata('search_sub',$this->input->post('search_sub'));
            }
            else{
                $this->session->set_userdata('search_sub',array());
            }

            if($this->input->post('dealtitle_sort')){
                       $this->session->set_userdata('dealtitle',$this->input->post('dealtitle_sort'));
              }else{
                   $this->session->set_userdata('dealtitle','Any');
              }
              if($this->input->post('dealurgent')){
                       $this->session->set_userdata('dealurgent' ,$this->input->post('dealurgent'));
                }else{
                     $this->session->set_userdata('dealurgent',array());
                }
              if($this->input->post('search_bustype')){
                       $this->session->set_userdata('search_bustype',$this->input->post('search_bustype'));
                }else{
                     $this->session->set_userdata('search_bustype','all');
                }
              if($this->input->post('price_sort')){
                     $this->session->set_userdata('dealprice',$this->input->post('price_sort'));
              }else{
                   $this->session->set_userdata('dealprice','Any');
              }
              if($this->input->post('recentdays_sort')){
                     $this->session->set_userdata('recentdays',$this->input->post('recentdays_sort'));
              }else{
                   $this->session->set_userdata('recentdays','Any');
              }
              if($this->input->post('latt')){
                  $this->session->set_userdata('location',$this->input->post('find_loc'));
                     $this->session->set_userdata('latt',$this->input->post('latt'));
              }else{
                  $this->session->set_userdata('location','');
                   $this->session->set_userdata('latt','');
              }
              if($this->input->post('longg')){
                     $this->session->set_userdata('longg',$this->input->post('longg'));
              }else{
                   $this->session->set_userdata('longg','');
              }
          }

          if ($this->session->userdata('login_id') == '') {
                    $login_status = 'no';
                    $login = '';
                    $favourite_list = array();
                }
                else{
                    $login_status = 'yes';
                    $login = $this->session->userdata('login_id');
                    $favourite_list = $this->classifed_model->favourite_list();
                }

          $config = array();
            $config['base_url'] = base_url().'deal_page/index';
            $config['total_rows'] = count($this->hotdealsearch_model->count_hotdeal_search());
            $config['per_page'] = 5;
             $config['next_link'] = 'Next';
              $config['prev_link'] = 'Previous';
            $config['full_tag_open'] ='<div id="pagination" style="color:red;border:2px solid:blue">';
            $config['full_tag_close'] ='</div>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $search_option = array(
                'limit' =>$config['per_page'],
                'start' =>$page
                );
              $result = $this->hotdealsearch_model->hotdeal_search($search_option);
              $category = $this->hotdealsearch_model->category();
              $public_adview = $this->classifed_model->publicads_service();
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deal_page",
                          'category' => $category,
                          'dealsresult' => $result,
                          'login_status' =>$login_status,
                        'login' =>$login,
                        'paging_links' =>$this->pagination->create_links(),
                        'favourite_list'=>$favourite_list,
                        "public_adview" => $public_adview
                );
           /*business and consumer count for hot deals*/
          $data['busconcount'] = $this->hotdealsearch_model->busconcount_hotdeals();
          $data['sellercount'] = $this->hotdealsearch_model->sellercount_hotdeals();
          $data['subcat_cnt'] = $this->hotdealsearch_model->subcat_hotdeals();
           /*packages count*/
          $data['deals_pck'] = $this->hotdealsearch_model->deals_pck_hotdeals();
            $this->load->view("classified_layout/inner_template",$data);
        }

        public function getcityname(){
                $latt = $this->input->post('latt');
                $longg = $this->input->post('longg');
                $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$latt.",".$longg."&key=AIzaSyBM3nyeJqQycOIyVkC6qyqiw9nUl6O7FfU";
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
                        'cityname'=>$json_response['results'][0]['address_components'][1]['short_name']
                        );
                echo json_encode($res_array);
        }


}

