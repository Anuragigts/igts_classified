		
		
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
		
krsort($free_count);
krsort($gold_count);
krsort($platinum_count);
echo '<pre>';
		print_r($free_count);
		//print_r($free_list);
		print_r($gold_count);
		print_r($platinum_count);
		echo '</pre>';
		
echo $today;
$a=0;
$date=date('y:m:d');
for($i=0; $i<25; $i++){
	$date = date('y:m:d', strtotime('-1 day', strtotime($date)));
	//$date = date_modify($date,'-1 day');
	$only_day = date("d",strtotime($date));
	if($today < 10){
		$today = '0'.$today;
	}
	
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
	}
	//$today = date('d');
		$today-=1;
}
echo '<pre>';
		print_r($free_array);
		//print_r($free_list);
		print_r($gold_array);
		print_r($platinum_array);
		echo '</pre>';

		/*	
		foreach($free_count as $key=>$value){
			if($key == $today){
				$free_list.=$free_list.$value.',';
			}else{
				$free_list.=$free_list.$value.',';
			}
			$today--;
		}*/
		
		/*
		echo 'freecount =='.$free_count.'---------<br/>';
		echo 'gold_count =='.$gold_count.'---------<br/>';
		echo 'platinum_count =='.$platinum_count.'---------<br/>';*/
			
		?>
				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
					<div class="number">854<i class="icon-arrow-up"></i></div>
					<div class="title">visits</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>	
				</div>
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
					<div class="number">123<i class="icon-arrow-up"></i></div>
					<div class="title">sales</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
					<div class="number">982<i class="icon-arrow-up"></i></div>
					<div class="title">orders</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
					<div class="number">678<i class="icon-arrow-down"></i></div>
					<div class="title">visits</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>	
				
			</div>		
		
		</div>
	</div>
</div>