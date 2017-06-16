<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1><?php echo iPhoenixLang::admin_t('City Management');?></h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon"><span><?php echo iPhoenixLang::admin_t('Add city');?></span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
	<div>
		<input type="button" class="button" value="List Cities" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/city')?>'"/>
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
						<?php echo $form->labelEx($model,'status'); ?>
						<?php echo $form->checkbox($model,'status'); ?>	
						<?php echo $form->error($model, 'status'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'cost'); ?>
						<?php echo $form->textField($model,'cost',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'cost'); ?>				
					</li>
				</div>
			</ul>
		</div>
		<div style="width:480px;" class="fr">
			<ul>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'order_view'); ?>
						<?php echo $form->textField($model,'order_view',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'order_view'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'type'); ?>
						<?php echo $form->dropDownList($model,'type',array('0'=>'Tỉnh / Thành Phố','1'=>'Quận / Huyện'),array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'type'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'parent_id'); ?>
                        <?php
                        	$view_parent_nodes=array('0'=>iPhoenixLang::admin_t('Root'));
                        	foreach ($model->list_nodes as $id=>$level){
                        	 	$node=City::model()->findByPk($id);	
								$view = "";
								for($i=1;$i<$level;$i++){
									$view .="--";
								}							
								$view_parent_nodes[$id]=$view." ".$node->name." ".$view;
							}
							
                        	echo $form->dropDownList($model,'parent_id',$view_parent_nodes,array('style'=>'width:300px'));
                        ?>
                  		<?php echo $form->error($model, 'parent_id'); ?>
					</li>
				</div>
			</ul>
		</div>
		<div style="clear: both">
			<ul>
                <li>
					<input type="reset" class="button" value="<?php echo iPhoenixLang::admin_t('Cancel');?>" style="margin-left:15px; width:125px;" />	
					<input type="submit" class="button" value="<?php echo iPhoenixLang::admin_t('Add');?>" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->
