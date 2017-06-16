<!-- wBanner -->

<div id="<?php echo $id;?>" class="<?php echo $class;?>">
<?php if(isset($sample)):?>
	<?php foreach($sample as $image):?>
	<img src="<?php echo Yii::app()->theme->baseUrl.'/images/'.$image;?>">
	<?php endforeach;?>
<?php else:?>	
	<?php foreach($data as $banner):?>
	<?php if(isset($banner->image)):?>
	<?php if($banner->url==''):?>
	<img src="<?php echo $banner->image->getAbsoluteUrl();?>">
	<?php else:?>
		<a href="<?php echo $banner->url;?>" title="<?php echo $banner->name;?>">			
			<img class="img-responsive" src="<?php echo $banner->image->getAbsoluteUrl();?>">								
		</a>
	<?php endif;?>
	<?php endif;?>
	<?php endforeach;?>
<?php endif;?>
</div>
<!-- end of wBanner -->