<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subsubsubcategory extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("common_model");
                $this->load->model("ssubcategory_model");
                $this->load->model("sssubcategory_model");
        }
        public function index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Classifieds :: Admin Sub Sub Sub Category",
                        "metadesc"      =>     "Classifieds :: Admin Sub Sub Sub Category",
                        "metakey"       =>     "Classifieds :: Admin Sub Sub Sub Category",
                        "content"       =>     "subsubsubcategory"
                );
                if($this->input->post("create_sssubcategory")){
                        $this->form_validation->set_rules("cat_name","Category Name","required");
                        $this->form_validation->set_rules("scat_name","Sub Category Name","required");
                        $this->form_validation->set_rules("sscat_name","Sub Sub Category Name","required");
                        $this->form_validation->set_rules("ssscat_name","Sub Sub Sub Category Name","required");
                        if($this->form_validation->run() == TRUE){
                                $in     =   $this->sssubcategory_model->create();
                                if($in  ==  1){
                                        $this->session->set_flashdata("msg","Created Sub Sub Category Successfully");
                                        redirect("subsubsubcategory");
                                }else{
                                        $this->session->set_flashdata("err","Internal error occured while creating sub sub category");
                                        redirect("subsubsubcategory");
                                }
                        }
                }
				
                $data["view"]       =   $this->common_model->view_cat();
                $data["bview"]      =   $this->common_model->view_scat();
                $data["bbview"]      =   $this->common_model->view_sscat();
                $data["sview"]      =   $this->sssubcategory_model->sview_cat();

                $this->load->view("admin_layout/inner_template",$data);
        }
        public function scategoryActDea(){
                echo $this->sssubcategory_model->scategoryActDea();
        }
        public function edcategory(){
                echo $this->sssubcategory_model->edcategory();
        }
        public function update(){
                echo $this->ssubcategory_model->update();
        }
        public function delete(){
                $uri = $this->uri->segment(3);
                $this->sssubcategory_model->delete($uri);
                $this->session->set_flashdata("msg","Deleted Sub Sub Category Successfully");
                redirect("subsubsubcategory");
        }
		public function create_ssscat(){
			echo '57';/*
			$data["view"]       =   $this->common_model->view_cat();
			$data["bview"]      =   $this->common_model->view_scat();
			$data["bbview"]      =   $this->common_model->view_sscat();
			$data["sview"]      =   $this->sssubcategory_model->sview_cat();
			$this->load->view('admin/create_ssscat',$data);*/
		}
}
?>