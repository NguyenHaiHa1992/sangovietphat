<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>QA Answer management</h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span>Update QA Answer</span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
		<div>
            <input type="button" class="button" value="List QA Answers" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/qa')?>'"/>
            <input type="button" class="button" value="Add QA Answer" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/qa/create')?>'"/>
            <div class="line top bottom"></div>	
        </div>
		<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
		<div style="min-height: 180px">
			<ul>
				<div class="row">
					<li>
						<label>Question</label>
						<?php echo $model->qa->title;?>				
					</li>
				</div>
				<div class="row">
					<li>
						<label class="fl">Content</label>
						<div class="">
							<?php echo $model->qa->content;?>
						</div>				
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
						<?php echo $form->labelEx($model,'order_view'); ?>
						<?php echo $form->textField($model,'order_view',array('style'=>'width:50px;')); ?>	
						<?php echo $form->error($model, 'order_view'); ?>				
					</li>
				</div>
			</ul>
		</div>
		<!--end left content-->
		<div>
			<ul>
				<div class="row">
                	<li>
                	<?php echo $form->labelEx($model,'content'); ?>
                    <?php  
                    $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'content','language'=>Yii::app()->language,'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:500px'))); 
                    ?>
                    <?php echo $form->error($model,'content'); ?>
                	</li>
                </div>
                <li>
					<input type="reset" class="button" value="Cancel" style="margin-left:15px; width:125px;" />
					<input type="submit" class="button" value="Update" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<?php $this->endWidget(); ?>
		<div class="clear"></div>
	</div>
</div>