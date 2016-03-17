<!-- platinum package start-->
	<?php foreach ($my_ads_details as $m_details) {
		/*person name*/
		if ($m_details->ad_type == 'business') {
		$person_name = @mysql_result(mysql_query("SELECT `contact_person` FROM `contactinfo_business` WHERE ad_id = '$m_details->ad_id'"), 0,'contact_person');
		}
		else if ($m_details->ad_type == 'consumer') {
		$person_name = @mysql_result(mysql_query("SELECT `contact_name` FROM `contactinfo_consumer` WHERE ad_id = '$m_details->ad_id'"), 0,'contact_name');
		}

		/*currency symbol*/ 
			if ($m_details->currency == 'pound') {
				$currency = '<span class="pound_sym"></span>';
			}
			else if ($m_details->currency == 'euro') {
				$currency = '<span class="euro_sym"></span>';
			}
			?>
		<?php
			}
			?>