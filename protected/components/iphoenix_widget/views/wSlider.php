<!-- wSlider -->
<div id="<?php echo $id;?>" class="slider <?php echo $class;?>">
	<?php if(isset($label)) echo '<div class="box_title">'.$label.'</div>';?>
	<div class="slider_content"> 
		<?php if(is_array($data)):?>
		<div class="slider_items">
		<?php $i=0; foreach($data as $item): $i++;?>
			<div class="item">
				<?php echo iPhoenixTemplate::parseTemplate($item, $template);?>
			</div>
		<?php endforeach;?>
		</div>
		<?php endif;?>
		<span class="next_btn"></span>
		<span class="prev_btn"></span>
	</div>
</div>
<?php
$baseThemeUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseThemeUrl.'/js/jquery.bxslider.min.js');
?>
<?php Yii::app()->clientScript->registerScript('bxSlider', <<<JS
    $('.slider_items', $('.slider')).bxSlider({
		captions: true,
		slideSelector: '.item',
		minSlides: 5,
		maxSlides: 5,
		slideWidth: 198,
		slideMargin: 60,
		pager: false,
		nextText: " ",
		prevText: " ",
		nextSelector: ".next_btn",
		prevSelector: ".prev_btn",
	});
JS
, CClientScript::POS_READY);?>
<!-- end of wSlider -->