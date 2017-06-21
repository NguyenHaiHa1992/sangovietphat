<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0" />
    <link rel="shortcut icon" href="<?php $favicon = Banner::getItem(Banner::CAT_BANNER_FAVICON); echo isset($favicon)?Yii::app()->baseUrl.'/'.$favicon->image->url:'';?>" type="image/x-icon" />
    <meta name="description" content="<?php echo $this->meta_description;?>" />
    <meta name="keyword" content="<?php echo $this->meta_keyword;?>" />
    <link rel="canonical" href="<?php echo $this->canonical;?>" />
    <base href="<?php echo Yii::app()->getBaseurl(true);?>"/>
    <title><?php echo $this->meta_title;?></title>
    <?php $this->widget('wScript', array('js'=>'jquery.js,bootstrap.min.js,style.js,flux.js','css'=>'bootstrap-theme.min.css,bootstrap.min.css,customize.css,responsive.css,style.css'));?>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63655677-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>

<!--facebook plugin-->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=752515008105191&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div class="container">
<div class="row">
<header>
    <div id="container-header">
    	<div id="header-pc">
	        <?php
	            $this->widget('wBanner', array(
	                'id'=>'logo',
	                'data'=>Banner::getBannerPosition(Banner::CAT_BANNER_LOGO,1),
	            ));
	        ?>
	        <?php $background_header = Banner::getBannerPosition(Banner::CAT_BANNER_BACKGROUND_HEADER,1);?>
	        <?php if(sizeof($background_header) !=0):?>
	            <a href="<?php echo $background_header[0]->url;?>">
	            	<img class="image-bacground" src="<?php echo $background_header[0]->image->getAbsoluteUrl();?>" alt="<?php echo $background_header[0]->name;?>">
	            </a> 
	        <?php else:?>
	            <img class="image-bacground" src="<?php echo Yii::app()->theme->baseUrl;?>/images/header.png" alt="">
	        <?php endif;?>
	        <div class="brand"><?php //echo Setting::s('COMPANY_NAME','INFORMATION');?></div>
        </div>
        <div id="header-mobile" style="display:none">                                                                                   
	    	<img class="image-bacground" src="<?php echo Yii::app()->theme->baseUrl;?>/images/header-mobile.jpg" alt=""> 
	    </div>
    </div>
    
    <!-- wMenu -->
    <?php
        $this->widget('wMenu', array(
            'id'=>'main-menu',
            'class'=>'wMenu',
            'data'=>UserMenu::getListItem(),
        ));
    ?>
    <!-- end of wMenu -->
</header>
<section>

<?php echo $content;?>

<div class="col-md-4 pull-left" id="sub-content">
    <div id="main-products" class="wContentBox">
        <div class="contentBox">
            <div class="title_box">Sản phẩm chính</div>
            <div class="content_box">
                <!-- wListItem -->
                <?php
                    $this->widget('wListItemHome', array(
                        'id'=>'list-main-producst',
                        'class'=>'list-products list-unstyled',
                        'data'=>ProductCategory::getItems(4),
                        'template'=>'
                            <a href="{detail_url}" title={name}>
                                <img src="[getIntroimage_thumb(160,46)]" class="img-responsive">
                            </a>
                        ',
                    ));
                ?>
                <!-- end of wListItem -->
            </div>
        </div>
    </div>
