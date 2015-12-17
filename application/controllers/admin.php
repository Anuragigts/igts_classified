<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("admin_model");
        }
        public function index(){
                if($this->input->post("sign_in")){
                        $this->form_validation->set_rules("email","Email Id","required|valid_email");
                        $this->form_validation->set_rules("password","Password","required");
                        if($this->form_validation->run() == TRUE){
                                $ins = $this->admin_model->login();
                                if($ins == 1){
                                        $this->session->set_flashdata("msg","Login Success");
                                        redirect("admin_dashboard");
                                }
                                else{
                                        $this->session->set_flashdata("err","Login Failed");
                                        redirect("admin/index");
                                }
                        }
                }
		$this->load->view('admin_layout/login');
	}
        public function banner(){
                $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "dashboard"
                );
                $this->load->view("admin_layout/inner_template",$data);
        }
        public function logout(){
                $this->session->sess_destroy();
                redirect("admin/index");
        }
}
?>