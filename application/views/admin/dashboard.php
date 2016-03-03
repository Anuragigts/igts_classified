		<style>
		.verticalChart .singleBar {
			float: left;
			margin-left: 0.15% !important;
			margin-right: 0.15% !important;
			width: 8% !important;
		}
		</style>
		
		<div id="content" class="span9" style='min-height:150px'>
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>
			<div class="row-fluid">
				<?php //echo '<pre>';print_r($ads_count);echo '</pre>';
				$today = date('d');
				$free_count=[];
				$gold_count=[];
				$platinum_count=[];

		foreach($ads_count as $count){
			$timestamp = strtotime($count->dtime);
			$ad_date = date("d", $timestamp);
				if($count->package_type == 1){
					$free_count[$ad_date] = $count->no_ads;
					//$free_count.=$free_count.',';
				}/*else{
				$free_count[$ad_date] = $count->no_ads;
				}*/
				else if($count->package_type == 2){
					$gold_count[$ad_date] = $count->no_ads;
				}/*else{
						$gold_count[$ad_date] = $count->no_ads;
				}*/
				else if($count->package_type == 3){
					$platinum_count[$ad_date] = $count->no_ads;
				}else{
					$platinum_count[$ad_date] = $count->no_ads;
				}
		}
		
		$free_list = '';
		$gold_list = '';
		$platinum_list = '';
		
krsort($free_count);
krsort($gold_count);
krsort($platinum_count);
/*echo '<pre>';
		print_r($free_count);
		//print_r($free_list);
		print_r($gold_count);
		print_r($platinum_count);
		echo '</pre>';
	*/	
