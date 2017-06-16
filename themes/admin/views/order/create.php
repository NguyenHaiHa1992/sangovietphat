<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1><?php echo iPhoenixLang::admin_t('Order management');?></h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon"><span><?php echo iPhoenixLang::admin_t('Add order');?></span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
		<div>
            <input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('List orders');?>" style="width:180px;" onClick="parent.location='<?php echo Yii::app()->createUrl('admin/order/index')?>'"/>
            <div class="line top bottom"></div>	
        </div>
		<?php $form=$this->beginWidget('CActiveForm', array('id'=>'form-order','method'=>'post','enableClientValidation'=>true)); ?>	
		<!--begin left content-->
			<div class="fl" style="width:480px; min-height: 180px">
			<ul>
				<?php echo $form->hiddenField($model,'id');?>
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
			</ul>
		</div>
		<div style="width:480px;" class="fr">
			<ul>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'tel'); ?>
						<?php echo $form->textField($model,'tel',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'tel'); ?>	
					</li>
				</div>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'address'); ?>
						<?php echo $form->textField($model,'address',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'address'); ?>	
					</li>
				</div>		
			</ul>
		</div>
		<div>
			<ul>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'content'); ?>
						<?php echo $form->textArea($model,'content',array('style'=>'width:700px;','maxlength'=>'1024')); ?>	
						<?php echo $form->error($model, 'content'); ?>	
					</li>
				</div>	
                <li>
					<input type="reset" class="button" value="<?php echo iPhoenixLang::admin_t('Cancel','main');?>" style="margin-left:15px; width:125px;" />	
					<input type="submit" class="button create" value="<?php echo iPhoenixLang::admin_t('Add','main');?>" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->