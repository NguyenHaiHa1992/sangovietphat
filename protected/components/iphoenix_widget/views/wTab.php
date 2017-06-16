<!-- wTab -->
<div id="<?php echo $id;?>" class="<?php echo $class;?>">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<?php $i = 0 ;?>
		<?php foreach($tab_nav as $nav): $i++;?>
		<li <?php if($i == 1) echo 'class="active"';?>>
			<a href="#tab_<?php echo $i;?>" role="tab" data-toggle="tab"><?php echo $nav;?></a>
		</li>
		<?php endforeach;?>
	</ul>
	
	<!-- Tab panes -->
	<div class="tab-content">
		<?php $i = 0 ;?>
		<?php foreach($tab_content as $content): $i++;?>
		<div class="tab-pane <?php if($i == 1) echo 'active';?>" id="tab_<?php echo $i;?>">
			<?php echo $content;?>
		</div>
		<?php endforeach;?>
	</div>
</div>
<!-- end of wTab -->