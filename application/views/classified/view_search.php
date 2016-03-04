<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(count($view) > 0){
    foreach ($view as $vw){ ?>
        <div class="adds-wrapper">
           <div class="tab-content">
               <div class="tab-pane active" id="allAds">
                     <div class="item-list">
                         <div class="cornerRibbons topAds">
                         <a href="#"> Top Ads</a>
                         </div>
                         <div class="col-sm-2 no-padding photobox">
                         <div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="<?php echo base_url();?>/pictures/" alt="img"></a> </div>
                         </div>

                         <div class="col-sm-7 add-desc-box">
                         <div class="add-details">
                         <h5 class="add-title"> <a href="<?php echo base_url();?>view_ads/ad_details/<?php echo $vw->ad_id;?>">
                        <?php echo $vw->title;?></a> </h5>
                         <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="" data-original-title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category"><?php echo ucfirst($vw->category_name);?> </span>- <span class="item-location"><i class="fa fa-map-marker"></i> <?php echo $vw->Country_name;?> </span> </span> </div>
                         </div>
                         <div class="col-sm-3 text-right  price-box">
                         <h2 class="item-price"><i class="fa fa-inr"></i><?php echo $vw->price;?></h2>
                         <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Top Ads</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
                     </div>                          
               </div>
              <div class="tab-pane" id="businessAds"></div>
              <div class="tab-pane" id="personalAds"></div>
           </div>
        </div>
        <div class="tab-box  save-search-bar text-center"> <a href="#"> <i class=" icon-star-empty"></i> Save Search </a> </div>
        <br/>
    <?php }
}
?>