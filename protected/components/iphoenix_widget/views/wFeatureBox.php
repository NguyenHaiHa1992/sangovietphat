<!-- wListBox -->
<div id="<?php echo $id;?>" class="wListBox <?php echo $class;?>">
	<?php if(isset($label)) echo '<div class="box_title">'.$label.'</div>';?> 

	<?php if(is_array($data)):?>
	<div class="<?php echo $innerClass;?>">
		<?php $i=0; foreach($data as $item): $i++;?>
			<?php if($i <= $feature):?>
				<div class="feature">
					<?php echo iPhoenixTemplate::parseTemplate($item, $template_feature);?>
				</div>
			<?php else:?>
				<?php if($i == $feature + 1):?>
				<div class="wrapper">
				<?php endif;?>
				<?php echo iPhoenixTemplate::parseTemplate($item, $template_nofeature);?>
				<?php if($i == count($data)):?>
				</div><!-- end no_feature_wrapper -->
				<?php endif;?>
			<?php endif;?>
		<?php endforeach;?>
	</div>
	<?php endif;?>
</div>
<!-- end of wListBox -->