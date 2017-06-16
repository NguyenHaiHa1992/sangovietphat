<?php 
	echo CHtml::activeHiddenField($model,$attribute,array('id'=>'store_data_upload'.$attribute)); 
    $category=get_class($model);
	$this->widget('ext.EAjaxUpload.EAjaxUpload',
	array(
        'id'=>'form_upload_'.$attribute,
        'config'=>array(
               'action'=>$this->createUrl('file/upload',array('type'=>'file')),
               'allowedExtensions'=>Document::$allowedExtensions,//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>Document::$sizeLimit,// maximum file size in bytes
               //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
               'onSubmit'=>"js:function(id, fileName){ test_hide_upload_list_".$attribute."++; }",
               'onComplete'=>"js:function(id, fileName, responseJSON){
               	var current_list_file=$('#store_data_upload".$attribute."').val();
               	if (typeof responseJSON.id != 'undefined')
        		{
				if(current_list_file != ''){
               		$('#store_data_upload".$attribute."').val(current_list_file+','+responseJSON.id);
               	}
               	else {
               		$('#store_data_upload".$attribute."').val(responseJSON.id);
               	}
               	test_hide_upload_list_".$attribute."--;
               	if(test_hide_upload_list_".$attribute." == 0)
               		$('#form_upload_".$attribute." .qq-upload-list').hide();
               	$('#preview_upload_".$attribute."').append('<div class=\"item-file\" id=\"'+responseJSON.id+'\"><img style=\"height:16px; width:16px\" src=\"".Yii::app()->theme->baseUrl.'/images/file_icons/'."'+responseJSON.extension+'.png\" /><a class=\"file-name\" href=".Yii::app()->baseUrl.'/'."'+responseJSON.url+' target=_blank >'+responseJSON.fullname+'</a><a class=\"edit\"></a><a class=\"close\"></a></div>'); 
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
                			<div class="qq-upload-button">Upload files</div>
                			<ul class="qq-upload-list"></ul>
             				</div>',  
               'multiple'=>true,              
              ),
        'postParams'=>array(
              'parent_class'=>$category,
              'parent_id'=>isset($model->id)?$model->id:0,
              'parent_attribute'=>$attribute,
              )
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
    		echo '<div class="item-file" id="'.$file_id.'">
                    <img style="height:16px; width:16px" src="'.Yii::app()->theme->baseUrl.'/images/file_icons/'.$file->extension.'.png" />
                    <a class="file-name" href="'.Yii::app()->baseUrl.'/'.$file->url.'" target=_blank>'.$file->fullname.'</a>
                    <a class="edit"></a>
                    <a class="close"></a>
                 </div>';
	}
    ?>
    </div>
    <div type="hidden" value="" id="popup_value"></div>
    <?php 
    $cs = Yii::app()->getClientScript(); 
    $cs->registerScript('js_upload_'.$attribute,
    "$('.slider-folder').delegate('.close', 'click', function() {
  			$('#popup_value').val($(this).parent().attr('id'));
  			jConfirm(
  				\"Bạn muốn xóa file này?\",
  				\"Xác nhận xóa file\",
  				function(r){
  					if(r){
  					jQuery.ajax({
  						'data':{id : $(\"#popup_value\").val()},
  						'dataType':'json',
  						'success':function(data){
  							if(data.status == true){
								$('#'+data.id,$('#preview_upload_".$attribute."')).remove();
							}
							else {
								jAlert('Can not delete file');
							}
							var list=$('#store_data_upload".$attribute."').val();
  						 	var list_file = list.split(',');
  						 	list_file = jQuery.grep(list_file, function(value) {
								return value != data.id;
							});
							$('#store_data_upload".$attribute."').val(list_file.join(',')
							);
        				},
        				'type':'GET',
        				'url':'".$this->createUrl('file/delete')."',
        				'cache':false});
        			}
        		}
        	);
        	return false;
	});");
?>

