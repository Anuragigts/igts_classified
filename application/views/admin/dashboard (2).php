<div class="table-responsive">
    <table id="example-table" class="table table-striped table-bordered table-hover table-default">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email Id</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            foreach($get as $ct){ ?>
            <tr class="odd gradeX">
                <td><?php echo $i++;?></td>
                <td><?php 
                $lname = ucfirst($ct->first_name)." ".ucfirst($ct->last_name);
                echo $lname;?></td>
                <td><?php echo $ct->mobile;?></td>
                <td><?php echo $ct->login_email;?></td>
                <td><?php echo $ct->house_no.", ".$ct->City_name.",<br/> ".$ct->State_name.", ". ucfirst(strtolower($ct->Country_name));?></td>
                <td>
                    <a href="<?php echo base_url();?>customercare/edit/<?php echo $ct->login_id;?>" title="Edit Customer Care"><i class='fa fa-edit text-blue'></i></a>
                    <?php if($ct->login_status == 0){ ?>
                        <a href="javascript:void(0);" class="activate" title="Activate" lname="<?php  echo $lname;?>" login="<?php echo $ct->login_id;?>"><i class='fa fa-check-circle-o text-green'></i></a>
                    <?php } else { ?>
                        <a href="javascript:void(0);" class="deactivate" title="Deactivate" lname="<?php  echo $lname;?>" login="<?php echo $ct->login_id;?>"><i class='fa fa-times-circle-o text-red'></i></a>
                    <?php } ?>
                    <a href="<?php echo base_url();?>customercare/delete/<?php echo $ct->login_id;?>" title="Delete Customer Care"><i class='fa fa-trash-o text-red'></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script src="<?php echo $this->config->item('admin_assets_url');?>js/demo/advanced-tables-demo.js"></script>
<?php $this->load->view("admin_layout/script");?>