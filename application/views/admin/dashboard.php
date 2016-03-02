		
		
		<div id="content" class="span9">
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
		
		</div>
	</div>
</div>