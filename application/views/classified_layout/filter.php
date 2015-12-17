<div class="search-row-wrapper">
    <div class="container ">
        <form action="" method="post">
            <div class="col-sm-3">
                <input class="form-control keyword" id="keyword" type="text" placeholder="e.g. Mobile Sale" name="keyword">
            </div>
            <div class="col-sm-3">
                <select class="form-control selecter" name="category" id="search-category">
                    <option selected="selected" value="">All Categories</option>
                    <?php 
                    if(count($cat) > 0){
                        foreach($cat as $ct){ ?>
                            <option value="<?php echo  $ct->category_id;?>"><?php echo ucfirst($ct->category_name);?></option>
                    <?php }
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control selecter" name="location" id="id-location">
                    <option value="">All Locations</option>
                    <?php 
                    if(count($cty) > 0){
                        foreach($cty as $cyt){ ?>
                            <option value="<?php echo  $cyt->Country_id;?>"><?php echo ucfirst(strtolower($cyt->Country_name));?></option>
                        <?php }
                    }?>
                </select>
            </div>
            <div class="col-sm-3">
                <button type="button" class="sub_filter btn btn-block btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
</div>