<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("admin_model");
				$this->load->model("ads_model");
        }
        public function index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "dashboard"
                );
                $this->load->view("admin_layout/inner_template",$data);
        } 
		public function aprovals(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "ads_aprovals"
                );
				$post_add_id = $this->uri->segment(3);
				$post_type = $this->uri->segment(4);
				if($post_add_id !=''){
					$this->load->model("category_model");
					$data['category_list'] = $this->category_model->view();
					$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
					//echo $post_add_id.'<br>';
					$data['ads_details'] = $this->ads_model->get_postad($post_add_id);
					//echo '<pre>';print_r($data);echo '</pre>';
					$data['content'] =$post_type.'_postad';
					//echo '<pre>';print_r($data);echo '</pre>';exit;
					
				}else{
					//$this->load->model("category_model");
					//$data['category_list'] = $this->category_model->view();
					$data['ads_list'] = $this->ads_model->get_allpostads();
					//echo '<pre>';print_r($data['ads_list'][0]);echo '</pre>';//exit;
				}
                $this->load->view("admin_layout/inner_template",$data);
        }
		public function update(){
			//echo '<pre>';print_r($this->input->post());echo '</pre>';
			$update_status = $this->ads_model->update_ad();
			//echo $update_status; exit;
			if($update_status == 1){
				$this->session->set_flashdata("msg","Update Successful");
				redirect('ads/aprovals');
			}
			else {
				$this->session->set_flashdata("error","Something went wrong, please update again");
				redirect($this->input->post('curr_url'));
			}
		}
		public function listAds(){
			 $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "ads_aprovals"
                );
				$this->load->model("category_model");
			$data['category_list'] = $this->category_model->view();
			$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
			$request = $this->uri->segment(3);
			//echo $request;exit;
			$data['ads_list'] = $this->ads_model->get_ListAds($request);
			$this->load->view("admin_layout/inner_template",$data);
		}
}
?>