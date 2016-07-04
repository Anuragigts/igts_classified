<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Bump extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("bump_model");
        }
        public function index(){
            $this->bump_model->bump_gold_platinum();
        }

        public function gold_bump(){
        	$g_cnt = $this->bump_model->gold_cnt();//low gold
        	$g_cnt1 = $this->bump_model->gold_cnt1();//high gold
        	$total_ads = $this->bump_model->total_ads_gold();
        	foreach ($total_ads as $total_ads1) {
                if ($total_ads1->ad_status == 1) {
                        $curdate = date_create(date("Y-m-d"));
                        $aprdate = date_create(date("Y-m-d", strtotime($total_ads1->approved_on)));
                        $date_diff = date_diff($aprdate,$curdate);
                        $date_diff1 = $date_diff->format("%R%a");
            		if ($total_ads1->package_type == 2) {
                        if (($date_diff1 <= $g_cnt) && $date_diff1 > 0) {
            				/*services*/
            				if ($total_ads1->category_id == 2) {
            					$bump_ad = $this->bump_model->bump_ad_services($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            					$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*jobs*/
            				if ($total_ads1->category_id == 1) {
            					$bump_ad = $this->bump_model->bump_ad_jobs($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*motors*/
            				if ($total_ads1->category_id == 3) {
            					$bump_ad = $this->bump_model->bump_ad_motors($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*find a property*/
            				if ($total_ads1->category_id == 4) {
            					$bump_ad = $this->bump_model->bump_ad_property($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            			}
            		}
            		elseif ($total_ads1->package_type == 5) {
            			if (($date_diff1 <= $g_cnt1) && $date_diff1 > 0) {
            				/*Pets*/
            				if ($total_ads1->category_id == 5) {
            					$bump_ad = $this->bump_model->bump_ad_pets($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*cloths and lifestyles*/
            				if ($total_ads1->category_id == 6) {
            					$bump_ad = $this->bump_model->bump_ad_cloths($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*home and kitchen*/
            				if ($total_ads1->category_id == 7) {
            					$bump_ad = $this->bump_model->bump_ad_homekitchen($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*ezone*/
            				if ($total_ads1->category_id == 8) {
            					$bump_ad = $this->bump_model->bump_ad_ezone($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            			}
            		}
                }//ad_status end
        	}//for loop end
        }//gold end

        public function platinum_bump(){
        	$p_cnt = $this->bump_model->platinum_cnt();//low platinum
        	$p_cnt1 = $this->bump_model->platinum_cnt1();//high platinum
        	$total_ads = $this->bump_model->total_ads_platinum();
            foreach ($total_ads as $total_ads1) {
                if ($total_ads1->ad_status == 1) {
                    $curdate = date_create(date("Y-m-d"));
                    $aprdate = date_create(date("Y-m-d", strtotime($total_ads1->approved_on)));
                    $date_diff = date_diff($aprdate,$curdate);
                    $date_diff1 = $date_diff->format("%R%a");
            		if ($total_ads1->package_type == 3) {
            			if (($date_diff1 <= $p_cnt) && $date_diff1 > 0) {
                            /*services*/
            				if ($total_ads1->category_id == 2) {
            					$bump_ad = $this->bump_model->bump_ad_services($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            					$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*jobs*/
            				if ($total_ads1->category_id == 1) {
            					$bump_ad = $this->bump_model->bump_ad_jobs($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*motors*/
            				if ($total_ads1->category_id == 3) {
            					$bump_ad = $this->bump_model->bump_ad_motors($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*find a property*/
            				if ($total_ads1->category_id == 4) {
            					$bump_ad = $this->bump_model->bump_ad_property($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            			}
            		}
            		elseif ($total_ads1->package_type == 6) {
            			if (($date_diff1 <= $p_cnt1) && $date_diff1 > 0) {
            				/*Pets*/
            				if ($total_ads1->category_id == 5) {
            					$bump_ad = $this->bump_model->bump_ad_pets($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*cloths and lifestyles*/
            				if ($total_ads1->category_id == 6) {
            					$bump_ad = $this->bump_model->bump_ad_cloths($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*home and kitchen*/
            				if ($total_ads1->category_id == 7) {
            					$bump_ad = $this->bump_model->bump_ad_homekitchen($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            				/*ezone*/
            				if ($total_ads1->category_id == 8) {
            					$bump_ad = $this->bump_model->bump_ad_ezone($total_ads1->ad_id);
            					if ($bump_ad == 1) {
            						$this->bump_model->del_ad($total_ads1->ad_id);
            					}
            				}
            			}
            		}//else id end
                }//adstatus end
        	}//for loop end
        }
    }

