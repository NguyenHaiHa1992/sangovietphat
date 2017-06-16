<!--begin inside content-->
<div class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>Quản trị Nhà thuốc</h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span>Thêm Nhà thuốc mới</span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
	<div>
		<input type="button" class="button" value="Danh sách Nhà thuốc" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/store')?>'"/>
		<div class="line top bottom"></div>	
	</div>
	<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
		<div class="fl" style="width:480px; min-height: 180px">
			<ul>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'name'); ?>
							<?php echo $form->textField($model,'name',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'name'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'home'); ?>
							<?php echo $form->checkbox($model,'home'); ?>	
							<?php echo $form->error($model, 'home'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'new'); ?>
							<?php echo $form->checkbox($model,'new'); ?>	
							<?php echo $form->error($model, 'new'); ?>				
						</li>
					</div>		
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'status'); ?>
							<?php echo $form->checkbox($model,'status'); ?>	
							<?php echo $form->error($model, 'status'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'tel'); ?>
							<?php echo $form->textField($model,'tel',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'tel'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'mobile'); ?>
							<?php echo $form->textField($model,'mobile',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'mobile'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'tmp_product_ids'); ?>
							<?php echo $form->textField($model,'tmp_product_ids',array('readonly'=>'readonly','style'=>'width:300px')); ?>	
							<?php echo $form->error($model,'tmp_product_ids'); ?>
							<a title="Chọn Tin tức" onclick="showPopUp('list_suggest_store');return false;" id="btn-add-product" class="button" style="width: 100px;text-decoration: none;">Chọn</a>			
						</li>
					</div>				
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'introimage_id'); ?>
							<?php echo $this->renderPartial('/image/_signupload', array('model'=>$model,'attribute'=>'introimage_id','h'=>60,'w'=>60)); ?>		
							<?php echo $form->error($model, 'introimage_id'); ?>
						</li>
					</div>	
					<div class="row">
						<li>
							<label>Tỉnh / Thành Phố: </label>
							<?php echo CHtml::dropDownList('location_id','',$list_city,array('style'=>'width: 200px')); ?>
						</li>
					</div>
					<script type="text/javascript">
							jQuery(function($) {
								$('#location_id').live('change', function() {
									jQuery.ajax({
										'type' : 'POST',
										'url' : '<?php echo CController::createUrl('store/updateListCity');?>',
										'cache' : false,
										'data' : jQuery(this).parents("form").serialize(),
										'success' : function(html) {
											jQuery("#Store_city_id").html(html)
										}
									});
									return false;
								});
							});
					</script>
					<div class="row">
						<li>
							<label>Quận / Huyện: </label>
							<?php echo $form->dropDownList($model,'city_id',array(),array('style'=>'width: 200px')); ?>							
							<?php echo $form->error($model, 'city_id',array('style'=>'color: red; font-style: italic')); ?>	
							<div id="newsRental_id_errors" class="validation error" style="display: none;">Quận huyện không được để trống !</div>						
						</li>
					</div>												
			</ul>
		</div>
		<div style="width:480px;" class="fr">
			<ul>	
				<div class="row">
						<li>
							<?php echo $form->labelEx($model,'meta_title'); ?>
							<?php echo $form->textArea($model,'meta_title',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
							<?php echo $form->error($model, 'meta_title'); ?>
						</li>
				</div>		
				<div class="row">
						<li>
							<?php echo $form->labelEx($model,'meta_keyword'); ?>
							<?php echo $form->textArea($model,'meta_keyword',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
							<?php echo $form->error($model, 'meta_keyword'); ?>
						</li>
				</div>	
				<div class="row">
						<li>
							<?php echo $form->labelEx($model,'meta_description'); ?>
							<?php echo $form->textArea($model,'meta_description',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
							<?php echo $form->error($model, 'meta_description'); ?>
						</li>
				</div>		
			</ul>
		</div>
		<div>
			<ul>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'address'); ?>
						<?php echo $form->textArea($model,'address',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
						<?php echo $form->error($model, 'address'); ?>
					</li>
				</div>	

                <li>
					<input type="reset" class="button" value="Hủy thao tác" style="margin-left:15px; width:125px;" />	
					<input type="submit" class="button" value="Thêm mới" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->
<?php	echo $this->renderPartial('_list_suggest_product', 
								array(
									'class_checkbox'=>'SuggestStore',
									'class'=>'list_suggest_store',
									'attribute'=>'tmp_suggest_ids',
									'suggest'=>$suggest,
									'list_category'=>$list_category,
									'condition_search'=> null
								));?>