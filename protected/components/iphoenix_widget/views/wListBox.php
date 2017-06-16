<!-- wListBox -->
<div id="<?php echo $id;?>" class="wListBox <?php echo $class;?>">
	<?php if(isset($label)) echo '<div class="box_title">'.$label.'</div>';?> 
	<?php if(is_array($data)):?>
	<div class="<?php echo $innerClass;?>">
		<?php $i=0; foreach($data as $item): $i++;?>
			<?php echo iPhoenixTemplate::parseTemplate($item, $template);?>
		<?php endforeach;?>
	</div>
	<?php endif;?>
</div>
<!-- end of wListBox -->