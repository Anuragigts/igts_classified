<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ads_model extends CI_Model{
	
	public function get_assigned_cats(){
		$log_id = $this->session->userdata('login_id');
		$this->db->select('cat_ids');
		$this->db->where('status',1);
		$this->db->where('staff_id',$log_id);
		$this->db->from('manage_module');
		$cats = $this->db->get()->row();
		//echo $this->db->last_query();exit;
		return $cats;
	}
	public function get_allpostads(){
		$cats = $this->get_assigned_cats();						
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name,pay.*');
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			$this->db->join('payments AS pay','pay.product_id = p_add.ad_id','left');
			$this->db->order_by('p_add.ad_id', 'desc');
			$this->db->group_by("p_add.ad_id");
			$this->db->where('p_add.payment_status',1);
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			 // echo $this->db->last_query();exit;
			return $data;
	}

	public function get_allpaypending(){
		$cats = $this->get_assigned_cats();
		// if(empty($cats) && $this->session->userdata('user_type') != 1)
		// 	return array();
		// else{
						
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name');
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			$this->db->order_by('p_add.ad_id', 'desc');
			// if($this->session->userdata('user_type') != 1){
			// 	$cats_list = explode(',',$cats->cat_ids);		
			// 	$this->db->where_in('p_add.category_id',$cats_list);
			// }
			$this->db->where('p_add.payment_status',0);
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			//echo '<pre>';print_r($data[0]);echo '</pre>';
			// echo $this->db->last_query();exit;
			return $data;
		// }
	}


	public function get_postad($post_add_id){
		$cats = $this->get_assigned_cats();
		$this->db->select();
		$this->db->where('ad_id',$post_add_id);
		
		//echo '<pre>';print_r($data);echo '</pre>';exit;
		// if($this->session->userdata('user_type') != 1){
		// 	$cats_list = explode(',',$cats->cat_ids);		
		// 	$this->db->where_in('category_id',$cats_list);
		// }
		$this->db->from('postad');
		$data = $this->db->get()->row();
		return $data;
	}
	public function get_postad_status(){
		$this->db->select();
		$this->db->from('ad_status');
		$data = $this->db->get()->result();
		return $data;
	}
	public function get_postad_statusreg(){
		$this->db->select();
		$this->db->from('ad_status');
		$this->db->where('id !=',4);
		$data = $this->db->get()->result();
		return $data;
	}
	public function get_urgent_labelview(){
		$this->db->select();
		$this->db->from('urgent_pkg_label');
		$data = $this->db->get()->result();
		return $data;
	}
	public function update_ad(){
		$ad_details = $this->get_postad($this->input->post('ad_id'));
				$this->db->select();
				$this->db->from('login as lg');
				$this->db->join('postad as ad',"ad.login_id = lg.login_id AND ad.ad_id = '$ad_details->ad_id' ",'join');
				$mail = $this->db->get()->row(); 
			if ($this->input->post('ad_status') != $ad_details->ad_status) {
					if ($this->input->post('ad_status') == 1) {
						$status = 'Approved';
					}
					if ($this->input->post('ad_status') == 2) {
						$status = 'In Progress';
					}
					if ($this->input->post('ad_status') == 3) {
						$status = 'Onhold';
					}
					if ($this->input->post('ad_status') == 4) {
						$status = 'Rejected';
					}
					$config = Array(
		                'protocol' => 'smtp',
		                'smtp_host' => 'ssl://smtp.googlemail.com',
		                'smtp_port' => 465,
		                'smtp_user' => '99rightdeals@googlemail.com',
		                'smtp_pass' => 'S@ibaba2016',
		                'mailtype'  => 'html',
		                'charset'   => 'iso-8859-1'
		                 );
		        	$this->load->library('email', $config);
		        	$msg = "<span id='body_style' style='font-family: arial, sans-serif; color: #313a42;display:block;margin: 0; padding: 0; background: #ffffff; font-size: 14px; color: #313a42;'>
		                        <table border='0' cellspacing='0' cellpadding='0' width='100%' summary=''>
		                                <tr>
		                                        <td>
		                                                <table border='0' cellspacing='0' cellpadding='0' style='background: #EF530D;' width='640' align='center' summary=''>
		                                                        <tr>
		                                                                <td class='logoContainer' align='left' style='padding: 0; width: 320px;'>
		                                                                        <a href='http://99rightdeals.com' target='_blank' title='Lorem logo' style='color: #ffffff;'>
		                                                                                <img class='logo' src='http://99rightdeals.com/img/maillogo.png' width='200' style='border: none; text-decoration: none;padding-left: 10px;' alt='Lorem logo' />
		                                                                        </a>
		                                                                </td>
		                                                                <td class='webversion' align='right' style='width: 200px; text-align: right;padding-top: 0px;'>
		                                                                        <h3 style='color: #fff !important; font-size: 24px;padding-right: 10px;'>WELCOME</h3>
		                                                                </td>
		                                                        </tr>
		                                                </table>
		                                        </td>
		                                </tr>
		                        </table>
		                        <table border='0' cellpadding='0' cellspacing='0' width='100%' summary=''>
		                                <tr>
		                                        <td>
		                                                <table border='0' cellpadding='0' cellspacing='0' width='640' align='center' summary=''>
		                                                        <tr>
		                                                                <td class='bigHeader'><img src='http://99rightdeals.com/img/slide/template.jpg' width='100%' height='250' /></td>
		                                                        </tr>
		                                                </table>
		                                        </td>
		                                </tr>
		                        </table>
		                        <table style='table-layout: auto' id='table' align='center' border='0' cellpadding='0' cellspacing='0' >
		                                <tbody>
		                                        <tr>
		                                                <td style='background-color: rgb(255, 255, 255)' id='subcell' bgcolor='#ffffff' >
		                                                        <table style='table-layout: auto' id='table' border='0' cellpadding='0' cellspacing='0' >
		                                                                <tbody>
		                                                                        <tr>
		                                                                                <td style='padding-top: 20px; padding-right: 15px; padding-bottom: 20px; padding-left: 15px' align='center' ><a href='http://www.99rightdeals.com/' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Home</a></td>
		                                                                                <td style='padding-right: 15px;padding-left: 15px' align='center' ><a href='http://99rightdeals.com/about-us' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none' >About Us</a></td>
		                                                                                <td style='padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/safety-tips' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Assistence</a></td>
		                                                                                <td style='padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/terms-conditions' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Terms & Conditions </a></td>
		                                                                                <td style='padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/contact-us' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Contact Us</a></td>
		                                                                        </tr>
		                                                                </tbody>
		                                                        </table>
		                                                </td>
		                                        </tr>
		                                </tbody>
		                        </table>
		                        
		                        <table border='0' cellpadding='0' cellspacing='0' width='640' align='center' summary=''>
		                                <tr>
		                                        <td class='introTitle' style='color: #f26c4f;font-size: 18px; line-height: 1.2; text-align: center; padding: 20px 0px 5px 0px;'>Your Deal Status</td>
		                                </tr>
		                                <tr>
		                                        <td style='font-family: 0px; line-height: 0px;' height='20'>&nbsp;</td>
		                                </tr>
		                        </table>";
		                        
		                        $msg .= "<table class='deal' width='640' align='center' style='border: 1px solid black;
		                                            border-collapse: collapse;
		                                        padding: 15px;margin-bottom:30px ;'>
		                                  <tr>
		                                    <th style='border: 1px solid black;
		                                            border-collapse: collapse;
		                                        padding: 15px;'>Deal ID</th>
		                                    <th style='border: 1px solid black;
		                                            border-collapse: collapse;
		                                        padding: 15px;'>Deal Title</th>              
		                                    <th style='border: 1px solid black;
		                                            border-collapse: collapse;
		                                        padding: 15px;'>Status</th>
		                                  </tr>
		                                  <tr>
		                                    <td style='border: 1px solid black;
		                                            border-collapse: collapse;
		                                        padding: 15px;'><a href='http://99rightdeals.com/'>".$ad_details->ad_prefix.$ad_details->ad_id."</a></td>
		                                    <td style='border: 1px solid black;
		                                            border-collapse: collapse;
		                                        padding: 15px;word-break: break-all;'>".$ad_details->deal_tag."</td>                
		                                    <td style='border: 1px solid black;
		                                            border-collapse: collapse;
		                                        padding: 15px;'>".$status."</td>
		                                  </tr>
		                                </table>";
		                                
		                                if ($this->input->post('ad_status') == '4') {
		                               /*rejected message*/
                                $msg .="<table class='deal' width='640' align='center' style='border: 1px solid black;
	                                            border-collapse: collapse;
	                                        padding: 15px;margin-bottom:30px ;'>
	                                  <tr>
	                                    <th style='border: 1px solid black;
	                                            border-collapse: collapse;
	                                        padding: 15px;' align='left'>Comment</th>
	                                    
	                                  </tr>
	                                  <tr>
	                                    <td style='border: 1px solid black;
	                                            border-collapse: collapse;
	                                        padding: 15px;word-break: break-all;'>".$this->input->post('pkg_comment_admin')."</td>
	                                  </tr>
	                                </table>"; 
		                                }
		                         $msg .= "<table border='0' cellspacing='0' cellpadding='0' width='100%' align='center' summary='' style='background-color: #E9F2F9;' class='footer'>
		                                        <tr>
		                                                <td style='font-family: 0px; line-height: 0px;' height='10'>&nbsp;</td>
		                                        </tr>
		                                        <tr>
		                                                <td class='footNotes' align='center'>
		                                                        Copyright @ 2016.All Right Reserved to <strong> <a href='http://99rightdeals.com/' style='color: #f26c4f;' target='_blanks'>99 Right Deals</a> </strong>
		                                                </td>
		                                        </tr>
		                                        <tr>
		                                                <td style='font-family: 0px; line-height: 0px;' height='10'>&nbsp;</td>
		                                        </tr>
		                                </table>
		                </span>";
		        	$this->email->set_newline("\r\n");
			                $this->email->from('admin@99rightdeals.com', "99RightDeals");
			                $this->email->to($mail->login_email);
			                $this->email->subject("Deal Status Changed");
			                $this->email->message($msg);
			                if (!$this->email->send()) {
			                // Raise error message
			                show_error($this->email->print_debugger());
	                    }
			}
		//echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
		if($this->input->post('ad_status') != 1){
			$admin_comment = $this->input->post('pkg_comment_admin');
		}else 
			$admin_comment = '';
		
		$prev_ad_details = $this->get_postad($this->input->post('ad_id'));
		$prev_ad_status = $prev_ad_details->ad_status;
			$this->db->select();
			$this->db->where('u_pkg_id',$this->input->post('urg_type'));
			$this->db->from('urgent_pkg_label');
			$urg_pkg_details = $this->db->get()->row();
			
			$this->db->select();
			$this->db->where('pkg_dur_id',$this->input->post('pkg_type'));
			$this->db->from('pkg_duration_list');
			$pkg_details = $this->db->get()->row();
			if($this->input->post('ad_status') == 1){
			$date = date('Y-m-d H:i:s');
		if($this->input->post('urg_type') != '0'){
			
			$urg_type=array(
						'ad_id'			=>	$this->input->post('ad_id'),
						'valid_from'	=>	$date,
						'valid_to'		=>	date('Y-m-d H:i:s', strtotime($date.' + '.$urg_pkg_details->u_pkg_days.' days')),
						'no_ofdays'		=>	$urg_pkg_details->u_pkg_days,
						'status'		=>	1,
						);
			
			$this->db->insert('urgent_details',$urg_type);
		}
			
		$data=array(
			'approved_by'		=>	$this->session->userdata('login_id'),
			'approved_on'		=>	$date,
			'expire_data'		=>	date('Y-m-d H:i:s', strtotime($date. ' + '.$pkg_details->dur_days.' days')),
			'category_id'		=>	$this->input->post('cat_type'),
			'ad_status'			=>	$this->input->post('ad_status'),
			'admin_comment'		=>	$admin_comment
		);
		$this->db->where('ad_id', $this->input->post('ad_id'));
		$update_status = $this->db->update('postad', $data);
	}
	else{
		$data=array(
			'ad_status'			=>	$this->input->post('ad_status'),
			'admin_comment'		=>	$admin_comment
		);
		$this->db->where('ad_id', $this->input->post('ad_id'));
		$update_status = $this->db->update('postad', $data);
	}
		//$this->db->last_query();
		//exit;
		return $update_status;
	}
	function get_ListAds(){
		$cats = $this->get_assigned_cats();
		// if(empty($cats) && $this->session->userdata('user_type') != 1)
		// 	return array();
		// else{
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name,a_status.status_name');
			if($this->uri->segment(3)){
				$ad_type = $this->uri->segment(3);
				if($ad_type == 'platinum'){
					$this->db->where('p_add.package_type','3');
					$this->db->or_where('p_add.package_type','6');
				}else if($ad_type == 'gold'){
					$this->db->where('p_add.package_type','2');
					$this->db->or_where('p_add.package_type','5');
				}else{
					$this->db->where('p_add.package_type','1');
					$this->db->or_where('p_add.package_type','4');
				}
			}
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			$this->db->join('ad_status as a_status','a_status.id = p_add.ad_status','inner');
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			$this->db->from('postad as p_add');
			$this->db->group_by('p_add.ad_id');
			$data = $this->db->get()->result();
			return $data;
	}
	function get_ads($ads_type){
		$this->db->select('p_add.*,cat.category_id as cat_id, cat.*');
		$this->db->where('p_add.ad_status',$ads_type);
		$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
		//$this->db->order_by('p_add.updated_on', 'desc');
		$this->db->from('postad as p_add');
		$data = $this->db->get()->result();
		echo $this->db->last_query();exit;
		return $data;
	}
	function change_ads_status(){
		//echo '<pre>';print_r($this->input->post());echo '</pre>'; 
		$post_ids=explode(',',rtrim($this->input->post('selected_ads'),','));
		if ($this->input->post('change_status') == 1) {
                        $status = 'Approved';
                }
                if ($this->input->post('change_status') == 2) {
                        $status = 'In Progress';
                }
                if ($this->input->post('change_status') == 3) {
                        $status = 'Onhold';
                }
                if ($this->input->post('change_status') == 4) {
                        $status = 'Rejected';
                }
		for ($i=0; $i < count($post_ids); $i++) { 
				$ad_details = $this->get_postad($post_ids[$i]);
				$this->db->select();
	            $this->db->from('login as lg');
	            $this->db->join('postad as ad',"ad.login_id = lg.login_id AND ad.ad_id = '$ad_details->ad_id' ",'join');
	            $mail = $this->db->get()->row();
            	if ($this->input->post('ad_status') != $ad_details->ad_status) {
                                        
                                        $config = Array(
                                'protocol' => 'smtp',
                                'smtp_host' => 'ssl://smtp.googlemail.com',
                                'smtp_port' => 465,
                                'smtp_user' => '99rightdeals@googlemail.com',
                                'smtp_pass' => 'S@ibaba2016',
                                'mailtype'  => 'html',
                                'charset'   => 'iso-8859-1'
                                 );
                                $this->load->library('email', $config);
                                $msg = "<span id='body_style' style='font-family: arial, sans-serif; color: #313a42;display:block;margin: 0; padding: 0; background: #ffffff; font-size: 14px; color: #313a42;'>
                                        <table border='0' cellspacing='0' cellpadding='0' width='100%' summary=''>
                                                <tr>
                                                        <td>
                                                                <table border='0' cellspacing='0' cellpadding='0' style='background: #EF530D;' width='640' align='center' summary=''>
                                                                        <tr>
                                                                                <td class='logoContainer' align='left' style='padding: 0; width: 320px;'>
                                                                                        <a href='http://99rightdeals.com' target='_blank' title='Lorem logo' style='color: #ffffff;'>
                                                                                                <img class='logo' src='http://99rightdeals.com/img/maillogo.png' width='200' style='border: none; text-decoration: none;padding-left: 10px;' alt='Lorem logo' />
                                                                                        </a>
                                                                                </td>
                                                                                <td class='webversion' align='right' style='width: 200px; text-align: right;padding-top: 0px;'>
                                                                                        <h3 style='color: #fff !important; font-size: 24px;padding-right: 10px;'>WELCOME</h3>
                                                                                </td>
                                                                        </tr>
                                                                </table>
                                                        </td>
                                                </tr>
                                        </table>
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' summary=''>
                                                <tr>
                                                        <td>
                                                                <table border='0' cellpadding='0' cellspacing='0' width='640' align='center' summary=''>
                                                                        <tr>
                                                                                <td class='bigHeader'><img src='http://99rightdeals.com/img/slide/template.jpg' width='100%' height='250' /></td>
                                                                        </tr>
                                                                </table>
                                                        </td>
                                                </tr>
                                        </table>
                                        <table style='table-layout: auto' id='table' align='center' border='0' cellpadding='0' cellspacing='0' >
                                                <tbody>
                                                        <tr>
                                                                <td style='background-color: rgb(255, 255, 255)' id='subcell' bgcolor='#ffffff' >
                                                                        <table style='table-layout: auto' id='table' border='0' cellpadding='0' cellspacing='0' >
                                                                                <tbody>
                                                                                        <tr>
                                                                                                <td style='padding-top: 20px; padding-right: 15px; padding-bottom: 20px; padding-left: 15px' align='center' ><a href='http://www.99rightdeals.com/' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Home</a></td>
                                                                                                <td style='padding-right: 15px;padding-left: 15px' align='center' ><a href='http://99rightdeals.com/about-us' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none' >About Us</a></td>
                                                                                                <td style='padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/safety-tips' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Assistence</a></td>
                                                                                                <td style='padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/terms-conditions' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Terms & Conditions </a></td>
                                                                                                <td style='padding-top: 10px; padding-right: 15px; padding-bottom: 10px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/contact-us' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Contact Us</a></td>
                                                                                        </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' width='640' align='center' summary=''>
                                                <tr>
                                                        <td class='introTitle' style='color: #f26c4f;font-size: 18px; line-height: 1.2; text-align: center; padding: 20px 0px 5px 0px;'>Your Deal Status</td>
                                                </tr>
                                                <tr>
                                                        <td style='font-family: 0px; line-height: 0px;' height='20'>&nbsp;</td>
                                                </tr>
                                        </table>";
                                        
                                        $msg .= "<table class='deal' width='640' align='center' style='border: 1px solid black;
                                                            border-collapse: collapse;
                                                        padding: 15px;margin-bottom:30px ;'>
                                                  <tr>
                                                    <th style='border: 1px solid black;
                                                            border-collapse: collapse;
                                                        padding: 15px;'>Deal ID</th>
                                                    <th style='border: 1px solid black;
                                                            border-collapse: collapse;
                                                        padding: 15px;'>Deal Title</th>              
                                                    <th style='border: 1px solid black;
                                                            border-collapse: collapse;
                                                        padding: 15px;'>Status</th>
                                                  </tr>
                                                  <tr>
                                                    <td style='border: 1px solid black;
                                                            border-collapse: collapse;
                                                        padding: 15px;'><a href='http://99rightdeals.com/'>".$ad_details->ad_prefix.$ad_details->ad_id."</a></td>
                                                    <td style='border: 1px solid black;
                                                            border-collapse: collapse;
                                                        padding: 15px;word-break: break-all;'>".$ad_details->deal_tag."</td>                
                                                    <td style='border: 1px solid black;
                                                            border-collapse: collapse;
                                                        padding: 15px;'>".$status."</td>
                                                  </tr>
                                                </table>";
                                                
                                                if ($this->input->post('change_status') == '4') {
                                               /*rejected message*/
                                $msg .="<table class='deal' width='640' align='center' style='border: 1px solid black;
                                                    border-collapse: collapse;
                                                padding: 15px;margin-bottom:30px ;'>
                                          <tr>
                                            <th style='border: 1px solid black;
                                                    border-collapse: collapse;
                                                padding: 15px;' align='left'>Comment</th>
                                            
                                          </tr>
                                          <tr>
                                            <td style='border: 1px solid black;
                                                    border-collapse: collapse;
                                                padding: 15px;word-break: break-all;'>".$this->input->post('comment')."</td>
                                          </tr>
                                        </table>"; 
                                                }
                                         $msg .= "<table border='0' cellspacing='0' cellpadding='0' width='100%' align='center' summary='' style='background-color: #E9F2F9;' class='footer'>
                                                        <tr>
                                                                <td style='font-family: 0px; line-height: 0px;' height='10'>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                                <td class='footNotes' align='center'>
                                                                        Copyright @ 2016.All Right Reserved to <strong> <a href='http://99rightdeals.com/' style='color: #f26c4f;' target='_blanks'>99 Right Deals</a> </strong>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td style='font-family: 0px; line-height: 0px;' height='10'>&nbsp;</td>
                                                        </tr>
                                                </table>
                                </span>";
                                	$this->email->set_newline("\r\n");
                                        $this->email->from('admin@99rightdeals.com', "99RightDeals");
                                        $this->email->to($mail->login_email);
                                        $this->email->subject("Deal Status Changed");
                                        $this->email->message($msg);
                                        if (!$this->email->send()) {
                                        // Raise error message
                                        show_error($this->email->print_debugger());
                            }
                        } 
					}



		if($this->input->post('change_status') == 1){
			for ($i=0; $i < count($post_ids); $i++) { 
			$prev_ad_details = $this->get_postad($post_ids[$i]);
			$this->db->select();
			$this->db->where('u_pkg_id',$prev_ad_details->urgent_package);
			$this->db->from('urgent_pkg_label');
			$urg_pkg_details = $this->db->get()->row();
			
			$this->db->select();
			$this->db->where('pkg_dur_id',$prev_ad_details->package_type);
			$this->db->from('pkg_duration_list');
			$pkg_details = $this->db->get()->row();

			$date = date('Y-m-d H:i:s');
				if($prev_ad_details->urgent_package != '0'){
					$urg_type=array(
								'ad_id'			=>	$post_ids[$i],
								'valid_from'	=>	$date,
								'valid_to'		=>	date('Y-m-d H:i:s', strtotime($date.' + '.$urg_pkg_details->u_pkg_days.' days')),
								'no_ofdays'		=>	$urg_pkg_details->u_pkg_days,
								'status'		=>	1,
								);
					
					$this->db->insert('urgent_details',$urg_type);
				}
				$data=array(
					'approved_by'		=>	$this->session->userdata('login_id'),
					'approved_on'		=>	$date,
					'expire_data'		=>	date('Y-m-d H:i:s', strtotime($date. ' + '.$pkg_details->dur_days.' days')),
					'ad_status'			=>	$this->input->post('change_status'),
				);
				$this->db->where('ad_id', $post_ids[$i]);
				$this->db->update('postad', $data);
				if ($this->db->affected_rows() > 0) {
						$return = 1;
					}
					else{
						$return = 0;
					}
			}
			return $return;
		}
		else{
			for ($i=0; $i < count($post_ids); $i++) { 
					$this->db->set('ad_status',$this->input->post('change_status'));
					$this->db->set('admin_comment',$this->input->post('comment'));
					$this->db->where_in('ad_id',$post_ids[$i]);
					$update_Status = $this->db->update('postad');
					if ($this->db->affected_rows() > 0) {
						$return = 1;
					}
					else{
						$return = 0;
					}
				}
				return $return;
			}

	}
	function get_user_ListofAds($u_id){
		$cats = $this->get_assigned_cats();
		$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.*,pkg_list.pkg_dur_name as pkg_name,p_add.created_on as postadon');
		$this->db->where('p_add.login_id',$u_id);
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
		$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p_add.category_id',$cats_list);
		}
		$this->db->order_by("p_add.created_on","DESC");
		$this->db->from('postad as p_add');
		$data = $this->db->get()->result();
		
		//echo '<pre>';print_r($data);echo '</pre>';
		// echo $this->db->last_query();exit;
		return $data;
	}
	function get_user_details($u_id){
		  //$this->db->select("l.*,p.*,p.login_id as p_login_id,a.login_id as a_login_id,a.*,c.City_name,s.State_name,d.Country_name");
		  $this->db->select('l.user_type,l.login_id,l.bus_addr,l.bus_name,l.login_email,l.login_status,l.first_name,l.lastname');
			$this->db->from("login as l");
			//$this->db->join("profile as p","l.login_id = p.login_id","inner");
			$this->db->where('l.login_id',$u_id);
			//$uq     =     $this->db->get();
			$info = $this->db->get()->row();
			//echo '238<br/>'.$this->db->last_query();exit;
		return $info;
	}
	function getselected_filterads(){
		$cats = $this->get_assigned_cats();
		if(empty($cats) && $this->session->userdata('user_type') != 1)
			return array();
		else{		
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name');
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			//$this->db->order_by('p_add.updated_on', 'desc');
			if($this->session->userdata('user_type') != 1){
				$cats_list = explode(',',$cats->cat_ids);		
				$this->db->where_in('p_add.category_id',$cats_list);
			}
			if($this->input->post('ad_type') !='')
				$this->db->where('p_add.package_type', $this->input->post('ad_type'));
			if($this->input->post('cat_type') !='')
				$this->db->where('p_add.category_id', $this->input->post('cat_type'));
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			return $data;
		}
	}
	function list_userads(){
		$cats = $this->get_assigned_cats();
		$this->db->select('l.login_id, l.user_type, l.login_email,l.first_name,l.lastname,l.mobile,l.login_status, COUNT(p_ad.login_id) as pkg_count');
		//
		//$this->db->select();
		//$this->db->where('p_ad.login_id',$u_id);
		//$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_ad.package_type','inner');
		//$this->db->join('catergory as cat','cat.category_id = p_ad.category_id','inner');
		
		$this->db->join("postad as p_ad","l.login_id = p_ad.login_id","inner");
		//$this->db->join("profile as p","l.login_id = p.login_id","inner");
		/*if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p_ad.category_id',$cats_list);
		}*/
		$this->db->where('l.user_type','7');
		$this->db->or_where('l.user_type','6');
		$this->db->group_by('p_ad.login_id'); 
		
		
		$this->db->from('login as l');
		$data = $this->db->get()->result();
		//echo $this->db->last_query();
		//echo '<pre>';print_r($data);echo '</pre>';exit;
		return $data;
	}
	function get_ads_media($ad_id){
		$this->db->select();
		$this->db->where('ad_id',$ad_id);
		$this->db->from('ad_img');
		$data = $this->db->get()->result();
		return $data;
	}
	function get_postad_packages(){
		$this->db->select();
		$this->db->from('pkg_duration_list');
		$data = $this->db->get()->result();
		return $data;
	}
	function get_ads_videos($ad_id){
		$this->db->select();
		$this->db->where('ad_id',$ad_id);
		$this->db->from('videos');
		$data = $this->db->get()->result();
		return $data;
	}
	function change_ad_img_status($img_id,$status){
		$update_status =array(
					'status'	=>	$status);
		$this->db->where('ad_img_id',$img_id);
		$up_status = $this->db->update('ad_img',$update_status);
		return $up_status;
	}
	function change_ad_video_status($v_id,$status){
		$update_status =array(
					'status'	=>	$status);
		$this->db->where('id',$v_id);
		$up_status = $this->db->update('videos',$update_status);
		return $up_status;
	}
	function listAdsbyStatus($ads_type){
		$status_type = $this->uri->segment(3);
		//exit;
		$cats = $this->get_assigned_cats();
		// if(empty($cats) && $this->session->userdata('user_type') != 1)
		// 	return array();
		// else{
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name,a_stat.status_name');
			
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			// if($this->session->userdata('user_type') != 1){
			// 	$cats_list = explode(',',$cats->cat_ids);		
			// 	$this->db->where_in('p_add.category_id',$cats_list);
			// }
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			$this->db->join('ad_status as a_stat','a_stat.id = p_add.ad_status','inner');
			$this->db->where('p_add.ad_status',$status_type);
			$this->db->where('p_add.payment_status',1);
			$this->db->order_by('p_add.updated_on', 'desc');
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			return $data;
		// }
	}
	function get_filtered_ads($filter_details){
		
		$status_type = $this->uri->segment(3);
		//exit;
		$cats = $this->get_assigned_cats();
		if(empty($cats) && $this->session->userdata('user_type') != 1)
			return array();
		else{
			$this->db->select('p_ad.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name,a_status.status_name,pay.*');
		$this->db->select("DATE_FORMAT(STR_TO_DATE(p_ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join('catergory as cat','cat.category_id = p_ad.category_id','inner');
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_ad.package_type','inner');
		$this->db->join('ad_status as a_status','a_status.id = p_ad.ad_status','inner');
		$this->db->join('payments AS pay','pay.product_id = p_ad.ad_id','left');
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p_ad.category_id',$cats_list);
		}
		if($filter_details['start_date'] !='')
			$this->db->where('DATE_FORMAT(STR_TO_DATE(p_ad.created_on,
  		"%d-%m-%Y %H:%i:%s"), "%Y-%m-%d %H:%i:%s") >=', date( 'Y-m-d H:i:s',strtotime($filter_details['start_date'])));
		if($filter_details['end_date'] !='')
			$this->db->where('DATE_FORMAT(STR_TO_DATE(p_ad.created_on,
  		"%d-%m-%Y %H:%i:%s"), "%Y-%m-%d %H:%i:%s") <=', date( 'Y-m-d H:i:s',strtotime($filter_details['end_date'])));
		if($filter_details['pkg_type'] != 0 && $filter_details['pkg_type'] !=''){
		if($filter_details['cat_type'] != 0 && $filter_details['cat_type'] != ''){
				if (in_array($filter_details['cat_type'], array(1,2,3,4))) {
					if($filter_details['pkg_type'] == 14)
					$this->db->where('p_ad.package_type', 1);
					if($filter_details['pkg_type'] == 25)
					$this->db->where('p_ad.package_type', 2);
					if($filter_details['pkg_type'] == 36)
					$this->db->where('p_ad.package_type', 3);
				}
				else if (in_array($filter_details['cat_type'], array(5,6,7,8))) {
					if($filter_details['pkg_type'] == 14)
					$this->db->where('p_ad.package_type', 4);
					if($filter_details['pkg_type'] == 25)
					$this->db->where('p_ad.package_type', 5);
					if($filter_details['pkg_type'] == 36)
					$this->db->where('p_ad.package_type', 6);
				}
			}
			else{
					if($filter_details['pkg_type'] == 14)
					$this->db->where_in('p_ad.package_type', array(1,4));
					if($filter_details['pkg_type'] == 25)
					$this->db->where_in('p_ad.package_type', array(2,5));
					if($filter_details['pkg_type'] == 36)
					$this->db->where_in('p_ad.package_type', array(3,6));
			}
		}
		/*if($filter_details['pkg_type'] != 0 && $filter_details['pkg_type'] !='')
			$this->db->where('p_ad.package_type',$filter_details['pkg_type']);*/
		

		if($filter_details['cat_type'] != 0 && $filter_details['cat_type'] != '')
			$this->db->where('p_ad.category_id',$filter_details['cat_type']);
		if($filter_details['ad_status'] != '')
			$this->db->where('p_ad.ad_status',$filter_details['ad_status']);
		if($filter_details['user_type'] != '')
			$this->db->where('p_ad.ad_type',$filter_details['user_type']);
		
			$this->db->order_by('p_ad.updated_on', 'desc');
			$this->db->group_by("p_ad.ad_id");
			$this->db->from('postad as p_ad');
			$data = $this->db->get()->result();
			// echo $this->db->last_query();exit;
			//echo '<pre>';print_r($data);echo '</pre>';exit;
			return $data;
		}
	}
	function ads_by_usertype($user_type){
		if($user_type == 'business')
			$u_type = 'business';
		else $u_type = 'consumer';
		$cats = $this->get_assigned_cats();
		$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name,pay.*');
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			$this->db->join('payments AS pay ','pay.product_id = p_add.ad_id','left');
			$this->db->where('p_add.ad_type', $u_type);
			$this->db->group_by("p_add.ad_id");
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			return $data;
	}
	
}
?>