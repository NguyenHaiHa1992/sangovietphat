<!-- wBreadcrumb -->
<div id="<?php echo $id;?>" class="<?php echo $class;?>">
<?php if(isset($data)):?>
	<ol class="breadcrumb">
	<?php foreach($data as $label=>$url):?>
		<?php if($url != ''):?>
		<li><a href="<?php echo $url;?>" title="<?php echo $label;?>"><?php echo $label;?></a></li>
		<?php else:?>
		<li><?php echo $label;?></li>
		<?php endif;?>
	<?php endforeach;?>
	</ol>
<?php else:?>
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
<?php endif;?>
</div>
<!-- end of wBreadcrumb -->
