<!-- wListItem -->
<ul id="<?php echo $id;?>" class="wListItem <?php echo $class;?>">	
	<?php if(is_array($data)):?>
	<?php $i=0; foreach($data as $item): $i++;?>
		<li class="item item<?php echo $i;?>">
			<?php echo iPhoenixTemplate::parseTemplate($item, $template);?>
		</li>
	<?php endforeach;?>
	<?php endif;?>
</ul>
<!-- end of wListItem -->