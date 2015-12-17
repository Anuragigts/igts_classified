<?php $this->load->view("classified_layout/filter");?>
<div class="main-container">
   <div class="container">
      <div class="row">
         <div class="col-sm-3 page-sidebar">
             <?php $this->load->view("classified/side");?>
         </div>
         <div class="col-sm-9 page-content col-thin-left">
            <div class="category-list">
               <div class="tab-box ">
                  <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                     <li class="active"><a href="#allAds" data-url="ajax/1.html" role="tab" data-toggle="tab">All Ads <span class="badge">228,705</span></a></li>
                     <li><a href="#businessAds" data-url="ajax/2.html" role="tab" data-toggle="tab">Business <span class="badge">22,805</span></a></li>
                     <li><a href="#personalAds" data-url="ajax/3.html" role="tab" data-toggle="tab">Personal <span class="badge">18,705</span></a></li>
                  </ul>
                  <div class="tab-filter">
                     <select class="selectpicker" data-style="btn-select" data-width="auto">
                        <option>Short by</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                     </select>
                  </div>
               </div>
               <div class="listing-filter">
                  <div class="pull-left col-xs-6">
                     <div class="breadcrumb-list"> <a href="#" class="current"> <span>All ads</span></a> in New York <a href="#selectRegion" id="dropdownMenu1" data-toggle="modal"> <span class="caret"></span> </a> </div>
                  </div>
                  <div class="pull-right col-xs-6 text-right listing-view-action"> <span class="list-view active"><i class="  icon-th"></i></span> <span class="compact-view"><i class=" icon-th-list  "></i></span> <span class="grid-view "><i class=" icon-th-large "></i></span> </div>
                  <div style="clear:both"></div>
               </div>
               <div class="adds-wrapper"  id="searchresults">
                  <div class="tab-content">
                      <div class="tab-pane active" id="allAds">
                            <div class="item-list">
                                <div class="cornerRibbons topAds">
                                <a href="#"> Top Ads</a>
                                </div>
                                <div class="col-sm-2 no-padding photobox">
                                <div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/tp/Image00015.jpg" alt="img"></a> </div>
                                </div>

                                <div class="col-sm-7 add-desc-box">
                                <div class="add-details">
                                <h5 class="add-title"> <a href="ads-details.html">
                                Brand New Samsung Phones </a> </h5>
                                <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="" data-original-title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
                                </div>

                                <div class="col-sm-3 text-right  price-box">
                                <h2 class="item-price"> $ 320 </h2>
                                <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Top Ads</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>

                            </div>                          
                      </div>
                     <div class="tab-pane" id="businessAds"></div>
                     <div class="tab-pane" id="personalAds"></div>
                  </div>
               </div>
               <div class="tab-box  save-search-bar text-center"> <a href="#"> <i class=" icon-star-empty"></i> Save Search </a> </div>
            </div>
            <div class="pagination-bar text-center">
               <ul class="pagination">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#"> ...</a></li>
                  <li><a class="pagination-btn" href="#">Next &raquo;</a></li>
               </ul>
            </div>
            <div class="post-promo text-center">
               <h2> Do you get anything for sell ? </h2>
               <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
               <a href="post-ads.html" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
            </div>
         </div>
      </div>
   </div>
</div>