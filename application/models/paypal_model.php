<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paypal_model extends CI_Model{
    //get and return product rows
    public function getRows($id = '',$c_type){
		$result_urg =array();
        $this->db->select();
        $this->db->from('postad p');
        if($id){
            $this->db->where('ad_id',$id);
			$this->db->join("pkg_duration_list as pl","pl.pkg_dur_id = p.package_type","inner");
			$this->db->join("login as l","l.login_id = p.login_id","inner");
            $query = $this->db->get();
            $result_ad = $query->row();
			//echo '<pre>';print_r($result_ad);echo '</pre>';exit;
			if($result_ad->urgent_package != 0 && $result_ad->urgent_package != '' ){
				$this->db->select();
				$this->db->from('urgent_pkg_label as up');
				$this->db->where('ad_id',$result_ad->urgent_package);
				//$this->db->join("pkg_duration_list as pl","pl.pkg_dur_id = p.package_type","inner");
				$query = $this->db->get();
				$result_urg = $query->row_array();
			}
			if(!empty($result_urg)){
				if($c_type == 'pound'){
					$pkg_amt = $result_urg->u_pkg__pound_cost+$result_ad->cost_pound;
					//$currency_type= 'GBP';
				}
				else{
					$pkg_amt = $result_urg->u_pkg_euro_cost+$result_ad->cost_euro;
					//$currency_type= 'EUR';
				}
			}else{
				if($c_type == 'pound'){
					$pkg_amt = $result_ad->cost_pound;
					//$currency_type= 'GBP';
				}
				else{
					$pkg_amt = $result_ad->cost_euro;
					//$currency_type= 'EUR';
				}
				//$pkg_amt_euro = $result_ad->cost_euro;
				//$pkg_amt_pound = $result_ad->cost_pound;
			}
			/*$a = mt_rand(1000,9999); 
				$c_code = 'COUP'.$a;
				echo date('Ymdhis').'<br/>';
				$t_id = date('Ymdhis').$a;
				exit;
				*/
			$info = array(
						'name' =>  $result_ad->deal_tag,
						'ad_id' =>  $result_ad->ad_id,
						'user_id' =>  $result_ad->login_id,
						'login_email' =>  $result_ad->login_email,
						//'currency_type' =>  $currency_type,
						'pkg_amt' =>  $pkg_amt,
						);
				return $info;
			
        }else{
            $this->db->order_by('name','asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
		echo $this->db->last_query();
        return !empty($result)?$result:false;
    }
    //insert transaction data
    /*public function insertTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }*/
	public function insert_tran($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
}