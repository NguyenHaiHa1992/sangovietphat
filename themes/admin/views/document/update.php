<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>Document management</h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span>Update document</span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
	<div>
			<input type="button" class="button" value="Document categories" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/documentCategory/index')?>'"/>
            <input type="button" class="button" value="List documents" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/document')?>'"/>
            <input type="button" class="button" value="Add document" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/document/create')?>'"/>
            <div class="line top bottom"></div>	
        </div>
	<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
		<div class="fl" style="width:480px;">
			<ul>
				<?php 
				$list=array();
				foreach ($list_category as $id=>$level){
					$cat=DocumentCategory::model()->findByPk($id);
					$view = "";
					for($i=1;$i<$level;$i++){
						$view .="---";
					}
					$list[$id]=$view." ".$cat->name." ".$view;
				}
				?>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'cat_id'); ?>
						<?php echo $form->dropDownList($model,'cat_id',$list,array('style'=>'width:300px')); ?>
						<?php echo $form->error($model, 'cat_id'); ?>
					</li>
				</div>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'name'); ?>
						<?php echo $form->textField($model,'name',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'name'); ?>				
					</li>
				</div>
				<div class="row" style="display:none">
					<li>
						<?php echo $form->labelEx($model,'home'); ?>
						<?php echo $form->checkbox($model,'home'); ?>	
						<?php echo $form->error($model, 'home'); ?>				
					</li>
				</div>
				<div class="row" style="display:none">
					<li>
						<?php echo $form->labelEx($model,'new'); ?>
						<?php echo $form->checkbox($model,'new'); ?>	
						<?php echo $form->error($model, 'new'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'order_view'); ?>
						<?php echo $form->textField($model,'order_view',array('style'=>'width:300px;')); ?>	
						<?php echo $form->error($model, 'order_view'); ?>				
					</li>
				</div>					
				<div class="row" style="display:none">
					<li>
						<?php echo $form->labelEx($model,'tmp_suggest_ids'); ?>
						<?php echo $form->textField($model,'tmp_suggest_ids',array('readonly'=>'readonly','style'=>'width:300px')); ?>	
						<?php echo $form->error($model,'tmp_suggest_ids'); ?>
						<a title="Chọn bài viết" onclick="showPopUp('list_suggest_document');return false;" id="btn-add-product" class="button" style="width: 100px; text-decoration: none;">Chọn</a>			
					</li>
				</div>						
				<div class="row">
						<li>
							<?php echo $form->labelEx($model,'files'); ?>
							<?php echo $this->renderPartial('/file/_multiupload', array('model'=>$model,'attribute'=>'tmp_file_ids')); ?>		
							<?php echo $form->error($model, 'files'); ?>
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
		<div class="clear"></div>
		<div>
			<ul>
				<div class="row">
                	<li>
                	<?php echo $form->labelEx($model,'description'); ?>
                    <?php  
                    $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'description','language'=>Yii::app()->language,'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:500px'))); 
                    ?>
                    <?php echo $form->error($model,'description'); ?>
                	</li>
                </div>
                <li>
					<input type="reset" class="button" value="Cancel" style="margin-left:15px; width:125px;" />	
					<input type="submit" class="button" value="Update" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->
<?php	echo $this->renderPartial('_list_suggest_document', 
								array(
									'class_checkbox'=>'SuggestDocument',
									'class'=>'list_suggest_document',
									'attribute'=>'tmp_suggest_ids',
									'suggest'=>$suggest,
									'list_category'=>$list_category,
									'condition_search'=> 'id <> '.$model->id
								));?>