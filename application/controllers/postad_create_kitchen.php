<?php 

class Postad_create_kitchen extends CI_Controller{
        public function __construct(){
                parent::__construct();
                  $this->load->model("category_model");
                  $this->load->model("postad_kitchen_model");
                  $this->load->helper('url');
                  date_default_timezone_set("Europe/London");
                
        }
        public function index(){
            if($this->session->userdata("login_id") == ''){
                redirect("login");
            }

            if ($this->input->post("post_create_ad")) {
                 $this->postad_kitchen_model->postad_creat();
            }
            

        	 $data = array(
                    "kitchen_essentials"     =>  $this->category_model->kitchen_essentials(),
                    "kitchen_home"     =>  $this->category_model->kitchen_home(),
                    "kitchen_decor"     =>  $this->category_model->kitchen_decor(),
                                "title"     =>  "Classifieds",
                                "content"   =>  "postad_create_kitchen"
                        );

             $cat = $this->input->post('kitchen_cat');
             $sub_cat = $this->input->post('kitchen_sub');
             $sub_sub_cat = $this->input->post('kitchen_sub_sub');

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
             $data['free_pkg_list'] = $this->category_model->free_pkg_list_low();
             $data['gold_pkg_list'] = $this->category_model->gold_pkg_list_low();
             $data['ptm_pkg_list'] = $this->category_model->ptm_pkg_list_low();
             $data['urgentlabel1'] = $this->category_model->urgentlabel_low1();
             $data['urgentlabel2'] = $this->category_model->urgentlabel_low2();
             $data['urgentlabel3'] = $this->category_model->urgentlabel_low3();
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