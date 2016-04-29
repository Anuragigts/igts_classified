<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("admin_model");
				$this->load->model('category_model');
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
		public function manage_module(){
			if($this->input->post('manage_module')){
				//echo '<pre>';print_r($this->input->post());echo '</pre>';//exit;
				$sel_cats='';
				foreach($this->input->post('cats') as $cat){
					$sel_cats.= $cat.',';
				}
				$sel_cats = rtrim($sel_cats,',');
				//echo '<pre>';print_r($this->session->all_userdata());echo '</pre>';
				//$sel_cats;exit;
				$status	=	$this->category_model->update_manage_modules($sel_cats);
				if($status){
					$this->session->set_flashdata('msg','Successfully Updated the Moudule Management');
					redirect('users/staff/2');
				}
				else{
					$this->session->set_flashdata('err','Something went wrong, Please try Again');
					redirect('admin/manage_module/'.$this->input->post('staff_id'));
				}
			}else{
				$s_id = $this->uri->segment(3);
				
				$manage_cats = $this->category_model->get_managed_modules();
				//echo '<pre>';print_r($manage_cats);echo '</pre>';exit;
				if(empty($manage_cats)){
					$cats = array();
				}
				else{
					$cats = explode(',',$manage_cats->cat_ids);
				}
				$main_cat = $this->category_model->view();
				
				$data = array(
					'm_cat' 		=> 		$main_cat,
					'm_manage' 		=> 		$manage_cats,
					's_id'			=>		$s_id,
					'assigned_cats'	=>		$cats,
					"title"         =>     "Admin Dashboard",
					"metadesc"      =>     "Classifieds :: Admin Dashboard",
					"metakey"       =>     "Classifieds :: Admin Dashboard",
					"content"       =>     "manage_module"				
				);
				//echo '<pre>';print_r($data);echo '</pre>';
				$this->load->view("admin_layout/inner_template",$data);
			}
		}
		function profile(){
			  $profile = $this->admin_model->get_profile_details();
			  $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "viewProfile",
                        "profile"       =>     $profile
                );
                $this->load->view("admin_layout/inner_template",$data);
			  
		}
		public function AllFeedbacks(){
			$ad_feedbacks = $this->admin_model->get_Feedbacks();
			$categories = $this->admin_model->get_postad_categories();
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "listAllFeedbacks",
						"ad_feedbacks"  =>     $ad_feedbacks,
						"categories"    =>     $categories,
			);
			$data['pkg_types'] = $this->category_model->get_packages_details();
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function FeedbackByAds(){
			$adwise_feedbacks = $this->admin_model->get_FeedbacksByAds();
			$categories = $this->admin_model->get_postad_categories();
			$data   =   array(
						"title"        	 	=>     "Admin Dashboard",
						"metadesc"     	 	=>     "Classifieds :: Admin Dashboard",
						"metakey"       	=>     "Classifieds :: Admin Dashboard",
						"content"      	 	=>     "adwise_feedbacks",
						"adwise_feedbacks"  =>     $adwise_feedbacks,
						"categories"    	=>     $categories,
			);
			$data['pkg_types'] = $this->category_model->get_packages_details();
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function feedbackforsite(){
			$ad_feedbacks = $this->admin_model->feedbackforsite();
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "feedbackforsite",
						"all_feedbacks"  =>     $ad_feedbacks
			);
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function view_feedbacksite(){
			$ad_feedbacks = $this->admin_model->view_feedbacksite($this->uri->segment(3));
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "viewfeedbacksite",
						"all_feedbacks"  =>     $ad_feedbacks
			);
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function getAdFeedbacks(){
			$ad_feedbacks = $this->admin_model->getAdfeedbacks();
			$categories = $this->admin_model->get_postad_categories();
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "listAllFeedbacks",
						"ad_feedbacks"  =>     $ad_feedbacks,
						"categories"    =>     $categories,
			);
			$data['pkg_types'] = $this->category_model->get_packages_details();
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function AllReports(){
			
			if($this->input->post()){
				$filter_details['pkg_type'] = $this->input->post('pkg_type');
				$filter_details['cat_type'] = $this->input->post('cat_type');
				$filter_details['start_date'] = $this->input->post('start_date');
				$filter_details['end_date'] = $this->input->post('end_date');						
				$ad_reports = $this->admin_model->get_FilterReports($filter_details);
				$categories = $this->admin_model->get_postad_categories();
				$data   =   array(
							"title"         =>     "Admin Dashboard",
							"metadesc"      =>     "Classifieds :: Admin Dashboard",
							"metakey"       =>     "Classifieds :: Admin Dashboard",
							"content"       =>     "listAllReports",
							"ad_reports"    =>     $ad_reports,
							"categories"    =>     $categories,
				);
				$data['filter_details'] = $filter_details;
						
				$data['pkg_types'] = $this->category_model->get_packages_details();
				$this->load->view("admin_layout/inner_template",$data);
			}else{
				$ad_reports = $this->admin_model->get_reportforads();
				$categories = $this->admin_model->get_postad_categories();
				$data   =   array(
							"title"         =>     "Admin Dashboard",
							"metadesc"      =>     "Classifieds :: Admin Dashboard",
							"metakey"       =>     "Classifieds :: Admin Dashboard",
							"content"       =>     "listAllReports",
							"ad_reports"    =>     $ad_reports,
							"categories"    =>     $categories,
				);
				$data['pkg_types'] = $this->category_model->get_packages_details();
				$this->load->view("admin_layout/inner_template",$data);
			}
		}
		public function ReportsByAds(){
			$adwise_reports = $this->admin_model->get_ReportsByAds();
			$categories = $this->admin_model->get_postad_categories();
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "adwise_reports",
						"adwise_reports"    =>     $adwise_reports,
						"categories"    =>     $categories,
			);
			$data['pkg_types'] = $this->category_model->get_packages_details();
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function getAdReports(){
			$ad_reports = $this->admin_model->getAdReports();
			$categories = $this->admin_model->get_postad_categories();
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "listAllReports",
						"ad_reports"    =>     $ad_reports,
						"categories"    =>     $categories,
			);
			$data['pkg_types'] = $this->category_model->get_packages_details();
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function FilterReports(){
			//echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
			
			
		}
}
?>