<style>
	.verticalChart .singleBar {
	float: left;
	margin-left: 0.15% !important;
	margin-right: 0.15% !important;
	width: 8% !important;
	}
	.verticalChart .singleBar .bar .value span {
	text-shadow:none;
	}
</style>
<div id="content" class="span9" style='min-height:150px'>
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url()?>admin_dashboard/">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Dashboard</a></li>
	</ul>
	<div class="row-fluid">
		<?php //echo '<pre>';print_r($monthly_ads[0]);echo '</pre>';
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
			
			
			
			$a=0;$date=date("y:m:d");
			for($i=0; $i<30; $i++){
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
			
			}
			$free_list = rtrim($free_list,',');
			$gold_list = rtrim($gold_list,',');
			$platinum_list = rtrim($platinum_list,',');
			
			
			
			$revenue_count = array();
				foreach($monthly_ads as $m_ads){
							$time=strtotime($m_ads->dtime);
							$month=date("F",$time);
							$year=date("Y",$time);
							$c_month = substr($month,0,3).'-'.$year;
							//if(!in_array($c_month ,$array_date) && ($m_ads->payment_status == 1)){
								$array_date[] = $c_month;
								$revenue_count[$c_month] = round($m_ads->t_paid,2);
							}
								
			/*echo '<pre>'.'monthly_ads';print_r($monthly_ads);echo '</pre>';
			echo '<pre>'.'revenue_count';print_r($revenue_count);echo '</pre>';
			echo '<pre>'.'array_date';print_r($array_date);echo '</pre>';
			*/
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
		
	</div>
	<div class="row-fluid">
		<div class="widget blue span8" onTablet="span6" onDesktop="span8">
			<h2><span class="glyphicons globe"><i></i></span> Demographics</h2>
			<hr>
			<div class="content">
				<div class="verticalChart">
					<?php $time_date = date('Y-m-d');
			
			for($d=0;$d<12;$d++){
				$new_timestamp = strtotime(-$d.' months', strtotime($date));
				
				$time_date = date("Y-m-d",$new_timestamp);
				//echo '11--'.$time_date= date('Y-m-d');
				$month_date=date("F",strtotime($time_date));
				$year_date=date("Y",strtotime($time_date));
				$c_month_date = substr($month_date,0,3).'-'.$year_date;
				
				
				if(array_key_exists(trim($c_month_date),$revenue_count)){//echo $c_month_date.'111===45';echo '<br/>'.'----'.'<br/>'; ?>
					<div class="singleBar">
						<div class="bar">
							<div class="value">
								<span style='color:#ffffff !important;'><?php echo $revenue_count[$c_month_date] ?></span>
							</div>
						</div>
						<div class="title"><?php echo substr($month_date,0,3) .'<br/>'.$year_date; ?></div>
					</div>
				<?php }else{?>
					<div class="singleBar">
						<div class="bar">
							<div class="value">
								<span style='color:#ffffff;'>0</span>
							</div>
						</div>
						<div class="title"><?php echo substr($month_date,0,3) .'<br/>'.$year_date; ?></div>
					</div>
				<?php }
				/*$time=strtotime($m_ads->dtime);
				$month=date("F",$time);
				$year=date("Y",$time);
				$c_month = substr($month,0,3).'-'.$year;
							
							
				$date = strtotime($c_date. -$d.' months');
				*/
				
				//$c_date = date('Y-m-d');
				//echo $time_date = strtotime(strtotime($c_date). -$d.' months');
			}
					
					
					
					
					
					
					
					
					
					
					
					
					/*$array_date=array();
						foreach($monthly_ads as $m_ads){
							$time=strtotime($m_ads->dtime);
							$month=date("F",$time);
							$year=date("Y",$time);
							$c_month = substr($month,0,3).'-'.$year;
							if(!in_array($c_month ,$array_date) && ($m_ads->payment_status == 1)){
								$array_date[] = $c_month;?>
					<div class="singleBar">
						<div class="bar">
							<div class="value">
								<span style='color:black;'><?php echo round($m_ads->t_paid,2); ?></span>
							</div>
						</div>
						<div class="title"><?php echo substr($month,0,3) .'<br/>'.$year; ?></div>
					</div>
					<?php }elseif(!in_array($c_month ,$array_date)){
						$array_date[] = $c_month;?>
					<div class="singleBar">
						<div class="bar">
							<div class="value">
								<span>0</span>
							</div>
						</div>
						<div class="title"><?php echo substr($month,0,3) .'<br/>'.$year; ?></div>
					</div>
					<?php }	?>
					<?php } */?>
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
							<?php echo ucwords($l_ads->deal_tag);?>	
							<strong><?php echo $l_ads->created_on; ?></strong>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php ?>
</div>
</div>
</div>