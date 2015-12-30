<?php 

class Services_model extends CI_Model{

	public function sub_cat($id){
		$this->db->select("sub_category_name");
		$this->db->from("sub_category");
		$this->db->where($id);
		$res = $this->db->get();
		return $res->result_array();
	}

}

 ?>