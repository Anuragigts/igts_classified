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
				$this->load->model("category_model");
				if($post_add_id !=''){
					
					$data['category_list'] = $this->category_model->view();
					$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
					//echo $post_add_id.'<br>';
					$data['ads_details'] = $this->ads_model->get_postad($post_add_id);
					$data['ad_status'] = $this->ads_model->get_postad_status();
					$data['packages_details'] = $this->category_model->get_packages_details();
					$data['content'] ='edit_postad';
					//echo '<pre>';print_r($data['packages_details']);echo '</pre>';exit;
					
				}else{
					//$this->load->model("category_model");
					//$data['category_list'] = $this->category_model->view();
					$data['category_list'] = $this->category_model->view();
					$data['ads_list'] = $this->ads_model->get_allpostads();
					$data['packages_details'] = $this->category_model->get_packages_details();
					//echo '<pre>';print_r($data['ads_list'][0]);echo '</pre>';//exit;
				}
				//echo '<pre>';print_r($data['packages_details']);echo '</pre>';exit;
                $this->load->view("admin_layout/inner_template",$data);
        }
		public function update(){
			$update_status = $this->ads_model->update_ad();
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
			if($this->uri->segment(3)){
				$view_page = 'ads_list';
			}else
				$view_page = 'ads_aprovals';
			
			 $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     $view_page
                );
				$this->load->model("category_model");
			$data['category_list'] = $this->category_model->view();
			$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
			$request = $this->uri->segment(3);
			//echo $request;exit;
			$data['ads_list'] = $this->ads_model->get_ListAds($request);
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function get_ads(){
			 $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "ads_aprovals"
                );
				$this->load->model("category_model");
			$data['category_list'] = $this->category_model->view();
			$data['urgent_label'] = $this->ads_model->get_ads();
			$request = $this->uri->segment(3);
			//echo $request;exit;
			$data['ads_list'] = $this->ads_model->get_ListAds($request);
			$this->load->view("admin_layout/inner_template",$data);
		}
		function change_status(){
			if($this->input->post()){
				$status = $this->ads_model->change_ads_status();
				if($status == 1){
					$this->session->set_flashdata("msg","Update Successful");
				}
				else{
					$this->session->set_flashdata("err","Update Failed, Please try again");
				}
			}
			redirect('ads/aprovals');
		}
		public function get_adsuser(){
			$u_id = $this->uri->segment(3);
			$ads_list = $this->ads_model->get_user_ListofAds($u_id);
			$user_details = $this->ads_model->get_user_details($u_id);
			$this->load->model("category_model");
		
			 $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "list_ads_ofuser",
						'ads_list'		=>		$ads_list,
						'user_details'	=>		$user_details,
                );
			$data['category_list'] = $this->category_model->view();
			$data['packages_details'] = $this->category_model->get_packages_details();
			
				//echo '<pre>';print_r($data);echo '</pre>';//exit;
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function multimedia(){
			$ad_id = $this->uri->segment(3);
			$ads_images = $this->ads_model->get_ads_media($ad_id);
			$ads_videos = $this->ads_model->get_ads_videos($ad_id);
			
			 $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "list_multimedia",
						'ads_images'	=>		$ads_images,
						'ads_videos'	=>		$ads_videos,
                );
			$this->load->view("admin_layout/inner_template",$data);
		}
		function getselected_filterads(){
			//print_r($this->input->post());
			$data['ads_list'] = $this->ads_model->getselected_filterads();
			//print_r($data['ads_list']);
			echo $this->load->view('admin/selected_ads_filter',$data);
		}
		function in_active_img(){
			$img_id = $this->input->post('img_id');
			$status = $this->input->post('status');
			//echo $img_id;
			$update_status = $this->ads_model->change_ad_img_status($img_id,$status);
			if($update_status){
				if($status == 0){
					$div_span = "<span id='img_".$img_id."' class='btn btn-success acivate_img'  title='Active Image'".">
									<span class='right_mark'> &#10003;</span>
									</span><span id='img_".$img_id."' class='btn btn-danger' title='Delete Image'>
<i class='halflings-icon white trash'></i>
</span>";
				}else if($status == 1){/*  × */
					$div_span = "<span id='	img_".$img_id."' class='btn btn-success in_active_img'  title='In Active Image'".">
								<span class='wrong_mark'>&#215; </span>
								</span>
								<span id='img_".$img_id."' class='btn btn-danger' title='Delete Image'>
<i class='halflings-icon white trash'></i>
</span>";
				}
				echo $div_span;
			}else{
				echo false;
			}
			//if($update_status)
			//print_r($data['ads_list']);
			//echo $this->load->view('admin/selected_ads_filter',$data);
		}
		
		public function listAdsbyStatus(){
				$view_page = 'ads_list';
			 $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     $view_page
                );
				$this->load->model("category_model");
			$data['category_list'] = $this->category_model->view();
			$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
			$request = $this->uri->segment(3);
			//echo $request;exit;
			$data['ads_list'] = $this->ads_model->listAdsbyStatus($request);
			$this->load->view("admin_layout/inner_template",$data);
		}
}
?>