<!--    <div id="support" class="wContentBox">
        <div class="contentBox">
            <div class="title_box">Hỗ trợ khách hàng</div>
            <div class="content_box">
                 wListItem 
                <ul class="wListItem list-unstyled">
                     Repeat 5 
                    <li class="item mobile"><span class="department">Phòng kinh doanh Hà Nội</span><span class="phone"><?php echo Setting::s('KD_HANOI','INFORMATION') ?></span> </li>
                    <li class="item mobile"><span class="department">Phòng kinh doanh TP.Hồ Chí Minh</span><span class="phone"><?php echo Setting::s('KD_TPHCM','INFORMATION') ?></span> </li>
                    <li class="item mobile"><span class="department">Phòng kinh doanh Đà Nẵng</span><span class="phone"><?php echo Setting::s('KD_DANANG','INFORMATION') ?></span> </li>
                    <li class="item mobile"><span class="department">Phòng kinh doanh Hải Phòng</span><span class="phone"><?php echo Setting::s('KD_HAIPHONG','INFORMATION') ?></span> </li>
                    <li class="item email"><?php echo Setting::s('EMAIL','INFORMATION') ?> </li>
                     end of repeat 5 
                </ul>
                 end of wListItem 
            </div>
        </div>
    </div>-->
    <!-- end of wContentBox #support-->
    <!-- wContentBox -->
    <div id="new-products" class="wContentBox">
        <div class="contentBox">
            <div class="title_box">Sản phẩm mới</div>
            <div class="content_box">
                <!-- wListItem -->
                <?php
                $this->widget('wListItem', array(
                    'id'=>'list-main-producst',
                    'class'=>'list-unstyled',
                    'data'=>Product::getItems(3,array('new'=>true,'home'=>true,)),
                    'template'=>'
                        <div class="image"><a href="{detail_url}" title="{name}"><img src="[getIntroimage_thumb(220,200)]" alt="{name}"></a></div>
                        <div class="information">
                            <a href="{detail_url}" title={name}>{name}</a>
                        </div>
                    ',
                ));
                ?>
                <!-- end of wListItem -->
            </div>
        </div>
    </div>
    <!-- end of wContentBox -->
    <!-- wContentBox -->
    <?php $category = NewsCategory::model()->findbyPk(49);?>
    <?php if(isset($category)):?>
    <!--<div id="warehouse" class="wContentBox">
        <div class="contentBox">
            <div class="title_box"><?php echo $category->name;?></div>
            <div class="content_box">
                <!-- wListItem -->
                <?php
                $this->widget('wListItem', array(
                    'class'=>'list-unstyled',
                    'data'=>News::getItems(3,array('cat_id'=>49,'home'=>true)),
                    'template'=>'
                        <div class="image"><a href="{detail_url}"><img src="[getIntroimage_thumb(220,200)]"></a></div>
                        <div class="information">
                            <a href="{detail_url}">[getTitle_text(10)]</a>
                        </div>
                    ',
                ));
                ?>
                <!-- end of wListItem -->
            <!--</div>
        </div>
    </div>-->
    <?php endif;?>
    <!-- end of wContentBox -->
    <?php
    $this->widget('wBanner', array(
        'id'=>'banner_partner',
        'class'=>'interested-news wContentBox',
        'data'=>Banner::getBannerPosition(Banner::CAT_BANNER_PARTNER,1),
    ));
    ?>

<!--    <div id="count-traffic">
        <div class="item">
            <span class="title">Tổng truy cập: </span><span class="quantity"><?php echo Yii::app()->counter->getTotal(); ?></span>
        </div>
        <div class="item">
            <span class="title">Hôm nay: </span><span class="quantity"><?php echo Yii::app()->counter->getToday(); ?></span>
        </div>
        <div class="item">
            <span class="title">Online: </span><span class="quantity"><?php echo Yii::app()->counter->getOnline(); ?></span>
        </div>
    </div>-->
</div>
</section>
<footer>	
    <div id="company-name"><?php echo Setting::s('COMPANY_NAME','INFORMATION'); ?></div>
    <div id="info-company">
    	<?php $this->widget('wFooter');?>
    	<!--
        <span>Địa chỉ: <?php echo Setting::s('ADDRESS','INFORMATION'); ?></span>
        <span>Điện thoại: <?php echo Setting::s('PHONE','INFORMATION'); ?> - Hotline: <?php echo Setting::s('HOT_LINE','INFORMATION'); ?></span>
        <span>E-mail: <?php echo Setting::s('EMAIL','INFORMATION'); ?></span>
       	-->
        <a href="<?php echo Setting::s('FACEBOOK_ADDRESS','INFORMATION'); ?>" target="_blank"><span>Facebook: <?php echo Setting::s('FACEBOOK_PAGE','INFORMATION'); ?></span></a>
        <span>All content © 2014 SangoVietPhat. Website made by IHB.</span>
    </div>
</footer>
</div>
</div>
</body>
</html>