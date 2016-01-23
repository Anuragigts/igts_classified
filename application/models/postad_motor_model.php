<?php 

class Postad_motor_model extends CI_Model{

	public function bike_type(){
    	$cv     =   $this->input->post("id");
    return $this->db->get_where("bike_type",array("brand_id" => $cv))->result();
    }

    public function bike_models(){
                $cv     =   $this->input->post("id");
    return $this->db->get_where("bike_model",array("btype_id" => $cv))->result();
    }
}


 ?>