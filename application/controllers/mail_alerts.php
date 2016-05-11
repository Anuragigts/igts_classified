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
					$result1 = array_chunk($result, 2);
					$msg = "<style type='text/css'>
								@media only screen and (max-width: 480px) {
								#body_style,table,td,p,a,li,blockquote {-webkit-text-size-adjust:none !important;}
								#body_style table {width: 100% !important;}
								#subcell table tboby tr{width: 300px !important;}
								#body_style .bigHeader img {height: auto !important; width: 100% !important;}
								#body_style .webversion {display: none; font-size: 0; max-height: 0; line-height: 0; mso-hide: all;}
								#body_style .logoContainer {text-align: center;}
								#body_style .sectionArticleTitle, body[yahoofix] .sectionArticleContent {text-align: center; padding:0 5px 10px 5px;}
								#body_style .sectionPadding {padding: 0px 10px 0px 10px;}
								#body_style .introTitle {padding: 20px 10px 5px 10px; !important}
								#body_style .introContent {padding: 0px 10px 20px 10px !important;}
								}
							</style>
     	<span id='body_style' style='font-family: arial, sans-serif; color: #313a42;display:block;margin: 0; padding: 0; background: #ffffff; font-size: 14px; color: #313a42;'>
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
								<td class='webversion' align='right' style='width: 200px; text-align: right;padding-top: 22px;'>
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
										<td style='padding-top: 20px; padding-right: 15px; padding-bottom: 20px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/home-page' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Home</a></td>
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
					<td class='introTitle' style='color: #f26c4f;font-size: 18px; line-height: 1.2; text-align: center; padding: 20px 0px 5px 0px;'>New Deals for your Saved Search</td>
				</tr>
				<tr>
					<td style='font-family: 0px; line-height: 0px;' height='20'>&nbsp;</td>
				</tr>
			</table>";
			
	$msg .= "<table border='0' cellspacing='0' cellpadding='0' summary='' width='100%'>
				<tr>
					<td>
						<table border='0' cellspacing='0' cellspacing='' summary='' width='640' align='center'>
							<tr><td class='sectionPadding'>";
								foreach ($result1 as $val) {
							     		foreach ($val as $val1) {
							     			$msg .= "<table border='0' cellpadding='0' cellspacing='0' summary='' width='48%' align='left'>
														<tr>
															<td class='sectionArticleImage' style='padding: 0px 0px 20px 0px;' align='center'>
																<a href='http://99rightdeals.com/description_view/details/".$val1->adid."' target='_blank'>
																<img src='http://99rightdeals.com/pictures/".$val1->img_name."' style='width: 80% !important; border-radius:10px; -ms-interpolation-mode: bicubic; display: block;' width='250' height='150' alt='' />
																</a>
															</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td class='sectionArticleTitle' style='color: #f26c4f;font-size: 16px; padding: 0 0 10px 0;' valign='top' align='center'>".substr($val1->deal_tag,0,21)."</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td class='sectionArticleContent' style='line-height: 20px; padding: 0px 0px 20px 0px;' valign='top' align='center'>";
																	if ($val1->category_id != 1) {
																		$msg .="<span style='font-size: 20px;'><img src='http://99rightdeals.com/img/slide/mailpound.png' alt='pound' /> ".$val1->price."</span>";
																	}
																	else{
																		$msg .="<span style='font-size: 20px;'><img src='http://99rightdeals.com/img/slide/mailpound.png' alt='pound' /> ".$val1->salarymin."-".$val1->salarymax."</span>";
																	}

																$msg .="</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td align='center'><a href='http://99rightdeals.com/description_view/details/".$val1->adid."' style='padding: 12px 42px;background-color: #3A89C9;color: #fff;text-decoration: none;' target='_blank'>
															VIEW DETAILS</a></td><td>&nbsp;</td>
														</tr>
														<tr>
															<td style='font-family: 0px; line-height: 0px;' height='30'>&nbsp;</td>
														</tr>
													</table>";
							     		}
							     	}
								$msg .= "</td></tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style='font-family: 0px; line-height: 0px;' height='20'>&nbsp;</td>
				</tr>
			</table>";
			 $msg .= "<table border='0' cellspacing='0' cellpadding='0' width='20%' align='center' summary=''>
							<tr>
								<td><a href='$sval->save_search' style='padding: 12px 14px;background-color: #3A89C9;color: #fff;text-decoration: none;'>VIEW More Deals</a></td>
							</tr>
							<tr>
								<td style='font-family: 0px; line-height: 0px;' height='20'>&nbsp;</td>
							</tr>
						</table>";
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
					 $result1 = array_chunk($result, 2);
					$msg = "<style type='text/css'>
								@media only screen and (max-width: 480px) {
								#body_style,table,td,p,a,li,blockquote {-webkit-text-size-adjust:none !important;}
								#body_style table {width: 100% !important;}
								#subcell table tboby tr{width: 300px !important;}
								#body_style .bigHeader img {height: auto !important; width: 100% !important;}
								#body_style .webversion {display: none; font-size: 0; max-height: 0; line-height: 0; mso-hide: all;}
								#body_style .logoContainer {text-align: center;}
								#body_style .sectionArticleTitle, body[yahoofix] .sectionArticleContent {text-align: center; padding:0 5px 10px 5px;}
								#body_style .sectionPadding {padding: 0px 10px 0px 10px;}
								#body_style .introTitle {padding: 20px 10px 5px 10px; !important}
								#body_style .introContent {padding: 0px 10px 20px 10px !important;}
								}
							</style>
     	<span id='body_style' style='font-family: arial, sans-serif; color: #313a42;display:block;margin: 0; padding: 0; background: #ffffff; font-size: 14px; color: #313a42;'>
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
								<td class='webversion' align='right' style='width: 200px; text-align: right;padding-top: 22px;'>
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
								<td class='bigHeader'><img src='http://99rightdeals.com/img/slide/template.jpg' width='640' height='250' /></td>
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
										<td style='padding-top: 20px; padding-right: 15px; padding-bottom: 20px; padding-left: 15px' align='center' ><a href='http://99rightdeals.com/home-page' target='_blank' style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #313133; text-decoration: none'>Home</a></td>
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
					<td class='introTitle' style='color: #f26c4f;font-size: 18px; line-height: 1.2; text-align: center; padding: 20px 0px 5px 0px;'>New Hot Deals for your Saved Search</td>
				</tr>
				<tr>
					<td style='font-family: 0px; line-height: 0px;' height='20'>&nbsp;</td>
				</tr>
			</table>";
			
	$msg .= "<table border='0' cellspacing='0' cellpadding='0' summary='' width='100%'>
				<tr>
					<td>
						<table border='0' cellspacing='0' cellspacing='' summary='' width='640' align='center'>
							<tr><td class='sectionPadding'>";
								foreach ($result1 as $val) {
							     		foreach ($val as $val1) {
							     			$msg .= "<table border='0' cellpadding='0' cellspacing='0' summary='' width='48%' align='left'>
														<tr>
															<td class='sectionArticleImage' style='padding: 0px 0px 20px 0px;' align='center'>
																<a href='http://99rightdeals.com/description_view/details/".$val1->adid."' target='_blank'>
																<img src='http://99rightdeals.com/pictures/".$val1->img_name."' style='width: 80% !important; border-radius:10px; -ms-interpolation-mode: bicubic; display: block;' width='250' height='150' alt='' />
																</a>
															</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td class='sectionArticleTitle' style='color: #f26c4f;font-size: 16px; padding: 0 0 10px 0;' valign='top' align='center'>".substr($val1->deal_tag,0,21)."</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td class='sectionArticleContent' style='line-height: 20px; padding: 0px 0px 20px 0px;' valign='top' align='center'>";
																	if ($val1->category_id != 1) {
																		$msg .="<span style='font-size: 20px;'><img src='http://99rightdeals.com/img/slide/mailpound.png' alt='pound' /> ".$val1->price."</span>";
																	}
																	else{
																		$msg .="<span style='font-size: 20px;'><img src='http://99rightdeals.com/img/slide/mailpound.png' alt='pound' /> ".$val1->salarymin."-".$val1->salarymax."</span>";
																	}

																$msg .="</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td align='center'><a href='http://99rightdeals.com/description_view/details/".$val1->adid."' style='padding: 12px 42px;background-color: #3A89C9;color: #fff;text-decoration: none;' target='_blank'>
															VIEW DETAILS</a></td><td>&nbsp;</td>
														</tr>
														<tr>
															<td style='font-family: 0px; line-height: 0px;' height='30'>&nbsp;</td>
														</tr>
													</table>";
							     		}
							     	}
								$msg .= "</td></tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style='font-family: 0px; line-height: 0px;' height='20'>&nbsp;</td>
				</tr>
			</table>";
			 $msg .= "<table border='0' cellspacing='0' cellpadding='0' width='20%' align='center' summary=''>
							<tr>
								<td><a href='$sval->save_search' style='padding: 12px 14px;background-color: #3A89C9;color: #fff;text-decoration: none;'>VIEW More Deals</a></td>
							</tr>
							<tr>
								<td style='font-family: 0px; line-height: 0px;' height='20'>&nbsp;</td>
							</tr>
						</table>";
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
	                $this->email->to($sval->mail);
	                $this->email->subject("We've found new ads for your hot-deal search alert");
	                $this->email->message($msg);
	                $this->email->send();
				 }
			}
     }
}