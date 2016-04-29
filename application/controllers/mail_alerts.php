<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Mail_alerts extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("bump_model");
        }
        public function index(){
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
			$searchlist = $this->bump_model->mainsearchlist();
			$msg = '';
			foreach ($searchlist as $sval) {
				 $searchcnt_yesterday = count($this->bump_model->searchcnt_yesterday($sval->login_id,$sval->search_title,$sval->search_cat,$sval->search_loc));
				 $searchcnt_today = count($this->bump_model->searchcnt_today($sval->login_id,$sval->search_title,$sval->search_cat,$sval->search_loc));
				 if ($searchcnt_yesterday < $searchcnt_today) {
					$result = $this->bump_model->searchcnt_todaynow($sval->login_id,$sval->search_title,$sval->search_cat,$sval->search_loc);
					$msg = "<style>.pound:before {content: £;}</style>
					<div style='padding: 81px 150px;'>
					<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 10px;background-color: #9FC955;'>
						<table style='table-layout: auto' border='0' cellpadding='0' cellspacing='0' width='100%'>
							<tbody>
								<tr>
									<td style='padding-top: 10px;' align='center'>
										<table style='table-layout: auto' id='table' align='center' border='0' cellpadding='0' cellspacing='0' width='450'>
											<tbody>
												<tr>
													<td id='cell' style='padding-top: 5px; padding-right: 2px; padding-bottom: 15px; padding-left: 2px' align='left'><a href='http://www.99rightdeals.com/' target='_blank'><img src='http://99rightdeals.com/img/maillogo.png' style='display: block' height='58' align='left' border='0' width='228' /></a></td>
													<td id='mhide' style='padding-top: 15px; padding-right: 2px; padding-bottom: 15px; padding-left: 2px;color: #fff;float:right;font-family: Arial, Helvetica, sans-serif;font-weight:bold;font-size:24px;' align='right' valign='bottom'>WELCOME</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div style='margin-top:20px'></div>
					<div style='border: 2px solid #9FC955 !important;border-radius: 20px;padding: 23px;height:auto;'>
						<table style='table-layout: auto' border='0' cellpadding='0' cellspacing='0' width='100%'>
							<tbody>
								<tr>
									<td align='center' bgcolor='#ffffff'>
										<table style='table-layout: auto' id='table' align='center' border='0' cellpadding='0' cellspacing='0' >
											<tbody>
												<tr>
													<td style='background-color: rgb(255, 255, 255)' id='subcell' bgcolor='#ffffff' >
														<table style='table-layout: auto' id='table' border='0' cellpadding='0' cellspacing='0' >
															<tbody>
																<tr>
																	<td style='padding-top: 10px; padding-right: 5px; padding-bottom: 10px; padding-left: 5px' align='center' ><a href='".base_url()."' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>HOME</a></td>
																	<td style='padding-top: 10px; padding-right: 5px; padding-bottom: 10px; padding-left: 5px' align='center' ><a href='".base_url()."contact-us' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none' >Post A Deal</a></td>
																	<td style='padding-top: 10px; padding-right: 5px; padding-bottom: 10px; padding-left: 5px' align='center' ><a href='".base_url()."post-a-deal' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Contact US</a></td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>";
					foreach ($result as $rval) {
							$msg .= "<table style='table-layout: auto ;padding-top:15px;'  align='center' border='0' cellpadding='0' cellspacing='0' >
								<tbody>
									<tr>
										<td bgcolor='#ffffff'  style='padding: 10px; border: 2px solid rgb(244, 244, 244);'>
											<table style='table-layout: auto' id='table' border='0' cellpadding='0' cellspacing='0' width='420'>
												<tbody>
													<tr>
														<td align='left' >
															<table style='table-layout: auto' align='left' border='0' cellpadding='0' cellspacing='0'>
																<tbody>
																	<tr>
																		<td align='left'><font style=' font-size: 13px;'><h2 class='title'>".substr($rval->deal_tag,0,21)."</h2></font></td>
																	</tr>
																	<tr>
																		<td align='left'><font style=' font-size: 13px;'><p style='color:#fff;background-color:#9FC955;padding:8px 14px;text-decoration:none;border-radius:7px;width:80px;' class='clearfix'>Price : £".$rval->price."</p>
																		</font></td>
																	</tr>
																	<tr>
																		<td align='left' style='padding-top: 15px;'><font style=' font-size: 13px;'><a href='".base_url()."description_view/details/".$rval->ad_id."' style='color:#fff;background-color:#9FC955;padding:8px 14px;text-decoration:none;border-radius:7px;width:120px;' class='clearfix'>View Details</a></font></td>
																	</tr>
																</tbody>
															</table>
														</td>
														<td align='right' valign='top' >
														<img src='".base_url()."pictures/".$rval->img_name."' style='display: block' height='150' border='0' width='180' /></a></td>
													</tr>

												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>";
						}
							echo $msg .="<table style='table-layout: auto' id='table' align='center' border='0' cellpadding='0' cellspacing='0' >
								<tbody>
									<tr>
										<td id='cell' style='padding-top: 20px;' align='center'>
											<table style='table-layout: auto' align='center' border='0' cellpadding='0' cellspacing='0' >
												<tbody>
													<tr>
														<td style='padding-top: 15px; padding-right: 5px; padding-bottom: 15px; padding-left: 5px; border-radius: 5px; background-color: #9FC955' align='center' bgcolor='#31c5f2' width='200'><a href='$sval->save_search' style=' font-size: 18px; color: #ffffff; text-decoration: none; display: block' target='_blank'>VIEW ALL DEALS</a></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>";
					$this->email->set_newline("\r\n");
	                $this->email->from('admin@99rightdeals.com', "99RightDeals");
	                $this->email->to($sval->mail);
	                $this->email->subject("We've found new ads for your search alert");
	                $this->email->message($msg);
	                $this->email->send();
				 }
			}
     }
     public function hotdeals_alert(){
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
     	$hotlist = $this->bump_model->hotdealsearchlist();
     	$msg = '';
			foreach ($hotlist as $sval) {
				  $hotsearchcnt_yesterday = count($this->bump_model->hotsearchcnt_yesterday($sval->bus_consumer,$sval->search_cat,$sval->search_loc));
				  $hotsearchcnt_today = count($this->bump_model->hotsearchcnt_today($sval->bus_consumer,$sval->search_cat,$sval->search_loc));
				  if ($hotsearchcnt_yesterday < $hotsearchcnt_today) {
					 $result = $this->bump_model->hotsearchcnt_todaynow($sval->bus_consumer,$sval->search_cat,$sval->search_loc);
					 $msg = "<style>.pound:before {content: £;}</style>
					<div style='padding: 81px 150px;'>
					<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 10px;background-color: #9FC955;'>
						<table style='table-layout: auto' border='0' cellpadding='0' cellspacing='0' width='100%'>
							<tbody>
								<tr>
									<td style='padding-top: 10px;' align='center'>
										<table style='table-layout: auto' id='table' align='center' border='0' cellpadding='0' cellspacing='0' width='450'>
											<tbody>
												<tr>
													<td id='cell' style='padding-top: 5px; padding-right: 2px; padding-bottom: 15px; padding-left: 2px' align='left'><a href='http://www.99rightdeals.com/' target='_blank'><img src='http://99rightdeals.com/img/maillogo.png' style='display: block' height='58' align='left' border='0' width='228' /></a></td>
													<td id='mhide' style='padding-top: 15px; padding-right: 2px; padding-bottom: 15px; padding-left: 2px;color: #fff;float:right;font-family: Arial, Helvetica, sans-serif;font-weight:bold;font-size:24px;' align='right' valign='bottom'>WELCOME</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div style='margin-top:20px'></div>
					<div style='border: 2px solid #9FC955 !important;border-radius: 20px;padding: 23px;height:auto;'>
						<table style='table-layout: auto' border='0' cellpadding='0' cellspacing='0' width='100%'>
							<tbody>
								<tr>
									<td align='center' bgcolor='#ffffff'>
										<table style='table-layout: auto' id='table' align='center' border='0' cellpadding='0' cellspacing='0' >
											<tbody>
												<tr>
													<td style='background-color: rgb(255, 255, 255)' id='subcell' bgcolor='#ffffff' >
														<table style='table-layout: auto' id='table' border='0' cellpadding='0' cellspacing='0' >
															<tbody>
																<tr>
																	<td style='padding-top: 10px; padding-right: 5px; padding-bottom: 10px; padding-left: 5px' align='center' ><a href='".base_url()."' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>HOME</a></td>
																	<td style='padding-top: 10px; padding-right: 5px; padding-bottom: 10px; padding-left: 5px' align='center' ><a href='".base_url()."post-a-deal' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none' >Post A Deal</a></td>
																	<td style='padding-top: 10px; padding-right: 5px; padding-bottom: 10px; padding-left: 5px' align='center' ><a href='".base_url()."contact-us' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Contact US</a></td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>";
					foreach ($result as $rval) {
							$msg .= "<table style='table-layout: auto ;padding-top:15px;'  align='center' border='0' cellpadding='0' cellspacing='0' >
								<tbody>
									<tr>
										<td bgcolor='#ffffff'  style='padding: 10px; border: 2px solid rgb(244, 244, 244);'>
											<table style='table-layout: auto' id='table' border='0' cellpadding='0' cellspacing='0' width='420'>
												<tbody>
													<tr>
														<td align='left' >
															<table style='table-layout: auto' align='left' border='0' cellpadding='0' cellspacing='0'>
																<tbody>
																	<tr>
																		<td align='left'><font style=' font-size: 13px;'><h2 class='title'>".substr($rval->deal_tag,0,21)."</h2></font></td>
																	</tr>
																	<tr>
																		<td align='left'><font style=' font-size: 13px;'><p style='color:#fff;background-color:#9FC955;padding:8px 14px;text-decoration:none;border-radius:7px;width:80px;' class='clearfix'>Price : £".$rval->price."</p>
																		</font></td>
																	</tr>
																	<tr>
																		<td align='left' style='padding-top: 15px;'><font style=' font-size: 13px;'><a href='".base_url()."description_view/details/".$rval->ad_id."' style='color:#fff;background-color:#9FC955;padding:8px 14px;text-decoration:none;border-radius:7px;width:120px;' class='clearfix'>View Details</a></font></td>
																	</tr>
																</tbody>
															</table>
														</td>
														<td align='right' valign='top' >
														<img src='".base_url()."pictures/".$rval->img_name."' style='display: block' height='150' border='0' width='180' /></a></td>
													</tr>

												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>";
						}
							$msg .="<table style='table-layout: auto' id='table' align='center' border='0' cellpadding='0' cellspacing='0' >
								<tbody>
									<tr>
										<td id='cell' style='padding-top: 20px;' align='center'>
											<table style='table-layout: auto' align='center' border='0' cellpadding='0' cellspacing='0' >
												<tbody>
													<tr>
														<td style='padding-top: 15px; padding-right: 5px; padding-bottom: 15px; padding-left: 5px; border-radius: 5px; background-color: #9FC955' align='center' bgcolor='#31c5f2' width='200'><a href='$sval->save_search' style=' font-size: 18px; color: #ffffff; text-decoration: none; display: block' target='_blank'>VIEW ALL DEALS</a></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>";
					$this->email->set_newline("\r\n");
	                $this->email->from('admin@99rightdeals.com', "99RightDeals");
	                $this->email->to($sval->mail);
	                $this->email->subject("We've found new ads for your hot-deal search alert");
	                $this->email->message($msg);
	                $this->email->send();
				 }
			}
     }
}

