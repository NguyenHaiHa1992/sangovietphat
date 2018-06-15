<!--<script type="text/javascript" charset="utf-8">
    $(function(){
        if(!flux.browser.supportsTransitions)
            alert("Flux Slider requires a browser that supports CSS3 transitions");
        window.f = new flux.slider('#slider', {
            pagination: true,
        });
    });
</script>-->
<?php $list_category = ProductCategory::getItems(10, array('parent_id' => 0,)); ?>
<div class="col-md-12" id="main-content">
    <div class="col-sm-12">
        <!--<div id="slider" class="carousel slide wContentBox" data-ride="carousel">-->
            <!-- Indicators -->
            <!--<ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
                <li data-target="#slider" data-slide-to="3"></li>
                <li data-target="#slider" data-slide-to="4"></li>
            </ol>-->

            <!-- Wrapper for slides -->
            <!--<div class="carousel-inner">
                <div class="item active">
                    <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="..." class="img-responsive">
                </div>
                <div class="item">
                    <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="..." class="img-responsive">
                </div>
                <div class="item">
                    <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="..." class="img-responsive">
                </div>
                <div class="item">
                    <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="..." class="img-responsive">
                </div>
                <div class="item">
                    <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="..." class="img-responsive">
                </div>
            </div>-->
        <!--</div>-->
        <!--<div id="slider" class="wContentBox">
            <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="" class="img-responsive" />
            <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="" class="img-responsive"/>
            <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="" class="img-responsive"/>
            <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="" class="img-responsive"/>
            <img src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/data/slider-01.png" alt="" class="img-responsive"/>
        </div>-->
        <div id="slider_sm" class="carousel slide wContentBox" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		    	<?php $i=0; foreach(Banner::getBannerPosition(Banner::CAT_BANNER_SLIDER,5) as $banner):?>
		        <li data-target="#slider_sm" data-slide-to="<?php echo $i;?>" class="<?php if($i==0) echo 'active';?>"></li>
		        <?php $i++;?>
		       <?php endforeach;?>        
		    </ol>
		
		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		    	<?php $i=0; foreach(Banner::getBannerPosition(Banner::CAT_BANNER_SLIDER,5) as $banner):?>
		        <div class="item <?php if($i==0) echo 'active';?>">
		        	<a href = "<?php echo $banner->url;?>">
		            	<img src="<?php echo $banner->image->getAbsoluteUrl();?>" alt="<?php echo $banner->url;?>" class="img-responsive">
		           	</a>
		        </div>
		        <?php $i++;?>
		        <?php endforeach;?>        
		    </div>
	</div>
        <?php
        $this->widget('wBanner', array(
            'id'=>'slider',
            'class'=>'wContentBox',
            'data'=>Banner::getBannerPosition(Banner::CAT_BANNER_SLIDER,5),
        ));
        ?>
    </div>
    <div class="col-sm-12 col-md-12">
        <!-- wContentBox -->
        <div id="hot-products" class="wContentBox category">
            <div class="contentBox">
                <div class="title_box">Sản phẩm bán chạy</div>
                <div class="content_box">
                    <!-- wCarouselSlider -->
                    <?php
                    $this->widget('wCarouselSlider', array(
                        'id'=>'carousel-hot-products',
                        'class'=>'slide',
                        'data'=>Product::getItems(12, array(
                            'status' => true,
                            'best_sell' => 1
                        )),
                        'row' => 1,
                    ));
                    ?>
                    <?php
//                        $this->widget('wListItem', array(
//                            'class'=>'list-unstyled',
//                            'data'=>Product::getItems(12, array(
//                                'status' => true,
//                                'best_sell' => 1
//                            )),
//                            'template'=>'
//                                <div class="image"><a href="{detail_url}" title="{name}"><img src="[getIntroimage_thumb(220,137)]" alt="{name}" title="{name}" class="img-responsive"></a></div>
//                                <div class="information">
//                                    <a href="{detail_url}" title="{name}">[getTitle_text(6)]</a>
//                                </div>
//                            ',
//                        ));                    ?>
                    <!-- end of wCarouselSlider -->
                </div>
            </div>
        </div>
        <!-- end of wContentBox #hot-products-->
    </div>
    
    <?php if(isset($list_category) && sizeof($list_category) !=0):?>
        <?php foreach($list_category as $key => $category):?>
            <div class="col-sm-12">
                <!-- wContentBox -->
                <div id="category-0<?php echo $key+1;?>" class="wContentBox category">
                    <div class="contentBox">
                        <div class="title_box">
                            <a href="<?php echo $category->detail_url;?>" title="<?php echo $category->name;?>">
                                <!--replace image by category name-->
                                <!--<img src="<?ph echo $category->getBoximage_thumb(184,18);?>" alt="<?ph echo $category->name;?>" title="<?ph echo $category->name;?>">-->
                                <?php echo $category->name;?>
                            </a>
                        </div>
                        <div class="content_box">
                            <!-- wListItem -->
                            <?php
                                $this->widget('wListItem', array(
                                    'class'=>'list-unstyled',
                                    'data'=>Product::getItems(8,array('cat_id'=>$category->id ,)),
                                    'template'=>'   
                                        <div class="image"><a href="{detail_url}" title="{name}"><img src="[getIntroimage_thumb(220,137)]" alt="{name}" title="{name}" class="img-responsive"></a></div>
                                        <div class="information">
                                            <a href="{detail_url}" title="{name}">[getTitle_text(6)]</a>
                                        </div>
                                    ',
                                    'type' => 'product'
                                ));
                            ?>
                            <!-- end of wListItem -->
                        </div>
                    </div>
                </div>
                <!-- end of wContentBox -->
            </div>
        <?php endforeach;?>
    <?php endif;?>
    
    <div class="col-sm-12 col-md-12">
        <!-- wContentBox -->
        <div id="news" class="wContentBox category">
            <div class="contentBox">
                <div class="title_box">Tin tức</div>
                <div class="content_box">
                    <!-- wListItem -->
                    <?php
                    $this->widget('wListItem', array(
                        'class'=>'list-unstyled',
                        'data'=>News::getItems(6,array('cat_id'=>2,'home'=>true)),
//                        'template'=>'
//                            <div class="image"><a href="{detail_url}" title="{name}"><img src="[getIntroimage_thumb(120,85)]" alt="{name}" title="{name}" class="img-responsive"></a></div>
//                            <div class="information">
//                                <a href="{detail_url}" title="{name}" class="title">{title_text}</a>
//                                <div class="quote">[getIntro_text(20)]</div>
//                            </div>
//                            <div class="read-more"><a href="{detail_url}" title="{name}">Xem thêm >></a> </div>
//                        ',
                        'template'=>'
                            <div class="image"><a href="{detail_url}" title="{name}"><img src="[getIntroimage_thumb(220,137)]" alt="{name}" title="{name}" class="img-responsive"></a></div>
                            <div class="information">
                                <a href="{detail_url}" title="{name}"><b>{title_text}</b></a>
                                <div class="quote">[getIntro_text(20)]</div>
                            </div>
                        ',
                        'type' => 'news'
                    ));
                    ?>
                    <!-- end of wListItem -->
                </div>
            </div>
        </div>
        <!-- end of wContentBox #news-->
    </div>
</div>