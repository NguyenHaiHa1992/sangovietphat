<!-- wContact -->
<?php
	// Create info
	function create_info_item($item){
		if(isset($item)){
			return '<div class="contact_item item_'.$item.'">
						<label class="label_'.$item.'">'.$item.'</label>
						'.Setting::s('CONTACT_'.$item, 'INFORMATION').'
					</div>';
		}
	}

	function create_info($template_info){
		$result = '';
		foreach(iPhoenixTemplate::parseTemplate($template_info) as $item){
			$result = $result.create_info_item($item);
		}
		return $result;
	}

	$info = create_info($template_info);
	
	// Create form
	$form = '';
?>
<div class="contact_box">
	<div class="box_title"><?php echo $label;?></div>
	<?php
		foreach(iPhoenixTemplate::parseTemplate($template) as $item){
			echo isset($$item)?$$item:iPhoenixTemplate::createMessage('UNKNOWN $'.$item, 'error');
		}
	;?>
</div>
<!-- end of wContact -->