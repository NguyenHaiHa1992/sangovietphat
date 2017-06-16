<!-- Main popup -->
<div class="form-user popup-wrapper">
	<div class="main-popup">
		<a class="popup-close" onclick="hidenPopUp('form-user');return false;"></a>
		<div class="content-popup">
			<div class="popup_title"><?php echo iPhoenixLang::admin_t('Update user');?></div>
			<div class="folder-content">
			<?php $form=$this->beginWidget('CActiveForm', array('id'=>'form-user','action'=>iPhoenixUrl::createUrl('admin/banner/write'),'method'=>'post','enableClientValidation'=>true)); ?>	
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
							<?php echo $form->labelEx($model,'firstname'); ?>
							<?php echo $form->textField($model,'firstname',array('style'=>'width:280px','maxlength'=>'32')); ?>					
							<?php echo $form->error($model, 'firstname'); ?>
						</li>
					</div>   
					<div class="row">
                    	<li>
							<?php echo $form->labelEx($model,'lastname'); ?>
							<?php echo $form->textField($model,'lastname',array('style'=>'width:280px','maxlength'=>'32')); ?>					
							<?php echo $form->error($model, 'lastname'); ?>
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
							<?php echo $form->labelEx($model,'address'); ?>
							<?php echo $form->textField($model,'address',array('style'=>'width:280px','maxlength'=>'32')); ?>					
							<?php echo $form->error($model, 'address'); ?>
						</li>
					</div>					                                    
				</ul>
			</div>
			<!--end left content-->
			<div class="fr" style="width:200px;">
				<ul>
                  <div class="row">
	                    <li>
	                        <?php echo $form->labelEx($model,'role'); ?>
	                        <?php
								$list_nodes=AuthItem::getList_all_roles();
	                        	 foreach ($list_nodes as $name=>$level){
									$view = "";
									for($i=1;$i<$level;$i++){
										$view .="--";
									}
									$view_parent_nodes[$name]=$view." ".$name." ".$view;
								}
	                        ?>
	                        <?php echo $form->dropDownList($model,'role',$view_parent_nodes,array('style'=>'width:150px','multiple' => 'multiple','size'=>10)); ?>
	                  		<?php echo $form->error($model, 'role'); ?>
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
			<?php $this->endWidget(); ?>
			</div>
		</div>
	<!--content-popup-->
	</div>
</div>
<!--main-popup-->
<script type="text/jscript">
	$('#form-user').submit(function(){
		$.ajax({
			'data': $(this).serialize(),
			'dataType': 'json',
			'success':function(data){
				if(data.success){
					hidenPopUp('form-user');		
					$.fn.yiiGridView.update('user-list');		
				}		
				else{
					$.each(data.errors, function(key, val) {
						$("#form-user #User_"+key+"_em_").parent().parent().addClass('error');
                    	$("#form-user #User_"+key+"_em_").text(val[0]);                                                    
                   		$("#form-user #User_"+key+"_em_").show();
                    });
				}
			},
			'type':'POST',
			'url':'<?php echo iPhoenixUrl::createUrl('admin/user/write')?>',
			'cache':false
		});
		return false;
	});
	function resetUserForm(){
		$("#form-user #User_id").val('');
		$("#form-user #User_email").val('');											
		$("#form-user #User_firstname").val('');
		$("#form-user #User_lastname").val('');
		$("#form-user #User_phone").val('');	
		$("#form-user #User_address").val('');
		$("#form-user #User_role").val('');
       	$("#form-user .create").hide();
       	$("#form-user .update").hide();
	}
</script>