<?php $model = new User();?>
<!-- Main popup -->
<div class="form-changePass popup-wrapper">
	<div class="main-popup">
		<a class="popup-close" onclick="hidenPopUp('form-changePass');return false;"></a>
		<div class="content-popup">
			<div class="popup_title"><?php echo iPhoenixLang::admin_t('Change Password','main');?></div>
			<div class="folder-content">
				<?php $form=$this->beginWidget('CActiveForm', array('id'=>'form-changePass','action'=>iPhoenixUrl::createUrl('admin/site/changePassword'),'method'=>'post','enableClientValidation'=>true)); ?>	
				<!--begin left content-->
				<div class="fl" style="width:480px;">
					<ul>
						<div class="row">
							<li>
								<?php echo $form->labelEx($model,'old_password'); ?>
								<?php echo $form->passwordField($model,'old_password',array('style'=>'width:280px;','maxlength'=>'32')); ?>
								<?php echo $form->error($model, 'old_password'); ?>
							</li>
						</div>
						<div class="row">
							<li>
								<?php echo $form->labelEx($model,'new_password'); ?>
								<?php echo $form->passwordField($model,'new_password',array('style'=>'width:280px;','maxlength'=>'32')); ?>
								<?php echo $form->error($model, 'new_password'); ?>
							</li>
						</div>
						<div class="row">
							<li>
								<?php echo $form->labelEx($model,'confirm_password'); ?>
								<?php echo $form->passwordField($model,'confirm_password',array('style'=>'width:280px;','maxlength'=>'32')); ?>
								<?php echo $form->error($model, 'confirm_password'); ?>
							</li>
						</div>
					</ul>
				</div>
				<div>
					<ul>
				        <li>	
							<input type="submit" class="button update" value="Update" style="margin-left:20px; width:125px;" />
						</li>
					</ul>
				</div>
				<!--end left content-->
				<div class="clear"></div>
				<div class="flash-error" style="display:none; margin: 10px 0 0 0;"></div>
				<div class="flash-success" style="display:none; margin: 10px 0 0 0;"></div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	<!--content-popup-->
	</div>
</div>
<!--main-popup-->
<script type="text/javascript">
$('#form-changePass').submit(function(){
	jQuery.ajax({
		'data': $(this).serialize(),
		'dataType': 'json',
		'success':function(data){
			if(data.success){
				$('.flash-error',$('#form-changePass')).hide();
				$('.flash-success',$('#form-changePass')).text(' ');
				$('.flash-success',$('#form-changePass')).append(' '+data.message);
				$('.flash-success',$('#form-changePass')).fadeIn();
			}
			else{
				$('.flash-sucess',$('#form-changePass')).hide();
				$('.flash-error',$('#form-changePass')).text(' ');
				$('.flash-error',$('#form-changePass')).append(' '+data.message);
				$('.flash-error',$('#form-changePass')).fadeIn();
			}
		},
		'type':'GET',
		'url':'<?php echo iPhoenixUrl::createUrl('admin/site/changePassword')?>',
		'cache':false
	});
	return false;
});
</script>