<!-- wFacebookLibrary -->
<div id="fb-root"></div>
<?php 
Yii::app()->clientScript->registerScript('facebook', <<<JS
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=641957769206620&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'))
JS
, CClientScript::POS_READY);?>
<!-- end of wFacebookLibrary -->