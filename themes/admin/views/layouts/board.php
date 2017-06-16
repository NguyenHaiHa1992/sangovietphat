<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl?>/images/fav.png" type="image/x-icon" />
	<link href="<?php echo Yii::app()->theme->baseUrl?>/css/standard.css" rel="stylesheet" type="text/css" media="screen, projection"  />
	<title><?php echo $this->pageTitle; ?></title>
</head>
<body id="board">
<!--begin top panel-->
<div id="TP_fixed_header" style="position:absolute; top:0%;">
	<div id="TP_container">
		<div id="TP_inner">
			<!--begin left content-->
			<div id="TP_left_panel" class="TP_toolbar_item">
				<img src="<?php echo Yii::app()->theme->baseUrl?>/images/tp_title_<?php echo Yii::app()->params['admin_lang'];?>.png" />
				<p style="font-size:11px; margin-top:2px;"><?php echo date("d/m/Y, H:i"); ?></p>
			</div>
			<!--end left content-->
			<div id="TP_feed" class="TP_toolbar_item">
			</div>
			<?php if(!Yii::app()->user->isGuest):?>
			<!--begin right content-->
			<div id="TP_right_panel" class="TP_toolbar_item">
				<p><a href="<?php echo Yii::app()->request->getBaseUrl(true);?>">Home</a> | <a href="<?php echo iPhoenixUrl::createUrl('/admin/default/logout');?>">Logout</a> (<span style="color:#d9251d;"><?php echo Yii::app()->user->name;?></span>)</p>
			</div>
			<!--end right content-->
			<?php endif;?>
		</div>
	</div>
</div>
<!--end top panel-->
<!--begin page content-->
<div id="shell" class="forShell">
<?php echo $content; ?>
</div>
<!--end page content-->
<!--begin footer-->
<div id="footer" class="top">
	<p>© 2013 <a href="<?php echo Yii::app()->params['home_url'];?>"><?php echo Yii::app()->params['home_name'];?></a>. All rights reserved - Yii <?php echo Yii::getVersion()?></p>
</div>
<!--end footer-->
</body>
</html>