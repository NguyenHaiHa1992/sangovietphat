<?php
	echo CHtml::activeHiddenField($model,$attribute,array('id'=>'store_data_upload_'.$attribute)); 
	$this->widget('ext.EAjaxUpload.EAjaxUpload',
	array(
        'id'=>'form_upload_'.$attribute,
        'config'=>array(
               'action'=>$this->createUrl('file/upload',array('type'=>'clip')),
               'allowedExtensions'=>Audio::$allowedExtensions,//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>Audio::$sizeLimit,// maximum file size in bytes
               //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
               'onSubmit'=>"js:function(id, fileName){ test_hide_upload_list_".$attribute."++; }",
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
        		if (typeof responseJSON.id != 'undefined')  
        		{
        			$('#store_data_upload_".$attribute."').val(responseJSON.id);
        			test_hide_upload_list_".$attribute."--;
               		if(test_hide_upload_list_".$attribute." == 0)
               			$('#form_upload_".$attribute." .qq-upload-list').hide();
               		$('#preview_upload_".$attribute."').html('<div class=\"item-file mime-type-'+responseJSON.extension+'\" id=\"'+responseJSON.id+'\"><a href=\"'+responseJSON.url+'\">'+responseJSON.fullname+'</a></div>');
               	} 
               	}",
               'messages'=>array(
                                 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                 'emptyError'=>"{file} is empty, please select files again without it.",
                                 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                ),
               'showMessage'=>"js:function(message){ alert(message); }",             
               'template'=> '<div class="qq-uploader">
                			<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>
                			<div class="qq-upload-button">Select file</div>
                			<ul class="qq-upload-list"></ul>
             				</div>',      
              ),
	)); 
	?>
	<script type="text/javascript">
		var test_hide_upload_list_<?php echo $attribute?>= 0;
	</script>
    <div class="item-folder" id="<?php echo 'preview_upload_'.$attribute;?>">
    <?php 
    	$file=$model->file;
    	if(isset($file))
    		echo '<div class="item-file mime-type-'.$file->extension.'" id="'.$file->id.'"><a href="'.$file->getUrl().'">'.$file->fullname.'</a></div>';
    ?>