<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customercare extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("admin_model");
                $this->load->model("common_model");
        }
        public function index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Classifieds :: Customer Care",
                        "metadesc"      =>     "Classifieds :: Customer Care",
                        "metakey"       =>     "Classifieds :: Customer Care",
                        "content"       =>     "customercare"
                );
                $data["gt"]         =       $this->admin_model->getCustomers();
                $this->load->view("admin_layout/inner_template",$data);
        }
        public function create(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Classifieds :: Create Customer Care",
                        "metadesc"      =>     "Classifieds :: Create Customer Care",
                        "metakey"       =>     "Classifieds :: Create Customer Care",
                        "content"       =>     "create_customercare"
                );
                if($this->input->post("create_customer")){
                        $this->form_validation->set_rules("first_name","First Name",'required|min_length[3]');
                        $this->form_validation->set_rules("last_name","Last Name",'required');
                        $this->form_validation->set_rules("email","Email Id",'required|valid_email|is_unique[login.login_email]');
                        $this->form_validation->set_rules("password","Password",'required');
                        $this->form_validation->set_rules("houseno","House No",'required');
                        $this->form_validation->set_rules("con_password","Confirm Password",'required|matches[password]');
                        $this->form_validation->set_rules("cty","Country",'required');
                        $this->form_validation->set_rules("state","State",'required');
                        $this->form_validation->set_rules("city","City",'required');
                        $this->form_validation->set_rules("zipcode","Zip code",'required');
                        if($this->input->post("mobile") != ""){
                                $this->form_validation->set_rules("mobile","Mobile No.",'min_length[10]');
                        }                        
                        if($this->form_validation->run() == TRUE){
                                $ins   = $this->admin_model->insert_user();
                                if($ins == 1){
                                        $this->session->set_flashdata("msg","Created Customer Care Successfully");
                                        redirect("customercare/create");
                                }else{
                                        $this->session->set_flashdata("err","Internal error occurred while creating customer care");
                                        redirect("customercare/create");
                                }
                        }
                }
                $data["cty"]     =      $this->common_model->countries();
                $data["scty"]    =      $this->common_model->states();
                $data["city"]    =      $this->common_model->cities();
                $this->load->view("admin_layout/inner_template",$data);
        }
        public function edit(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Classifieds :: Edit Customer Care",
                        "metadesc"      =>     "Classifieds :: Edit Cusomer Care",
                        "metakey"       =>     "Classifieds :: Edit Customer Care",
                        "content"       =>     "edit_customercare"
                );
                $urim            =       $this->uri->segment(3);
                if($urim != ""){
                            $this->session->set_userdata("uri",$urim);
                            $uri = $this->session->userdata("uri");
                }else{
                            $uri = $this->session->userdata("uri");
                }
                $data["edt"]    =       $this->admin_model->getCustomerid($uri);
                if($this->input->post("update_customer")){
                        $this->form_validation->set_rules("first_name","First Name",'required|min_length[3]');
                        $this->form_validation->set_rules("last_name","Last Name",'required');
                        $this->form_validation->set_rules("cty","Country",'required');
                        $this->form_validation->set_rules("state","State",'required');
                        $this->form_validation->set_rules("city","City",'required');
                        $this->form_validation->set_rules("zipcode","Zip code",'required');
                        $this->form_validation->set_rules("houseno","House No",'required');
                        if($this->input->post("mobile") != ""){
                                $this->form_validation->set_rules("mobile","Mobile No.",'min_length[10]');
                        }                        
                        if($this->form_validation->run() == TRUE){
                                $ins   = $this->admin_model->update_user($uri);
                                if($ins == 1){
                                        $this->session->set_flashdata("msg","Updated Customer Care Successfully");
                                        redirect("customercare/edit/".$uri);
                                }else{
                                        $this->session->set_flashdata("err","Internal error occurred while updating customer care");
                                        redirect("customercare/edit/".$uri);
                                }
                        }
                }
                $data["cty"]     =      $this->common_model->countries();
                $data["scty"]    =      $this->common_model->states();
                $data["city"]    =      $this->common_model->cities();
                $this->load->view("admin_layout/inner_template",$data);
        }        
        public function delete(){
                $uri = $this->uri->segment(3);
                $this->common_model->delete($uri);
                $this->session->set_flashdata("msg","Deleted Customer Care Successfully");
                redirect("customercare");
        }
}
?>