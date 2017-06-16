<!-- Main popup -->
<div class="form-banner popup-wrapper">
	<div class="main-popup">
		<a class="popup-close" onclick="hidenPopUp('form-banner');return false;"></a>
		<div class="content-popup">
			<div class="popup_title"><?php echo iPhoenixLang::admin_t('Update banner');?></div>
			<div class="folder-content">
				<?php $form=$this->beginWidget('CActiveForm', array('id'=>'form-banner','action'=>iPhoenixUrl::createUrl('admin/banner/write'),'method'=>'post','enableClientValidation'=>true)); ?>	
				<!--begin left content-->
				<div class="fl" style="width:480px; min-height: 180px">
					<ul>
						<?php echo $form->hiddenField($model,'id');?>
						<div class="row">
							<li>
								<?php echo $form->labelEx($model,'cat'); ?>
								<?php echo $form->dropDownList($model,'cat',Banner::$view_list_cat,array('style'=>'width:200px')); ?>
								<?php echo $form->error($model, 'cat'); ?>
							</li>
						</div>	
						<div class="row">
							<li>
								<?php echo $form->labelEx($model,'name'); ?>
								<?php echo $form->textField($model,'name',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
								<?php echo $form->error($model, 'name'); ?>				
							</li>
						</div>
						<div class="row">
							<li>
								<?php echo $form->labelEx($model,'url'); ?>
								<?php echo $form->textField($model,'url',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
								<?php echo $form->error($model, 'url'); ?>				
							</li>
						</div>	
						<div class="row">
							<li>
								<?php echo $form->labelEx($model,'order_view'); ?>
								<?php echo $form->textField($model,'order_view',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
								<?php echo $form->error($model, 'order_view'); ?>				
							</li>
						</div>
						<div class="row">
							<li>
								<?php echo $form->labelEx($model,'description'); ?>
								<?php echo $form->textArea($model,'description',array('style'=>'width:300px; height: 100px','maxlength'=>'256')); ?>	
								<?php echo $form->error($model, 'description'); ?>				
							</li>
						</div>
					</ul>
				</div>
				<div class="fr" style="width:150px;">
					<ul>	
						<div class="row">
							<li>
								<?php echo $form->labelEx($model,'image_id'); ?>
								<?php echo $this->renderPartial('/image/_signupload', array('model'=>$model,'attribute'=>'image_id','h'=>60,'w'=>120)); ?>		
								<?php echo $form->error($model, 'image_id'); ?>
							</li>
						</div>	
					</ul>
				</div>
				<div class="clear"></div>
				<div>
					<ul>
				        <li>
							<input type="reset" class="button" value="<?php echo iPhoenixLang::admin_t('Cancel','main');?>" style="margin-left:15px; width:125px;" />	
							<input type="submit" class="button create" value="<?php echo iPhoenixLang::admin_t('Add','main');?>" style="margin-left:20px; width:125px;" />	
							<input type="submit" class="button update" value="<?php echo iPhoenixLang::admin_t('Update','main');?>" style="margin-left:20px; width:125px;" />
						</li>
					</ul>
				</div>
				<!--end left content-->
				<?php $this->endWidget(); ?>
			</div>
		</div>
	<!--content-popup-->
	</div>
</div>
<!--main-popup-->
<script type="text/javascript">
	$('#form-banner').submit(function(){
		$.ajax({
			'data': $(this).serialize(),
			'dataType': 'json',
			'success':function(data){
				if(data.success){
					hidenPopUp('form-banner');		
					$.fn.yiiGridView.update('banner-list');		
				}		
				else{
					$.each(data.errors, function(key, val) {
						$("#form-banner #Banner_"+key+"_em_").parent().parent().addClass('error');
                    	$("#form-banner #Banner_"+key+"_em_").text(val[0]);                                                    
                   		$("#form-banner #Banner_"+key+"_em_").show();
                    });
				}
			},
			'type':'POST',
			'url':'<?php echo iPhoenixUrl::createUrl('admin/banner/write')?>',
			'cache':false
		});
		return false;
	});
	function resetBannerForm(){
		$("#form-banner #Banner_cat").val('');
		$("#form-banner #Banner_name").val('');											
		$("#form-banner #Banner_url").val('');
		$("#form-banner #Banner_order_view").val('');
		$("#form-banner #Banner_id").val('');
		$("#form-banner #Banner_slogan").val('');
		$("#form-banner #Banner_description").val('');
		$("#store_data_upload_image_id").val('');
   		$("#preview_upload_image_id").html('');
       	$("#form-banner .create").hide();
       	$("#form-banner .update").hide();
	}
</script>