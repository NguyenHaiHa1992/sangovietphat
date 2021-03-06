<!DOCTYPE html>
<html>
<head>
    <?php $this->meta_title = Setting::s('TITLE_DEFAULT','SEO');?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0" />
    <link rel="shortcut icon" href="<?php $favicon = Banner::getItem(Banner::CAT_BANNER_FAVICON); echo isset($favicon)?Yii::app()->baseUrl.'/'.$favicon->image->url:'';?>" type="image/x-icon" />
    <meta name="description" content="<?php echo $this->meta_description;?>" />
    <meta name="keyword" content="<?php echo $this->meta_keyword;?>" />
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
    <meta name="twitter:image:src" content="<?=$this->og_image?>"/>
    <?php }?>
    <link rel="canonical" href="<?php echo $this->canonical;?>" />
    <title><?php echo $this->meta_title;?></title>
    <base href="<?php echo Yii::app()->getBaseurl(true);?>"/>
    <?php $this->widget('wScript', array('js'=>'jquery.js,bootstrap.min.js,style.js,flux.js','css'=>'bootstrap-theme.min.css,bootstrap.min.css,customize.css,responsive.css,style.css' ,'version' => VERSION,));?>
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
<script>(function(d, s, id) {
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
    $search = isset($_GET['keyword']) ? $_GET['keyword'] : '';
?>
<div class="container">
    <div class="row">
        <header>        	
            <div class="header clearFix" id="search-container-header">
                <div class="main-width">
                    <div class="logo">
                        <a href="/"><img src="/Content/v2.1/images/logo-text.png" alt=""></a>
                    </div>
                    <div class="content">
                        <div class="search">
                            <div class="home">
                                <a href="/">
                                    <i class="fa fa-home" title=""></i></a>
                            </div>
                            <div class="input">
                                <form action="/search" method="GET">
                                    <div class="control">
                                        <input name="keyword" placeholder="Nhập từ khóa tìm kiếm" autocomplete="off" value="<?php echo $search;?>">
                                    </div>
                                    <button type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
            <?php $this->widget('wPartner',array(
                    'id'=>'partner',
                    'class' => 'partner',
                    'title' => 'Đối tác',
            ))?>
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
    </div>
</div>
<?php echo Setting::s('ADD_THIS_SCRIPT','INFORMATION') ?>
</body>
</html>