<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("settings_model");
        }
        public function profile(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Classifieds :: Admin Profile",
                        "metadesc"      =>     "Classifieds :: Admin Profile",
                        "metakey"       =>     "Classifieds :: Admin Profile",
                        "content"       =>     "profile"
                );
                $this->load->view("admin_layout/inner_template",$data);
        }
        public function change_password(){
			if($this->session->userdata("user_type") == ""){  redirect("/");};
			$data   =   array(
					"title"         =>     "Classifieds :: Admin Change Password",
					"metadesc"      =>     "Classifieds :: Admin Change Password",
					"metakey"       =>     "Classifieds :: Admin Change Password",
					"content"       =>     "change_password"
			);
			if($this->input->post("change")){
				$this->form_validation->set_rules("old_password","Old Password","required");
				$this->form_validation->set_rules("password"," New Password","required");
				$this->form_validation->set_rules("cpassword","Confirm Password",'required|matches[password]');
				if($this->form_validation->run() == TRUE){
					$upd    =   $this->settings_model->change();
					if($upd == 1){
						redirect('admin/logout');
						//$this->session->set_flashdata("msg","Password has been updated Successfully");
						//redirect("settings/change_password");
					}else if($upd == 'wrong'){
						$this->session->set_flashdata("err","The Old Password you entered is incorrect");
						redirect("settings/change_password");
					}else{
						$this->session->set_flashdata("err","Some thing went wrong while updating the Password, Please try again..");
						redirect("settings/change_password");
					}
				}
			}
			$this->load->view("admin_layout/inner_template",$data);
        }
		function list_banners(){
		
				//echo '<pre>';print_r($this->input->post());echo '</pre>';
				
				$all_banners = $this->settings_model->get_banners();
				$data   =   array(
						"title"         =>     "Classifieds :: Admin Banners",
						"metadesc"      =>     "Classifieds :: Admin Banners",
						"metakey"       =>     "Classifieds :: Admin Banners",
						"content"       =>     "list_banners",
						"all_banners"	=>     $all_banners
				);
			$this->load->view("admin_layout/inner_template",$data);
		}
		function get_banner(){	
			if($this->input->post('update_banner')){
				$update_status = $this->settings_model->update_banner();
				if($update_status)
					redirect('admin_dashboard');
				else 
					$all_banners = $this->settings_model->get_banners();
			}else{
				$b_id = $this->uri->segment(3);
				if($b_id>0){
					$all_banners = $this->settings_model->get_banners_details($b_id);
					$data   =   array(
							"title"         =>     "Classifieds :: Admin Banners",
							"metadesc"      =>     "Classifieds :: Admin Banners",
							"metakey"       =>     "Classifieds :: Admin Banners",
							"content"       =>     "edit_banners",
							"all_banners"	=>     $all_banners
				);
			$this->load->view("admin_layout/inner_template",$data);
			}else
				redirect('settings/list_banners');
			
		}
	}
}
?>