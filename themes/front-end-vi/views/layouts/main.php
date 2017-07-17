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
    <?php if(isset($this->og_image) && $this->og_image ){?>
    <meta property="og:image" content="<?=$this->og_image?>"/>
    <?php }?>
    <meta property="og:site_name" content="<?= $this->meta_title?>" />
    <meta property="og:title" content="<?=$this->meta_title?>" />
    <meta property="og:description" content="<?=$this->meta_description?>" />
	
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="<?=$this->meta_title?>">
    <meta name="twitter:title" content="<?=$this->meta_title?>">
    <meta name="twitter:description" content="<?=$this->meta_description?>">
    <?php if(isset($this->og_image) && $this->og_image ){?>
    <meta property="twitter:image:src" content="<?=$this->og_image?>"/>
    <?php }?>

    <?php $this->widget('wScript', array('js'=>'jquery.js,bootstrap.min.js,style.js','css'=>'bootstrap-theme.min.css,bootstrap.min.css,customize.css,responsive.css,style.css','version' =>VERSION,));?>
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

<script src="https://sp.zalo.me/plugins/sdk.js" type="text/javascript" charset="utf-8" async defer></script>
<script>
    var _zap = _zap || [];
_zap.push(["_setAccount", "ZA-42975759760372"]);
_zap.push(["_disableAutoTrack", true]);
(function(e,t,n,r,a,o,c){
e[a+"_q"]=e[a+"_q"]||[],e[a]=e[a]||{};var s=["trackPageview","trackEvent","getVisitorID"];
for(i in s)e[a][s[i]]=function(t){return function(){e[a+"_q"].push([t,arguments])}}(s[i]);
o=t.createElement(n),c=t.getElementsByTagName(n)[0],o.async=1,o.src=r+"?"+Math.floor((new Date).getTime()/1000/60/60/24),c.parentNode.insertBefore(o,c)
})
(window,document,"script","http://stc.za.zaloapp.com/v3/za.js","ZA");
ZA.trackPageview('http://w.news.zing.vn/' + window.location.pathname + window.location.search + window.location.hash);
</script>
<?php 
    $isHomepage = iPhoenixUtility::isHomePage();
?>
<div class="container">
<div class="row">
<header>
    <div id="container-header" <?php if($isHomepage){echo 'class=" homepage"';}?>>
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
</section>
<footer>	
    
    <div id="footer">
        <?php $this->widget('wFooter');?>
    </div>
    <?php $this->widget('wFooterLink',array(
            'id'=>'footer_link',
            'class'=>'footer-center',
            'data'=>UserMenu::getListItem(),
    ))?>

    <div id="info-company">
        <a href="<?php echo Setting::s('FACEBOOK_ADDRESS','INFORMATION'); ?>" target="_blank"><span>Facebook: <?php echo Setting::s('FACEBOOK_PAGE','INFORMATION'); ?></span></a>
        <span>All content © 2014 SangoVietPhat. Website made by IHB.</span>
    </div>
</footer>
    <div id="top" class="toolbar-right">
        <?php $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
        <div class="mobile-only">
            <div class="zalo-share"></div>
            <br />
            <div class="phone">
                <a href="tel:<?php echo Setting::s('PHONE', 'INFORMATION') ?>">
                    <i class="glyphicon glyphicon-phone-alt"></i>
                    Call me
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo Setting::s('ADD_THIS_SCRIPT','INFORMATION');?>
</body>
</html>