<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Settings_model extends CI_Model{
	public function change(){
		$login  =   $this->session->userdata("login_id");
		$chk_pw = md5($this->input->post("old_password"));
		
		$this->db->select();
		$this->db->where('login_password',$chk_pw);
		$this->db->where('login_id',$login);
		$this->db->from('login');
		$l_details = $this->db->get()->row();
		//echo '<pre>';print_r($l_details);echo '</pre>';
		//echo $this->db->last_query();exit;
		if(count($l_details) == 1){			
			$dtr    =   array(
							"login_password"    =>  md5($this->input->post("password"))
					);
			$this->db->update("login",$dtr,array("login_id" => $login));
			if($this->db->affected_rows() > 0){
					return 1;
			}else{
					return 0;
			}
		}else{
			return 'wrong';
		}
	}
		
	public function get_banners(){
		$this->db->select();
		$this->db->from('publicads_searchview as p_v');
		$this->db->join('catergory as cat', "cat.category_id = p_v.cat_id", 'join');
		$banners = $this->db->get()->result();
		return $banners;	
	}
	public function get_banners_details($b_id){
		$this->db->select();
		$this->db->from('publicads_searchview');
		$this->db->where('id',$b_id);
		$banners = $this->db->get()->row();
		return $banners;	
	}	
	public function update_banner(){
		$update=array(
			'sidead_one'=>htmlspecialchars($this->input->post('banner_side')),
			'topad'=>htmlspecialchars($this->input->post('banner_top')),
			'mid_ad'=>htmlspecialchars($this->input->post('banner_mid'))
			);
			$this->db->where('id',$this->input->post('b_id'));
			$up_status = $this->db->update('publicads_searchview', $update);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
			// return $up_status;
	}

	public function get_newletters(){
		$this->db->select();
		$this->db->from("newsletter");
		$this->db->where("status",1);
		$rs = $this->db->get()->result();
		return $rs;
	}

	public function get_deactivatedacnts(){
		$this->db->select();
		$this->db->from("deactive_accounts AS dact");
		$this->db->join("login lg","lg.login_id= dact.login_id");
		$this->db->where("lg.is_confirm !=","confirm");
		$rs = $this->db->get()->result();
		return $rs;
	}

	public function get_contact_details(){
		$this->db->select();
		$this->db->from("contactus");
		$this->db->order_by("posted_on", "DESC");
		$rs = $this->db->get()->result();
		return $rs;
	}
	/*show all categories in home page*/
    public function allcategory(){

        $this->db->select("*");
        $this->db->from("`catergory`");
        $rs = $this->db->get();
        
        if($this->db->affected_rows() > 0){
            return $rs->result();
        }
        else{
            return array();
        }

    }

    public function create_blog(){
    	if ($this->input->post()) {
				$target_dir = "./pictures/blogs/";
                    if ($_FILES["file"]["name"] != '') {
                       $new_name = explode(".", $_FILES["file"]["name"]);
            $blog_logo = time().".".end($new_name);
            move_uploaded_file($_FILES["file"]["tmp_name"],$target_dir.time().".".end($new_name));
                        $insert = array(
                        				'blog_title'	=>  $this->input->post('blog_title'),
                        				'blog_desc'		=>	$this->input->post('blog_desc'),
                        				'blog_cat'		=>	$this->input->post('blog_cat'),
                        				'blog_image'	=>	$blog_logo,
                        				'blog_created'	=>	date("Y-m-d H:i:s"),
                        				'blog_createdby'=>	$this->session->userdata('login_id'),
                        				'status'		=>	1
                        	);
                        $this->db->insert("blog",$insert);
                        if ($this->db->affected_rows() > 0) {
                        	return 1;
                        }
                        else{
                        	return 0;
                        }
                        return 1;
                    }
                    else{
                    	return 0;
                    }
                 }
    }

    
    public function update_blog(){
    	if ($this->input->post()) {
				$target_dir = "./pictures/blogs/";
                    if ($_FILES["file"]["name"] != '') {
                       $new_name = explode(".", $_FILES["file"]["name"]);
           $blog_logo = $this->input->post("imgname");
            move_uploaded_file($_FILES["file"]["tmp_name"],$target_dir.$blog_logo);
        	}
        	else{
        		$blog_logo = $this->input->post("imgname");
        	}
                        $update = array(
                        				'blog_title'	=>  $this->input->post('blog_title'),
                        				'blog_desc'		=>	$this->input->post('blog_desc'),
                        				'blog_cat'		=>	$this->input->post('blog_cat'),
                        				'blog_image'	=>	$blog_logo,
                        				'blog_created'	=>	date("Y-m-d H:i:s"),
                        				'blog_createdby'=>	$this->session->userdata('login_id'),
                        				'status'		=>	1
                        	);
                        $this->db->where("id", $this->input->post("blog_id"));
                        $this->db->update("blog",$update);
                        if ($this->db->affected_rows() > 0) {
                        	return 1;
                        }
                        else{
                        	return 0;
                        }
                 }
    }

    public function bloglist(){
    	$this->db->select();
    	$this->db->from("blog");
    	$this->db->where("status", 1);
    	$this->db->order_by("blog_created","desc");
    	return $this->db->get()->result();
    }

    
    public function editblog($id){
    	$this->db->select();
    	$this->db->from("blog");
    	$this->db->where("id", $id);
    	return $this->db->get()->row();
    }

    public function del_blog($id){
    	$this->db->select();
    	$this->db->from("blog");
    	$this->db->where("id",$id);
    	$img = $this->db->get()->row('blog_image');


    	$this->db->delete('blog', array('id' => $id)); 
    	unlink("./pictures/blogs/".$img);
    	if ($this->db->affected_rows() > 0) {

    		return 1;
    	}
    	else{
    		return 0;
    	}
    }

    public function bloglistview($data){
    	$this->db->select();
    	$this->db->where("status", 1);
    	$this->db->join("login","login.login_id=blog.blog_createdby",'inner');
    	
    	if ($this->session->userdata("blogcat") && $this->session->userdata("blogcat") != '') {
    		$this->db->join("catergory","catergory.category_id=blog.blog_cat AND catergory.category_id='".$this->session->userdata("blogcat")."'",'inner');
    	}
    	else{
    		$this->db->join("catergory","catergory.category_id=blog.blog_cat",'inner');
    	}
    	$this->db->order_by("blog_created","desc");
    	$rs = $this->db->get("blog",$data['limit'],$data['start']);
    	return $rs->result();
    }
     public function bloglistviewcat($data){
    	$this->db->select();
    	$this->db->where("status", 1);
    	$this->db->join("login","login.login_id=blog.blog_createdby",'inner');
    	$this->db->join("catergory","catergory.category_id=blog.blog_cat AND catergory.category_id='".$this->uri->segment(3)."'",'inner');
    	$this->db->order_by("blog_created","desc");
    	$rs = $this->db->get("blog",$data['limit'],$data['start']);
    	return $rs->result();
    }
    public function count_bloglistview(){
    	$this->db->select();
    	$this->db->from("blog");
    	$this->db->where("status", 1);
    	$this->db->join("login","login.login_id=blog.blog_createdby",'inner');
    	$this->db->order_by("blog_created","desc");
    	return $this->db->get()->result();
    }

    public function count_bloglistviewcat(){
    	$this->db->select();
    	$this->db->from("blog");
    	$this->db->where("status", 1);
    	$this->db->join("login","login.login_id=blog.blog_createdby",'inner');
    	$this->db->join("catergory","catergory.category_id=blog.blog_cat AND catergory.category_id='".$this->uri->segment(3)."'",'inner');
    	$this->db->order_by("blog_created","desc");
    	return $this->db->get()->result();
    }

    public function blogdetails($id){
    	$this->db->select();
    	$this->db->from("blog");
    	$this->db->where("status", 1);
    	$this->db->where("id", $id);
    	$this->db->join("login","login.login_id=blog.blog_createdby",'inner');
    	return $this->db->get()->row();
    }

    public function category_count(){
    	$this->db->select("*, COUNT(blog.blog_cat) AS no_blogs");
    	$this->db->from("catergory");
    	$this->db->join("blog","blog.blog_cat = catergory.category_id",'left');
    	$this->db->group_by("catergory.category_id");
    	return $this->db->get()->result();
    }

   /* public function blog_comment(){
    	$insert = array(
        				'name'	=>  $this->input->post('name'),
        				'email'		=>	$this->input->post('email'),
        				'message'		=>	$this->input->post('comment'),
        				'status'	=>	1
        				'created_on'	=>	date("Y-m-d H:i:s")
        	);
        $this->db->insert("blog_comments",$insert);
        if ($this->db->affected_rows() > 0) {
        	return 1;
        }
        else{
        	return 0;
        }
    }*/

}
?>