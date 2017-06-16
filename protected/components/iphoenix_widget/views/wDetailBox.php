<!-- wDetailBox -->
<div id="<?php echo $id;?>" class="detail_box <?php echo $class;?>">
	<?php $i=0; foreach($data as $item): $i++;?>
	<div class="detail_box_item">
		<img class="thumb" src="<?php echo isset($item->introimage)?$item->introimage->getAbsoluteThumbUrl($img_width, $img_height, false):"";?>" />
		<div class="detail">
			<a class="title" href="<?php echo $item->detail_url;?>" title="<?php echo $item->title;?>">
				<?php echo $item->title;?>
			</a>
			<div class="content">
				<?php echo $item->content;?>
			</div>
		</div>
	</div>
	<?php endforeach;?>
</div>
<!-- end of wDetailBox -->