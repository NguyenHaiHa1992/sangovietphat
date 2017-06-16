<!-- wFacebookComment -->
<div class="<?php echo $class;?>" id="<?php echo $id;?>">
	<div class="box_title"><?php echo $label;?></div>
	<div class="fb-comments" data-href="<?php echo $data;?>" data-width="<?php echo $width;?>" data-numposts="<?php echo $limit;?>" data-colorscheme="<?php echo $color;?>"></div>
	<?php $this->widget('wFacebookLibrary');?>
</div>
<!-- end of wFacebookComment -->