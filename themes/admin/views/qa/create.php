<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>QAs management</h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span>Add QA</span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
		<div>
			<!-- <input type="button" class="button" value="Danh mục Hỏi đáp" style="width:180px;" onClick="parent.location='<?php //echo iPhoenixUrl::createUrl('admin/QaCategory/index')?>'"/> -->
			<input type="button" class="button" value="List QAs" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/qa')?>'"/>
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
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'email'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'title'); ?>
						<?php echo $form->textField($model,'title',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'title'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'product_id'); ?>
						<?php echo $form->dropDownList($model,'product_id', $list_product,array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'product_id'); ?>				
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
						<?php echo $form->labelEx($model,'home'); ?>
						<?php echo $form->checkbox($model,'home'); ?>	
						<?php echo $form->error($model, 'home'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php //echo $form->labelEx($model,'new'); ?>
						<?php //echo $form->checkbox($model,'new'); ?>	
						<?php //echo $form->error($model, 'new'); ?>				
					</li>
				</div>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'order_view'); ?>
						<?php echo $form->textField($model,'order_view',array('style'=>'width:300px;')); ?>	
						<?php echo $form->error($model, 'order_view'); ?>				
					</li>
				</div>		
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'question'); ?>
						<?php echo $form->TextArea($model,'question',array('rows'=>5,'cols'=>44,'style'=>'width:300px;'));?>
						<?php echo $form->error($model, 'question'); ?>				
					</li>
				</div>				
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'tmp_suggest_ids'); ?>
						<?php echo $form->textField($model,'tmp_suggest_ids',array('readonly'=>'readonly','style'=>'width:300px')); ?>	
						<?php echo $form->error($model,'tmp_suggest_ids'); ?>
						<a title="Select QAs" onclick="showPopUp('list_suggest_qa');return false;" id="btn-add-product" class="button" style="width: 100px;text-decoration: none;">Chọn</a>			
					</li>
				</div>	
				<div class="row">
					<li>
						<?php //echo $form->labelEx($model,'introimage_id'); ?>
						<?php //echo $this->renderPartial('/image/_signupload', array('model'=>$model,'attribute'=>'introimage_id','h'=>60,'w'=>60)); ?>		
						<?php //echo $form->error($model, 'introimage_id'); ?>
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
                <li>
					<input type="reset" class="button" value="Update" style="margin-left:15px; width:125px;" />	
					<input type="submit" class="button" value="Add" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->
<?php	echo $this->renderPartial('_list_suggest_qa', 
								array(
									'class_checkbox'=>'SuggestQa',
									'class'=>'list_suggest_qa',
									'attribute'=>'tmp_suggest_ids',
									'suggest'=>$suggest,
									//'list_category'=>$list_category,
									'condition_search'=> null
								));?>