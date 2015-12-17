<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("category_model");
        }
        public function index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Classifieds :: Admin Category",
                        "metadesc"      =>     "Classifieds :: Admin Category",
                        "metakey"       =>     "Classifieds :: Admin Category",
                        "content"       =>     "category"
                );
                if($this->input->post("create_category")){
                        $this->form_validation->set_rules("cat_name","Category Name","required|is_unique[catergory.category_name]");
                        if($this->form_validation->run() == TRUE){
                                $in     =   $this->category_model->create();
                                if($in  ==  1){
                                        $this->session->set_flashdata("msg","Created Category Successfully");
                                        redirect("category");
                                }else{
                                        $this->session->set_flashdata("err","Internal error occured while creating category");
                                        redirect("category");
                                }
                        }
                }
                $data["view"]   =   $this->category_model->view();
                $this->load->view("admin_layout/inner_template",$data);
        }
        public function categoryActDea(){
                $ct     = $this->category_model->categoryActDea();
                echo $ct;
        }
        public function edcategory(){
                echo $this->category_model->edcategory();
        }
        public function update(){
                echo $this->category_model->update();
        }
        public function delete(){
                $uri = $this->uri->segment(3);
                $this->category_model->delete($uri);
                $this->session->set_flashdata("msg","Deleted Category Successfully");
                redirect("category");
        }
}
?>