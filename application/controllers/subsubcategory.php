<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subsubcategory extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("common_model");
                $this->load->model("ssubcategory_model");
        }
        public function index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Classifieds :: Admin Sub Sub Category",
                        "metadesc"      =>     "Classifieds :: Admin Sub Sub Category",
                        "metakey"       =>     "Classifieds :: Admin Sub Sub Category",
                        "content"       =>     "subsubcategory"
                );
                if($this->input->post("create_ssubcategory")){
                        $this->form_validation->set_rules("cat_name","Category Name","required");
                        $this->form_validation->set_rules("scat_name","Sub Category Name","required");
                        $this->form_validation->set_rules("sscat_name","Sub Sub Category Name","required|is_unique[sub_subcategory.sub_subcategory_name]");
                        if($this->form_validation->run() == TRUE){
                                $in     =   $this->ssubcategory_model->create();
                                if($in  ==  1){
                                        $this->session->set_flashdata("msg","Created Sub Sub Category Successfully");
                                        redirect("subsubcategory");
                                }else{
                                        $this->session->set_flashdata("err","Internal error occured while creating sub sub category");
                                        redirect("subsubcategory");
                                }
                        }
                }
                $data["view"]       =   $this->common_model->view_cat();
                $data["bview"]      =   $this->common_model->view_scat();
                $data["sview"]      =   $this->ssubcategory_model->sview_cat();
                $this->load->view("admin_layout/inner_template",$data);
        }
        public function scategoryActDea(){
                echo $this->ssubcategory_model->scategoryActDea();
        }
        public function edcategory(){
                echo $this->ssubcategory_model->edcategory();
        }
        public function update(){
                echo $this->ssubcategory_model->update();
        }
        public function delete(){
                $uri = $this->uri->segment(3);
                $this->ssubcategory_model->delete($uri);
                $this->session->set_flashdata("msg","Deleted Sub Sub Category Successfully");
                redirect("subsubcategory");
        }
}
?>