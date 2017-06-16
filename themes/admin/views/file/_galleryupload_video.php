<?php
	echo CHtml::activeHiddenField($model,$attribute,array('id'=>'store_data_upload_'.$attribute)); 
	$this->widget('ext.EAjaxUpload.EAjaxUpload',
	array(
        'id'=>'form_upload_'.$attribute,
        'config'=>array(
               'action'=>$this->createUrl('file/upload',array('type'=>'clip')),
               'allowedExtensions'=>Video::$allowedExtensions,//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>Video::$sizeLimit,// maximum file size in bytes
               //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
               'onSubmit'=>"js:function(id, fileName){ test_hide_upload_list_".$attribute."++; }",
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               	var current_list_image=$('#store_data_upload_".$attribute."').val();
               	if (typeof responseJSON.id != 'undefined')  
        		{
               	if(current_list_image != ''){
               		$('#store_data_upload_".$attribute."').val(current_list_image+','+responseJSON.id);
               	}
               	else {
               		$('#store_data_upload_".$attribute."').val(responseJSON.id);
               	}
               	test_hide_upload_list_".$attribute."--;
               	if(test_hide_upload_list_".$attribute." == 0)
               		$('#form_upload_".$attribute." .qq-upload-list').hide();
               	$('#preview_upload_".$attribute."').append('<div class=\"item-file mime-type-'+responseJSON.extension+'\" id=\"'+responseJSON.id+'\"><a href=\"'+responseJSON.url+'\">'+responseJSON.fullname+'</a></div>'); 
               	}
               	}",
               'messages'=>array(
                                 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                 'emptyError'=>"{file} is empty, please select files again without it.",
                                 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                ),
               'showMessage'=>"js:function(message){ jAlert(message); }",
               'template'=> '<div class="qq-uploader">
                			<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>
                			<div class="qq-upload-button">Chọn clip</div>
                			<ul class="qq-upload-list"></ul>
             				</div>',  
               'multiple'=>true,            
              ),
	)); 
	?>
	<script type="text/javascript">
		var test_hide_upload_list_<?php echo $attribute?>= 0;
	</script>
    <div class="slider-folder" id="<?php echo 'preview_upload_'.$attribute;?>">
    <?php 
    foreach (array_diff(explode(',',$model->$attribute),array('')) as $file_id){
    	$file=File::model()->findByPk($file_id);
    	if(isset($file))
    		echo '<div class="item-file mime-type-'.$file->extension.'" id="'.$file->id.'"><a href="'.$file->getUrl().'">'.$file->fullname.'</a></div>';
    }
    ?>
    </div>
    <div type="hidden" value="" id="popup_value"></div>
    <?php 
    $cs = Yii::app()->getClientScript(); 
    $cs->registerScript('js_upload_'.$attribute,
    "$('.slider-folder').delegate('.close', 'click', function() {
  			$('#popup_value').val($(this).parent().attr('id'));
  			var r=jConfirm(\"Are you sure you want to delete this video?\",\"Confirm deletion?\",function(r){
  				if(r==true){
	  				var image_id=$(\"#popup_value\").val();
					$('#'+image_id).remove();
					var list=$('#store_data_upload_".$attribute."').val();
				 	var list_image = list.split(',');
				 	list_image = jQuery.grep(list_image, function(value) {
						return value != image_id;
					});
					$('#store_data_upload_".$attribute."').val(list_image.join(','));
					/*
					jQuery.ajax({
						'data':{id : $(\"#popup_value\").val()},
						'dataType':'json',
						'success':function(data){
							if(data.status == true){
								$('#'+data.id).remove();
							}
							else {
								jAlert('Can not delete video');
							}
							var list=$('#store_data_upload_".$attribute."').val();
						 	var list_image = list.split(',');
						 	list_image = jQuery.grep(list_image, function(value) {
								return value != data.id;
							});
							$('#store_data_upload_".$attribute."').val(list_image.join(','));
						);
						},
						'type':'GET',
						'url':'".$this->createUrl('image/delete')."',
						'cache':false});
					*/		
  				}
  			});
        	return false;
	});");
	?>