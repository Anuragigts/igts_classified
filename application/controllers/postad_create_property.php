<?php 

class Postad_create_property extends CI_Controller{
        public function __construct(){
                parent::__construct();
                  $this->load->model("category_model");
                  $this->load->model("postad_model");
                  $this->load->helper('url');
                  date_default_timezone_set("Europe/London");
                
        }
        public function index(){
            if($this->session->userdata("login_id") == ''){
                redirect("login");
            }

            if ($this->input->post("post_create_ad")) {
                 // $this->postad_model->postad_creat();
            }
            

        	 $data = array(
                    "property_residential"     =>  $this->category_model->property_residential(),
                    "property_commercial"     =>  $this->category_model->property_commercial(),
                                "title"     =>  "Classifieds",
                                "content"   =>  "postad_create_property"
                        );

             $cat = $this->input->post('property_cat');
             $sub_cat = $this->input->post('property_sub');
             $sub_sub_cat = $this->input->post('property_sub_sub');

             $sub_name = @mysql_result(mysql_query("SELECT * FROM `sub_category` WHERE sub_category_id = '$sub_cat'"), 0, 'sub_category_name');
             $sub_sub_name = @mysql_result(mysql_query("SELECT * FROM `sub_subcategory` WHERE `sub_subcategory_id` = '$sub_sub_cat'"), 0, 'sub_subcategory_name');


            if($sub_name == ''){
                redirect('postad');
            }
             $data['cat'] = $cat;   
             $data['sub_name'] = $sub_name;
             $data['sub_sub_name'] = $sub_sub_name;

             /*id for category*/
              $data['sub_id'] = $sub_cat;
             $data['sub_sub_id'] = $sub_sub_cat;
             $data['login_id'] = $this->session->userdata("login_id");
             $data['package_name'] = $this->category_model->package_name();
	            $this->load->view("classified_layout/inner_template",$data);
        }

        public function get_details(){
            $lid = $this->input->post('log_id');
         $res = $this->db->query("SELECT * FROM signup, login WHERE login.`signupid` = signup.`sid` AND
 login.`login_id`= '$lid' GROUP BY login.`login_id`");
            foreach ($res->result_array() as $row) {
                $data = array('busname' => $row['bus_name'],
                                'cont_name'=>$row['first_name']."".$row['lastname'],
                                'email'=>$row['login_email'],
                                'mobile'=>$row['mobile']);
            }
            echo json_encode($data);
        }
    }

 ?>