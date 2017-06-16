<!-- Main popup -->
<div class="form-customer popup-wrapper">
	<div class="main-popup">
		<a class="popup-close" onclick="hidenPopUp('form-customer');return false;"></a>
		<div class="content-popup">
			<div class="popup_title">Update customer information</div>
			<div class="folder-content">
			<?php $form=$this->beginWidget('CActiveForm', array('id'=>'form-customer','action'=>iPhoenixUrl::createUrl('admin/banner/write'),'method'=>'post','enableClientValidation'=>true)); ?>	
			<!--begin left content-->
			<div class="fl" style="width:300px; min-height: 180px">
				<ul>
					<?php echo $form->hiddenField($model,'id');?>
					<div class="row">
                    	<li>
							<?php echo $form->labelEx($model,'email'); ?>
							<?php echo $form->textField($model,'email',array('style'=>'width:280px','maxlength'=>'32')); ?>					
							<?php echo $form->error($model, 'email'); ?>
						</li>
					</div>
					<div class="row">
                    	<li>
							<?php echo $form->labelEx($model,'phone'); ?>
							<?php echo $form->textField($model,'phone',array('style'=>'width:280px','maxlength'=>'32')); ?>					
							<?php echo $form->error($model, 'phone'); ?>
						</li>
					</div>
					<div class="row">
                    	<li>
							<?php echo $form->labelEx($model,'tel'); ?>
							<?php echo $form->textField($model,'tel',array('style'=>'width:280px','maxlength'=>'32')); ?>					
							<?php echo $form->error($model, 'tel'); ?>
						</li>
					</div>
				</ul>
			</div>
			<!--end left content-->
			<div class="fr" style="width:300px;">
				<ul>
					<div class="row">
                    	<li>
							<?php echo $form->labelEx($model,'fullname'); ?>
							<?php echo $form->textField($model,'fullname',array('style'=>'width:280px','maxlength'=>'32')); ?>					
							<?php echo $form->error($model, 'fullname'); ?>
						</li>
					</div>
					<div class="row">
                    	<li>
							<?php echo $form->labelEx($model,'address'); ?>
							<?php echo $form->textArea($model,'address',array('style'=>'width:280px','maxlength'=>'256')); ?>					
							<?php echo $form->error($model, 'address'); ?>
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
			<?php $this->endWidget(); ?>
			</div>
		</div>
	<!--content-popup-->
	</div>
</div>
<!--main-popup-->
<script type="text/jscript">
	$('#form-customer').submit(function(){
		jQuery.ajax({
			'data': $(this).serialize(),
			'dataType': 'json',
			'success':function(data){
				if(data.success){
					hidenPopUp('form-customer');		
					$.fn.yiiGridView.update('customer-list');		
				}		
				else{
					$.each(data.errors, function(key, val) {
						$("#form-customer #Customer_"+key+"_em_").parent().parent().addClass('error');
                    	$("#form-customer #Customer_"+key+"_em_").text(val[0]);                                                    
                   		$("#form-customer #Customer_"+key+"_em_").show();
                    });
				}
			},
			'type':'GET',
			'url':'<?php echo iPhoenixUrl::createUrl('admin/customer/write')?>',
			'cache':false
		});
		return false;
	});
	function resetCustomerForm(){
		$("#form-customer #Customer_id").val('');
		$("#form-customer #Customer_email").val('');											
		$("#form-customer #Customer_firstname").val('');
		$("#form-customer #Customer_lastname").val('');
		$("#form-customer #Customer_phone").val('');	
		$("#form-customer #Customer_address").val('');
       	$("#form-customer .create").hide();
       	$("#form-customer .update").hide();
	}
</script>