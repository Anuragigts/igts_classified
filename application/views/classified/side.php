<?php 
$uri3 = $this->uri->segment(3); 
$uri4 = $this->uri->segment(4);
$uri5 = $this->uri->segment(5);
?>
<aside>
    <div class="inner-box">
        <?php if($uri3 == ""){ ?>
        <div class="categories-list  list-filter">
          <h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>
          <ul class=" list-unstyled">
            <?php foreach($cat as $ct){ ?>
                 <li><a href="<?php echo base_url();?>view_ads/index/<?php echo $ct->category_id;?>"><span class="title"><?php echo ucfirst($ct->category_name);?></span><span class="count">&nbsp;<?php echo $ct->coun_ant;?></span></a></li>             
            <?php } ?>
          </ul>
        </div>
        <?php } else if($uri3 != "" && $uri4 == ""){ ?>
        <div class="categories-list  list-filter">
            <h5 class="list-title"><strong><a href="<?php echo base_url();?>view_ads"><i class="fa fa-angle-left"></i> All Categories</a></strong></h5>
            <ul class=" list-unstyled">
                <li><a href="javascirpt:void(0);"><span class="title"><strong><?php echo ucfirst($cat['category_name']);?></strong></span><span class="count">&nbsp;<?php  echo $cat["coun_ant"];?></span></a>
                    <ul class=" list-unstyled long-list">
                        <?php foreach($sscat as $st){ ?>
                            <li><a href="<?php echo base_url();?>view_ads/index/<?php echo $st->category_id;?>/<?php echo $st->sub_category_id;?>"><?php echo ucfirst($st->sub_category_name);?> <span class="count">(<?php echo $st->coun_ants;?>)</span></a></li>
                        <?php }?>
                    </ul>
                </li>
            </ul>
        </div>
        <?php } else if($uri3 != "" && $uri4 != "" && $uri5 == ""){ ?>
        <div class="categories-list  list-filter">
            <h5 class="list-title"><strong><a href="<?php echo base_url();?>view_ads"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> All Categories</a></strong></h5>
            <ul class=" list-unstyled">
                <li><a href="<?php echo base_url();?>view_ads/index/<?php echo $uri3;?>"><span class="title"><strong><?php echo ucfirst($cat['category_name']);?></strong></span><span class="count">&nbsp;<?php  echo $cat["coun_ant"];?></span></a>
                    <ul>
                        <li><a href="<?php echo base_url();?>view_ads/index/<?php echo $uri3;?>"><span class="title"><strong><?php echo ucfirst($sscat['sub_category_name']);?></strong></span><span class="count">&nbsp;<?php  echo $sscat["coun_ants"];?></span></a>
                            <ul class=" list-unstyled long-list">
                                <?php foreach($scat as $ot){ ?>
                                    <li><a href="<?php echo base_url();?>view_ads/index/<?php echo $sscat['category_id'];?>/<?php echo $ot->sub_category_id;?>/<?php echo $ot->sub_subcategory_id;?>"><?php echo ucfirst($ot->sub_subcategory_name);?> <span class="count">(<?php echo $ot->coun_ants2;?>)</span></a></li>
                                <?php }?>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php } else{ ?>
        <div class="categories-list  list-filter">
            <h5 class="list-title"><strong><a href="<?php echo base_url();?>view_ads"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> All Categories</a></strong></h5>
            <ul class=" list-unstyled">
                <li><a href="<?php echo base_url();?>view_ads/index/<?php echo $uri3;?>"><span class="title"><strong><?php echo ucfirst($cat['category_name']);?></strong></span><span class="count">&nbsp;<?php  echo $cat["coun_ant"];?></span></a>
                    <ul>
                        <li><a href="<?php echo base_url();?>view_ads/index/<?php echo $uri3;?>/<?php echo $uri4;?>"><span class="title"><strong><?php echo ucfirst($sscat['sub_category_name']);?></strong></span><span class="count">&nbsp;<?php  echo $sscat["coun_ants"];?></span></a>
                            <ul class=" list-unstyled long-list">
                                <li><a href="javascript:void(0);"><?php echo ucfirst($scat['sub_subcategory_name']);?> <span class="count">(<?php echo $scat['coun_ants2'];?>)</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>  
        <?php }
        ?>
        <div style="clear:both"></div>
       <div class="locations-list  list-filter">
          <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
          <ul class="browse-list list-unstyled long-list">
             <li> <a href="sub-category-sub-location.html"> Atlanta </a></li>
             <li> <a href="sub-category-sub-location.html"> Wichita </a></li>
             <li> <a href="sub-category-sub-location.html"> Anchorage </a></li>
             <li> <a href="sub-category-sub-location.html"> Dallas </a></li>
             <li> <a href="sub-category-sub-location.html">New York </a></li>
             <li> <a href="sub-category-sub-location.html"> Santa Ana/Anaheim </a></li>
             <li> <a href="sub-category-sub-location.html"> Miami </a></li>
             <li> <a href="sub-category-sub-location.html"> Virginia Beach </a></li>
             <li> <a href="sub-category-sub-location.html"> San Diego </a></li>
             <li> <a href="sub-category-sub-location.html"> Boston </a></li>
             <li> <a href="sub-category-sub-location.html"> Houston </a></li>
             <li> <a href="sub-category-sub-location.html">Salt Lake City </a></li>
             <li> <a href="sub-category-sub-location.html"> Other Locations </a></li>
          </ul>
       </div>
       <div class="locations-list  list-filter">
          <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>
          <form role="form" class="form-inline " method="post">
             <div class="form-group col-sm-4 no-padding">
                <input type="text" placeholder="&#8377; 2000 " id="minPrice" name="minPrice" class="form-control">
             </div>
             <div class="form-group col-sm-1 no-padding text-center"> - </div>
             <div class="form-group col-sm-4 no-padding">
                <input type="text" placeholder="&#8377; 3000 " id="maxPrice" name="maxPrice" class="form-control">
             </div>
             <div class="form-group col-sm-3 no-padding">
                <input type="submit" class="btn btn-default pull-right" name="go" value="GO"/>
             </div>
          </form>
          <div style="clear:both"></div>
       </div>
       <div class="locations-list  list-filter">
          <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
          <ul class="browse-list list-unstyled long-list">
             <li> <a href="sub-category-sub-location.html"><strong>All Ads</strong> <span class="count">228,705</span></a></li>
             <li> <a href="sub-category-sub-location.html">Business <span class="count">28,705</span></a></li>
             <li> <a href="sub-category-sub-location.html">Personal <span class="count">18,705</span></a></li>
          </ul>
       </div>
       <div class="locations-list  list-filter">
          <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
          <ul class="browse-list list-unstyled long-list">
             <li> <a href="sub-category-sub-location.html">New <span class="count">228,705</span></a></li>
             <li> <a href="sub-category-sub-location.html">Used <span class="count">28,705</span></a></li>
             <li> <a href="sub-category-sub-location.html">None </a></li>
          </ul>
       </div>
       <div style="clear:both"></div>
    </div>
 </aside>