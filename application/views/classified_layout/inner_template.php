<?php 
//echo "<pre>"; print_r(@$most_ads); exit; 
// echo "<pre>";
// $outer_array = array_chunk(@$most_ads, 3);
?>   

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="img/icons/icon.png" type="image/x-icon">
	
    <!-- xxx Head Content xxx -->
    <?php echo $this->load->view('common/head');?> 
    <!-- xxx End xxx -->
  
</head>
<body id="home">
	<!--Preloader-->
	<div class="preloader">
		<div class="status">&nbsp;</div>
	</div>
	   
	   
	<!-- layout-->
	<div id="layout">
	
		<!-- xxx tophead Content xxx -->
		<?php echo $this->load->view('common/tophead'); ?> 
		<!-- xxx End tophead xxx -->
		<?php echo $this->load->view("classified/".$content);?>



		<!-- xxx footer Content xxx -->
		<?php echo $this->load->view('common/footer');?> 
		<!-- xxx footer End xxx -->
		
	</div>
	<!-- End Entire Wrap -->

	
	<!-- xxx footerscript Content xxx -->
	<?php echo $this->load->view('common/footerscript');?> 
	<!-- xxx footerscript End xxx -->
	
		
</body>
</html>
