<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("common_model");
                $this->load->model("subcategory_model");
        }
        public function index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Classifieds :: Admin Sub Category",
                        "metadesc"      =>     "Classifieds :: Admin Sub Category",
                        "metakey"       =>     "Classifieds :: Admin Sub Category",
                        "content"       =>     "subcategory"
                );
                if($this->input->post("create_subcategory")){
                        $this->form_validation->set_rules("cat_name","Category Name","required");
                        $this->form_validation->set_rules("scat_name","Sub Category Name","required|is_unique[sub_category.sub_category_name]");
                        if($this->form_validation->run() == TRUE){
                                $in     =   $this->subcategory_model->create();
                                if($in  ==  1){
                                        $this->session->set_flashdata("msg","Created Sub Category Successfully");
                                        redirect("subcategory");
                                }else{
                                        $this->session->set_flashdata("err","Internal error occured while creating sub category");
                                        redirect("subcategory");
                                }
                        }
                }
                $data["view"]       =   $this->common_model->view_cat();
                $data["sview"]      =   $this->subcategory_model->sview_cat();
                $this->load->view("admin_layout/inner_template",$data);
        }
        public function edcategory(){
                echo $this->subcategory_model->edcategory();
        }
        public function update(){
                echo $this->subcategory_model->update();
        }
        public function scategoryActDea(){
                echo    $this->subcategory_model->scategoryActDea();
        }
        public function delete(){
                $uri = $this->uri->segment(3);
                $this->subcategory_model->delete($uri);
                $this->session->set_flashdata("msg","Deleted Sub Category Successfully");
                redirect("subcategory");
        }
}
?>