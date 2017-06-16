<!-- wListHtml -->
<ul id="<?php echo $id;?>" class="wListHtml <?php echo $class;?>">
<?php
	$i = 0;
	foreach($data as $item){
		$i++;
		echo '<li class="item'.$i.'">'.$item.'</li><span class="item'.$i.'"></span>';
	}
?>
</ul>
<!-- end of wListHtml -->