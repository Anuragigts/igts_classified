<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment_model extends CI_Model{
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
	public function get_ad_details($ad_id){
		$this->db->select('p_ad.*,p_list.cost_pound,u_lab.u_pkg__pound_cost,a_img.img_name');
		$this->db->where('p_ad.ad_id',$ad_id);
		$this->db->join('ad_img as a_img', "a_img.ad_id = p_ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as p_list', "p_list.pkg_dur_id = p_ad.package_type", 'join');
		$this->db->join('urgent_pkg_label as u_lab', "u_lab.u_pkg_id = p_ad.urgent_package", 'left');
		$this->db->group_by('a_img.ad_id');
		$this->db->from('postad as p_ad');
		$p_details = $this->db->get()->row();
		return $p_details;
	}
}
?>