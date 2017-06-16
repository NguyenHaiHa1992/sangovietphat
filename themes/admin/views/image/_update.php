<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>false, 'id'=>'form_image')); ?>	
	<!--begin left content-->
	<div class="fl" style="width:480px;">
		<ul>
			<div class="row" style="text-align:center;">
				<li>
					<img alt="<?php echo $model->name?>" src="<?php echo $model->getAbsoluteThumbUrl(340,248)?>">				
				</li>
			</div>
			<div class="row">
				<li>
					<?php echo $form->labelEx($model,'name',array('style'=>'width:100px !important')); ?>
					<?php echo $form->textField($model,'name',array('style'=>'width:280px;','maxlength'=>'256')); ?>	
					<?php echo $form->error($model, 'name'); ?>				
				</li>
			</div>					
		</ul>
	</div>		
   <a id="update_image" style="margin-bottom:10px; margin-left:10px;width:125px;" class="button" title="Cập nhật" href="<?php echo Yii::app()->createUrl('admin/image/updateInfo',array('id'=>$model->id));?>">Update</a>
   <a style= "margin-bottom:10px; width:125px;" class="button" title="Hủy thao tác" onclick="popup('popUpDiv')">Cancel</a>
	<!--end left content-->			
	<?php $this->endWidget(); ?>