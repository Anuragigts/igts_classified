	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Transaction List</a></li>
			</ul>
<?php if($this->session->flashdata('err') != ''){?>
                 <div class="alert alert-block alert-danger fade in">
                     <button data-dismiss="alert" class="close" type="button">
                       ×
                     </button>
                     <p>
                       <?php echo ($this->session->flashdata('err'))?$this->session->flashdata('err'):''?>
                     </p>
                 </div>
             <br>
             <?php }?>
			 <?php if($this->session->flashdata('msg') != ''){?>
                 <div class="alert alert-block alert-info fade in no-margin">
                     <button data-dismiss="alert" class="close" type="button">
                       ×
                     </button>
                     <p>
                       <?php echo ($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''?>
                     </p>
                 </div>
             <br>
             <?php }?>
			 <div style='margin-bottom:10px;margin-right:25px; float:right;' > 
			 
			 <?php // echo '<pre>';print_r($tran_details[0]);echo '</pre>';?>
			<div class="row-fluid ">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Transaction Done</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                            <tr>
								<th>Transaction Id</th>
								<th> Deal Tag </th>
								<th>User Name</th>
								<th>E-Mail</th>
								<th>Gross Amount</th>
								<th>Transaction Charge</th>
								<th>Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach($tran_details as $users){$i++; ?>
                            <tr class="odd gradeX">
							<td> <?php echo $users->txn_id;?></td>
							<td> <?php echo $users->item_name;?></td>
                               <td><?php echo ucwords($users->first_name).'&nbsp;';?></td>
								<td><?php echo $users->payer_email;?></td>
								<td><?php echo $users->gross_amt;?></td>
								<td><?php echo $users->mc_fee;?></td>
								<td><?php if($users->payment_status == 'Completed')echo 'Paid'; else echo 'Pending';?></td>
								
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
					<form name='change_status' method='post' action='<?php echo base_url()?>ads/change_status' >
					<select name='change_status'>
						<option>Select status </option>
						<option value='0'>New</option>
						<option value='1'>Active</option>
						<option value='2'>On-Hold</option>
						<option value='3'>In-progress</option>
						<option value='4'>Rejected</option>
					</select>
					<input type='hidden' name='selected_ads' class='selected_ads' id='selected_ads' value=''>
					<input type='submit' name='active' class='btn success'value='Change Status' >
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
function select_post_ad(ad_id){
	var adds_list = $('#selected_ads').val();
	var selected_ads=''
	 if (document.getElementById('deal_id'+ad_id).checked) {
		 selected_ads = adds_list+ad_id+',';
	} else {
		var strLen = adds_list.length;
		adds_list = adds_list.slice(0,strLen-1);
		arr = adds_list.split(',');
		for(i = 0; i < arr.length; i++){
			if(arr[i].match(ad_id)){
			}else{
				selected_ads =selected_ads + arr[i]+',';
			}
		}
	}
	document.getElementById('selected_ads').value = selected_ads;
}

function check_all_ads(){
		
	if($('.checkall').is(":checked")){
		 //var checkbox_count = $(".check_adds").length );
		
		 $("input:checkbox.check_adds").prop('checked','true');
		 
		/*$("input:checkbox[class=check_adds]").each(function() {
           // alert("set checked");
            $(this).attr('checked', "checked");
        });
		
		
		//$(".check_adds").prop("checked", true);
		
		for (var i = 0; i < checkbox_count; i++) {
            document.getElementById("form").elements[i].checked = checked;
        }*/
		
            }else{
				alert('not checked');
			}
			
	//var checkall= $( ".checkall" ).val();
	//alert(checkall); check_adds
}
</script>
<!-- end DASHBOARD CIRCLE TILES -->