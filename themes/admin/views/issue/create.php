	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1><?php echo iPhoenixLang::admin_t('Quản trị Ticket'); ?></h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('Cập nhật Ticket'); ?></span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
            <div>
            	<a href="<?php echo Yii::app() -> createAbsoluteUrl('admin/issue/index'); ?>" class="button" style="width:180px;">Danh sách Ticket</a>
            	<a href="<?php echo Yii::app() -> createAbsoluteUrl('admin/issue/create'); ?>" class="button" style="width:180px;">Thêm Ticket</a>
            </div>
         	<div class="folder-content form">
			<?php $form = $this->beginWidget('CActiveForm',array('method'=>'post')); ?>
			<!--begin left content-->
			<div class="fl" style="width:680px; min-height: 180px">
				<ul>
					<div class="row" style="margin-top: 15px;">
						<li>
							<?php echo $form->labelEx($model,'name'); ?>
							<?php echo $form->textField($model,'name',array('style'=>'width:500px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'name'); ?>				
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'file_id'); ?>
							<?php echo $this->renderPartial('/file/_multiupload', array('model'=>$model,'attribute'=>'file_id')); ?>		
							<?php echo $form->error($model, 'file_id'); ?>
						</li>
					</div>
				</ul>
			</div>
			<div class="row">
				<div id="tabContainer">
					<div id="tabMenu">
						<ul class="menu">
							<li><a id="select1" class="active"><span style="vertical-align: middle"><?php echo $form->label($model, 'description'); ?></span></a></li>
						</ul>
					</div>
					<div id="tabContent">
						<div id="tab1" class="content active">
							<div class="clear"></div>
				            <?php $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'description','language'=>Yii::app()->params['admin_lang'],'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:500px'))); ?>
							<?php echo $form->error($model,'description'); ?>
						</div>
					</div>
				</div><!--end tabContainer-->
			</div>
			<div>
				<ul>
	                <li>
						<input type="reset" class="button" value="<?php echo iPhoenixLang::admin_t('Cancel','main');?>" style="margin-left:15px; width:125px;" />
						<input type="submit" class="button" value="<?php echo iPhoenixLang::admin_t('Tạo Ticket','main');?>" style="margin-left:20px; width:125px;" />	
					</li>
				</ul>
			</div>
			<?php $this->endWidget(); ?>
			</div>	
		</div>
	</div>
	<!--end inside content-->
	<div class="bg-overlay"></div>
