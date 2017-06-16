<!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Transitional/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:/www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl?>/images/fav.png" type="image/x-icon" />
<link href="<?php echo Yii::app()->theme->baseUrl?>/css/standard.css" rel="stylesheet" type="text/css" media="screen, projection" />
<link href="<?php echo Yii::app()->theme->baseUrl?>/css/ja.cssmenu.css" rel="stylesheet" type="text/css" media="screen, projection" />
<link href="<?php echo Yii::app()->theme->baseUrl?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen, projection" />
<link href="<?php echo Yii::app()->theme->baseUrl?>/css/sprite.css" rel="stylesheet" type="text/css" media="screen, projection" />
<link href="<?php echo Yii::app()->theme->baseUrl?>/css/nprogress.css" rel="stylesheet" type="text/css" media="screen, projection" />

<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl?>/js/nprogress.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.pjax.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl?>/js/iphoenix.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl?>/js/csspopup.js" type="text/javascript" ></script>
<script src="<?php echo Yii::app()->theme->baseUrl?>/js/popup.js" type="text/javascript" ></script>
<script src="<?php echo Yii::app()->theme->baseUrl?>/js/ZeroClipboard.min.js" type="text/javascript" ></script>
<script src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.alerts.js" type="text/javascript" ></script>
<script src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.cookie.js" type="text/javascript" ></script>
<title><?php echo $this->pageTitle; ?></title>
<!--[if IE]>
<style type="text/css" media="screen, projection">
#menu ul li {float: left; width:100%;}
</style>
<![endif]-->
<!--[if lt IE 7]>
<style type="text/css" media="screen, projection">
#menu ul li a { height: 1%; }
#menu a, #menu h2 { font: bold 0.7em/1.4em; }
</style>
<![endif]-->
</head>

<body id="home">
<div id="blanket" style="display: none;"></div>
<!--begin top panel-->
<div id="TP_fixed_header" style="position:absolute; top:0%;">
	<div id="TP_container">
		<div id="TP_inner">
			<!--begin left content-->
			<div id="TP_left_panel" class="TP_toolbar_item">
				<img src="<?php echo Yii::app()->theme->baseUrl?>/images/tp_title_<?php echo Yii::app()->params['admin_lang'];?>.png" />
			</div>
			<!--end left content-->
			<div id="TP_feed" class="TP_toolbar_item">
			</div>
			<!--begin right content-->
			<div id="TP_right_panel" class="TP_toolbar_item">
				<div id ="feed-wrapper" style="display: inline-block; margin: 10px 0 5px 0">
					<?php $this->widget('wFeed');?>
					 | 
				</div>
				<?php if(isset($_GET['iphoenix_language'])):?>
					<style type="text/css">.<?php echo $_GET['iphoenix_language']?>_class{display: none;}</style>
				<?php else:?>
					<style type="text/css">.vi_class{display: none;}</style>
				<?php endif;?>
				<div class="vi_class"><a class="vi_class" target="_blank" href="<?php echo Yii::app()->createUrl('admin/site/home')?>"><img class="user-icon" title="<?php echo iPhoenixLang::admin_t('Vietnamese content management','main');?>" src="<?php echo Yii::app()->theme->baseUrl?>/images/vietnamese.png"/></a></div>
				<div class="en_class"><a class="en_class" target="_blank" href="<?php echo iPhoenixUrl::createUrl('admin/site/home',array('iphoenix_language'=>'en'))?>"><img class="user-icon" title="<?php echo iPhoenixLang::admin_t('English content management','main');?>" src="<?php echo Yii::app()->theme->baseUrl?>/images/english.png"/></a></div> |
				<a target="_blank"  onclick="showPopUp('form-changePass');"><img class="user-icon" title="<?php echo iPhoenixLang::admin_t('Change Password','main');?>" src="<?php echo Yii::app()->theme->baseUrl?>/images/change_pass.png"/></a> | 
				<a href="<?php echo iPhoenixUrl::createUrl('/admin/site/logout');?>"><img class="user-icon" title="<?php echo iPhoenixLang::admin_t('Logout','main');?>" src="<?php echo Yii::app()->theme->baseUrl?>/images/logout.png"/></a> (<a target="_blank" href=""><span style="color:#d9251d;"><?php echo Yii::app()->user->email;?></span></a></a>) 
			</div>
			<p style="font-size:11px; position: absolute; right: 0; top: 30px"><?php echo date(" H:i, d/m/Y").'&nbsp &nbsp &nbsp &nbsp'; ?></p>
			<!--end right content-->
			<!--begin menuBar-->
			<?php $this->widget('AdministratorMenu');?>
			<!--end menuBar-->
		</div>
	</div>
</div>
<!--end top panel-->
<!--begin page content-->
<div id="shell" class="forShell">
	<?php echo $content; ?>
	<div class="clear"></div>
	<div class="bg-overlay"></div>
	<?php include_once(Yii::app()->theme->basePath.'/views/layouts/_form.php');?>
</div>
<!--end page content-->
<!--begin footer-->
<div class="clear"></div>
<div id="footer" class="top">
	<p>© 2013 <a href="<?php echo Yii::app()->params['home_url'];?>"><?php echo Yii::app()->params['home_name'];?></a>. All rights reserved - Yii <?php echo Yii::getVersion()?></p>
</div>
<!--end footer-->
<script type="text/javascript">
 	$(document).ready(function() {
		$("a.clipboard").each(function() {
			var clip = new ZeroClipboard( this, {
				moviePath: "<?php echo Yii::app()->theme->baseUrl?>/flash/ZeroClipboard.swf"
			});

			clip.on( 'dataRequested', function (client, args) {
				var text = $(this).attr('href');
				client.setText( text );
			});
			clip.on( 'complete', function(client, args) {
				jAlert('<?php echo iPhoenixLang::admin_t('You have copied link to clipboard','main');?>: "' + args.text + '"');
			});
        });
	});
</script>
</body>
</html>