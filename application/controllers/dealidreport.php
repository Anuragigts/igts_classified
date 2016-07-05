<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dealidreport extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("admin_model");
				$this->load->model("ads_model");
				$this->load->model("category_model");
        }
        public function index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "dealidreportlist"
                );
				$data['category_list'] = $this->category_model->view();
				$data['packages_details'] = $this->category_model->get_packages_details();
				$data['ad_status'] = $this->ads_model->get_postad_status();

				if($this->input->post('ads_filter')){
					$filter_details['user_type'] = '';
					$filter_details['pkg_type'] = $this->input->post('pkg_type');
					$filter_details['cat_type'] = $this->input->post('cat_type');
					$filter_details['ad_status'] = $this->input->post('ad_status');
					$filter_details['start_date'] = $this->input->post('start_date');
					$filter_details['end_date'] = $this->input->post('end_date');
					if($this->input->post('user_type')){
						$filter_details['user_type'] = $this->input->post('user_type');
						$data['user_type'] = $this->input->post('user_type');
					}
					if($this->input->post('ads_type')){
						$filter_details['ads_type'] = $this->input->post('ads_type');
						$data['ads_type'] = $this->input->post('ads_type');
						$data['content'] ='dealidreportlist';
					}
					$data['filter_details'] = $filter_details;
					$data['ads_list'] = $this->ads_model->get_filtered_ads($filter_details);
					
					$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
					
				}else{
					$post_add_id = $this->uri->segment(3);
					$post_type = $this->uri->segment(4);
					if($post_add_id !=''){
						$data['ads_details'] = $this->ads_model->get_postad($post_add_id);
						if(empty($data['ads_details'])){
							$this->session->set_flashdata('err','You dont have permision to view the Add.');
							redirect('ads/aprovals');
						}
						$data['content'] ='edit_postad';
					}
					else{
						$data['ads_list'] = $this->ads_model->get_alldealidreport();
					}
					$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
				}
				$this->load->view("admin_layout/inner_template",$data);
        }
}
?>