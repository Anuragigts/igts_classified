<div class="modal modal-flex fade" id="newflexModal" tabindex="-1" role="dialog" aria-labelledby="flexModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="flexModalLabel">Create Sub Sub Sub Category</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="validate" method="post">
                    <div class="htname">
                        
                    </div>                    
                    <div class="form-group">
                       <div class="span2" style='height:55px'></div>
                        <div class="span8">
                            <label>Category Name <span class="text-red">*</span></label>
                            <select name="scat_name" class="form-control cat-val cat_chage">
                                <option value="">-- Select Category --</option>
                                <?php foreach ($view as $vt){ ?>
                                <option value="<?php echo $vt->category_id;?>"><?php echo ucfirst($vt->category_name);?></option>
                                <?php } ?>
                            </select>
                            <span class="err-cat text-red"></span>
                        </div>
                       <div class="span2" style='height:55px'></div>
                    </div>
                    <div class="form-group">
                       <div class="span2" style='height:55px'></div>
                        <div class="span8">
                            <label>Sub Category Name <span class="text-red">*</span></label>
                            <select name="scat_name" class="form-control scat-val scat_chage">
                                <option value="">-- Select Sub Category --</option>
                                <?php foreach ($bview as $vt){ ?>
                                <option value="<?php echo $vt->sub_category_id;?>"><?php echo ucfirst($vt->sub_category_name);?></option>
                                <?php } ?>
                            </select>
                            <span class="err-scat text-red"></span>
                        </div>
                        <div class="span2" style='height:55px'></div>  
                    </div>
                    <div class="form-group">
                        <div class="span2" style='height:55px'></div>
                        <div class="span8">
                            <label>Sub Sub Category Name <span class="text-red">*</span></label>
                            <select name="sscat_name" class="form-control sscat-val sscat_chage">
                                <option value="">-- Select Sub Sub Category --</option>
                                <?php foreach ($bbview as $vt){ ?>
                                <option value="<?php echo $vt->sub_subcategory_id;?>"><?php echo ucfirst($vt->sub_subcategory_name);?></option>
                                <?php } ?>
                            </select>
                            <span class="err-scat text-red"></span>
                        </div>
                        <div class="span2" style='height:55px'></div>
                    </div>
                    <div class="form-group">
                      <div class="span2" style='height:55px'></div>
                        <div class="span8">
                           <label>Sub Sub Sub Category Name <span class="text-red">*</span></label>
                           <input type="text" name="ssscat_name" class="form-control ctname" placeholder="Sub Sub Category Name" onkeypress="return onlyAlpha(event);" maxlength="100"/> 
                           <span class="err-sscat text-red"></span>
                        </div>
                        <div class="span2" style='height:55px'></div>                     
                    </div>
                    <div class="form-group">
                        <div class="span4"></div>
						<div class="span4">
                            <button type="button" class="btn btn-default ins_cad btn_cat" category="">Create Sub Sub Sub Category</button>
                        </div>
                        <div class="span4"></div>                        
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>