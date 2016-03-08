<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("admin_model");
				$this->load->model("ads_model");
        }
        public function index(){
                $data   =   array(
                        "title"         =>     "Admin Users List",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "Customer_list"
                );
				$data['user_list'] = $this->admin_model->getCustomers();
                $this->load->view("admin_layout/inner_template",$data);
        }
		public function staff(){
			$user_status = $this->admin_model->get_user_status();
                $data   =   array(
                        "title"         =>		"Admin Staff List",
                        "metadesc"      =>		"Classifieds :: Admin Dashboard",
                        "metakey"       =>		"Classifieds :: Admin Dashboard",
                        "content"       =>		"staffList",
						"user_status"   => 		$user_status,
						'staff_type'	=>		$this->uri->segment(3)
                );
				$Staff_list = $this->admin_model->getListStaff();
				/*if(empty($Staff_list))
				{
					redirect('admin_dashboard');
				}else{*/
					$data['Staff_list'] = $Staff_list;
					$this->load->view("admin_layout/inner_template",$data);
				//}
        }
		public function get_users()
		{
			$user_list = $this->admin_model->get_userlist();
			$data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "usersList",
						'user_list'		=>		$user_list
                );
				$data['user_type']= $this->uri->segment(3);
				
                $this->load->view("admin_layout/inner_template",$data);
		}
		public function addStaff()
		{
			//echo '<pre>';print_r($this->input->post());echo '<pre>';exit;
			if($this->input->post('new_staff_detail')){
				$this->form_validation->set_rules("staff_f_name","Password","required");
				$this->form_validation->set_rules("staff_l_name","","");
				$this->form_validation->set_rules("login_email","Email Id","required|valid_email");
				$this->form_validation->set_rules("con_number","Contact Number","required|number");
				$this->form_validation->set_rules("staff_pw",'Password',"trim|required|matches[c_staff_pw]");
				$this->form_validation->set_rules("c_staff_pw","Confirm Password Number","trim|required");
				$this->form_validation->set_rules("staff_type","Staff Type","required");
				
				 if($this->form_validation->run() == TRUE){
					 $ins_status = $this->admin_model->add_new_staff();	
					 if($ins_status){
						 redirect('users/staff/'.$this->input->post('staff_type'));
					 }
					 else {
						 redirect('users/addStaff');
					 }
				}
				else{
					$this->session->set_flashdata('err','Some details are not valid, Please try again');
					$user_list = $this->admin_model->get_userlist();
					
				 
					$data   =   array(
							"title"         =>     "Add New Staff",
							"metadesc"      =>     "Classifieds :: Admin Dashboard",
							"metakey"       =>     "Classifieds :: Admin Dashboard",
							"content"       =>     "addNewStaff",
							'user_list'		=>		$user_list
					);
					$data['staff_type'] = $this->admin_model->get_staffType();
				}
			}else{
				$user_status = $this->admin_model->get_user_status();
				$user_list = $this->admin_model->get_userlist();
				$data   =   array(
						"title"         =>     "Add New Staff",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "addNewStaff",
						'user_list'		=>		$user_list,
						"user_status"   => 		$user_status,
				);
				$data['staff_type'] = $this->admin_model->get_staffType();	
			}
			$this->load->view("admin_layout/inner_template",$data);
		}
		function NewCuscare(){
			
		}
		function editStaff(){
			
			if($this->input->post('update_staff')){
				//echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
				$this->form_validation->set_rules("first_name","First Name","required");
				$this->form_validation->set_rules("last_name"," Last Name","");
				$this->form_validation->set_rules("login_email","Email Id","required|valid_email");
				$this->form_validation->set_rules("phone","Contact Number","required|number");
				$this->form_validation->set_rules("user_type","Staff Type","required");
				
				//echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
				$update_status = $this->admin_model->update_staff();
				if($update_status){
					$this->session->set_flashdata("msg","Staff Details are Update Successful");
					redirect('users/staff/'.$this->input->post('user_type'));
				}else{
					$this->session->set_flashdata('err','Unnable to update the Staff Details, Please try again');
					redirect('users/staff/'.$this->input->post('user_type'));
				}
			}else{
				$staff_detail = $this->admin_model->getStaff();
				 $staff_types = $this->admin_model->get_staffType();
				 $user_status = $this->admin_model->get_user_status();
				 $data   =   array(
							"title"         =>     "Admin Staff",
							"metadesc"      =>     "Classifieds :: Admin Dashboard",
							"metakey"       =>     "Classifieds :: Admin Dashboard",
							"content"       =>     "editStaff",
							'staff'			=>		$staff_detail,
							'user_status'	=>		$user_status,
							'staff_types'	=>		$staff_types
				);
                $this->load->view("admin_layout/inner_template",$data);
			}
		}
		function change_user_status(){
			if($this->input->post()){
				$status = $this->admin_model->change_user_status();
				if($status == 1){
					$this->session->set_flashdata("msg","Update Successful");
				}
				else{
					$this->session->set_flashdata("err","Update Failed, Please try again");
				}
			}
			redirect($this->input->post('cur_url'));
			
		}
		function list_userads(){
			$user_ads = $this->ads_model->list_userads();
			//$staff_types = $this->admin_model->get_staffType();
			 $data   =   array(
							"title"         =>     "Admin Staff",
							"metadesc"      =>     "Classifieds :: Admin Dashboard",
							"metakey"       =>     "Classifieds :: Admin Dashboard",
							"content"       =>     "list_userads",
							'user_list'		=>		$user_ads,
							/*'cities'		=>		$cities,
							'states'		=>		$states,
							'countries'		=>		$countries,
							'staff_types'	=>		$staff_types*/
				);
			 $this->load->view("admin_layout/inner_template",$data);	
			//echo '<pre>';print_r($user_ads);echo '</pre>';exit;
		}
}
?>