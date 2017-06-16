<!-- Main popup -->
<div class="form-contact popup-wrapper">
	<div class="main-popup">
		<a class="popup-close" onclick="hidenPopUp('form-contact');return false;"></a>
		<div class="content-popup">
			<div class="popup_title">Contact detail</div>
			<div class="folder-content">
			<?php $form=$this->beginWidget('CActiveForm', array('id'=>'form-contact','action'=>Yii::app()->createUrl('admin/contact/write'),'method'=>'post','enableClientValidation'=>true)); ?>	
			<!--begin left content-->
			<div>
				<ul>
					<?php echo $form->hiddenField($model,'id');?>
					<div class="row">
						<li>
							<?php echo $form->label($model,'name'); ?>
							<span id="Contact_name"><?php echo $model->name;?></span>
						</li>
					</div>						
					<div class="row">
						<li>
							<?php echo $form->label($model,'email'); ?>
							<span id="Contact_email"><?php echo $model->email;?></span>
						</li>
					</div>	
					<div class="row">
						<li>
							<?php echo $form->label($model,'tel'); ?>
							<span id="Contact_tel"><?php echo $model->tel;?></span>
						</li>
					</div>	
					<div class="row">
						<li>
							<?php echo $form->label($model,'address'); ?>
							<span id="Contact_address"><?php echo $model->address;?></span>
						</li>
					</div>	
					<div class="row">
						<li>
							<?php echo $form->label($model,'content'); ?>
							<span id="Contact_content"><?php echo $model->content;?></span>
						</li>
					</div>
					<div class="row" id="view_reply">
						<li>
							<?php echo $form->label($model,'reply'); ?>
							<span id="Contact_view_reply"><?php echo $model->reply;?></span>
						</li>
					</div>
					<div class="row" id="input_reply">
						<li>
							<?php echo $form->labelEx($model,'reply'); ?>
							<?php echo $form->textArea($model,'reply'); ?>
							<?php echo $form->error($model,'reply'); ?>
						</li>
					</div>	
				</ul>
			</div>
			<div>
				<ul>
	                <li>
						<input type="reset" class="button" value="Cancel" style="margin-left:15px; width:125px;" />	
						<input type="submit" class="button update" value="Update" style="margin-left:20px; width:125px;" />
					</li>
				</ul>
			</div>
			<!--end left content-->
			<?php $this->endWidget(); ?>
			</div>
		</div>
		<!--content-popup-->
	</div>
	<!--main-popup-->
</div>
<script type="text/jscript">
	$('#form-contact').submit(function(){
		jQuery.ajax({
			'data': $(this).serialize(),
			'dataType': 'json',
			'success':function(data){
				if(data.success){
					hidenPopUp('form-contact');		
					$.fn.yiiGridView.update('contact-list');		
				}		
				else{
					$.each(data.errors, function(key, val) {
						$("#form-contact #Contact_"+key+"_em_").parent().parent().addClass('error');
                    	$("#form-contact #Contact_"+key+"_em_").text(val[0]);                                                    
                   		$("#form-contact #Contact_"+key+"_em_").show();
                    });
				}
			},
			'type':'GET',
			'url':'<?php echo Yii::app()->createUrl('admin/contact/write')?>',
			'cache':false
		});
		return false;
	});
	function resetContactForm(){
		$("#form-contact #Contact_reply").val('');
		$("#form-contact #Contact_id").val('');
       	$("#form-contact .button").hide();
       	$("#form-contact #input_reply").hide();	
       	$("#form-contact #view_reply").hide();	
	}
</script>