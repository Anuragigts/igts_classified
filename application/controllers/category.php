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
		public function listPackages(){
			$packages_details= $this->category_model->get_packages_details();
			$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "pkg_detailsList",
						"packages_details"  =>     $packages_details
                );
				$this->load->view("admin_layout/inner_template",$data);
		}
		public function manage_likes(){
			$likes_details= $this->category_model->get_likes_details();
			$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "manage_likes",
						"likes_details"  	=>     $likes_details
                );
				$this->load->view("admin_layout/inner_template",$data);
		} 
		public function edit_likes(){
			if($this->input->post('edit_likes')){
				$uplike = $this->category_model->uplikes();
				if ($uplike) {
					$this->session->set_flashdata("msg","Update success");
						redirect('category/manage_likes');
				}
				else{
					$this->session->set_flashdata("err","Update failed");
						redirect('category/manage_likes');
				}
			}
			$edlikestop = $this->category_model->get_toplikes_details();
			$edlikeslow = $this->category_model->get_lowlikes_details();
			$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "edit_likes",
                        'edlikestop'		=>		$edlikestop,
                        'edlikeslow'		=>		$edlikeslow
			);
			$this->load->view("admin_layout/inner_template",$data);			
        }
		public function addNewPackage(){
			$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "addNew_pkg_detail",
			);
			
			if($this->input->post('new_pkg_detail')){
				$this->form_validation->set_rules("pkg_name","Package Name","required");
				$this->form_validation->set_rules("pkg_dur","Package Duration","required");
				$this->form_validation->set_rules("img_count","No Of Images","required");
				$this->form_validation->set_rules("bump_home","Bump Days","required");
				$this->form_validation->set_rules("bump_search","Bump Search","required");
				$this->form_validation->set_rules("euro_price","Euro Price","required");
				$this->form_validation->set_rules("pound_price","pound Price","required");
					if($this->form_validation->run() != TRUE){
						$this->session->set_flashdata("err","Validation Failed");
						redirect('category/addNewPackage');
					}
					else{
						$status = $this->category_model->insert_new_pkg_details();
						if($status == 1){
							$this->session->set_flashdata("msg","Package Details is Inserted Successfully");
							redirect('category/listPackages');
						}
						else{
							$this->session->set_flashdata("err","Something went wrong, Please try againg");
							redirect('category/listPackages');
						}
					}
			}
			$this->load->view("admin_layout/inner_template",$data);			
        }
		public function EditPackage(){
			if($this->input->post('update_pkg')){
				$this->form_validation->set_rules("pkg_name","Package Name","required");
				$this->form_validation->set_rules("pkg_dur","Package Duration","required");
				$this->form_validation->set_rules("img_count","No Of Images","required");
				$this->form_validation->set_rules("bump_home","Bump Days","required");
				$this->form_validation->set_rules("bump_search","Bump Search","required");
				// $this->form_validation->set_rules("euro_price","Euro Price","required");
				$this->form_validation->set_rules("pound_price","pound Price","required");
					if($this->form_validation->run() != TRUE){
						$this->session->set_flashdata("err","Validation Failed");
						redirect('category/addNewPackage');
					}
					else{
						$status = $this->category_model->update_pkg_details();
						if($status == 1){
							$this->session->set_flashdata("msg","Package Details are Updated Successfully");
							redirect('category/listPackages');
						}
						else{
							$this->session->set_flashdata("err","Something went wrong, Please try againg");
							redirect('category/listPackages');
						}
					}
			}else{
				$pkg_id= $this->uri->segment(3);
				$packages_details = $this->category_model->get_pkg($pkg_id);
				$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "Edit_pkg_detail",
						"packages_details"  =>     $packages_details
                );
				//echo "<pre>";print_r($packages_details );echo "</pre>";exit;
			}
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function urgLabel()
		{
			$urg_pkg_details= $this->category_model->get_urg_label();
			$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "urg_label_List",
						"urg_pkg_details"  =>     $urg_pkg_details
                );
				$this->load->view("admin_layout/inner_template",$data);
		}
		public function addNewUrglabel(){
			$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "addNewUrglabel",
			);
			//echo "<pre>";print_r( $this->input->post());echo "</pre>";
			
			if($this->input->post('new_pkg_urgLabel')){
				$this->form_validation->set_rules("urg_name","Urgent Package Name","required");
				$this->form_validation->set_rules("urg_dur","Urgent Label Duration","required");
				$this->form_validation->set_rules("euro_price","Euro Price","required");
				$this->form_validation->set_rules("pound_price","Pound Price","required");
					if($this->form_validation->run() != TRUE){
						$this->session->set_flashdata("err","Validation Failed");
						redirect('category/addNewUrglabel');
					}
					else{
						$status = $this->category_model->insert_urg_label_details();
						if($status == 1){
							$this->session->set_flashdata("msg","Package Details is Inserted Successfully");
							redirect('category/urgLabel');
						}
						else{
							$this->session->set_flashdata("err","Something went wrong, Please try againg");
							redirect('category/urgLabel');
						}
					}
			}
			$this->load->view("admin_layout/inner_template",$data);			
        }
		public function EditUrglabel(){
			if($this->input->post('update_urgLabel')){
				$this->form_validation->set_rules("urg_name","Urgent Package Name","required");
				$this->form_validation->set_rules("urg_dur","Urgent Label Duration","required");
				$this->form_validation->set_rules("euro_price","Euro Price","required");
				$this->form_validation->set_rules("pound_price","Pound Price","required");
					if($this->form_validation->run() != TRUE){
						$this->session->set_flashdata("err","Validation Failed");
						redirect('category/addNewUrglabel');
					}
					else{
						$status = $this->category_model->update_urg_label_details();
						if($status == 1){
							$this->session->set_flashdata("msg","Urgent Label Details Updated Successfully");
							redirect('category/urgLabel');
						}
						else{
							$this->session->set_flashdata("err","Something went wrong, Please try againg");
							redirect($this->input->post('curr_url'));
						}
					}
			}else{
			$urg_id= $this->uri->segment(3);
			$urg_label = $this->category_model->get_urgLabel($urg_id);
			$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "Edit_UrgLabel",
						"urg_label"  =>     $urg_label
                );
				//echo "<pre>";print_r($urg_label );echo "</pre>";//exit;
			}
			$this->load->view("admin_layout/inner_template",$data);
		}
}
?>