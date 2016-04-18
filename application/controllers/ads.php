<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {
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
						$data['content'] ='ads_list';
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
					}else{
						$data['ads_list'] = $this->ads_model->get_allpostads();
					}
					$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
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
			$request = '';
			 $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                );
			$data['category_list'] = $this->category_model->view();
			$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
				$data['packages_details'] = $this->category_model->get_packages_details();
				$data['ad_status'] = $this->ads_model->get_postad_status();
			if($this->uri->segment(3)){
				$request = $this->uri->segment(3);
				$view_page = 'ads_list';
				$data['content'] = $view_page;
				$data['ads_type'] = $request;
				
			}else{
				$view_page = 'ads_aprovals';
				$data['content'] = $view_page;
			}
			//echo $request;exit;
			$data['ads_list'] = $this->ads_model->get_ListAds();
			//echo '<pre>';print_r($data);echo '</pre>';exit;
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function get_ads(){
			 $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "ads_aprovals"
                );
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
			$data['ad_status'] = $this->ads_model->get_postad_status();
			
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
			$data['category_list'] = $this->category_model->view();
			$data['urgent_label'] = $this->ads_model->get_urgent_labelview();
			$data['packages_details'] = $this->category_model->get_packages_details();
			$data['ad_status'] = $this->ads_model->get_postad_status();
			$request = $this->uri->segment(3);
			//echo $request;exit;
			$data['ads_list'] = $this->ads_model->listAdsbyStatus($request);
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function adsusertype(){
			$view_page = 'ads_aprovals';
			$user_type = $this->uri->segment(3);
			$data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     $view_page,
						"user_type"     =>     $user_type
                );
			$data['category_list'] = $this->category_model->view();
$data['packages_details'] = $this->category_model->get_packages_details();
$data['ad_status'] = $this->ads_model->get_postad_status();

			$request = $this->uri->segment(3);
			//echo $request;exit;
			$data['ads_list'] = $this->ads_model->ads_by_usertype($user_type);
			$this->load->view("admin_layout/inner_template",$data);
		}

		public function get_newads_count(){
			$newads = $this->category_model->newads_cnt();
			$pendingads = $this->category_model->pendingads_cnt();
			$rejectads = $this->category_model->rejectads_cnt();
			$onholdads = $this->category_model->onhold_cnt();
			$activeads = $this->category_model->active_cnt();
			echo json_encode(
								array(
									'news_ads'=>$newads,
									'pending_ads'=>$pendingads,
									'reject_ads'=>$rejectads,
									'onhold_ads'=>$onholdads,
									'active_ads'=>$activeads)
							);
		}

		public function get_feedbackads_count(){
			$fdkads = $this->category_model->fdkads();
			$rptads = $this->category_model->rptads();
			echo json_encode(
								array(
									'fdkads'=>$fdkads,
									'rptads'=>$rptads)
							);
		}
}
?>