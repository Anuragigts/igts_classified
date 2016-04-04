<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment_models extends CI_Model{
    //get and return product rows
    public function getRows($id = '',$c_type){
		
		$data = array(
				'user_id'		=>	$this->session->userdata('login_id'),
				'c_code'		=>	$c_type,
				'ad_id'			=>	$id,
				'date_added'	=>	date('Y-m-d H:i:s'),
				'used_status'	=>	0,
		);
		
		$this->db->insert('coupons_used',$data);
		
		
		$result_urg =array();
        $this->db->select();
        $this->db->from('postad p');
        if($id){
            $this->db->where('ad_id',$id);
			$this->db->join("pkg_duration_list as pl","pl.pkg_dur_id = p.package_type","inner");
			$this->db->join("login as l","l.login_id = p.login_id","inner");
            $query = $this->db->get();
            $result_ad = $query->row();
			$info = array(
						'name' =>  $result_ad->deal_tag,
						'ad_id' =>  $result_ad->ad_id,
						'user_id' =>  $result_ad->login_id,
						'login_email' =>  $result_ad->login_email,
						//'currency_type' =>  $currency_type,
						//'pkg_amt' =>  $pkg_amt,
						);
				return $info;
			
        }else{
            $this->db->order_by('name','asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
		//echo $this->db->last_query();
        return !empty($result)?$result:false;
    }
    
	public function insert_tran($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
	public function update_coupon_status($ad_id){
		$this->db->select('ad_id');
		$this->db->where('ad_id',$ad_id);
		$this->db->from('coupons_used');
		$c_info = $this->db->get()->row();
		if(count($c_info) == 1){
			$u_data = array('used_status'=>1);
			$this->db->where('user_id',$this->session->userdata('login_id'));
			$this->db->where('ad_id',$ad_id);
			$this->db->update('coupons_used',$u_data);
		}
	}
	public function update_ad_pay_status($ad_id,$paid_amt){
		$u_data = array('payment_status'=>1,
						'paid_amt'=>$paid_amt);
		$this->db->where('login_id',$this->session->userdata('login_id'));
		$this->db->where('ad_id',$ad_id);
		$this->db->update('postad',$u_data);
	}

	public function update_adrenewal($ad_id,$paid_amt){
		if ($this->session->userdata('pcksession')) {
			if ($this->session->userdata['pcksession']['urglbl'] != '') {
				$this->db->select();
				$this->db->where('u_pkg_id',$this->session->userdata['pcksession']['urglbl']);
				$this->db->from('urgent_pkg_label');
				$urg_pkg_details = $this->db->get()->row();
				$urg = $this->db->query("SELECT * FROM `urgent_details` WHERE ad_id = '$ad_id'");
				if ($urg->num_rows() > 0) {
					$urg_data = $urg->row();
					$validfrom = date("Y-m-d H:i:s", strtotime($urg_data->valid_to));
					$validto = date('Y-m-d H:i:s', strtotime($validfrom.' + '.$urg_pkg_details->u_pkg_days.' days'));
					$urgdata = array('valid_from'=>$validfrom,
									'valid_to'=>$validto,
									'no_ofdays'=>$urg_pkg_details->u_pkg_days);
					$this->db->where('ad_id',$ad_id);
					$this->db->update('urgent_details',$urgdata);
				}
				else{
					$date = date('Y-m-d H:i:s');
				$urg_type=array(
						'ad_id'			=>	$ad_id,
						'valid_from'	=>	$date,
						'valid_to'		=>	date('Y-m-d H:i:s', strtotime($date.' + '.$urg_pkg_details->u_pkg_days.' days')),
						'no_ofdays'		=>	$urg_pkg_details->u_pkg_days,
						'status'		=>	1,
						);
			
				$this->db->insert('urgent_details',$urg_type);
				}
			}
		$exp_data = @mysql_result(mysql_query("SELECT expire_data FROM postad WHERE ad_id = '$ad_id' "), 0, 'expire_data');
		$qry = $this->db->query("SELECT * FROM `pkg_duration_list` WHERE pkg_dur_id = '".$this->session->userdata['pcksession']['pcktype']."'");
		$qry1 = $qry->row();
		$durdays = $qry1->dur_days;
		$ad_days = date('Y-m-d H:i:s', strtotime($exp_data.' + '.$durdays.' days'));
		if ($this->session->userdata['pcksession']['urglbl'] == '') {
			$urg1 = 0;
		}
		else{
			$urg1 = $this->session->userdata['pcksession']['urglbl'];
		}
		$pck_data = array('package_type'=>$this->session->userdata['pcksession']['pcktype'],
						'urgent_package'=>$urg1,
						'payment_status'=>1,
						'paid_amt'=>$paid_amt,
						'approved_on'=>date("Y-m-d H:i:s"),
						'expire_data'=>$ad_days);
		$this->db->where('login_id',$this->session->userdata('login_id'));
		$this->db->where('ad_id',$ad_id);
		$this->db->update('postad',$pck_data);
		}
	}
	public function get_ad_details($ad_id){
		$this->db->select('p_ad.*,p_list.*,u_lab.*,a_img.img_name');
		$this->db->where('p_ad.ad_id',$ad_id);
		$this->db->join('ad_img as a_img', "a_img.ad_id = p_ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as p_list', "p_list.pkg_dur_id = p_ad.package_type", 'join');
		$this->db->join('urgent_pkg_label as u_lab', "u_lab.u_pkg_id = p_ad.urgent_package", 'left');
		$this->db->group_by('a_img.ad_id');
		$this->db->from('postad as p_ad');
		$p_details = $this->db->get()->row();
		return $p_details;
	}

	public function pcktypetop(){
		$this->db->select();
		$this->db->from("pkg_duration_list");
		$this->db->where("is_top",1);
		$rs = $this->db->get();
		return $rs->result();
	}
	public function pcktypelow(){
		$this->db->select();
		$this->db->from("pkg_duration_list");
		$this->db->where("is_top",0);
		$rs = $this->db->get();
		return $rs->result();
	}

	public function urgpcktop(){
		$this->db->select();
		$this->db->from("urgent_pkg_label");
		$this->db->where("is_top_cat",1);
		$rs = $this->db->get();
		return $rs->result();
	}

	public function urgpcklow(){
		$this->db->select();
		$this->db->from("urgent_pkg_label");
		$this->db->where("is_top_cat",0);
		$rs = $this->db->get();
		return $rs->result();
	}

	public function pckcost($id){
		$this->db->select();
		$this->db->from("pkg_duration_list");
		$this->db->where("pkg_dur_id",$id);
		$rs = $this->db->get()->row();
		return $rs;
	}

	public function urgcost($id){
		$this->db->select();
		$this->db->from("urgent_pkg_label");
		$this->db->where("u_pkg_id",$id);
		$rs = $this->db->get()->row();
		return $rs;
	}

}
?>