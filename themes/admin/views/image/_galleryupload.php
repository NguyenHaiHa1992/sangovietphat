<?php
	echo CHtml::activeHiddenField($model,$attribute,array('id'=>'store_data_upload_'.$attribute)); 
	$this->widget('ext.EAjaxUpload.EAjaxUpload',
	array(
        'id'=>'form_upload_'.$attribute,
        'config'=>array(
               'action'=>$this->createUrl('image/upload'),
               'allowedExtensions'=>Image::$allowedExtensions,//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>Image::$sizeLimit,// maximum file size in bytes
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
               	$('#preview_upload_".$attribute."').append('<div class=\"item-image\" id=\"'+responseJSON.id+'\"><img style=\"height:".$h."px; width:".$w."px\" src=\"'+responseJSON.url+'\" /><a title=\"Sửa ảnh này\" target=\"_blank\" class=\"edit\" href=\"'+responseJSON.link_update+'\"></a><a class=\"close\" title=\"Xóa ảnh này\"></a></div>'); 
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
                			<div class="qq-upload-button">Select images</div>
                			<ul class="qq-upload-list"></ul>
             				</div>',  
               'multiple'=>true,   
               'postParams'=>array(
              		'h'=>$h,
              		'w'=>$w
              	)           
              ),
	)); 
	?>
	<script type="text/javascript">
		var test_hide_upload_list_<?php echo $attribute?>= 0;
	</script>
    <div class="slider-folder" id="<?php echo 'preview_upload_'.$attribute;?>">
    <?php 
    foreach (array_diff(explode(',',$model->$attribute),array('')) as $image_id){
    	$image=Image::model()->findByPk($image_id);
    	if(isset($image))
    		echo '<div class="item-image" id="'.$image_id.'">
    					<img style="height:'.$h.'px; width:'.$w.'px" src="'.$image->getAbsoluteThumbUrl($w,$h).'" />
    					<a target="_blank" title="Update image" class="edit" href="'.Yii::app()->createUrl('admin/image/updateInfo',array('id'=>$image_id)).'"></a>
    					<a class="close" title="Delete image"></a>
    				</div>';
    }
    ?>
    </div>
    <div type="hidden" value="" id="popup_value"></div>
    <?php 
    $cs = Yii::app()->getClientScript(); 
    $cs->registerScript('js_upload_'.$attribute,
    "$('#preview_upload_".$attribute."').delegate('.close', 'click', function() {
  			$('#popup_value').val($(this).parent().attr('id'));
  			var r=jConfirm(\"Are you sure you want to delete this image?\",\"Confirm deletion\",function(r){
  				if(r==true){
	  				var image_id=$(\"#popup_value\").val();
					$('#'+image_id).remove();
					var list=$('#store_data_upload_".$attribute."').val();
				 	var list_image = list.split(',');
				 	list_image = jQuery.grep(list_image, function(value) {
						return value != image_id;
					});
					$('#store_data_upload_".$attribute."').val(list_image.join(','));			
  				}			
  			});
        	return false;
	});");
	?>
	<!-- For Display Popup to Update Image -->
    <div id="popUpDiv" style="z-index:10000;display: none;">
    	<div class="sendMarkOutline" style="border:2px solid #21629B;border-radius:8px;">
	        <div class="sendMark">
	            <a style= "float:right;margin-top:-20px" onclick="popup('popUpDiv')"><img src="<?php echo Yii::app()->theme->baseUrl?>/images/close.png"></a>
			    <h1 align='center'>Update image information</h1>
			    <div id='form_update_image'>	
			     	 <a id="update_image" style="margin-bottom:10px; margin-left:10px;width:125px;" class="button" title="Cập nhật">Update</a>
		  			 <a style= "margin-bottom:10px; width:125px;" class="button" title="Hủy thao tác" onclick="popup('popUpDiv');return false;">Cancel</a>		    	
			    </div>
			</div>
		</div>
    </div>
    <?php
    $cs = Yii::app()->getClientScript();  
	$cs->registerScript(
	  'js_popup_image',
	  '$(document).ready(function() {
			$("body .edit").live("click", function(){
				  jQuery.ajax({
						"success":function(data){
							$("#form_update_image").html($(data));
							popup("popUpDiv");
							},
						"type":"GET",
						"url":$(this).attr("href"),
						"cache":false});
					  return false;
			});
			$("body #update_image").live("click", function(){
				jQuery.ajax({
					"data": $("#form_image").serialize(),
					"success":function(data){
						popup("popUpDiv");
						},
					"type":"GET",
					"url":$(this).attr("href"),
					"cache":false});
				  return false;
			});
		});
	  '
	);
	?>