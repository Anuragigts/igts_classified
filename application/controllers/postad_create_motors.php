<?php 
class Postad_create_motors extends CI_Controller{

	public function __construct(){
                parent::__construct();
                  $this->load->model('category_model');
                  $this->load->model('postad_motor_model');
                  date_default_timezone_set("Europe/London");
                }
        public function index(){

            if($this->session->userdata("login_id") == ''){
                redirect("login");
            }

            if($this->input->post('post_create_ad_motors')){
                $this->postad_motor_model->postad_creat();
            }
             
        	 $data = array(
		                    "cars_fst"     =>  $this->category_model->cars_sub_cat_fst(),
		                    "cars_sec"     =>  $this->category_model->cars_sub_cat_sec(),
                       "bikes_fst"     =>  $this->category_model->bikes_sub_cat_fst(),
    			        	 	"bikes_sec"     =>  $this->category_model->bikes_sub_cat_sec(),
                      "caravans_fst" => $this->category_model->caravans_sub_cat_fst(),
                      "vans_sub_cat_fst" => $this->category_model->vans_sub_cat_fst(),
                      "coach_sub_cat_fst" => $this->category_model->coach_sub_cat_fst(),
                      "tractor_sub_cat_fst" => $this->category_model->tractor_sub_cat_fst(),
                      "rigid_sub_cat_fst" => $this->category_model->rigid_sub_cat_fst(),
                      "trailer_sub_cat_fst" => $this->category_model->trailer_sub_cat_fst(),
                      "equip_sub_cat_fst" => $this->category_model->equip_sub_cat_fst(),
                      "farm_sub_cat_fst" => $this->category_model->farm_sub_cat_fst(),
                      "boat_sub_cat_fst" => $this->category_model->boat_sub_cat_fst(),
                          "title"     =>  "Classifieds",
                          "content"   =>  "postad_create_motors"
                        );

             $cat = $this->input->post('motor_cat');
             $sub_cat = $this->input->post('motor_sub');
             $sub_sub_cat = $this->input->post('motor_sub_sub');
             $sub_sub_sub_cat = $this->input->post('motor_sub_sub_sub');
             $sub_name = @mysql_result(mysql_query("SELECT * FROM `sub_category` WHERE sub_category_id = '$sub_cat'"), 0, 'sub_category_name');
             if ($sub_sub_cat != '') {
             $sub_sub_name = @mysql_result(mysql_query("SELECT * FROM `sub_subcategory` WHERE `sub_subcategory_id` = '$sub_sub_cat'"), 0, 'sub_subcategory_name');
             }
             else{
             $sub_sub_name = ''	;
             }

             if ($sub_sub_sub_cat != '') {
            $sub_sub_sub_name = @mysql_result(mysql_query("SELECT * FROM `sub_sub_subcategory` WHERE `sub_sub_subcategory_id` = '$sub_sub_sub_cat'"), 0, 'sub_sub_subcategory_name');      
             }
             else{
                $sub_sub_sub_name = '';
             }
             


            if($sub_name == ''){
                redirect('post-a-deal');
            }
             $data['cat'] = $cat;   
             $data['sub_name'] = $sub_name;
             $data['sub_sub_name'] = $sub_sub_name;
             $data['sub_sub_sub_name'] = $sub_sub_sub_name;

             /*id for category*/
              $data['sub_id'] = $sub_cat;
             $data['sub_sub_id'] = $sub_sub_cat;
             $data['sub_sub_sub_id'] = $sub_sub_sub_cat;
             $data['package_name'] = $this->category_model->package_name();
             $data['login_id'] = $this->session->userdata("login_id");

              $data["cars_list"] = $this->category_model->cars_sub_cat_list();

              $data["bikes_list"] =  $this->category_model->bikes_sub_cat_list();

              /*farming vehicles*/
              $data['farming'] = $this->postad_motor_model->get_farming_models();
              /*plants vehicles*/
              $data['plants'] = $this->postad_motor_model->get_plants_models();

              $data['free_pkg_list'] = $this->category_model->free_pkg_list();
             $data['gold_pkg_list'] = $this->category_model->gold_pkg_list();
             $data['ptm_pkg_list'] = $this->category_model->ptm_pkg_list();
             $data['urgentlabel1'] = $this->category_model->urgentlabel1();
             $data['urgentlabel2'] = $this->category_model->urgentlabel2();
             $data['urgentlabel3'] = $this->category_model->urgentlabel3();

	            $this->load->view("classified_layout/inner_template",$data);
        }


        

        /*bike types*/
        public function get_bike_types(){
            $cst     =   '<option value="none" selected disabled="">Select bike type</option>';
               $va      =   $this->postad_motor_model->bike_type();
               foreach ($va as $st){
                        $cst    .=   '<option value='.$st->id.'>'.$st->b_type.'</option>';
               }
               echo $cst;
        }

        /*bike models*/
        public function get_bike_models(){
               $cst     =   '<option value="none" selected disabled="">Select Model</option>';
               $va      =   $this->postad_motor_model->bike_models();
               foreach ($va as $st){
                        $cst    .=   '<option value='.$st->id.'>'.$st->bike_model.'</option>';
               }
               echo $cst;
        }

        /*car model*/
        public function get_car_models(){
            $cst     =   '<option value="none" selected disabled="">Select car model</option>';
               $va      =   $this->postad_motor_model->car_models();
               foreach ($va as $st){
                        $cst    .=   '<option value='.$st->id.'>'.$st->car_model.'</option>';
               }
               echo $cst;
        }

        /*car model*/
        public function get_plant_models(){
            $cst     =   '<option value="none" selected disabled="">Select car model</option>';
               $va      =   $this->postad_motor_model->get_plant_manis();
               foreach ($va as $st){
                        $cst    .=   '<option value='.$st->sub_sub_subcategory_id.'>'.$st->sub_sub_subcategory_name.'</option>';
               }
               echo $cst;
        }

        public function vrm_api(){
                $vrm = str_replace(" ", '', $this->input->post('vrm'));
                $url = "https://api.vehicleis.uk/vehicle-search/?vrm=".$vrm."&api_key=2139ed51b08fe88dab91aff8dd2c3be0";
                // $url = "http://phpmail.local/json_view.php";
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
                // echo $json_response['request']['error'];exit;
                if (isset($json_response['request']['error'])) {
                   $res_array = array(
                          'make'=>'',
                          'model'=>'',
                          'colour'=>'',
                          'manufacture_year'=>'',
                          'fuel_type'=>'',
                          'engine_size'=>''
                          );
                  echo json_encode($res_array);
                }
                else{
                  $res_array = array(
                        'make'=>$json_response['data']['vehicle_information']['make'],
                        'model'=>$json_response['data']['vehicle_information']['model'],
                        'colour'=>$json_response['data']['vehicle_information']['colour'],
                        'manufacture_year'=>$json_response['data']['vehicle_information']['manufacture_year'],
                        'fuel_type'=>$json_response['data']['vehicle_information']['fuel_type'],
                        'engine_size'=>$json_response['data']['vehicle_information']['engine_size'],
                        'mot'=>$json_response['data']['dvla_vehicle_information']['mot']['expires'],
                        'road_tax'=>$json_response['data']['dvla_vehicle_information']['tax']['expires']
                        );
                echo json_encode($res_array);
                }
                
        }



}
 ?>