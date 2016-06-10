<?php 

class Postad_create_ezone extends CI_Controller{
        public function __construct(){
                parent::__construct();
                  $this->load->model("category_model");
                  $this->load->model("postad_ezone_model");
                  $this->load->helper('url');
                  date_default_timezone_set("Europe/London");
                
        }
        public function index(){
            if($this->session->userdata("login_id") == ''){
                redirect("login");
            }

            if ($this->input->post("post_create_ad")) {
                 $this->postad_ezone_model->postad_creat();
            }
            

        	 $data = array(
                            "ezone_phones"      => $this->category_model->ezone_phones(),
                            "ezone_home"        => $this->category_model->ezone_home(),
                            "ezone_small"       => $this->category_model->ezone_small(),
                            "ezone_laptops"     => $this->category_model->ezone_laptops(),
                            "ezone_accesories"  => $this->category_model->ezone_accesories(),
                            "accesories_mtablets"  => $this->category_model->accesories_mtablets(),
                            "accesories_computers"  => $this->category_model->accesories_computers(),
                            "accesories_headphone"  => $this->category_model->accesories_headphone(),
                            "accesories_audiovideo"  => $this->category_model->accesories_audiovideo(),
                            "accesories_camera"  => $this->category_model->accesories_camera(),
                            "ezone_pcare"       => $this->category_model->ezone_pcare(),
                            "ezone_entertainment"   => $this->category_model->ezone_entertainment(),
                            "ezone_photo"   => $this->category_model->ezone_photo(),
                            "ezone_computers"   => $this->category_model->ezone_computers(),
                            "ezone_networks"   => $this->category_model->ezone_networks(),
                            "ezone_softwares"   => $this->category_model->ezone_softwares(),
                            "ezone_gaming"   => $this->category_model->ezone_gaming(),
                                "title"     =>  "Classifieds",
                                "content"   =>  "postad_create_ezone"
                        );

             $cat = $this->input->post('ezone_cat');
             $sub_cat = $this->input->post('ezone_sub');
             $sub_sub_cat = $this->input->post('ezone_sub_sub');

             $sub_name = @mysql_result(mysql_query("SELECT * FROM `sub_category` WHERE sub_category_id = '$sub_cat'"), 0, 'sub_category_name');
             $sub_sub_name = @mysql_result(mysql_query("SELECT * FROM `sub_subcategory` WHERE `sub_subcategory_id` = '$sub_sub_cat'"), 0, 'sub_subcategory_name');


            if($sub_name == ''){
                redirect('post-a-deal');
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
              $data['free_likes'] = $this->category_model->free_likes_low();
             $data['gold_likes'] = $this->category_model->gold_likes_low();
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