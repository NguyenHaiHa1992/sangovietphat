<!-- Main popup -->
<div class="form-supporter popup-wrapper">
<div class="main-popup">
	<a class="popup-close" onclick="hidenPopUp('form-supporter');return false;"></a>
	<div class="content-popup">
		<div class="folder-content">
		<?php $form=$this->beginWidget('CActiveForm', array('id'=>'form-supporter','action'=>iPhoenixUrl::createUrl('admin/supporter/write'),'method'=>'post','enableClientValidation'=>true)); ?>	
		<!--begin left content-->
			<div class="fl" style="width:300px; min-height: 180px">
				<ul>
					<?php echo $form->hiddenField($model,'id');?>
					<div class="row none">
						<li>
							<?php echo $form->labelEx($model,'name'); ?>
							<?php echo $form->textField($model,'name',array('style'=>'width:250px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'name'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'title'); ?>
							<?php echo $form->textField($model,'title',array('style'=>'width:250px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'title'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'skype'); ?>
							<?php echo $form->textField($model,'skype',array('style'=>'width:250px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'skype'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'yahoo'); ?>
							<?php echo $form->textField($model,'yahoo',array('style'=>'width:250px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'yahoo'); ?>				
						</li>
					</div>
				</ul>
			</div>
			<div style="width:300px;" class="fr">
				<ul>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'email'); ?>
							<?php echo $form->textField($model,'email',array('style'=>'width:250px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'email'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'phone'); ?>
							<?php echo $form->textField($model,'phone',array('style'=>'width:250px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'phone'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'order_view'); ?>
							<?php echo $form->textField($model,'order_view',array('style'=>'width:250px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'order_view'); ?>				
						</li>
					</div>
				</ul>
			</div>
			<div class="clear"></div>
			<div>
				<ul>
	                <li>
						<input type="reset" class="button" value="Cancel" style="margin-left:15px; width:125px;" />	
						<input type="submit" class="button create" value="Add" style="margin-left:20px; width:125px;" />	
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
</div>
<!--main-popup-->
<script type="text/jscript">
	$('#form-supporter').submit(function(){
		jQuery.ajax({
			'data': $(this).serialize(),
			'dataType': 'json',
			'success':function(data){
				if(data.success){
					hidenPopUp('form-supporter');		
					$.fn.yiiGridView.update('supporter-list');		
				}		
				else{
					$.each(data.errors, function(key, val) {
						$("#form-supporter #Supporter_"+key+"_em_").parent().parent().addClass('error');
                    	$("#form-supporter #Supporter_"+key+"_em_").text(val[0]);                                                    
                   		$("#form-supporter #Supporter_"+key+"_em_").show();
                    });
				}
			},
			'type':'GET',
			'url':'<?php echo iPhoenixUrl::createUrl('admin/supporter/write')?>',
			'cache':false
		});
		return false;
	});
	function resetSupporterForm(){
		$("#form-supporter #Supporter_skype").val('');
		$("#form-supporter #Supporter_name").val('');											
		$("#form-supporter #Supporter_yahoo").val('');
		$("#form-supporter #Supporter_order_view").val('');
		$("#form-supporter #Supporter_id").val('');
		$("#form-supporter #Supporter_title").val('');
		$("#form-supporter #Supporter_phone").val('');
		$("#form-supporter #Supporter_email").val('');
       	$("#form-supporter .create").hide();
       	$("#form-supporter .update").hide();
	}
</script>