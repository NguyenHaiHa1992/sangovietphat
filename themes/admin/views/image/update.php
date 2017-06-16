<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>Image management</h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span>Update image</span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
	<div>
            <input type="button" class="button" value="List image" style="width:180px;" onClick="parent.location='<?php echo Yii::app()->createUrl('admin/image')?>'"/>
            <!-- <input type="button" class="button" value="Thêm ảnh" style="width:180px;" onClick="parent.location='<?php echo Yii::app()->createUrl('admin/image/create')?>'"/> -->
            <div class="line top bottom"></div>	
        </div>
	<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
		<div class="fl" style="width:430px;">
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
							<?php echo $form->labelEx($model,'intro'); ?>
							<?php echo $form->textField($model,'intro',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'intro'); ?>				
						</li>
					</div>	
																
			</ul>
		</div>
		<div style="width:430px;" class="fr">
			<ul>	
				<div class="row">
						<li>
							<label>News</label>
							<strong style="color: blue;"><?php echo $news->name;?></strong>				
						</li>
					</div>	
				<div class="row">
						<li>
							<?php echo $form->labelEx($model,'file_id'); ?>
							<?php echo $this->renderPartial('/file/_signupload_image', array('model'=>$model,'attribute'=>'file_id','h'=>124,'w'=>170)); ?>		
							<?php echo $form->error($model, 'file_id'); ?>
						</li>
				</div>			
			</ul>
		</div>
		<div style="clear: both"></div>
		<div>
			<ul>
                <li>
					<input type="reset" class="button" value="Hủy thao tác" style="margin-left:15px; width:125px;" />	
					<input type="submit" class="button" value="Cập nhật" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->