$a=0;$date=date("y:m:d");
for($i=0; $i<25; $i++){
	//$date=date('y:m:d');
$todays_date = date('Y-m-d', strtotime(-$i.' day', strtotime($date)));
	//$date = date('y-m-d', strtotime(-$i.' day', date('y:m:d')));
	//$date = date_modify($date,'-1 day');
	$today = date("d",strtotime($todays_date));
	
	if (array_key_exists($today, $free_count)) {
		$free_array[$today] =  $free_count[$today];
		$free_list = $free_list.$free_count[$today].',';
	}else{
		$free_array[$today] =  0;
		$free_list= $free_list.'0,';
	}
	if (array_key_exists($today, $gold_count)) {
		$gold_array[$today] =  $gold_count[$today];
		$gold_list = $gold_list.$gold_count[$today].',';
	}else{
		$gold_array[$today] =  0;
		$gold_list = $gold_list.'0,';
	}
	if (array_key_exists($today, $platinum_count)) {
		$platinum_array[$today] =  $platinum_count[$today];
		$platinum_list = $platinum_list.$platinum_count[$today].',';
	}else{
		$platinum_array[$today] =  0;
		$platinum_list = $platinum_list.'0,';
	}
	/*
	if (array_key_exists($today, $free_count)) {
		$free_array[$today] =  $free_count[$today];
	}else{
		$free_array[$today] =  0;
	}
	if (array_key_exists($today, $gold_count)) {
		$gold_array[$today] =  $gold_count[$today];
	}else{
		$gold_array[$today] =  0;
	}
	if (array_key_exists($today, $platinum_count)) {
		$platinum_array[$today] =  $platinum_count[$today];
	}else{
		$platinum_array[$today] =  0;
	}*/
	//$today = date('d');
	
	//$today-=1;
}/*
echo '<pre>';
		print_r($free_array);
		//print_r($free_list);
		print_r($gold_array);
		print_r($platinum_array);
		echo '</pre>';*/

		/*	
		foreach($free_count as $key=>$value){
			if($key == $today){
				$free_list.=$free_list.$value.',';
			}else{
				$free_list.=$free_list.$value.',';
			}
			$today--;
		}*/
		$free_list = rtrim($free_list,',');
		$gold_list = rtrim($gold_list,',');
		$platinum_list = rtrim($platinum_list,',');
		/*
		echo 'free_list =='.rtrim($free_list,',').'---------<br/>';
		echo 'gold_list =='.rtrim($gold_list,',').'---------<br/>';
		echo 'platinum_list =='.rtrim($platinum_list,',').'---------<br/>';
		
		echo 'freecount =='.$free_count.'---------<br/>';
		echo 'gold_count =='.$gold_count.'---------<br/>';
		echo 'platinum_count =='.$platinum_count.'---------<br/>';*/
		//echo '<pre>';print_r($no_of_ads);echo '</pre>';
			
		?>
		<?php foreach($no_of_ads as $p_ads){
			if($p_ads->package_type == 1) {
				$list_of_count =$free_list;
			}else if($p_ads->package_type == 2){
				$list_of_count =$gold_list;
			}else if($p_ads->package_type == 3){
				$list_of_count =$platinum_list;
			}
			?>
				<div class="span4 statbox purple" onTablet="span6" onDesktop="span4" style=' margin-left: 1.128%;'>
					<div class="boxchart"><?php echo $list_of_count; ?></div>
					<div class="number"><?php echo $p_ads->ads_count; ?><i class="icon-arrow-up"></i></div>
					<div class="title"><?php echo ucwords($p_ads->pkg_dur_name); ?> Ads</div>
					<div class="footer">
						<a href="<?php echo base_url();?>ads/listAds/<?php echo $p_ads->pkg_dur_name; ?>"> View <?php echo ucwords($p_ads->pkg_dur_name); ?> Ads</a>
					</div>	
				</div>
		<?php }?>
				<!--<div class="span4 statbox green" onTablet="span6" onDesktop="span4">
					<div class="boxchart"><?php echo $list_of_count; ?></div>
					<div class="number"><?php echo $no_of_ads2?><i class="icon-arrow-up"></i></div>
					<div class="title">Gold Ads</div>
					<div class="footer">
						<a href="<?php echo base_url();?>ads/listAds/gold"> View Gold Ads</a>
					</div>
				</div>
				<div class="span4 statbox blue noMargin" onTablet="span6" onDesktop="span4">
					<div class="boxchart"><?php echo $list_of_count; ?></div>
					<div class="number">982<i class="icon-arrow-up"></i></div>
					<div class="title">Platinum Ads</div>
					<div class="footer">
						<a href="<?php echo base_url();?>ads/listAds/platinum"> View Platinum Ads</a>
					</div>
				</div>-->
				<!--<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
					<div class="number">678<i class="icon-arrow-down"></i></div>
					<div class="title">visits</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>	-->
				
			</div>		
		
		<!--</div>
		<div id="content" class="span9">-->
		<div class="row-fluid">
					<div class="widget blue span8" onTablet="span6" onDesktop="span8">
					<h2><span class="glyphicons globe"><i></i></span> Demographics</h2>
					<hr>
					<div class="content">
						<div class="verticalChart">
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>36%</span>
									</div>
								</div>
								<div class="title">Jan</div>
							</div>
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>15%</span>
									</div>
								</div>
								<div class="title">Feb</div>
							</div>
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>12%</span>
									</div>
								</div>
								<div class="title">Mar</div>
							</div>
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>9%</span>
									</div>
								</div>
								<div class="title">Apr</div>
							</div>
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>7%</span>
									</div>
								</div>
								<div class="title">May</div>
							</div>
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>6%</span>
									</div>
								</div>
								<div class="title">Jun</div>
							</div>
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>5%</span>
									</div>
								</div>
								<div class="title">Jul</div>
							</div>
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>4%</span>
									</div>
								</div>
								<div class="title">Aug</div>
							</div>
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>3%</span>
									</div>
								</div>
								<div class="title">Sep</div>
							</div>
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>1%</span>
									</div>
								</div>
								<div class="title">Oct</div>
							</div>	
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>1%</span>
									</div>
								</div>
								<div class="title">Nov</div>
							</div>	
							<div class="singleBar">
								<div class="bar">
									<div class="value">
										<span>1%</span>
									</div>
								</div>
								<div class="title">Dec</div>
							</div>	
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
					
				
		<div class="box black span4 noMargin" onTablet="span12" onDesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon white check"></i><span class="break"></span>Latest Ads</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="todo metro">
							<ul class="todo-list">
							<?php foreach($latest_ads as $l_ads){
								if($l_ads->package_type == 3){$li_class = 'blue';}
								else if($l_ads->package_type == 2){$li_class = 'yellow';}
								else if($l_ads->package_type == 1){$li_class = 'green';}
								?>
								<li class="<?php echo $li_class; ?>">
									<!--<a class="action icon-check-empty" href="#"></a>-->
<?php echo ucwords($l_ads->deal_tag);?>	
									<strong><?php echo $l_ads->created_on; ?></strong>
								</li>
							<?php }?>
							</ul>
						</div>	
					</div>
				</div>
		</div>
		<?php /*?>
		<div class="row-fluid">
				<div class="box black span4" onTablet="span6" onDesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon white list"></i><span class="break"></span>Weekly Status</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list metro">
							<li>
								<a href="#">
									<i class="icon-arrow-up green"></i>                               
									<strong>92</strong>
									New Comments                                    
								</a>
							</li>
						  <li>
							<a href="#">
							  <i class="icon-arrow-down red"></i>
							  <strong>15</strong>
							  New Registrations
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-minus blue"></i>
							  <strong>36</strong>
							  New Articles                                    
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-comment yellow"></i>
							  <strong>45</strong>
							  User reviews                                    
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-arrow-up green"></i>                               
							  <strong>112</strong>
							  New Comments                                    
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-arrow-down red"></i>
							  <strong>31</strong>
							  New Registrations
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-minus blue"></i>
							  <strong>93</strong>
							  New Articles                                    
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-comment yellow"></i>
							  <strong>256</strong>
							  User reviews                                    
							</a>
						  </li>
						</ul>
					</div>
				</div><!--/span-->
				
				<div class="box black span4" onTablet="span6" onDesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Last Users</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list metro">
							<li class="green">
								<a href="#">
									<img class="avatar" alt="Dennis Ji" src="img/avatar.jpg">
								</a>
								<strong>Name:</strong> Dennis Ji<br>
								<strong>Since:</strong> Jul 25, 2012 11:09<br>
								<strong>Status:</strong> Approved             
							</li>
							<li class="yellow">
								<a href="#">
									<img class="avatar" alt="Dennis Ji" src="img/avatar.jpg">
								</a>
								<strong>Name:</strong> Dennis Ji<br>
								<strong>Since:</strong> Jul 25, 2012 11:09<br>
								<strong>Status:</strong> Pending                                
							</li>
							<li class="red">
								<a href="#">
									<img class="avatar" alt="Dennis Ji" src="img/avatar.jpg">
								</a>
								<strong>Name:</strong> Dennis Ji<br>
								<strong>Since:</strong> Jul 25, 2012 11:09<br>
								<strong>Status:</strong> Banned                                  
							</li>
							<li class="blue">
								<a href="#">
									<img class="avatar" alt="Dennis Ji" src="img/avatar.jpg">
								</a>
								<strong>Name:</strong> Dennis Ji<br>
								<strong>Since:</strong> Jul 25, 2012 11:09<br>
								<strong>Status:</strong> Updated                                 
							</li>
						</ul>
					</div>
				</div><!--/span-->
				
				<div class="box black span4 noMargin" onTablet="span12" onDesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon white check"></i><span class="break"></span>To Do List</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="todo metro">
							<ul class="todo-list">
								<li class="red">
									<a class="action icon-check-empty" href="#"></a>	
									Windows Phone 8 App 
									<strong>today</strong>
								</li>
								<li class="red">
									<a class="action icon-check-empty" href="#"></a>
									New frontend layout
									<strong>today</strong>
								</li>
								<li class="yellow">
									<a class="action icon-check-empty" href="#"></a>
									Hire developers
									<strong>tommorow</strong>
								</li>
								<li class="yellow">
									<a class="action icon-check-empty" href="#"></a>
									Windows Phone 8 App
									<strong>tommorow</strong>
								</li>
								<li class="green">
									<a class="action icon-check-empty" href="#"></a>
									New frontend layout
									<strong>this week</strong>
								</li>
								<li class="green">
									<a class="action icon-check-empty" href="#"></a>
									Hire developers
									<strong>this week</strong>
								</li>
								<li class="blue">
									<a class="action icon-check-empty" href="#"></a>
									New frontend layout
									<strong>this month</strong>
								</li>
								<li class="blue">
									<a class="action icon-check-empty" href="#"></a>
									Hire developers
									<strong>this month</strong>
								</li>
							</ul>
						</div>	
					</div>
				</div>
			
			</div>
			<?php */?>
		
		</div>
	</div>
</div>