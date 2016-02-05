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
                redirect('postad');
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
               $va      =   $this->postad_motor_model->get_plant_models();
               foreach ($va as $st){
                        $cst    .=   '<option value='.$st->id.'>'.$st->car_model.'</option>';
               }
               echo $cst;
        }



}
 ?>